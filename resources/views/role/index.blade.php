@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Role Management
                </span>
                <span>
                    <a href="{{ route('role.create') }}" class="btn btn-primary">+ Create Role</a>
                </span>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $item)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('role.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('role.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>Belum Ada Data</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection