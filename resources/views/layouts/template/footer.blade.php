<footer class="secondary-footer">

    <div class="container">

        <h6>Contact us</h6>
        <ul class="social-footer clearfix">
            <li><a href="https://www.instagram.com/fnbtime" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://twitter.com/fnbtime1" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://wa.me/966530163633" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
        <!-- SLL Certificate -->
        <div class="sslCertificate">
            <span id="siteseal"><script async type="text/javascript"
                                        src="https://seal.starfieldtech.com/getSeal?sealID=uPcwi2FXuhKY0HceGA6YSUxCufTUtxD6hhm2vi94CaepfwdMCbI6TGBkk0bb"></script></span>
        </div>
    </div>

</footer>

</div>
<!-- end Footer Wrapper -->

</div>
<!-- end Container Wrapper -->

<!-- start Back To Top -->
<div id="back-to-top">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- end Back To Top -->
<div id="ajaxLoginModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static"
     data-keyboard="false" tabindex="-1" style="display: none;"></div>

<div id="ajaxRegisterModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static"
     data-keyboard="false" tabindex="-1" style="display: none;">
</div>

<div id="ajaxForgotPasswordModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static"
     data-keyboard="false" tabindex="-1" style="display: none;"></div>


{{--<!--Request client Location-->--}}
{{--<script>--}}
{{--    // const successCallback = (position) => {--}}
{{--    //     console.log(position);--}}
{{--    // }--}}
{{--    //--}}
{{--    // const errorCallback = (error) => {--}}
{{--    //     console.log(error)--}}
{{--    // }--}}
{{--    // navigator.geolocation.watchPosition(successCallback , errorCallback);--}}
{{--    // async function displayLocation(latitude,longitude){--}}
{{--    //     var request = new XMLHttpRequest();--}}
{{--    //--}}
{{--    //     var method = 'GET';--}}
{{--    //     var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&key=' +--}}
{{--    //         'AIzaSyAEqGw_yyDXQYvO1AS2KGw36CPzOQPlTqE';--}}
{{--    //         var async = true;--}}
{{--    //--}}
{{--    //     request.open(method, url, async);--}}
{{--    //     request.onreadystatechange = function(){--}}
{{--    //         if(request.readyState == 4 && request.status == 200){--}}
{{--    //             var data = JSON.parse(request.responseText);--}}
{{--    //             var address = data.results[0];--}}
{{--    //             document.write(address.formatted_address);--}}
{{--    //         }--}}
{{--    //     };--}}
{{--    //     request.send();--}}
{{--    // };--}}
{{--    //--}}
{{--    // var successCallback = function(position){--}}
{{--    //     var x = position.coords.latitude;--}}
{{--    //     var y = position.coords.longitude;--}}
{{--    //     displayLocation(x,y);--}}
{{--    // };--}}
{{--    //--}}
{{--    // var errorCallback = function(error){--}}
{{--    //     var errorMessage = 'Unknown error';--}}
{{--    //     switch(error.code) {--}}
{{--    //         case 1:--}}
{{--    //             errorMessage = 'Permission denied';--}}
{{--    //             break;--}}
{{--    //         case 2:--}}
{{--    //             errorMessage = 'Position unavailable';--}}
{{--    //             break;--}}
{{--    //         case 3:--}}
{{--    //             errorMessage = 'Timeout';--}}
{{--    //             break;--}}
{{--    //     }--}}
{{--    //     document.write(errorMessage);--}}
{{--    // };--}}
{{--    //--}}
{{--    // var options = {--}}
{{--    //     enableHighAccuracy: true,--}}
{{--    //     timeout: 1000,--}}
{{--    //     maximumAge: 0--}}
{{--    // };--}}
{{--    //--}}
{{--    // navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);--}}
{{--    // Step 1: Get user coordinates--}}
{{--    function getCoordintes() {--}}
{{--        var options = {--}}
{{--            enableHighAccuracy: true,--}}
{{--            timeout: 5000,--}}
{{--            maximumAge: 0--}}
{{--        };--}}

{{--        function success(pos) {--}}
{{--            var crd = pos.coords;--}}
{{--            var lat = crd.latitude.toString();--}}
{{--            var lng = crd.longitude.toString();--}}
{{--            var coordinates = [lat, lng];--}}
{{--            console.log(`Latitude: ${lat}, Longitude: ${lng}`);--}}
{{--            getCity(coordinates);--}}
{{--            return;--}}

{{--        }--}}

{{--        function error(err) {--}}
{{--            console.warn(`ERROR(${err.code}): ${err.message}`);--}}
{{--        }--}}

{{--        navigator.geolocation.getCurrentPosition(success, error, options);--}}
{{--    }--}}

{{--    // Step 2: Get city name--}}
{{--    function getCity(coordinates) {--}}
{{--        var xhr = new XMLHttpRequest();--}}
{{--        var lat = coordinates[0];--}}
{{--        var lng = coordinates[1];--}}


{{--        // Paste your LocationIQ token below.--}}
{{--        xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=64de5789caaf53&lat=" +--}}
{{--            lat + "&lon=" + lng + "&format=json", true);--}}
{{--        xhr.send();--}}
{{--        xhr.onreadystatechange = processRequest;--}}
{{--        xhr.addEventListener("readystatechange", processRequest, false);--}}

{{--        function processRequest(e) {--}}
{{--            if (xhr.readyState == 4 && xhr.status == 200) {--}}
{{--                var response = JSON.parse(xhr.responseText);--}}
{{--                var city = response.address.city;--}}
{{--                console.log(city);--}}
{{--                return;--}}
{{--            }--}}
{{--        }--}}
{{--    }--}}

{{--    getCoordintes();--}}
{{--</script>--}}
<!--Request client Location-->

<!-- JS -->
<script defer src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyC0dvWaoca8-GE42WHuN6aegix-QegI3I0&language=en&callback=initMap&libraries=places&v=weekly"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/map/helper_script.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/spin.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/fancySelect.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/bootstrap-rating.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/select2.full.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/slick.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/readmore.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/instagram.min.js"></script>
<script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/customs.js"></script>

{{--<script>--}}
{{--    --}}{{--  this is to search button on index view and restaurant   --}}
{{--    $("#search").keyup(function () {--}}
{{--        let search = $(this).val();--}}
{{--        if (search != '') {--}}
{{--            $.ajax({--}}
{{--                url: "{{route('search')}}",--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    search: search,--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                     $("#show-list-search").slideDown();--}}
{{--                    // console.log(response);--}}
{{--                    $("#show-list-search").html(response);--}}
{{--                }--}}
{{--            });--}}
{{--        } else {--}}
{{--            $('#show-list-search').html('');--}}
{{--        }--}}
{{--    })--}}
{{--</script>--}}
@yield('script')

</body>


</html>
