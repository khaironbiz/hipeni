<?php

namespace App\Http\Controllers;

use App\Mail\MailNotification;
use App\Mail\MailRegistrasiAcara;
use App\Models\Event;
use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Models\Transaction;
use App\Models\User;
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
        $slug               = uniqid().random_int(1000,9999);
        $data['slug']       = md5($slug);
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
                $user_id    = Auth::id();
            }else{
                $user_id    = 0;
            }
            $data['user_id']    = $user_id;

            $data['invoice_id'] = $slug;
            $participant        = new Participant();
            $add                = $participant->create($data);
            $transactions       = new Transaction();
            $data_trx           = [
                'user_id'       => $user_id,
                'nama'          => $request->nama,
                'email'         => $request->email,
                'hp'            => $request->hp,
                'invoice_id'    => $slug,
                'tagihan'       => $event->harga,
            ];
            $create_trx         = $transactions->create($data_trx);
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
//            Mail::to($email)->send(new MailRegistrasiAcara($data_email));
            if($add){
                $tansaksi = Transaction::where('invoice_id', $slug)->first();
                return redirect()->route('participant.transaksi', ['slug'=>$slug])->with('success', 'Saved data');
            }else{

            }
        }else{
            return redirect()->route('participant.transaksi', ['slug'=>$participant_detail->invoice_id]);
        }
    }
    public function transaksi($slug){
        $participan     = Participant::where('invoice_id', $slug)->first();
        $transaction    = Transaction::where('invoice_id', $slug)->first();
        $event          = Event::find($participan->event_id);


        // Set kode merchant anda
        $merchantCode = env('MERCHANT_CODE');
        // Set merchant key anda
        $apiKey = env('KEY_DUITKU');
        // catatan: environtment untuk sandbox dan passport berbeda

        $datetime = date('Y-m-d H:i:s');
        $paymentAmount = $transaction->tagihan;
        $signature = hash('sha256', $merchantCode . $paymentAmount . $datetime . $apiKey);

        $params = array(
            'merchantcode' => $merchantCode,
            'amount' => $paymentAmount,
            'datetime' => $datetime,
            'signature' => $signature
        );

        $params_string = json_encode($params);
//        https://passport.duitku.com/webapi/api/merchant/v2/inquiry
        $url = 'https://passport.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode == 200) {
            $results = json_decode($request, true);
//            dd($results, false);
        } else {
            $request = json_decode($request);
            $error_message = "Server Error " . $httpCode . " " . $request->Message;
            echo $error_message;
        }


//        $get_name = User::get_job($id);
//        dd($transaction);
        $data = [
            'title'         => 'Checkout',
            'navbar'        => 'payment',
            'class'         => 'Profesi',
            'sub_class'     => 'Show',
            'transaction'   => $transaction,
            'event'         => $event,
            'payment'       => $results['paymentFee']

        ];
        return view('landing.events.payment', $data);
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
