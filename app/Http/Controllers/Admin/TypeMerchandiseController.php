<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Models\TallyBook;
use App\Models\TypeMerchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TypeMerchandiseController extends Controller
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
        $type_merchandises = TypeMerchandise::orderBy('name','asc')->get();
        return view('admin.type_merchandise.index', compact('type_merchandises'));
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
        return view('admin.type_merchandise.create');

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

         

            TypeMerchandise::create([
                    'name'=>$data['name'],
                    
                ]);

           

                


            return redirect()->route('merchandise.index')->with('messageSuccess', 'Tipo de Mercadoria criado com sucesso');

            
            
            
        
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
        $type_merchandises = TypeMerchandise::find($id);
        return view('admin.type_merchandise.show',compact('type_merchandises'));

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
        $type_merchandise = TypeMerchandise::find($id);
        return view('admin.type_merchandise.edit',compact('type_merchandise'));
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
        $shift = TypeMerchandise::find($id);

        $shift->update($data);
        return redirect()->route('merchandise.index')->with('messageSuccess', 'Tipo de Mercadoria editado com sucesso');
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
        $type_merchandise = TypeMerchandise::find($id);

       
        $ship = Ship::where('type_merchandise_id',$type_merchandise->id)->first();
        $tallybook = TallyBook::where('type_merchandise_id',$type_merchandise->id)->first();

        

        

        if($ship != null){
            return redirect()->route('merchandise.index')->with('messageError', 'Não foi possível apagar o tipo de mercadoria. Para excluir este tipo de mercadoria, primeiro apague todos Navios alocados a este tipo de mercadoria.');
        }

        if($tallybook != null){
            return redirect()->route('merchandise.index')->with('messageError', 'Não foi possível apagar o tipo de mercadoria. Para excluir este tipo de mercadoria, primeiro apague todos tallybooks alocados a este tipo de mercadoria.');
        }

     
        $type_merchandise->delete();
       


        return redirect()->route('merchandise.index')->with('messageSuccess', 'Turno apagado com sucesso');
        

        

    }
}
