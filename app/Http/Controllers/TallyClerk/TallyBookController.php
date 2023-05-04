<?php

namespace App\Http\Controllers\TallyClerk;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Models\TallyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallyBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->all();
        $ship = Ship::find($data['ship_id']);

        $request->validate([
            'ship_id' => 'required|integer',
            'ship_id'=>'required|integer',
            'shift_ship_id'=> 'required|integer',
            'basement_id'=> 'required|integer',
            'load'=> 'required',
            'name'=> 'required',
            'bi'=> 'required',
            'truck_plate'=> 'required|string',
            'qty_truck'=>'required|integer',
            'qty_load'=> 'required|integer',
            'type_of_bag_id'=> 'required|integer',
            'tally_clerk_id'=> 'required|integer',
            'date'=>'required',
            'time'=> 'required',
            'obs'=> 'required|string',
            'type_merchandise_id' => 'required'
        ]);

        TallyBook::create([
            'ship_id'=> $data['ship_id'],
            'shift_ship_id'=> $data['shift_ship_id'],
            'basement_id'=> $data['basement_id'],
            'load'=> $data['load'],
            'name'=> $data['name'],
            'bi'=> $data['bi'],
            'truck_plate'=> $data['truck_plate'],
            'trailer_plate'=> $data['trailer_plate'],
            'qty_truck'=> $data['qty_truck'],
            'qty_load'=> $data['qty_load'],
            'type_of_bag_id'=> $data['type_of_bag_id'],
            'tally_clerk_id'=> $data['tally_clerk_id'],
            'tally_clerk_ship_id'=> $data['tally_clerk_ship_id'],
            'date'=> $data['date'],
            'time'=> $data['time'],
            'obs'=> $data['obs'],
            'operation_station_id'=>$ship->operation_station_id,
            
            'type_merchandise_id'=>$data['type_merchandise_id'],
            'created_by_user_id'=>Auth::user()->id

            
        ]);

        return back()->with('messageSuccess','Tally Book adicionado com sucesso');


        
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

        $data = $request->all();

        $request->validate([
            'ship_id' => 'required|integer',
            'ship_id'=>'required|integer',
            'shift_ship_id'=> 'required|integer',
            'basement_id'=> 'required|integer',
            'load'=> 'required',
            'truck_plate'=> 'required|string',
            'trailer_plate'=> 'required|string',
            'qty_truck'=>'required|integer',
            'qty_load'=> 'required|integer',
            'type_of_bag_id'=> 'required|integer',
            'tally_clerk_id'=> 'required|integer',
            'date'=>'required',
            'time'=> 'required',
            'obs'=> 'required|string',
            'type_merchandise_id' => 'required'
        ]);

        $tallybook = TallyBook::find($id);


        $tallybook->update($data);
        return back()->with('messageSuccess','Tally Book editado com sucesso');

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

        $tallybook = TallyBook::find($id);

        

        $tallybook->delete();


        return back()->with('messageSuccess','TallyBook apagado com sucesso');
    }
}
