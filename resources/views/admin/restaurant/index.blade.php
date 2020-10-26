@extends('admin.layout.app')
@section('title' , 'Restaurant')
@section('content')
    @include('admin.layout._partial._successLogout')
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">You Can [Edit - Update - Delete] All Restaurant</h2>
            <form class="form-header pb-2" action="" method="POST">
                @csrf
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all restaurant in database ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>country</th>
                        <th>city</th>
                        <th>Manager Number</th>
                        <th>Manager Email</th>
{{--                        <th>type food</th>--}}
                        <th>Restaurant number</th>
                        <th>Added At</th>
                        <th>All Booking</th>
                        <th>All Visitors</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody id="search-data">
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td>{{$restaurant->id}}</td>
                            <td><a href="{{route('users_restaurant.show' , $restaurant->id)}}" target='_blank'>{{$restaurant->name}}</a></td>
                            <td>{{$restaurant->country->name}}</td>
                            <td>{{$restaurant->city->name}}</td>
                            <td>{!!$restaurant->manager_number ?? '<span class="text-danger">No Number</span>'!!}</td>
                            <td>{!!$restaurant->manager_email ?? '<span class="text-danger">No Email</span>'!!}</td>
{{--                            <td>{{$restaurant->type_food}}</td>--}}
                            <td>{{$restaurant->number}}</td>
                            <td>{{$restaurant->created_at}}</td>
                            <td>{{\App\Model\Booking::where('res_id' , $restaurant->id)->count()}}</td>
                            <td>{{$restaurant->views}}</td>
                            <td>
                                <a href="{{route('restaurant.edit' , $restaurant->id)}}"
                                   class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{route('restaurant.destroy' , $restaurant->id)}}" method="POST"
                                      class="d-inline-block">
                                    {{method_field('delete')}}
                                    @csrf
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
            <div class="mt-4 my-4">{{$restaurants->links()}}</div>
        </div>
        <!-- END DATA TABLE-->
    </div>
@endsection
@section('script')
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
@endsection
