<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperationStation;
use App\Models\Ship;
use App\Models\TallyBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OperationStationController extends Controller
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
        $operation_stations = OperationStation::orderBy('name','asc')->get();
        return view('admin.operation_station.index', compact('operation_stations'));
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
        return view('admin.operation_station.create');

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

            ]);

         

            OperationStation::create([
                    'name'=>$data['name'],
                    
                ]);

           

                


            return redirect()->route('operation.index')->with('messageSuccess', 'Posto de Operação criado com sucesso');

            
            
            
        
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
        $operation_station = OperationStation::find($id);
        return view('admin.operation_station.show',compact('operation_station'));

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
        $operation_station = OperationStation::find($id);
        return view('admin.operation_station.edit',compact('operation_station'));

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
        $operation_station = OperationStation::find($id);

        $operation_station->update($data);
        return redirect()->route('operation.index')->with('messageSuccess', 'Posto de Operação editado com sucesso');
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
        $operation_station = OperationStation::find($id);
       

        $ships = Ship::where('operation_station_id',$operation_station->id)->first();
        $user = User::where('operation_station_id',$operation_station->id)->first();
        $tallybook = TallyBook::where('operation_station_id',$operation_station->id)->first();
       

        

        if($ships != null){
            return redirect()->route('operation.index')->with('messageError', 'Não foi possível apagar este Posto de operação. Para excluir este posto de operação, primeiro apague todos os navios criado por este posto de operação.');
        }

       

        if($tallybook != null){
            return redirect()->route('operation.index')->with('messageError', 'Não foi possível apagar este Posto de operação. Para excluir este posto de operação, primeiro apague todos os tallybooks criado para este posto de operação.');
        }

        if($user != null){
            return redirect()->route('operation.index')->with('messageError', 'Não foi possível apagar este Posto de operação. Para excluir este posto de operação, primeiro apague todos Conferentes alocados neste posto de operação.');
        }

        $operation_station->delete();
       

        return redirect()->route('operation.index')->with('messageSuccess', 'Posto de operação apagado com sucesso');
        

        

    }
}
