<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Ship;
use App\Models\TallyBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
        $customers = Customer::orderBy('name','asc')->get();
        return view('admin.customer.index', compact('customers'));
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
        return view('admin.customer.create');

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

                $customer = Customer::create([
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
                    'role_id' => 4,
                    'customer_id' => $customer->id,
                    'is_deleted' => 0,
                    'lang' => 'pt',
                    'password' => Hash::make($data['email']),
                ]);

                return redirect()->route('customer.index')->with('messageSuccess', 'Cliente criado com sucesso');

            }else{
                return redirect()->route('customer.index')->with('messageError', 'Erro ao registrar. Já existe um email associado. Escolhe um outro email');
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
        $customer = Customer::find($id);
        // $ships = Ship::where('customer_id',$customer->id)->get();
        $load = 0;
        $dados_graficobarra1 = '';

        foreach($customer->ships as $item){
            $load = $load + $item->tallybook->sum('load');

            // for ($x = 1; $x <= 12; $x++) {
            //     $tallybook = TallyBook::where('ship_id',$item->id)->whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->sum('load');
            //     // $nr = count( $tallybook);
            //     // $nr = round($nr*100/720,2);
            //     $dados_graficobarra1.="{$tallybook},";
            // }
        }

        // dd($dados_graficobarra1);

       
        
        return view('admin.customer.show',compact('customer','load'));
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
        $customer = Customer::find($id);
        return view('admin.customer.edit',compact('customer'));
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
        $customer = Customer::find($id);

        $customer->update($data);
        return redirect()->route('customer.index')->with('messageSuccess', 'Cliente editado com sucesso');
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
        $customer = Customer::find($id);

      

       
        $user = User::where('customer_id',$id)->first();

        $ships = Ship::where('customer_id',$customer->id)->first();
        

        

        if($ships != null){
            return redirect()->route('customer.index')->with('messageError', 'Não foi possível apagar o cliente. Para excluir este cliente, primeiro apague todos os navios criado para este cliente.');
        }

       

        $customer->delete();
        $user->delete();

        return redirect()->route('customer.index')->with('messageSuccess', 'Cliente apagado com sucesso');
        

        

    }
}
