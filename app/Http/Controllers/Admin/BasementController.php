<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basement;
use App\Models\TallyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BasementController extends Controller
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

        $test=  Basement::where('ship_id',$data['ship_id'])->where('name',$data['name'])->first();
            
        if($test == null){
            Basement::create($data);

            return back()->with('messageSuccess','Porão criado com sucesso no navio');
        }else{
            return back()->with('messageError','Este porão já está registrado neste navio');
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
        $basement = Basement::find($id);


        return view('admin.ship.basement.show',compact('basement'));
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
        $basement = Basement::find($id);


        


        $basement->update($data);


        return back()->with('messageSuccess','Porão Editado com sucesso');
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

        $basement = Basement::find($id);
       
       
        $tallybook = TallyBook::where('basement_id',$basement->id)->first();
        

        

     

        if($tallybook != null){
            return back()->with('messageError','Este porão não pode ser apagado. Para poder apagar, exclui todos tallybooks relacionados a este porão.');
        }

       

        $basement->delete();
        
        return back()->with('messageSuccess','Porão apagado com sucesso do navio');
    }
}
