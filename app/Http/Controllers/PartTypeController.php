<?php

namespace App\Http\Controllers;

use App\Models\PartType;
use Illuminate\Http\Request;


class PartTypeController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('Manage PartType')) {

            if (\Auth::user()->type == 'owner') {
                $part_type = PartType::get();
            } else {
                $part_type = PartType::where('created_by', \Auth::user()->id)->get();
            }

            return view('part_type.index', compact('part_type'));
        // }

        return redirect()->back()->with('error', 'Permission Denied');
    }
    /**
     * Show the form for creating a new resource.
     *_name
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(\Auth::user()->can('Create LeadSource'))
        // {
            return view('part_type.create');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
    
    public function store(Request $request)
    {
        
        // if(\Auth::user()->can('Create LeadSource'))
        // {
            $this->validate(
                $request, ['part_type_name' => 'required|max:40',]
            );
            $part_type_name  = $request['part_type_name'];
            $parttype       = new PartType();
            $parttype->part_type_name = $part_type_name;
            // $parttype['created_by']   = \Auth::user()->creatorId();
            $parttype->save();

            return redirect()->route('part_type.index')->with('success', 'Part Type ' . $parttype->part_type_name . ' added!');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\LeadSource $partType
     *
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
{
    $partType = PartType::findOrFail($id);

    return view('part_type.edit', compact('partType'));
}
 /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\LeadSource $leadSource
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partType $partType)
    {
        // if(\Auth::user()->can('Edit LeadSource'))
        // {
            $this->validate(
                $request, ['part_type_name' => 'required|max:40',]
            );
            $part_type_name             = $request['part_type_name'];
            $partType->part_type_name = $part_type_name;
            $partType->save();

            return redirect()->route('part_type.index')->with('success', 'Part Type ' . $partType->part_type_name . ' Update!');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
    public function destroy(partType $partType)
    {
        // if(\Auth::user()->can('Delete LeadSource'))
        // {
            $partType->delete();

            return redirect()->route('part_type.index')->with('success', 'Part Type ' . $partType->part_type_name . ' Deleted!');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
}

