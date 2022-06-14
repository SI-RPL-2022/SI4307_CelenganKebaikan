@extends('layouts.frontend')

@section('main')
    <div class="container mt-5">
        <div class="card" style="margin-top: 100px">
            <div class="card-header">
                {{ $donasi->judul_donasi }}
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>
                            Detail
                        </th>
                    </tr>
                    <tr>
                        <th>Target Donasi</th>
                        <th>:</th>
                        <td>
                            <span id="uang"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Penerima</th>
                        <th>:</th>
                        <td>
                            {{ $donasi->penerima }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dilayangkan Oleh
                        </th>
                        <th>:</th>
                        <td>
                            {{ $donasi->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Terkumpul</th>
                        <th>:</th>
                        <td>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($transaction as $item)
                                @php
                                    $i += $item->jumlah_transaksi;
                                @endphp
                            @endforeach

                            <span id="jumlah_transaksi"></span>
                        </td>
                    </tr>
                    <tr class="mx-auto">
                        <center>
                            <img width="500" src="{{ Storage::url($donasi->photo) }}" alt="">
                        </center>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <div class="progress">
                    <div class="progress-bar" role="progressbar"
                        style="width: {{ $i == 0 ? 0 : ((($i / (int) $donasi->target_donasi) * 100) / 100) * 100 }}%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Transaksi
            </div>
            <div class="card-body">
                <form action="{{ route('donasi.transaksi') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="donation_id" value="{{ $donasi->id }}">
                    <div class="form-group">
                        <label for="">Jumlah Transaksi</label>
                        <input type="number" name="jumlah_transaksi" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment</label>
                        <select name="payment" id="" class="form-control">
                            <option value="" selected>Pilih Payment...</option>
                            <option value="" disabled>Dompet Digital</option>
                            <option value="dana">Dana</option>
                            <option value="ovo">OVO</option>
                            <option value="" disabled>Transaksi Antar Bank</option>
                            <option value="bri">BRI</option>
                            <option value="bca">BCA</option>
                            <option value="mandiri">Mandiri</option>
                            <option value="bni">BNI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor</label>
                        <input type="number" name="nomor" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sembunyikan Profil</label>
                        <input type="checkbox" name="hide" value="Y" id="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Donatur
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Donatur</th>
                            <th>Jumlah Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaction as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    @if ($item->hide == 'Y')
                                        Donatur
                                    @else
                                        {{ $item->user->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $item->jumlah_transaksi }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>Belum Ada Donatur</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        const uang = document.getElementById('uang')
        const jumlah_transaksi = document.getElementById('jumlah_transaksi')

        uang.textContent = "Rp." + ({{ $donasi->target_donasi }}).toLocaleString()
        jumlah_transaksi.textContent = "Rp." + ({{ $i }}).toLocaleString()
    </script>
@endsection
