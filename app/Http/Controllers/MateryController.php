<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Event;
use App\Models\Kurikulum;
use App\Models\Matery;
use App\Http\Requests\StoreMateryRequest;
use App\Http\Requests\UpdateMateryRequest;
use App\Models\Organisasi_profesi;

class MateryController extends Controller
{

    public function index()
    {
        //
    }
    public function kurikulum($slug)
    {
        $event      = Event::firstwhere('slug', $slug);
        $kurikulum  = Kurikulum::where('event_id', $event->id)->get();
        $data   = [
            'title'     => 'Detail Event',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'detail',
            'kurikulum' => $kurikulum
        ];
        return view('admin.kurikulum.show', $data);
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
     * @param  \App\Http\Requests\StoreMateryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matery  $matery
     * @return \Illuminate\Http\Response
     */
    public function show(Matery $matery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matery  $matery
     * @return \Illuminate\Http\Response
     */
    public function edit(Matery $matery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMateryRequest  $request
     * @param  \App\Models\Matery  $matery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateryRequest $request, Matery $matery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matery  $matery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matery $matery)
    {
        //
    }
}
