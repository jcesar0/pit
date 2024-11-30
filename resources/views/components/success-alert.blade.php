@if(session('success_alert'))
    <div class="alert alert-success">
        {{ session('success_alert') }}
    </div>
@endif
