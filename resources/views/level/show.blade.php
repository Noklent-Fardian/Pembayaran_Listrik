@extends('pembayaran.base')

@section('title', $pack['title']['show'].' '.$data->id.' -')


    <div class="card">
        <div class="card-header card-body py-sm-3">
            <h2 class="card-title fs-3">{{$pack['title']['show']}} {{$data->id}}</h2>
        </div>
        <div class="card-body py-md-1">
            @include('components.alert')
            <table class="table table-responsive table-hover text-capitalize">
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($pack['show'] as $item => $value)
                        <tr>
                            <td>{{$value}}</td>
                            <td>{{$data->$item}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route($pack['route']['edit'], $data)}}" class="btn bg-teal border">Edit</a>
                    <a href="{{ url()->previous() }}" class="btn bg-amber border">Back</a>
                    <a href="" class="btn bg-rose border" id="btn-delete">Delete</a>
                    <form action="{{route($pack['route']['destroy'], $data)}}" method="post" id="delete-form">
                        @csrf
                        <input type='hidden' name='_method' value='delete'/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#btn-delete').click((e) => {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $('#delete-form').submit();
                } else {
                    swal({
                        title: "Your record is save.",
                        icon: "success",
                    });
                }
            });
        })
    </script>
@endsection