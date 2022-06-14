@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    User Edit
                </span>
                <span>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                @error('password')
                    {{$message}}
                @enderror
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" value="{{ $user->name }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="radio" name="jk" value="L" {{ $user->jk == 'L' ? 'checked' : '' }} id="">Pria
                        <input type="radio" name="jk" value="P" id="" {{ $user->jk == 'P' ? 'checked' : '' }}>Wanita
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <textarea name="pekerjaan" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsikan Pekerjaanmu">{{ $user->pekerjaan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="number" name="no_hp" id="" value="{{ $user->no_hp }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">Pilih Role...</option>
                            @forelse ($roles as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $user->role_id ? 'selected' : '' }}>{{ $item->nama }}</option>
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