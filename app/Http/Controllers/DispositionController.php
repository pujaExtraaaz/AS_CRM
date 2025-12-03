<?php

namespace App\Http\Controllers;

use App\Models\Disposition;
use Illuminate\Http\Request;

class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Manage Disposition'))
        {
            if(\Auth::user()->type == 'owner'){
            $dispositions = Disposition::where('created_by', \Auth::user()->creatorId())->get();
            }
            else{
                $dispositions = Disposition::where('created_by', \Auth::user()->id)->get();

            }
            return view('disposition.index', compact('dispositions'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->can('Create Disposition'))
        {
            return view('disposition.create');
        }
        else
        {
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
    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Disposition'))
        {
            $this->validate(
                $request, ['name' => 'required|max:40',]
            );
            $name             = $request['name'];
            $disposition       = new Disposition();
            $disposition->name = $name;
            $disposition['created_by']   = \Auth::user()->creatorId();
            $disposition->save();

            return redirect()->route('disposition.index')->with('success', 'Disposition ' . $disposition->name . ' added!');
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Disposition $disposition
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Disposition $disposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Disposition $disposition
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Disposition $disposition)
    {
        if(\Auth::user()->can('Edit Disposition'))
        {
            return view('disposition.edit', compact('disposition'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Disposition $disposition
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disposition $disposition)
    {
        if(\Auth::user()->can('Edit Disposition'))
        {
            $this->validate(
                $request, ['name' => 'required|max:40',]
            );
            $name             = $request['name'];
            $disposition->name = $name;
            $disposition->save();

            return redirect()->route('disposition.index')->with('success', 'Disposition ' . $disposition->name . ' Update!');
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Disposition $disposition
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disposition $disposition)
    {
        if(\Auth::user()->can('Delete Disposition'))
        {
            $disposition->delete();

            return redirect()->route('disposition.index')->with('success', 'Disposition ' . $disposition->name . ' Deleted!');
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }
}

