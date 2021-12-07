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