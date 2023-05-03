<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ShiftShip;
use App\Models\Ship;
use App\Models\StopRecord;
use App\Models\TallyBook;
use App\Models\TallyClerk;
use App\Models\TallyClerkShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TallyClerkShiftShipController extends Controller
{
    //

    public function index( $tallclerkshiftship_id, $ship_id){

        App::setLocale(auth()->user()->lang);

        $ship = Ship::find($ship_id);
        $tallyclerkshiftship = TallyClerkShip::find($tallclerkshiftship_id);
        $tallybook = TallyBook::where('tally_clerk_ship_id', $tallclerkshiftship_id)->get();
        $stops = StopRecord::where('tally_clerk_ship_id', $tallclerkshiftship_id)->where('status',1)->get();
        $shiftship = ShiftShip::find($tallyclerkshiftship->shiftship->id);
        $tallyclerk= TallyClerk::find($tallyclerkshiftship->tally_clerk_id);

       
        $stops_time = StopRecord::where('shift_ship_id',$shiftship->id)->where('status',1)->get();

        $time_total = 0;
        foreach($stops_time as $item){
            $created_at = strtotime($item->start_date);
            $closed_at = strtotime($item->end_date);
            $time = $closed_at - $created_at;
            $time_total = $time_total + $time;
        }

        $time_total = round($time_total/3600, 1);

        

        return view('manager.ship.tallyclerkshift.show',compact('ship','tallyclerkshiftship','tallybook','stops','shiftship','tallyclerk','time_total'));

    }
}
