<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Ship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
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
        $agents = Agent::orderBy('name','asc')->get();
        return view('admin.agent.index', compact('agents'));
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
        return view('admin.agent.create');

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
                'address' => ['required'],
                
            ]);

            $test=  User::where('email',$data['email'])->first();
            
            if($test == null){

                $agent = Agent::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'mobile'=>$data['mobile'],
                    'address'=>$data['address'],
                    'is_deleted'=>0,
                ]);

                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'role_id' => 5,
                    'agent_id' => $agent->id,
                    'is_deleted' => 0,
                    'lang' => 'pt',
                    'password' => Hash::make($data['email']),
                ]);

                return redirect()->route('agent.index')->with('messageSuccess', 'Agente criado com sucesso');

            }else{
                return redirect()->route('agent.index')->with('messageError', 'Erro ao registrar. Já existe um email associado. Escolhe um outro email');
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
        $agent = Agent::find($id);

        $load = 0;
        $dados_graficobarra1 = '';

        foreach($agent->ships as $item){
            $load = $load + $item->tallybook->sum('load');

            // for ($x = 1; $x <= 12; $x++) {
            //     $tallybook = TallyBook::where('ship_id',$item->id)->whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->sum('load');
            //     // $nr = count( $tallybook);
            //     // $nr = round($nr*100/720,2);
            //     $dados_graficobarra1.="{$tallybook},";
            // }
        }

        // dd($dados_graficobarra1);
        return view('admin.agent.show',compact('agent','load'));
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
        $agent = Agent::find($id);
        return view('admin.agent.edit',compact('agent'));
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
        $agent = Agent::find($id);

        $agent->update($data);
        return redirect()->route('agent.index')->with('messageSuccess', 'Agente editado com sucesso');
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
        $agent = Agent::find($id);

       
        $user = User::where('agent_id',$id)->first();

        $ships = Ship::where('agent_id',$agent->id)->first();
        

        

        if($ships != null){
            return redirect()->route('agent.index')->with('messageError', 'Não foi possível apagar o agente. Para excluir este agente, primeiro apague todos os navios criado para este agente.');
        }

       

        $agent->delete();
        $user->delete();

        return redirect()->route('agent.index')->with('messageSuccess', 'Agente apagado com sucesso');
        

        

    }
}
