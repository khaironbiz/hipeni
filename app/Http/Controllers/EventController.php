<?php

namespace App\Http\Controllers;

use App\Models\Education_level;
use App\Models\Education_type;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventController extends Controller
{
    //tampil di landing page
    public function index()
    {
        $events = Event::all();
        $data = [
            'title'     => 'Events',
            'navbar'    => 'events',
            'events'    => $events
        ];
        return view('landing.events.events', $data);
    }
    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $data = [
            'title'     => 'Event',
            'class'     => 'event',
            'sub_class' => 'detail',
            'navbar'    => 'events',
            'event'     => $event
        ];
        return view('landing.events.detail', $data);
    }
    //by kontributor
    public function list()
    {
        $event  = Event::all();
        $data   = [
            'title'     => 'Event',
            'navbar'    => 'events',
            'event'     => $event
        ];
        return view('landing.events.kontributor.list', $data);
    }
    public function create()
    {
        $education_level = Education_level::all();
        $data = [
            'title'     => 'Event',
            'navbar'    => 'events',
            'education' => $education_level
        ];
        return view('landing.events.kontributor.create', $data);
    }
    //tampil di admin
    public function all()
    {
        $events = Event::all();
        $data = [
            'title'     => 'Events',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'list',
            'events'    => $events
        ];
        return view('admin.event.index', $data);
    }
    public function add()
    {
        $education_type     = Education_type::where('sifat',2)->first();
        $education_level    = Education_level::where('education_type_id', $education_type->id)->get();
        $partner            = Partner::all();
        $data = [
            'title'     => 'Events',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'create',
            'partner'   => $partner,
            'event'     => new Event(),
            'education' => $education_level

        ];
        return view('admin.event.create', $data);
    }
    public function store(StoreEventRequest $request)
    {
        $file = $request->file('banner');
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/upload/images/event/';
        // upload file
        $nama_file_baru = uniqid().$file->getClientOriginalName();

        $data = $request->validated();
        $data['banner']     = $nama_file_baru;
        $data['slug']       = md5(uniqid());
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = now();
        //buat data baru
        $add_data = Event::create($data);
        if($add_data){
            $file->move($tujuan_upload,$nama_file_baru);
            return back()->with('success', 'Created successfully!');
        }else{
            return back()->with('error', 'Data gagal ditambahkan');
        }

    }


    public function detail_event($slug)
    {
        $event = Event::firstwhere('slug', $slug);
        $data   = [
            'title'     => 'Detail Event',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'detail',
            'event'     => $event
        ];
        return view('admin.event.detail', $data);
    }
    public function edit_event($slug)
    {
        $education_type     = Education_type::where('sifat',2)->first();
        $education_level    = Education_level::where('education_type_id', $education_type->id)->get();
        $event      = Event::firstwhere('slug', $slug);
        $partner    = Partner::all();
        $data       = [
            'title'     => 'Edit Event',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'detail',
            'event'     => $event,
            'partner'   => $partner,
            'education' => $education_level
        ];
        return view('admin.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $slug)
    {
        $event          = Event::where('slug', $slug)->first();
        $data           = $request->validated();
        //jika update banner maka jalankan script berikut
        $file           = $request->file('banner');
        if($file != ''){
            $tujuan_upload  = 'assets/upload/images/event/';
            $nama_file_baru = uniqid().$file->getClientOriginalName();
            $data['banner'] = $nama_file_baru;
            $file->move($tujuan_upload,$nama_file_baru);
            unlink($tujuan_upload.$event->banner);

        }
        //update data event

        $event_update = $event->update($data);
        if($event_update){

            return back()->with('success', 'Data berhasil diupdate');
        }else{
            return back()->with('error', 'Data gagal diupdate');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
