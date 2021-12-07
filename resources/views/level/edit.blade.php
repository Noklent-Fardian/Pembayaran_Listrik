@extends('pembayaran.base')

@section('title', $pack['title']['edit'].' '.$model->id.' - ')

@section('content')
    <div class="card">
        <div class="card-header card-body py-sm-2">
            <h2 class="card-title fs-3">{{$pack['title']['edit']}} {{$model->id}}</h2>
        </div>
        <div class="card-body">
            @include($pack['route']['fields'])
        </div>
    </div>
@endsection