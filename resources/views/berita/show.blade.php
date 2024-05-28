@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('berita') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <img src="{{ asset('storage/beritas/' . $berita->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $berita->nama }}</h4>
                    <table>
                        <tr>
                        <td><b>Judul<b></td>
                        <td>:</td>
                        <td>{!! $berita->judul !!}</td>
                        </tr>
                       <tr>
                        <td><b>Isi Berita<b></td>
                        <td>:</td>
                        <td>{!! $berita->isi_berita !!}</td></td>
                        </tr>
                       <tr>
                        <td><b>Tanggal & Waktu<b></td>
                        <td>:</td>
                        <td>{!! $berita->tanggal !!}</td></td>
                        </tr>
                       <tr>
                        <td><b>Penulis<b></td>
                        <td>:</td>
                        <td>{!! $berita->penulis->nama !!}</td></td>
                        </tr>
                       <tr>
                        <td><b>Kategori<b></td>
                        <td>:</td>
                        <td>{!! $berita->kategori->nama !!}</td></td>
                        </tr>
                        <tr>
                        <td><b>Status<b></td>
                        <td>:</td>
                        <td>{!! $berita->status !!}</td></td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
