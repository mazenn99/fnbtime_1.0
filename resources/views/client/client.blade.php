@extends('layouts.app')
@section('title' , 'Details')
@section('content')
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-breadcrumb"
                 style="background-image:url('{{asset('FrontEnd')}}/images/hero-header/hero-image.png');">

                <div class="container">

                    <h1>all {{\Illuminate\Support\Facades\Auth::user()->name}} Reservation</h1>

                </div>

            </div>
            <div class="container pt-10 pb-30">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">{{\Illuminate\Support\Facades\Auth::user()->name}} Reservation</li>
                    </ol>

                </div>

                <div class="row mt-40 mb-30 text-center">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="section-title-02 mb-20">

                            <h3><span>{{\Illuminate\Support\Facades\Auth::user()->name}} Reservation Details</span>
                            </h3>

                        </div>
                        @if(\App\Model\Booking::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                            @foreach (\App\Model\Booking::with(['Restaurant' => function($q) {$q->select('name');}])->where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->get() as $result)

                                <div class="reservation-summary-wrapper">

                                    <ul class="reservation-summary-list">

                                        <!--<li>-->
                                        <!--    <div class="image">-->
                                        <!--        @php $img = explode(',', $result->restaurant->picture); @endphp-->
                                        <!--        <img src="{{asset('images/res-images')}}/{{$img[0]}}"-->
                                        <!--             alt="Restaurant image {{$result->restaurant->name}}"/>-->
                                        <!--    </div>-->
                                        <!--</li>-->

                                        <li>
                                            <span class="block text-muted text-uppercase">Restaurant</span>
                                            <h6><a href="{{route('res-info' , $result->restaurant->id)}}"
                                                   target="_blank">{{$result->restaurant->name}}</a></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Date</span>
                                            <h6><?php echo $result->occasion_date ?></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Time</span>
                                            <h6><?php echo $result->time ?></h6>
                                        </li>


                                        <li>
                                            <span class="block text-muted text-uppercase">Guests</span>
                                            <h6><?php echo $result->person_number ?></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Booking Number</span>
                                            <h6><?php echo $result->booking_number ?></h6>
                                        </li>

                                        <li>
                                            {!! $result->getStatus() !!}
                                        </li>

                                    </ul>

                                </div>
                            @endforeach
                        @else
                            {!! "<h4 class='text-center text-danger' style='display: block'>You didn't have any booking yet</h4>"; !!}
                        @endif

                        <div class="submite-list-wrapper">

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="section-title-02 mb-20">

                                        <h3>
                                            <span>{{\Illuminate\Support\Facades\Auth::user()->name}} Favorite Details</span>
                                        </h3>

                                    </div>

                                </div>

                            </div>
                            @if(\App\Model\Favorite::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                                @foreach (\App\Model\Favorite::with(['restaurant' => function($q) {$q->select('id' , 'name' , 'country_id' , 'city_id');}])->where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->get() as $result)
                                    <div class="reservation-summary-wrapper">

                                        <ul class="reservation-summary-list">

                                            <!--<li>-->
                                            <!--    <div class="image">-->
                                            <!--        @php $img = explode(',', $result->restaurant->picture); @endphp-->
                                            <!--        <img src="{{asset('images/res-images')}}/{{$img[0]}}"-->
                                            <!--             alt="Restaurant image {{$result->restaurant->name}}"/>-->
                                            <!--    </div>-->
                                            <!--</li>-->

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">Restaurant</span>
                                                <h6>
                                                    <h6><a href="{{route('res-info' , $result->restaurant->id)}}"
                                                           target="_blank">{{$result->restaurant->name}}</a></h6>
                                                </h6>
                                            </li>

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">Country</span>
                                                <h6>{{$result->restaurant->country->name}}</h6>
                                            </li>

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">City</span>
                                                <h6>{{$result->restaurant->city->name}}</h6>
                                            </li>
                                            <li>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <button id="removeFav" onclick="return confirm('Are You Sure')"
                                                            class="btn btn-primary"
                                                            data-value="{{$result->restaurant->id}}">
                                                        Remove
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>

                                    </div>
                                @endforeach
                            @else
                                {!! "<h4 class='text-center text-danger' style='display: block'>You didn't have any Favorite yet</h4>"; !!}
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            @endsection
            @section('script')
                <script>
                    $('#removeFav').on('click', function (e) {
                        e.preventDefault();
                        let btnVal = $(this).data('value');
                        if (btnVal != 0) {
                            $.ajax({
                                url: '{{route("del-fav")}}',
                                method: 'POST',
                                data: {
                                    '_token': "{{csrf_token()}}",
                                    'value': btnVal,
                                },
                                success: function (success) {
                                    if (success == 200) {
                                        location.reload();
                                    }
                                }
                            });
                        }
                    });
                </script>
@endsection

