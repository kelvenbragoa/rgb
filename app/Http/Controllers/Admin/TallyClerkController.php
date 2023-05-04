<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperationStation;
use App\Models\TallyBook;
use App\Models\TallyClerk;
use App\Models\TallyClerkShip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class TallyClerkController extends Controller
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
        $tallyclerks = TallyClerk::orderBy('name','asc')->get();
        return view('admin.tallyclerk.index', compact('tallyclerks'));
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
        $operation_station = OperationStation::orderBy('name','asc')->get();
        return view('admin.tallyclerk.create',compact('operation_station'));

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
                'email' => ['required'],
                'mobile' => ['required'],
                
            ]);

            $test=  User::where('email',$data['email'])->first();
            
            if($test == null){

                $tallyclerk = TallyClerk::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'mobile'=>$data['mobile'],
                    'operation_station_id'=>$data['operation_station_id'],
                    'is_deleted'=>0,
                ]);

                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'role_id' => 3,
                    'tally_clerk_id' => $tallyclerk->id,
                    'is_deleted' => 0,
                    'lang' => 'pt',
                    'operation_station_id'=>$data['operation_station_id'],
                    'password' => Hash::make($data['email']),
                ]);

                return redirect()->route('tallyclerk.index')->with('messageSuccess', 'Conferente criado com sucesso');

            }else{
                return redirect()->route('tallyclerk.index')->with('messageError', 'Erro ao registrar. Já existe um email associado. Escolhe um outro email');
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
        $tallyclerk = TallyClerk::find($id);
        return view('admin.tallyclerk.show',compact('tallyclerk'));
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
        $tallyclerk = TallyClerk::find($id);
        $operation_station = OperationStation::orderBy('name','asc')->get();
        return view('admin.tallyclerk.edit',compact('tallyclerk','operation_station'));
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
        $tallyclerk = TallyClerk::find($id);

        $tallyclerk->update($data);
        $user = User::where('tally_clerk_id',$id)->first();

        $user->update($data);
        
        return redirect()->route('tallyclerk.index')->with('messageSuccess', 'Conferente editado com sucesso');
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
        $tallyclerk = TallyClerk::find($id);

       
        $user = User::where('tally_clerk_id',$tallyclerk->id)->first();

      
        $tallyclerkship = TallyClerkShip::where('tally_clerk_id',$tallyclerk->id)->first();

        $tallybook = TallyBook::where('tally_clerk_id',$tallyclerk->id)->first();
        

        if($tallyclerkship != null){

            return redirect()->route('tallyclerk.index')->with('messageError', 'Não foi possível apagar o conferente. Para excluir este conferente, primeiro apague todas referências a este conferente nos navios.');

        }


        if($tallybook != null){

            return redirect()->route('tallyclerk.index')->with('messageError', 'Não foi possível apagar o conferente. Para excluir este conferente, primeiro apague todos os tallybooks criado por este conferente.');
        }
    
        $tallyclerk->delete();
        $user->delete();

        return redirect()->route('tallyclerk.index')->with('messageSuccess', 'Conferente apagado com sucesso');

    }
}
