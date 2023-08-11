<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Bus;
use App\Models\Day;
use App\Models\TimeSlote;
use App\Models\Trip;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_bus)
    {
        $data["id_bus"]=$id_bus;
        $data["ts"]=TimeSlote::all();
        $data["day"]=Day::all();
        $data["bus"]=Bus::find($id_bus);
        $data["driver"]=User::where("type_id",2)->get();
        return view("pages.Bus.trip.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripRequest $request,$id_bus)
    {
        try {
            $exists=Trip::where([
                ["day_id",$request->day_id],["year",$request->year],["semester",$request->semester],
                ["bus_id",$id_bus],["ts_id",$request->ts_id]])->get();
            if (!$exists->isEmpty()){
                toastr()->error(('there is a trip at this time'));
                return redirect()->route("trip_create",$id_bus);
            }

//            $start=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_from")[0]);
//            $end=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_to")[0]);
//            $ovarlap = Trip::where([["day_id",$request->day_id],["ttr_id",$id_ttr]])
//                ->select("ts.time_from","ts.time_to")->join('time_slots as ts', 'lectures.ts_id', '=', 'ts.id')
//                ->get();
//            foreach ($ovarlap as $o2){
//                $start_ts = Carbon::createFromFormat('h:i A', $o2->time_from);
//                $end_ts = Carbon::createFromFormat('h:i A', $o2->time_to);
//
//                if ($end->gt($start_ts)==1 && $end->lte($end_ts)==1) {
//                    toastr()->error(('there is a time overlap '));
//                    return redirect()->route("l.create",$id_ttr);
//                }
//                if ($start->gte($start_ts)==1 && $start->lt($end_ts)==1) {
//                    toastr()->error(('there is a time overlap'));
//                    return redirect()->route("l.create",$id_ttr);
//                }
//            }


            Trip::create([
                "name"=>$request->name,
                "user_id"=>$request->driver_id,
                "type"=>$request->type,
                "places"=>$request->places,
                "semester"=>$request->semester_id,
                "year"=>$request->Year,
                "ts_id"=>$request->ts_id,
                "day_id"=>$request->day_id,
                "bus_id"=>$id_bus,
            ]);
            toastr()->success(('Created'));
            return redirect()->route("Bus_manage",$id_bus);

        } catch (\Exception $e) {
            return redirect()->route("Bus_manage",$id_bus)->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
