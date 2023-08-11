<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusRequest;
use App\Models\Bus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus=Bus::all();
        return view("pages.Bus.ttr_show",compact("bus"));}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.Bus.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusRequest $request)
    {
        try {


            Bus::create([
                "name"=>$request->name,
                "number"=>$request->number,
            ]);
            toastr()->success(('Created'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_bus)
    {
        $bus=Bus::find($id_bus);
        return view("pages.Bus.edit",compact("bus"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusRequest $request, $id_bus)
    {
        try {


            $ttr=Bus::find($id_bus);
            $ttr->update([
                "name"=>$request->name,
                "number"=>$request->number,
            ]);
            toastr()->success(('Updated'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bus)
    {
        try {


            $ttr=Bus::destroy($id_bus);

            toastr()->success(('deleted'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function manage($id_bus)
    {
        $bus=Bus::find($id_bus);
        $trip=$bus->trips;
        return view("pages.Bus.manage",compact("bus","trip"));
    }
}
