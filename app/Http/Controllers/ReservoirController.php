<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = Reservoir::orderBy('area', 'desc')->get();
        return view('reservoir.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'reservoir_title' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s-]*$/', 'min:3', 'max:64'],
                'reservoir_area' => ['required', 'numeric', 'min:10', 'max:99999999'],
                'reservoir_about' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s\d-]*$/', 'min:3', 'max:500'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'reservoir_title' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s-]*$/', 'min:3', 'max:64'],
                'reservoir_area' => ['required', 'numeric', 'min:10', 'max:99999999'],
                'reservoir_about' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s\d-]*$/', 'min:3', 'max:500'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirMembers->count()){      
            return redirect()->route('reservoir.index')->with('info_message', 'Could not delete this reservoir, because some members are registered here!');
        }
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Deleted successfully!');
    }
}
