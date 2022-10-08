<div class="card">
    <div class="card-header">
        <h3>Halo, {{ $data_email['penerima'] }}</h3>
    </div>
    <div class="card-body">
        <p>Terima kasih, permohonan reset akun yang anda ajukan kami telah terima, silahkan klik tautan dibawah ini untuk membuat password baru </p>
        <p><a href="{{ $data_email['link'] }}">{{ $data_email['link'] }}</a></p>
        <p>Salam</p>
        <p>Pengurus Pusat Himpunan Perawat Neurosains Indonesia</p>
    </div>
</div>
