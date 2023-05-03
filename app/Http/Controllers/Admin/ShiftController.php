<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\ShiftShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ShiftController extends Controller
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
        $shifts = Shift::orderBy('name','asc')->get();
        return view('admin.shift.index', compact('shifts'));
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
        return view('admin.shift.create');

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
                'start_time' => ['required'],
                'end_time' => ['required'],
                
            ]);

         

            Shift::create([
                    'name'=>$data['name'],
                    'start_time'=>$data['start_time'],
                    'end_time'=>$data['end_time'],
                    'is_deleted'=>0,
                ]);

           

                


            return redirect()->route('shift.index')->with('messageSuccess', 'Turno criado com sucesso');

            
            
            
        
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
        $shift = Shift::find($id);
        return view('admin.shift.show',compact('shift'));
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
        $shift = Shift::find($id);
        return view('admin.shift.edit',compact('shift'));
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
        $shift = Shift::find($id);

        $shift->update($data);
        return redirect()->route('shift.index')->with('messageSuccess', 'Turno editado com sucesso');
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
        $shift = Shift::find($id);
        $shiftship = ShiftShip::where('shift_id',$shift->id)->first();

        

        

        if($shiftship != null){
            return redirect()->route('shift.index')->with('messageError', 'Não foi possível apagar o turno. Para excluir este turno, primeiro apague todos turnos alocados em navios.');
        }

     
        $shift->delete();
       


        return redirect()->route('shift.index')->with('messageSuccess', 'Turno apagado com sucesso');
        

        

    }
}
