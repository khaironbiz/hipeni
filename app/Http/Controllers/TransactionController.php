<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallBackRequest;
use App\Http\Requests\CreateVaRequest;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
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
    public function create_va(CreateVaRequest $request, $slug){
        //cari invoice
        $transaksi          = Transaction::where('slug', $slug)->first();
        $merchantCode       = env('MERCHANT_CODE'); // dari duitku
        $apiKey             = env('KEY_DUITKU'); // dari duitku
        $paymentAmount      = $transaksi->tagihan;
        $paymentMethod      = $request->payment_method; // VC = Credit Card
        $merchantOrderId    = $transaksi->invoice_id; // dari merchant, unik
        $productDetails     = 'Tes pembayaran menggunakan Duitku';
        $email              = $transaksi->email; // email pelanggan anda
        $phoneNumber        = $transaksi->hp; // nomor telepon pelanggan anda (opsional)
        $additionalParam    = ''; // opsional
        $merchantUserInfo   = ''; // opsional
        $customerVaName     = $transaksi->nama; // tampilan nama pada tampilan konfirmasi bank
        $callbackUrl        = route('transaction.payment.call_back'); // url untuk callback
        $returnUrl          = 'http://example.com/return'; // url untuk redirect
        $expiryPeriod       = 60; // atur waktu kadaluarsa dalam hitungan menit
        $signature          = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

        // Customer Detail
        $firstName          = "John";
        $lastName           = "Doe";

        // Address
        $alamat             = "Jl. Kembangan Raya";
        $city               = "Jakarta";
        $postalCode         = "11530";
        $countryCode        = "ID";

        $address = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'address'       => $alamat,
            'city'          => $city,
            'postalCode'    => $postalCode,
            'phone'         => $phoneNumber,
            'countryCode'   => $countryCode
        );

        $customerDetail = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'email'         => $email,
            'phoneNumber'   => $phoneNumber,
            'billingAddress'    => $address,
            'shippingAddress'   => $address
        );


        $item1 = array(
            'name'      => 'Test Item 1',
            'price'     => $transaksi->tagihan,
            'quantity'  => 1);


        $itemDetails = array(
            $item1
        );

        /*Khusus untuk metode pembayaran OL dan SL
        $accountLink = array (
            'credentialCode' => '7cXXXXX-XXXX-XXXX-9XXX-944XXXXXXX8',
            'ovo' => array (
                'paymentDetails' => array (
                    0 => array (
                        'paymentType' => 'CASH',
                        'amount' => 40000,
                    ),
                ),
            ),
            'shopee' => array (
                'useCoin' => false,
                'promoId' => '',
            ),
        );*/

        $params = array(
            'merchantCode'      => $merchantCode,
            'paymentAmount'     => $paymentAmount,
            'paymentMethod'     => $paymentMethod,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            // 'accountLink' => $accountLink,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'signature'         => $signature,
            'expiryPeriod'      => $expiryPeriod
        );

        $params_string = json_encode($params);
        //echo $params_string;
//        $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
         $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
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
            $result = json_decode($request, true);
            $update = [
                'total' => $result['amount'],
            ];
            $transaksi->update($update);
//            dd($result);
            return redirect($result['paymentUrl']);
//            header('location: '. $result['paymentUrl']);
//            echo "paymentUrl :" . $result['paymentUrl'] . "<br />";
//            echo "merchantCode :" . $result['merchantCode'] . "<br />";
//            echo "reference :" . $result['reference'] . "<br />";
//            echo "vaNumber :" . $result['vaNumber'] . "<br />";
//            echo "amount :" . $result['amount'] . "<br />";
//            echo "statusCode :" . $result['statusCode'] . "<br />";
//            echo "statusMessage :" . $result['statusMessage'] . "<br />";
        } else {
            $request = json_decode($request);
            $error_message = "Server Error " . $httpCode . " " . $request->Message;
            echo $error_message;
        }


    }
    public function call_back(Request $request)
    {
        $apiKey             = 'e09dd1d01a70d0f4d6953c711d4fa776'; // API key anda
        $merchantCode       = $request->merchantCode;//isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
        $amount             = $request->amount;//isset($_POST['amount']) ? $_POST['amount'] : null;
        $merchantOrderId    = $request->merchantOrderId;//isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
        $productDetail      = $request->productDetail;//isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        $additionalParam    = $request->additionalParam;//isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
        $paymentMethod      = $request->paymentCode;//isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
        $resultCode         = $request->resultCode;//isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
        $merchantUserId     = $request->merchantUserId;isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
        $reference          = $request->reference;//isset($_POST['reference']) ? $_POST['reference'] : null;
        $signature          = $request->signature;//isset($_POST['signature']) ? $_POST['signature'] : null;

//log callback untuk debug
// file_put_contents('callback.txt', "* Callback *\r\n", FILE_APPEND | LOCK_EX);

        if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);
            if ($signature == $calcSignature) {
                //Callback tervalidasi
                //Silahkan rubah status transaksi anda disini
                // file_put_contents('callback.txt', "* Success *\r\n\r\n", FILE_APPEND | LOCK_EX);

                $transaksi = Transaction::where('invoice_id', $merchantOrderId)->first();
                $update     = $transaksi->update([
                    'status'    => $resultCode,
                ]);
            } else {
                // file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
                throw new Exception('Bad Signature');
            }
        } else {
            // file_put_contents('callback.txt', "* Bad Parameter *\r\n\r\n", FILE_APPEND | LOCK_EX);
            throw new Exception('Bad Parameter');
        }
    }
    public function cek_transaksi($slug)
    {

        $merchantCode   = env('MERCHANT_CODE'); // dari duitku
        $apiKey         = env('KEY_DUITKU'); // API key anda
        ; // dari duitku
        $merchantOrderId = $slug; // dari anda (merchant), bersifat unik

        $signature = md5($merchantCode . $merchantOrderId . $apiKey);

        $params = array(
            'merchantCode' => $merchantCode,
            'merchantOrderId' => $merchantOrderId,
            'signature' => $signature
        );

        $params_string = json_encode($params);
        $url = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus';
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
            $transaksi  = Transaction::where('invoice_id', $slug)->first();
            $update     = $transaksi->update([
                'status'    => $results['statusCode'],
                'biaya'     => $results['fee'],
                'total'     => $results['amount']
            ]);
            if($update){
                return redirect()->route('event.list')->with('success', 'Payment Successfully');
            }
//            print_r($results, false);
            // echo "merchantOrderId :". $results['merchantOrderId'] . "<br />";
            // echo "reference :". $results['reference'] . "<br />";
            // echo "amount :". $results['amount'] . "<br />";
            // echo "fee :". $results['fee'] . "<br />";
            // echo "statusCode :". $results['statusCode'] . "<br />";
            // echo "statusMessage :". $results['statusMessage'] . "<br />";
        } else {
            $request = json_decode($request);
            $error_message = "Server Error " . $httpCode . " " . $request->Message;
            echo $error_message;
        }


    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
