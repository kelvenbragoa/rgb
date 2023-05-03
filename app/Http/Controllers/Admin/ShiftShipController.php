<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShiftShip;
use App\Models\StopRecord;
use App\Models\TallyBook;
use App\Models\TallyClerkShip;
use Illuminate\Http\Request;

class ShiftShipController extends Controller
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

        $test=  ShiftShip::where('shift_id',$data['shift_id'])->where('ship_id',$data['ship_id'])->where('date',$data['date'])->first();
            
        if($test == null){
            ShiftShip::create($data);

            return back()->with('messageSuccess','Turno criado com sucesso no navio');
        }else{
            return back()->with('messageError','Este turno já está registrado neste navio');
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
        $shiftship = ShiftShip::find($id);




        $shiftship->update($data);


        return back()->with('messageSuccess','Turno Editado com sucesso');
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
        $shiftship = ShiftShip::find($id);

       
        $stoprecords = StopRecord::where('shift_ship_id',$shiftship->id)->first();
        $tallybook = TallyBook::where('shift_ship_id',$shiftship->id)->first();
        $tallyclerkship = TallyClerkShip::where('shift_ship_id',$shiftship->id)->first();

        

       

        if($stoprecords != null){
            return back()->with('messageError','Não foi possível apagar o turno. Para apagar o turno, primeior apague todos o registros de paragens relacionados ao turno.');
        }

        if($tallybook != null){
            return back()->with('messageError','Não foi possível apagar o turno. Para apagar o turno, primeior apague todos o tallybooks relacionados ao turno.');
        }

        if($tallyclerkship != null){
            return back()->with('messageError','Não foi possível apagar o turno. Para apagar o turno, primeior apague todos conferentes alocados ao turno.');
        }

        
        $shiftship->delete();

        return back()->with('messageSuccess','Turno Apagado com sucesso');
    }
}
