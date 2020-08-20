@if(session()->has('success'))
    <div class="alert alert-dismissible text-center alert-success margin-0">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session()->get('success')}}</strong>
    </div>
@endif
