<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ShiftShip;
use App\Models\StopRecord;
use Illuminate\Http\Request;

class StopController extends Controller
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

        $shift_ship = ShiftShip::find($data['shift_ship_id']);

        $test=  StopRecord::where('shift_ship_id',$data['shift_ship_id'])->where('ship_id',$data['ship_id'])->where('basement_id',$data['basement_id'])->where('status',0)->first();
            
        if($test == null){

            StopRecord::create([
                'start_date'=> $data['start_date'],
                'reason'=> $data['reason'],
                'status'=> $data['status'],
                'ship_id'=> $data['ship_id'],
                'basement_id'=> $data['basement_id'],
                'shift_ship_id'=> $data['shift_ship_id'],
                'created_by_user_id'=> $data['created_by_user_id'],
                
            ]);
    
            // $shift_ship->update([
            //     'status'=>2
            // ]);
    
    
    
            return back()->with('messageSuccess','Registro de paragem adicionado com sucesso');

        }else{

            return back()->with('messageError','Existe um registro de paragem que não foi para este porão, por favor feche o registro de paragem para poder abrir um outro.');
        }

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
        $stop = StopRecord::find($id);

        $stop->update($data);

        return back()->with('messageSuccess','Registro de paragem alterado com sucesso');
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
