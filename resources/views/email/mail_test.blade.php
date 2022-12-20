<!DOCTYPE html>
<html>
<head>
    <title>How to send mail using queue in Laravel 7/8 ?</title>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h3>Halo, {{ $data_email['nama_penerima'] }}</h3>

    </div>
    <div class="card-body">
        <p>Anda telah berhasil login dengan detail berikut:</p>
        <p>IP : {{ $data_email['server']['ip'] }}</p>
        <p>Browser : {{ $data_email['server']['browser'] }}</p>
        <p>Time : {{ date('Y-m-d H:i:s') }}</p>
        <p>Salam</p>
        <p>Pengurus Pusat Himpunan Perawat Neurosains Indonesia</p>
        <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
            <a href="https://itsolutionstuff.com">Visit Our Website : ItSolutionStuff.com</a>
        </h2>
    </div>
</div>

</body>
</html>
