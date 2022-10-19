<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventFormRequest;
use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Support\Facades\Redirect;

//controller should only be receiving request and throwing response
//i would prevent putting logic in controller as much as possible
class EventController extends Controller
{
    //use dependency injection
    public function __construct(private EventService $eventService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', [
            'events' => $this->eventService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {
        //  : How could we improve this action?
        // use HTTP Request and add validation
        // for a bigger project i would suggest to use repository pattern for maintainability and scalability
        // i know this is a small app but i'd like to show how it will look like in a bigger project
        $event = $this->eventService->store($request->safe()->all());

        return redirect()->route('events.show', $event)->with('status', 'Event Created!');
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
        return view('events.show', [
            'event' => $this->eventService->show($id),
        ]);
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
        return view('events.edit', [
            'event' =>  $this->eventService->show($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventFormRequest $request, $id)
    {
        $this->eventService->update($request->safe()->all(), $id);

        return redirect()->route('events.show', $id)->with('status', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventService->destroy($id);

        return redirect()->route('events.index')->with('status', 'Event Deleted!');
    }
}
