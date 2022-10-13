<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Event;
use App\Models\Kurikulum;
use App\Models\Matery;
use App\Http\Requests\StoreMateryRequest;
use App\Http\Requests\UpdateMateryRequest;
use App\Models\Organisasi_profesi;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        //
    }

    public function store(StoreMateryRequest $request, $slug)
    {
        $event      = Event::where('slug', $slug)->first();
        $data   = [];
        foreach($request->input('kurikulum_id') as $key=>$value){
            array_push($data, [
                'kurikulum_id'  => $value,
                'event_id'      => $event->id,
                'created_by'    => Auth::id(),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }
        $materi = new Matery();
        $add    = $materi->insert($data);
        if($add){
            return back()->with('success', 'Data berhasil disimpan');
        }
    }
    public function show(Matery $matery)
    {
        //
    }

    public function edit(Matery $matery)
    {
        //
    }

    public function update(UpdateMateryRequest $request, Matery $matery)
    {
        //
    }


    public function destroy(Matery $matery)
    {
        //
    }
}
