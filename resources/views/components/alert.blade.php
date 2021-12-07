@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert soft-bg-danger alert-dismissible fade show">
    {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif

@if (session()->has('success'))
    @if (session('success'))
    <script>
        swal("Yeay, success", "{{session('message')}}", "success");
    </script>
    @else
    <script>
        swal("Opps !!!", "{{session('message')}}", "error");
    </script>
    @endif
@endif