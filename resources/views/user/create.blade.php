@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    User Create
                </span>
                <span>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="radio" name="jk" value="L" id="">Pria
                        <input type="radio" name="jk" value="P" id="">Wanita
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <textarea name="pekerjaan" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsikan Pekerjaanmu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="number" name="no_hp" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">Pilih Role...</option>
                            @forelse ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection