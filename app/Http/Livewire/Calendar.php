<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{

    public $events = '';

    public function getevent()
    {
        $events = Event::select('id','title','start')->get();

        return  json_encode($events);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['description'] = $event['description'];
        $input['start'] =substr( $event['start'],0,19,) ;
        $input['end_time'] = $event['end'];
        Event::create($input);
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eventDrop($event, $oldEvent)
    {
        $eventdata = Event::find($event['id']);
        $eventdata->start = substr( $event['start'],0,19,) ;
        $eventdata->save();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $events = Event::select('id','title','start')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
