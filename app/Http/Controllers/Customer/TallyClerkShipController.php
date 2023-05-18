<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ShiftShip;
use App\Models\StopRecord;
use App\Models\UsedEquipments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TallyClerkShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        App::setLocale(auth()->user()->lang);
        $shiftship = ShiftShip::find($id);
        $tallyclerks = User::where('role_id',3)->where('operation_station_id',$shiftship->ship->operation_station_id)->orderBy('name','asc')->get();
        $used_equipments = UsedEquipments::where('shift_ship_id',$shiftship->id)->get();
        $stops = StopRecord::where('shift_ship_id',$shiftship->id)->get();
        $stops_time = StopRecord::where('shift_ship_id',$shiftship->id)->where('status',1)->get();
        $equipments_time = UsedEquipments::where('shift_ship_id',$shiftship->id)->where('status',1)->get();
        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        $time_equipment_total = 0;
        foreach($equipments_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_equipment_total = $time_equipment_total + $time;
        }

        $time_equipment_total = round($time_equipment_total/3600, 1);

        
        return view('customer.ship.tallyclerkshift.index', compact('shiftship', 'tallyclerks','stops','stops_time','time_total','used_equipments','time_equipment_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
