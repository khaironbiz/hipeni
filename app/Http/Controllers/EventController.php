<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Education_level;
use App\Models\Education_type;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Kurikulum;
use App\Models\Log;
use App\Models\Matery;
use App\Models\Organisasi_profesi;
use App\Models\Participant;
use App\Models\Partner;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventController extends Controller
{
    //tampil di landing page
    public function index()
    {
        $this->log();
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
        $this->log();
        $event      = Event::where('slug', $slug)->first();
        $myregist   = Participant::where('user_id', Auth::id())->where('event_id', $event->id)->get();
        $data       = [
            'title'     => 'Event',
            'class'     => 'event',
            'sub_class' => 'detail',
            'navbar'    => 'events',
            'event'     => $event,
            'skp'       => Accreditation::where('event_id', $event->id)->get(),
            'myregist'  => $myregist,
            'pendaftar' => $event->participant->count(),
            'user'      => Auth::user()
        ];
        return view('landing.events.detail', $data);
    }
    //by kontributor
    public function list()
    {
        $this->log();
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
        $this->log();
        $training = Training::all();
        $data = [
            'title'     => 'Event',
            'navbar'    => 'events',
            'training'  => $training
        ];
        return view('landing.events.kontributor.create', $data);
    }
    //tampil di admin
    public function all()
    {
        $this->log();
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
        $this->log();
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
            'training'  => Training::OrderBy('nama_training', 'ASC')->get()

        ];
        return view('admin.event.create', $data);
    }
    public function store(StoreEventRequest $request)
    {
        $this->log();
        $file               = $request->file('banner');
        $tujuan_upload      = 'assets/upload/images/event/';// isi dengan nama folder tempat kemana file diupload
        $nama_file_baru     = uniqid().$file->getClientOriginalName();// upload file
        $data               = $request->validated();
        $training           = Training::find($request->training_id);
        $data['banner']     = $nama_file_baru;
        $data['education_level']= $training->education_level;
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
        $this->log();
        $event      = Event::where('slug', $slug)->first();
        $kurikulum  = Kurikulum::with('training')->where('training_id', $event->training_id)->get();
        $materi     = Matery::with('kurikulum')->where('event_id', $event->id)->get();
        $participants   = Participant::where('event_id', $event->id)->orderBy('id', 'DESC')->paginate(10);
        $data       = [
            'title'         => 'Detail Event',
            'navbar'        => 'events',
            'class'         => 'event',
            'sub_class'     => 'detail',
            'event'         => $event,
            'skp'           => Accreditation::where('event_id', $event->id)->orderby('organisasi_profesi_id')->get(),
            'op'            => Organisasi_profesi::all(),
            'kurikulum'     => $kurikulum,
            'materi'        => $materi,
            'participants'  => $participants
        ];
        return view('admin.event.detail', $data);
    }
    public function edit_event($slug)
    {
        $this->log();
        $education_type     = Education_type::where('sifat',2)->first();
        $education_level    = Education_level::where('education_type_id', $education_type->id)->get();
        $event              = Event::firstwhere('slug', $slug);
        $partner            = Partner::all();
        $data       = [
            'title'     => 'Edit Event',
            'navbar'    => 'events',
            'class'     => 'event',
            'sub_class' => 'detail',
            'event'     => $event,
            'partner'   => $partner,
            'education' => $education_level,
            'training'  => Training::OrderBy('nama_training', 'ASC')->get()
        ];
        return view('admin.event.edit', $data);
    }
    public function update(UpdateEventRequest $request, $slug)
    {
        $this->log();
        $event          = Event::where('slug', $slug)->first();
        $data           = $request->validated();
        //jika update banner maka jalankan script berikut
        $file           = $request->file('banner');
        if($file != ''){
            $tujuan_upload  = 'assets/upload/images/event/';
            if (file_exists($tujuan_upload.$event->banner)){
                unlink($tujuan_upload.$event->banner);
            }
            $nama_file_baru = uniqid().".".$file->getClientOriginalExtension();
            $data['banner'] = $nama_file_baru;
            $file->move($tujuan_upload,$nama_file_baru);
        }
        //update data event

        $event_update = $event->update($data);
        if($event_update){
            return back()->with('success', 'Data berhasil diupdate');
        }else{
            return back()->with('error', 'Data gagal diupdate');
        }
    }
    public function destroy(Event $event)
    {
        //
    }
    private function log(){
        $log = new Log();
        if(Auth::id() !='') {
            $user_id = Auth::id();
        }else{
            $user_id = 0;
        }
        $pengunjung = [
            'ip'        => \Request::getClientIp(true),
            'user_id'   => $user_id,
            'url'       => url()->full(),
            'time'      => time(),
        ];
        $log->create($pengunjung);
    }
}
