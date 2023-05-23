<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\TallyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DestinationController extends Controller
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
        App::setLocale(auth()->user()->lang);
        $data = $request->all();

        $test=  Destination::where('ship_id',$data['ship_id'])->where('name',$data['name'])->first();
            
        if($test == null){
            Destination::create($data);

            return back()->with('messageSuccess','Destino criado com sucesso no navio');
        }else{
            return back()->with('messageError','Este Destino já está registrado neste navio');
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
        App::setLocale(auth()->user()->lang);
        $destination = Destination::find($id);


        return view('manager.ship.destination.show',compact('destination'));
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
        $destination = Destination::find($id);


        


        $destination->update($data);


        return back()->with('messageSuccess','Destino Editado com sucesso');
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

        $destination = Destination::find($id);

       
       
        $tallybook = TallyBook::where('destination_id',$destination->id)->first();
       

        

       

     

        if($tallybook != null){
            return back()->with('messageError','Não foi possível apagar o Destino. Para apagar o Destino, primeior apague todos o tallybooks relacionados ao Destino.');
        }


        
        $destination->delete();

        return back()->with('messageSuccess','Destino Apagado com sucesso');
    }
}
