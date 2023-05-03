<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\Manager;
use App\Models\OperationStation;
use App\Models\ShiftShip;
use App\Models\Ship;
use App\Models\TallyBook;
use App\Models\TallyClerk;
use App\Models\TallyClerkShip;
use App\Models\TypeMerchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        App::setLocale(auth()->user()->lang);


        if(Auth::user()->role_id == 1){

            $manager = Manager::all();
            $customer = Customer::all();
            $agent = Agent::all();
            $tallyclerk = TallyClerk::all();
            $ship_operation = Ship::all();
            $type_merchandise = TypeMerchandise::all();
            $operation_station = OperationStation::all();

            $shiftship = ShiftShip::where('date',date('Y-m-d'))->orderBy('status','desc')->get();

            $dados_graficobarra1 = '';
            for ($x = 1; $x <= 12; $x++) {
                $tallybook = TallyBook::whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->sum('load');
                // $nr = count( $tallybook);
                // $nr = round($nr*100/720,2);
                $dados_graficobarra1.="{$tallybook},";
            }

            return view('admin.index',compact('manager','customer','tallyclerk','ship_operation','shiftship','agent','type_merchandise','operation_station','dados_graficobarra1'));

        }


        if(Auth::user()->role_id == 2){
            
            $customer = Customer::all();
            $agent = Agent::all();
            $tallyclerk = TallyClerk::all();
            $ship_operation = Ship::all();
            $type_merchandise = TypeMerchandise::all();
            $operation_station = OperationStation::all();

            $shiftship = ShiftShip::where('date',date('Y-m-d'))->orderBy('status','desc')->get();

            $dados_graficobarra1 = '';
            for ($x = 1; $x <= 12; $x++) {
                $tallybook = TallyBook::whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->sum('load');
                // $nr = count( $tallybook);
                // $nr = round($nr*100/720,2);
                $dados_graficobarra1.="{$tallybook},";
            }

            return view('manager.index',compact('customer','tallyclerk','ship_operation','shiftship','agent','type_merchandise','operation_station','dados_graficobarra1'));

        }


        if(Auth::user()->role_id == 3){
            $tally_clerk_ships = TallyClerkShip::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
            $tallybook = TallyBook::where('tally_clerk_id',Auth::user()->tally_clerk_id)->get();
            return view('tallyclerk.index',compact('tally_clerk_ships','tallybook'));

        }


        if(Auth::user()->role_id == 4){

            $ship = Ship::where('customer_id',Auth::user()->customer_id)->get();
            $shiftship = ShiftShip::where('date',date('Y-m-d'))->orderBy('status','desc')->get();

            $tallybook = 0;

            foreach($ship as $item){
                $tallybook = $tallybook + $item->tallybook->sum('load');
            }




            return view('customer.index',compact('ship','shiftship','tallybook'));

        }


        if(Auth::user()->role_id == 5){

            $ship = Ship::where('agent_id',Auth::user()->customer_id)->get();
            $shiftship = ShiftShip::where('date',date('Y-m-d'))->orderBy('status','desc')->get();

            $tallybook = 0;

            foreach($ship as $item){
                $tallybook = $tallybook + $item->tallybook->sum('load');
            }




            return view('agent.index',compact('ship','shiftship','tallybook'));

        }
       
    }
}
