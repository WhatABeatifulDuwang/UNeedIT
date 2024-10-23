<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Valideer de binnenkomende gegevens
        $validatedData = $request->validate([
            'device_name' => 'required|string|max:255',
            'device_type' => 'required|string',
            'description' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'place_of_appointment' => 'required|string|max:255',
            'price' => '|numeric|min:0', 
        ]);
    
        // Voeg accountgegevens toe
        $validatedData['account_id'] = auth()->user()->id; // Haal het ID van de ingelogde gebruiker op
    
        // Maak een nieuwe afspraak in de database
        Appointment::create($validatedData);
    
        // Redirect of geef een reactie terug
        return redirect()->back()->with('success', 'Afspraak succesvol gemaakt!');
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
    public function destroy($id)
    {
        //
    }
}
