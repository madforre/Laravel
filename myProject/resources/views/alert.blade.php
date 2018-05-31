@if(session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        {{ session('success')}}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-danger">
        {{ session('success')}}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('success')}}
    </div>
@endif