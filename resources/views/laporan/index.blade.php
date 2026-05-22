@extends('adminlte::page')

@section('title', 'Laporan')

@section('content_header')
    <h1>Laporan</h1>
@endsection

@section('content')
    <a class="btn btn-sm btn-primary" href="{{ route('tiket.pdf') }}">Download Seluruh Tiket</a>
@endsection