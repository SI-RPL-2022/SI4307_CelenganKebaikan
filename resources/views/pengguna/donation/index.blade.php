@extends('layouts.frontend')

@section('main')
    <section id="features" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Daftar Donasi</h2>
                @auth
                    <h5>
                        <a href="{{ route('donasi.create') }}" class="text-primary">Buat Donasi</a>
                    </h5>
                @endauth
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap">
                @forelse ($donations as $item)
                    <div class="card">
                        <div class="card-header text-center">
                            {{ $item->judul_donasi }}
                        </div>
                        <div class="card-body">
                            <img width="400" src="{{ Storage::url($item->photo) }}" alt="{{ $item->judul_donasi }}" />
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('donasi.show', $item->id) }}" class="btn btn-success text-center">Detail</a>
                        </div>
                    </div>
                @empty
                    <center>
                        Belum Ada Donasi
                    </center>
                @endforelse
            </div>
        </div>
    </section>
@endsection
