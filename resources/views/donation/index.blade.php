@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Donasi
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Donasi</th>
                        <th>
                            Target
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donations as $item)
                        <tr>
                            <th>
                                {{ $loop->iteration }}
                            </th>
                            <td>
                                {{ $item->judul_donasi }}
                            </td>
                            <td>
                                {{ $item->target_donasi }}
                            </td>
                            <td>
                                <form action="{{ route('donation.destroy', $item->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
