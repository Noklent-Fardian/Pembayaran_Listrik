@extends('pembayaran.base')

@section('title', $pack['title']['index'].' -')

@section('content')
 
    <div class="card">
        <div class="card-header card-body py-sm-3">
            <h2 class="card-title fs-3">{{$pack['title']['index']}}</h2>
        </div>
        <div class="card-body py-md-1">
            <div class="row justify-content-between">
                <div class="col-sm-11 col-md-7">
                    <a href="{{route($pack['route']['create'])}}" class="btn bg-indigo border float-left">Create</a>
                </div>
                <div class="col-sm-11 col-md">
                    <form action="" method="get" id="form-search">
                        <div class="row">
                            <div class="col-md">
                                <select name="field" id="" class="form-control">
                                    @foreach ($pack['dataTable'] as $item => $value)
                                        <option value="{{$item}}" @if (isset($_REQUEST['field']) != null and $_REQUEST['field'] == $value) selected @endif >{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">
                                <div class="form-group position-relative has-icon-right">
                                    <input type="search" name="s" id="search-input" placeholder="Search..." value="@if (isset($_REQUEST['s']) != null){{$_REQUEST['s']}}@endif" class="form-control float-right">
                                    <div class="form-control-icon">
                                        <i class="fas fs-6 fa-search" id="search-toggle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('components.alert')
            <table class="table table-responsive table-striped ">
                <thead>
                    @foreach ($pack['dataTable'] as $item => $value)
                    <th>{{$value}}</th>
                    @endforeach
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            @foreach ($pack['dataTable'] as $packItem => $value)
                            <td>{{$item->$packItem}}</td>
                            @endforeach
                            <td>
                                <a href="{{route($pack['route']['show'], $item)}}" class="btn bg-teal border">Show</a>
                                <a href="{{route($pack['route']['edit'], $item)}}" class="btn bg-amber border">Edit</a>
                                <a href="" class="btn bg-rose border" id="btn-delete-{{$item->id}}">Delete</a>
                                <form action="{{route($pack['route']['destroy'], $item)}}" method="post" id="delete-form-{{$item->id}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="fs-6 m-0">
                Data Count {{$dataCount}}
            </p>
            {{$data->links()}}
        </div>
    </div>
@endsection

@section('js')
    @foreach ($data as $item)
    <script>
        $('#btn-delete-{{$item->id}}').click((e) => {
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
                    $('#delete-form-{{$item->id}}').submit();
                } else {
                    swal({
                        title: "Your record is save.",
                        icon: "success",
                    });
                }
            });
        });
    </script>
    @endforeach
    <script>
        $("#search-toggle").click((e) => {
            e.preventDefault();
            $('#form-search').submit();
        })
    </script>
@endsection