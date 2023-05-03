<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShiftShip;
use App\Models\StopRecord;
use App\Models\TallyBook;
use App\Models\TallyClerk;
use App\Models\TallyClerkShip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TallyClerkShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShiftShip $shiftship)
    {
        //
        // dd($shiftship);
        App::setLocale(auth()->user()->lang);
        // $ships = ShiftShip::orderBy('name','asc')->get();
        $tallyclerks = User::where('role_id',3)->where('operation_station_id',$shiftship->ship->operation_station_id)->orderBy('name','asc')->get();

        $stops_time = StopRecord::where('shift_ship_id',$shiftship->id)->where('status',1)->get();

        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        

        return view('admin.ship.tallyclerkshift.index', compact('shiftship', 'tallyclerks','time_total'));
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
    public function store(Request $request, ShiftShip $shiftship)
    {
        //
        $data = $request->all();

        $tally_clerk = $data['tally_clerk_id'];
        $tally_name = $data['tally_clerk_name'];

        

        if($request->has('tally_clerk_id')){

           

            foreach($data['tally_clerk_id'] as $key=>$item){ 

                
                // foreach($data['tally_clerk_name'] as $item2){
                    // dd($data['tally_clerk_name'][$key]);
                
                $test=  TallyClerkShip::where('user_id',$item)->where('shift_ship_id',$shiftship->id)->first();
                if($test == null){
                    $user = User::find($item);

                    TallyClerkShip::create([
                        'tally_clerk_id'=>$user->tally_clerk_id,
                        'name'=>$data['tally_clerk_name'][$key],
                        'user_id'=>$user->id,
                        'ship_id'=>$shiftship->ship_id,
                        'shift_ship_id'=>$shiftship->id,
                        'date'=>$shiftship->date,
                        'is_deleted'=>0,
                       
                    ]);
                    
                    
                }

            // }
        }

            return back()->with('messageSuccess','Conferentes adicionado com sucesso ao turno');

        }else{
            return back()->with('messageError','Nenhum conferente foi adicionado.');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TallyclerkShip $tallyclerkship)
    {
        //
       
        $tallybook= TallyBook::where('tally_clerk_ship_id',$tallyclerkship->id)->first();

        $stop= StopRecord::where('tally_clerk_ship_id',$tallyclerkship->id)->first();

        if($tallybook != null){
            return back()->with('messageError','Não foi possível apagar o conferente do turno. Primeiro apague todos tallybooks relacionados a este conferente.');
        }

        if($stop != null){
            return back()->with('messageError','Não foi possível apagar o conferente do turno. Primeiro apague todos registros de paragens relacionados a este conferente.');
        }

        $tallyclerkship->delete();

        return back()->with('messageSuccess','Conferentes apagado com sucesso ao turno');

    }
}
