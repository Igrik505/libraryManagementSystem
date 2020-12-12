@if (session()->exists('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
@endif

@if (session()->exists('error'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('error')}}
    </div>
@endif
