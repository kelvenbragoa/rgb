<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Ship;
use App\Models\StopRecord;
use App\Models\TallyBook;
use App\Models\TallyClerkShip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
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
        $managers = Manager::orderBy('name','asc')->get();
        return view('admin.manager.index', compact('managers'));
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
        return view('admin.manager.create');

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

                $manager = Manager::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'mobile'=>$data['mobile'],
                    'is_deleted'=>0,
                ]);

                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'role_id' => 2,
                    'manager_id' => $manager->id,
                    'is_deleted' => 0,
                    'lang' => 'pt',
                    'password' => Hash::make($data['email']),
                ]);

                return redirect()->route('manager.index')->with('messageSuccess', 'Gestor criado com sucesso');

            }else{
                return redirect()->route('manager.index')->with('messageError', 'Erro ao registrar. Já existe um email associado. Escolhe um outro email');
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
        $manager = Manager::find($id);
        return view('admin.manager.show',compact('manager'));
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
        $manager = Manager::find($id);
        return view('admin.manager.edit',compact('manager'));
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
        $manager = Manager::find($id);

        $manager->update($data);
        return redirect()->route('manager.index')->with('messageSuccess', 'Gestor editado com sucesso');
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
        $manager = Manager::find($id);
        $user = User::where('manager_id',$id)->first();

        $ships = Ship::where('created_by_user_id',$user->id)->first();
        $stoprecords = StopRecord::where('created_by_user_id',$user->id)->first();
        $tallybook = TallyBook::where('created_by_user_id',$user->id)->first();
        $tallyclerkship = TallyClerkShip::where('user_id',$user->id)->first();

        

        if($ships != null){
            return redirect()->route('manager.index')->with('messageError', 'Não foi possível apagar o gestor. Para excluir este gestor, primeiro apague todos os navios criado por este gestor.');
        }

        if($stoprecords != null){
            return redirect()->route('manager.index')->with('messageError', 'Não foi possível apagar o gestor. Para excluir este gestor, primeiro apague todos os registros de paragens criado por este gestor.');
        }

        if($tallybook != null){
            return redirect()->route('manager.index')->with('messageError', 'Não foi possível apagar o gestor. Para excluir este gestor, primeiro apague todos os tallybooks criado por este gestor.');
        }

        if($tallyclerkship != null){
            return redirect()->route('manager.index')->with('messageError', 'Não foi possível apagar o gestor. Para excluir este gestor, primeiro apague todos Conferentes alocados no turno por este gestor.');
        }

        $manager->delete();
        $user->delete();

        return redirect()->route('manager.index')->with('messageSuccess', 'Gestor apagado com sucesso');










        // // $manager->delete();
        // if($manager->is_deleted == 0){
        //     $manager->update([
        //         'is_deleted'=>1
        //     ]);

        //     return redirect()->route('manager.index')->with('messageSuccess', 'Gestor desativado com sucesso');

        // }else{
        //     $manager->update([
        //         'is_deleted'=>0
        //     ]);

        //     return redirect()->route('manager.index')->with('messageSuccess', 'Gestor reativado com sucesso');
        // }
        

        

    }
}
