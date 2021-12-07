@extends('pembayaran.base')

@section('title', $pack['title']['create'].' -')

@section('content')

    <div class="card">
        <div class="card-header card-body py-sm-3">
            <h2 class="card-title fs-3">{{$pack['title']['create']}}</h2>
        </div>
        <div class="card-body py-md-1">
            @include($pack['route']['fields'])
        </div>
    </div>
@endsection