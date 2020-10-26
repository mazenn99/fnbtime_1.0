@extends('admin.layout.app')
@section('title' , isset($res) ? 'All Restaurant' : 'All Users')
@section('content')
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">All Users Views This Restaurant</h2>
            {{-- <form class="form-header pb-2" action="" method="POST">
                @csrf
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all restaurant in database ...">
            </form> --}}
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        {!! isset($users) ? '<th>Email</th>' : '' !!}
                    </tr>
                    </thead>
                    <tbody id="search-data">
                    @isset($users)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                    @else
                    @foreach($res as $restaurant)
                        <tr>
                            <td>{{$restaurant->id}}</td>
                            <td>{{$restaurant->name}}</td>
                        </tr>
                    @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DATA TABLE-->
    </div>
@endsection
{{-- @section('script')
    <script>
        $('#search-input').on('keyup', function (e) {
            let searchVal = $(this).val();
            if (searchVal != ' ') {
                $.ajax({
                    url: '{{route("search-input-restaurants")}}',
                    method: 'POST',
                    data: {
                        '_token': "{{csrf_token()}}",
                        'search': searchVal,
                    },
                    dataType: 'json',
                    success: function (success) {
                        if (success != ' ') {
                            $('tbody').html(success);
                        }
                    }
                });
            }
        });
    </script>
@endsection --}}
