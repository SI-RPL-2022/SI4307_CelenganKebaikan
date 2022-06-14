@extends('layouts.frontend')

@section('main')
    <div class="container mt-5">
        @auth
            <div class="card" style="margin-top: 200px">
                <div class="card-header">
                    Riwayat Transaksimu
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Donasi</th>
                                <th>Jumlah Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaction as $item)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{ $item->donasi->judul_donasi }}
                                    </td>
                                    <td class="rupiah">
                                        {{$item->jumlah_transaksi}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th>Belum Ada Riwayat</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endauth
        @guest
            Kamu Belum Login, Silakan <a href="/login">Login</a> dahulu!
        @endguest
    </div>

    <script>
        const name = document.querySelectorAll('.rupiah')
        name.forEach(e => {
            console.log(e.textContent.toLocaleString())
        })
    </script>
@endsection