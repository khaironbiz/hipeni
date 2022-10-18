<?php

namespace App\Http\Controllers;

use App\Mail\MailNotification;
use App\Mail\MailRegistrasiAcara;
use App\Models\Event;
use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ParticipantController extends Controller
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
     * @param  \App\Http\Requests\StoreParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantRequest $request, $slug)
    {
        $event              = Event::where('slug', $slug)->first();
        $data               = $request->validated();
        $data['event_id']   = $event->id;
        $data['harga']      = $event->harga;
        $data['slug']       = md5(uniqid());
        $event_id           = $event->id;
        $email              = $request->email;
        $partcipant_check   = Participant::where(
            [
                'email'     => $email,
                'event_id'  => $event_id,
            ]
        );
        $participant_count  = $partcipant_check->count();
        $participant_detail = $partcipant_check->first();
        if($participant_count <1){
            if(Auth::id()!= ''){
                $data['user_id']= Auth::id();
                $slug           = uniqid().random_int(1000,9999);
                $data['invoice_id']= $slug;
            }else{
                $data['user_id']= 0;
            }
            $participant        = new Participant();
            $add                = $participant->create($data);
            $pesan      = "
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>$request->nama</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>$request->email</td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td>:</td>
                    <td>$request->hp</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td>$request->institusi</td>
                </tr>
                <tr>
                    <td>Acara</td>
                    <td>:</td>
                    <td>$event->judul</td>
                </tr>

            </table>
            ";
            $data_email = [
                'penerima'  => $request->nama,
                'subject'   => "Registrasi Acara",
                'pesan'      => $pesan,
            ];
            Mail::to($email)->send(new MailRegistrasiAcara($data_email));
            if($add){
                return back()->with('success', 'Saved data');
            }else{

            }
        }else{
            return back()->with('error', 'You are registered by email '. $participant_detail->email);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticipantRequest  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
