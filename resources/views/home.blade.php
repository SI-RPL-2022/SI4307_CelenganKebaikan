@extends('layouts.app')

@section('content')
    Halo, {{Auth::user()->name}}
@endsection