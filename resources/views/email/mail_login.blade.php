<div class="card">
    <div class="card-header">
        <h3>Halo, {{ $data_email['penerima'] }}</h3>
    </div>
    <div class="card-body">
        <p>Anda telah berhasil login dengan detail berikut:</p>
        <p>IP : {{ $data_email['server']['ip'] }}</p>
        <p>Browser : {{ $data_email['server']['browser'] }}</p>
        <p>Time : {{ date('Y-m-d H:i:s', $data_email['server']['time']) }}</p>
        <p>Salam</p>
        <p>Pengurus Pusat Himpunan Perawat Neurosains Indonesia</p>
    </div>
</div>
