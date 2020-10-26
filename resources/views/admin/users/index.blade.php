@extends('admin.layout.app')
@section('title' , 'Users')
@section('content')
    @include('admin.layout._partial._successLogout')
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">You Can [Edit - Update - Delete] All Users</h2>
            <form class="form-header pb-2" action="" method="POST">
                @csrf
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all Users in database ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>email</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>country</th>
                        <th>city</th>
                        <th>subscription</th>
                        <th>Verified</th>
                        <th class="text-right">Register At</th>
                        <th class="text-right">All Booking</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('spicific-users' , $user->id)}}" target="_blank">{{$user->email}}</a></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->country->name}}</td>
                            <td>{{$user->city->name}}</td>
                            <td>{!!$user->getSubscription()!!}</td>
                            <td>{!!$user->getVerified()!!}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{\App\Model\Booking::where('user_id' , $user->id)->count()}}</td>
                            <td>
                                <a href="{{route('users.edit' , $user->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{route('users.destroy' , $user->id)}}" method="POST"
                                      class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are You Sure')"
                                            class="btn btn-sm btn-outline-danger">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DATA TABLE-->
    </div>
@endsection
@section('script')
    <script>
        $('#search-input').on('keyup', function (e) {
            e.preventDefault();
            let searchVal = $(this).val();
            if (searchVal != ' ') {
                $.ajax({
                    url: '{{route("search-input-users")}}',
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
@endsection

