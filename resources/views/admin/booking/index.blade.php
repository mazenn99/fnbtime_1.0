@extends('admin.layout.app')
@section('title' , 'All Booking')
@section('content')
    @include('admin.layout._partial._successLogout')
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">You Can Approve & Canceled Last Booking Details</h2>
            <form class="form-header pb-2" action="" method="POST">
                @csrf
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all pending booking ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>Restaurant</th>
                        <th>booking Number</th>
                        <th>Restaurant phone</th>
                        <th>Restaurant country</th>
                        <th>Restaurant city</th>
                        <th>Customer Phone</th>
                        <th>Guest</th>
                        <th>occasion Date</th>
                        <th>occasion Time</th>
                        <th>Date Booking</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</a></td>
                            <td>{{$booking->restaurant->name}}</td>
                            <td>{{$booking->booking_number}}</td>
                            <td>{{$booking->restaurant->number}}</td>
                            <td>{{$booking->restaurant->country->name}}</td>
                            <td>{{$booking->restaurant->city->name}}</td>
                            <td>{{$booking->phone_costumer}}</td>
                            <td>{{$booking->person_number}}</td>
                            <td>{{$booking->occasion_date}}</td>
                            <td>{{$booking->time}}</td>
                            <td>{{$booking->date_booking}}</td>
                            <td>{!! $booking->getStatus() !!}</td>
                            <td>
                                <form action="{{route('booking.update', $booking->id)}}" method="POST"
                                      class="d-inline-block">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <button
                                        class="btn btn-sm btn-outline-primary">Approved
                                    </button>
                                </form>
                                <form action="{{route('booking.destroy' , $booking->id)}}" class="d-inline-block"
                                      method="POST">
                                    @csrf
                                    {{method_field("DELETE")}}
                                    <button class="btn btn-sm btn-outline-danger">
                                        Canceled
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="mt-4 my-4">{{$bookings->links()}}</div>
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
                    url: '{{route("search-input-for-allBooking")}}',
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
