<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TicketFormRequest;
use App\Ticket;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
       $slug = uniqid();
       $ticket = new Ticket(array(
        'title' => $request->get('title'),
        'priority' => $request->get('priority'),
        'date_assignment' => $request->get('date_assignment'),
        'user_assigned' => $request->get('user_assigned'),
        'content' => $request->get('content'),
        'slug' => $slug
    ));

       $ticket->save();

       return redirect('/contact')->with('status','Su ticket ha sido creado. Su id unica es: '.$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->get();
        return view('tickets.show', compact('ticket','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, TicketFormRequest $request)
    {
       $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->priority = $request->get('priority');
        $ticket->date_assignment = $request->get('date_assignment'); 
        $ticket->user_assigned = $request->get('user_assigned');
        $ticket->content = $request->get('content');
        if($request->get('status') != null) {
            $ticket->status = 0;
        } else {
            $ticket->status = 1;
        }
       $ticket->save();
       return redirect(action('TicketsController@edit', $ticket->slug))->with('status', '¡El ticket '.$slug.' ha sido actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
    $ticket = Ticket::whereSlug($slug)->firstOrFail();
    $ticket->delete();
    return redirect('/tickets')->with('status', 'el ticket '.$slug.'ha sido borrado');
    }
}
