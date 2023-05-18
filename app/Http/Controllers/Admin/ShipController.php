<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Basement;
use App\Models\Customer;
use App\Models\OperationStation;
use App\Models\Shift;
use App\Models\ShiftShip;
use App\Models\Ship;
use App\Models\StopRecord;
use App\Models\TypeMerchandise;
use App\Models\TypeOperation;
use App\Models\UsedEquipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        App::setLocale(auth()->user()->lang);
        $ships = Ship::orderBy('name','asc')->get();
        return view('admin.ship.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        App::setLocale(auth()->user()->lang);
        $customer = Customer::orderBy('name','asc')->get();
        $agent = Agent::orderBy('name','asc')->get();
        $type_operation = TypeOperation::orderBy('name','asc')->get();
        $operation_station = OperationStation::orderBy('name','asc')->get();
        $type_merchandises = TypeMerchandise::orderBy('name','asc')->get();
        return view('admin.ship.create',compact('customer','type_operation','type_merchandises','operation_station','agent'));

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
        App::setLocale(auth()->user()->lang);

        
            $data = $request->all();
            $request->validate([
                'name' => ['required'],
                'landing_date' => ['required'],
                'landing_time' => ['required'],
                'customer_id' => ['required'],
                'agent_id' => ['required'],
                'type_operation_id' => ['required'],
                'created_by_user_id' => ['required'],
                'expected_load' => ['required'],
                'is_deleted' => ['required'],
                'status' => ['required'],
                
            ]);

            
            Ship::create($data);

            return redirect()->route('ship.index')->with('messageSuccess', 'Navio criado com sucesso');

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
        App::setLocale(auth()->user()->lang);
        $ship = Ship::find($id);
        $shifts = Shift::orderBy('id','asc')->get();
        $stops_time = StopRecord::where('ship_id', $ship->id)->where('status',1)->get();
        $equipment_time = UsedEquipments::where('ship_id', $ship->id)->where('status',1)->get();

        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        $time_equipment_total = 0;
        foreach($equipment_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_equipment_total = $time_equipment_total + $time;
        }

        $time_equipment_total = round($time_equipment_total/3600, 1);

        return view('admin.ship.show',compact('ship','shifts','time_total','time_equipment_total'));
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
        App::setLocale(auth()->user()->lang);
        $ship = Ship::find($id);
        $customer = Customer::orderBy('name','asc')->get();
        $agent = Agent::orderBy('name','asc')->get();
        $type_operation = TypeOperation::orderBy('name','asc')->get();
        $operation_station = OperationStation::orderBy('name','asc')->get();
        $type_merchandises = TypeMerchandise::orderBy('name','asc')->get();
        return view('admin.ship.edit',compact('ship','customer','type_operation','type_merchandises','operation_station','agent'));
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
        $data = $request->all();
        $ship = Ship::find($id);

        $ship->update($data);
        return redirect()->route('ship.index')->with('messageSuccess', 'Navio editado com sucesso');
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
        $ship = Ship::find($id);

        $ship->delete();

        return redirect()->route('ship.index')->with('messageSuccess', 'Navio apagado com sucesso');
        
    }

    public function operation($ship_id) {

        App::setLocale(auth()->user()->lang);

        $ship = Ship::find($ship_id);
        $shifts = Shift::orderBy('id','asc')->get();
        $stops_time = StopRecord::where('ship_id', $ship->id)->where('status',1)->get();
        
        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        $equipments_time = UsedEquipments::where('ship_id', $ship->id)->where('status',1)->get();
        $time_equipment_total = 0;
        foreach($equipments_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_equipment_total = $time_equipment_total + $time;
        }

        $time_equipment_total = round($time_equipment_total/3600, 1);

        $ship->update([
            'status'=>1
        ]);

        return view('admin.ship.report',compact('ship','time_total','shifts','time_equipment_total'));

    }

    public function report($ship_id){
        App::setLocale(auth()->user()->lang);

        $ship = Ship::find($ship_id);
        $shifts = Shift::orderBy('id','asc')->get();
        $stops_time = StopRecord::where('ship_id', $ship->id)->where('status',1)->get();
        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        $equipments_time = UsedEquipments::where('ship_id', $ship->id)->where('status',1)->get();
        $time_equipment_total = 0;
        foreach($equipments_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_equipment_total = $time_equipment_total + $time;
        }

        $time_equipment_total = round($time_equipment_total/3600, 1);

        // $ship->update([
        //     'status'=>1
        // ]);

        $pdf = Pdf::loadView('admin.ship.print_report', compact('ship','time_total','shifts','time_equipment_total'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);

        
        return $pdf->setPaper('a4')->stream('report.pdf');

        // return view('admin.ship.print_report',compact('ship','time_total','shifts'));
    }

    public function shiftreport($shiftship_id){
        App::setLocale(auth()->user()->lang);
        $shiftship = ShiftShip::find($shiftship_id);
        
        $ship = Ship::find($shiftship->ship_id);
        $shifts = Shift::orderBy('id','asc')->get();
        $stops_time = StopRecord::where('ship_id', $ship->id)->where('status',1)->get();
        $equipment_time = UsedEquipments::where('ship_id', $ship->id)->where('status',1)->get();
        $time_total = 0;
        foreach($stops_time as $item){
            
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        $time_equipment_total = 0;
        foreach($equipment_time as $item){
            
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_equipment_total = $time_equipment_total + $time;
        }

        $time_equipment_total = round($time_equipment_total/3600, 1);

        // $ship->update([
        //     'status'=>1
        // ]);

        $pdf = Pdf::loadView('admin.ship.tallyclerkshift.shift_report', compact('shiftship','ship','time_total','shifts','time_equipment_total'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);

        
        return $pdf->setPaper('a4')->stream('report.pdf');

        // return view('admin.ship.print_report',compact('ship','time_total','shifts'));
    }

    public function basementreport($basement_id){
        App::setLocale(auth()->user()->lang);

        $basement = Basement::find($basement_id);
        $ship = Ship::find($basement->ship_id);
       

        $pdf = Pdf::loadView('admin.ship.basement.basement_report', compact('basement','ship'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);

        
        return $pdf->setPaper('a4')->stream('report.pdf');

        // return view('admin.ship.print_report',compact('ship','time_total','shifts'));
    }
}
