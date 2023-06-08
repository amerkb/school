<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Traits\GeneralTrait;
use Carbon\Carbon;

use Illuminate\Http\Request;

class EventController extends Controller
{
    use GeneralTrait;

    public function get_event ()
{
$date_today= Carbon::today()->format('Y-m-d');
    $events=Event::
            whereDate('start', '<=', $date_today)
           ->whereDate('end_time', '>=', $date_today)
           ->get();
    return  $this->returnData("events",$events);

}
}
