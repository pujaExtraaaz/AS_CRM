<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductTax;
use App\Models\Stream;
use App\Models\User;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\UserDefualtView;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->can('Manage Product')) {

            // Since we simplified the model, show all products for all users
            $products = Product::all();

            $defualtView = new UserDefualtView();
            $defualtView->route = \Request::route()->getName();
            $defualtView->module = 'product';
            $defualtView->view = 'list';
            User::userDefualtView($defualtView);

            return view('product.index', compact('products'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (\Auth::user()->can('Create Product')) {
            $status = Product::$status;

            // Generate year options (current year - 30 years to current year + 10 years)
            $currentYear = date('Y');
            $years = [];
            for ($i = $currentYear - 30; $i <= $currentYear + 10; $i++) {
                $years[$i] = $i;
            }
            $years = array_reverse($years, true); // Most recent years first

            return view('product.create', compact('status', 'years'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (\Auth::user()->can('Create Product')) {
            $validator = \Validator::make(
                    $request->all(), [
                'year' => 'required|integer|min:1900|max:2030',
                'make' => 'required|max:120',
                'model' => 'required|max:120',
                'part_name' => 'required|max:120',
                'is_active' => 'required|boolean',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $product = new Product();
            $product['year'] = $request->year;
            $product['make'] = $request->make;
            $product['model'] = $request->model;
            $product['part_name'] = $request->part_name;
            $product['is_active'] = $request->is_active;
            $product->save();

            Stream::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'created_by' => \Auth::user()->creatorId(),
                        'log_type' => 'created',
                        'remark' => json_encode(
                                [
                                    'owner_name' => \Auth::user()->username,
                                    'title' => 'product',
                                    'stream_comment' => '',
                                    'user_name' => $product->part_name,
                                ]
                        ),
                    ]
            );

            return redirect()->route('product.index')->with('success', __('Product Successfully Created.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request) {
        if (\Auth::user()->can('Show Product')) {
            $year = $request->get('year');
            $warehouse = $request->get('warehouse');

            return view('product.view', compact('product', 'year', 'warehouse'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request) {
        if (\Auth::user()->can('Edit Product')) {
            $status = Product::$status;

            // Generate year options (current year - 30 years to current year + 10 years)
            $currentYear = date('Y');
            $years = [];
            for ($i = $currentYear - 30; $i <= $currentYear + 10; $i++) {
                $years[$i] = $i;
            }
            $years = array_reverse($years, true); // Most recent years first
            // get previous user id
            $previous = Product::where('id', '<', $product->id)->max('id');
            // get next user id
            $next = Product::where('id', '>', $product->id)->min('id');

            // Get year and warehouse from request parameters
            $year = $request->get('year');
            $warehouseParam = $request->get('warehouse');

            return view('product.edit', compact('product', 'status', 'previous', 'next', 'year', 'warehouseParam', 'years'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {
        if (\Auth::user()->can('Edit Product')) {
            $validator = \Validator::make(
                    $request->all(), [
                'year' => 'required|integer|min:1900|max:2030',
                'make' => 'required|max:120',
                'model' => 'required|max:120',
                'part_name' => 'required|max:120',
                'is_active' => 'required|boolean',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $product['year'] = $request->year;
            $product['make'] = $request->make;
            $product['model'] = $request->model;
            $product['part_name'] = $request->part_name;
            $product['is_active'] = $request->is_active;
            $product->update();

            Stream::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'created_by' => \Auth::user()->creatorId(),
                        'log_type' => 'updated',
                        'remark' => json_encode(
                                [
                                    'owner_name' => \Auth::user()->username,
                                    'title' => 'product',
                                    'stream_comment' => '',
                                    'user_name' => $product->part_name,
                                ]
                        ),
                    ]
            );

            return redirect()->route('product.index')->with('success', __('Product ' . $product->part_name . ' Successfully Updated.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        if (\Auth::user()->can('Delete Product')) {
            $product->delete();

            return redirect()->back()->with('success', __('Product ' . $product->part_name . ' successfully deleted.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function grid() {
        $products = Product::all();

        $defualtView = new UserDefualtView();
        $defualtView->route = \Request::route()->getName();
        $defualtView->module = 'product';
        $defualtView->view = 'grid';
        User::userDefualtView($defualtView);

        return view('product.grid', compact('products'));
    }

    public function fileExport() {

        $name = 'product_' . date('Y-m-d i:h:s');
        $data = Excel::download(new ProductExport(), $name . '.xlsx');
        ob_end_clean();

        return $data;
    }

    public function fileImportExport() {
        return view('product.import');
    }

    public function fileImport(Request $request) {

        $rules = [
            'file' => 'required|mimes:csv,txt,xlsx',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $products = (new ProductImport())->toArray(request()->file('file'))[0];

        $totalproduct = count($products) - 1;

        $errorArray = [];
        for ($i = 1; $i <= count($products) - 1; $i++) {
            $product = $products[$i];

            $productByPartName = Product::where('part_name', $product[3])->first();

            if (!empty($productByPartName)) {
                $productData = $productByPartName;
            } else {
                $productData = new Product();
            }

            // Map CSV columns to our simplified fields
            // Assuming CSV format: year, make, model, part_name, is_active
            $productData->year = $product[0] ?? null;
            $productData->make = $product[1] ?? '';
            $productData->model = $product[2] ?? '';
            $productData->part_name = $product[3] ?? '';
            $productData->is_active = $product[4] ?? 1;

            if (empty($productData)) {
                $errorArray[] = $productData;
            } else {
                $productData->save();
            }
        }

        $errorRecord = [];
        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg'] = __('Record successfully imported');
        } else {
            $data['status'] = 'error';
            $data['msg'] = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalproduct . ' ' . 'record');

            foreach ($errorArray as $errorData) {

                $errorRecord[] = implode(',', $errorData);
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }

    /**
     * Get product details for AJAX request
     */
    public function getProductDetails(Request $request) {
        $productId = $request->get('product_id');

        if ($productId) {
            $product = Product::find($productId);

            if ($product) {
                return response()->json([
                            'success' => true,
                            'product' => [
                                'id' => $product->id,
                                'year' => $product->year,
                                'make' => $product->make,
                                'model' => $product->model,
                                'part_name' => $product->part_name,
                                'is_active' => $product->is_active
                            ]
                ]);
            }
        }

        return response()->json([
                    'success' => false,
                    'message' => 'Product not found'
        ]);
    }
}
