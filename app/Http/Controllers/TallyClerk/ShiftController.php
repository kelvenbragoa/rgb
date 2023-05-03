<?php

namespace App\Http\Controllers\TallyClerk;

use App\Http\Controllers\Controller;
use App\Models\StopRecord;
use App\Models\TallyBook;
use App\Models\TallyClerkShip;
use App\Models\TypeOfBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
         $tally_clerk_ships = TallyClerkShip::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();

        // $tally_clerk_ships = DB::table('tally_clerk_ships')
        //     ->join('shift_ships', 'tally_clerk_ships.shift_ship_id', '=', 'shift_ships.id')
        //     ->select('tally_clerk_ships.*')
        //     ->where('tally_clerk_ships.user_id','=',Auth::user()->id)
        //     ->get();

           
        return view('tallyclerk.shift.index', compact('tally_clerk_ships'));
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
        $tally_clerk_ships = TallyClerkShip::find($id);
        $type_bag = TypeOfBag::orderBy('id','asc')->get();
        $tally_book = TallyBook::where('shift_ship_id',$tally_clerk_ships->shiftship->id)->where('created_by_user_id',Auth::user()->id)->get();
        $stops = StopRecord::where('shift_ship_id',$tally_clerk_ships->shiftship->id)->get();
        $stops_time = StopRecord::where('shift_ship_id',$tally_clerk_ships->shiftship->id)->where('status',1)->get();

        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);
        
        // dd($tally_clerk_ships);
        return view('tallyclerk.shift.show',compact('tally_clerk_ships','type_bag','tally_book','stops','time_total'));
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
    public function destroy($id)
    {
        //
    }
}
