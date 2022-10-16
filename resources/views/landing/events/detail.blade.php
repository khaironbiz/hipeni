
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="events" class="services services mt-5">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>{{$event->ringkasan}}</p>
            </div>
            <div class="row">
                <div class="col-md-4  d-flex">
                    @include('layouts.landing.navbar.event')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>{{$event->judul}}</b>
                            </div>
                            <div class="card-body">
                                <h6>Deskripsi</h6>
                                {!! $event->isi !!}
                                <h6 class="mt-2">Tanggal</h6>
                                {{$event->date_mulai}} <b> sd </b> {{$event->date_selesai}}
                                <h6 class="mt-2">Tempat</h6>
                                {{$event->tempat}}
                                <h6 class="mt-2">Akreditasi</h6>
                                @foreach($skp as $skp)
                                <div class="row">
                                    <div class="col-4">
                                        <label>{{ $skp->op->singkatan }}</label>
                                    </div>
                                    <div class="col-4">: {{ $skp->peserta }} SKP
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-4"><label><h6>Harga</h6></label></div>
                                    <div class="col-4">: {{ number_format($event->harga) }}</div>
                                </div>

                            </div>
                            <div class="card-footer">

                                @if($event->date_mulai > date('Y-m-d Hi:s') and $event->kuota > $pendaftar)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Daftar
                                </button>
                                @else
                                    Pendaftaran Ditutup
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulir Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('participant.store', ['slug' => $event->slug]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mt-1">
                        <div class="col-md-4"><label>Nama</label></div>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" name="nama"
                                   @if($user !='')
                                    value= "{{ $user->nama_lengkap }}"
                                   @endif>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4"><label>Email</label></div>
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-sm" name="email"
                                   @if($user !='')
                                       value= "{{ $user->email }}"
                                @endif>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4"><label>HP</label></div>
                        <div class="col-md-8">
                            <input type="number" class="form-control form-control-sm" name="hp"
                                   @if($user !='')
                                       value= "{{ $user->phone_cell }}"
                                @endif>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4"><label>Instansi</label></div>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" name="institusi" required>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4"><label>Event</label></div>
                        <div class="col-md-8">
                            <select class="form-control" name="event_id">
                                <option> {{ $event->judul }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <input type="checkbox" required> Dengan ini saya menyatakan data yang saya aukan adalah benar untuk pendaftaran
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buy Ticket</button>
                </div>

                </form>
            </div>
        </div>
    </div>

@endsection
