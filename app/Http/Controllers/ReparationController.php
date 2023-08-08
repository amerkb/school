<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["Reparation"]=FundAccount::whereNull("receipt_id")->whereNull("payment_id")->get();
        return view("pages.Reparation.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.Reparation.add");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fund_accounts = new FundAccount();
        $fund_accounts->date = date('Y-m-d');
        $fund_accounts->Debit = 0;
        $fund_accounts->credit =$request->Debit;
        $fund_accounts->description = $request->description;
        $fund_accounts->save();
        toastr()->success('Success');
        return redirect()->route('reparations_Index');
    }


    public function edit($id)
    {

        $data["FA"] = FundAccount::findorfail($id);
        return view("pages.Reparation.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $fund_accounts =  FundAccount::findOrFail($id);
        $fund_accounts->date = date('Y-m-d');
        $fund_accounts->credit = $request->Debit;
        $fund_accounts->description = $request->description;
        $fund_accounts->save();
        toastr()->success('Success');
        return redirect()->route('reparations_Index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $fund_accounts =  FundAccount::destroy($id);
        toastr()->warning('Deleted');
        return redirect()->route('reparations_Index');
    }
    public function inventory(Request $request)
    {
        if($request->has("start") ||$request->has("end")) {
             $start=Carbon::createFromFormat("Y-m-d",$request->start);
            $end=Carbon::createFromFormat("Y-m-d",$request->end);
            if ($start->gt($end)){
                toastr()->error('start date greater than end date');
                return redirect()->route('inventory');
            }
            $data["credit"] = FundAccount::whereDate('created_at', '>=',$request->start)
                ->whereDate('created_at', '<=', $request->end)->sum("credit");
            $data["Debit"] = FundAccount::whereDate('created_at', '>=',$request->start)
                ->whereDate('created_at', '<=', $request->end)->sum("Debit");
            $data["creditD"] = FundAccount::whereDate('created_at', '>=',$request->start)
                ->whereDate('created_at', '<=', $request->end)->where("Debit",0)->get();
            $data["DebitD"] = FundAccount::whereDate('created_at', '>=',$request->start)
                ->whereDate('created_at', '<=', $request->end)->where("credit",0)->get();
            $data["first"] =$request->start;
            $data["latest"] =$request->end;
            toastr()->success('success');

        }

        if(!$request->has("start")==1 ||!$request->has("end")==1) {
            $data["creditD"] = FundAccount::where("Debit",0)->get();
            $data["DebitD"] = FundAccount::where("credit",0)->get();
            $data["credit"] = FundAccount::sum("credit");
            $data["Debit"] = FundAccount::sum("Debit");
            $data["first"] = FundAccount::first()->created_at;
            $data["latest"] = FundAccount::latest()->first()->created_at;
        }

        return view("inventoty",$data);
    }

}
