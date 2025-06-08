<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show($ticket_code)
    {
        $ticket = Ticket::where('ticket_code', $ticket_code)->with('transaction')->firstOrFail();

        return view('tickets.show', compact('ticket'));
    }
}
