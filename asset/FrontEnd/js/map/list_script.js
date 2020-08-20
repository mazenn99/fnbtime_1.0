var map;
var geocoder;
var restaurantsList = [];

/**
* introLoader - Preloader
*/
$("#introLoaderList").introLoader({
    animation: {
            name: 'gifLoader',
            options: {
                    ease: "easeInOutCirc",
                    style: 'dark bubble',
                    delayBefore: 1500,
                    delayAfter: 0,
                    exitTime: 300
            }
    }
});
    
// Start the map by finding current client location
function initMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

// If geolocation was successful, do the rest
function showPosition(position) {

    // define map
    map = new google.maps.Map(document.getElementById("hotel-detail-map"), {
        center: { lat: 26.8349514, lng: 26.3822562 },
        zoom: 5,
        disableDefaultUI: true,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        }
    });

    // translate geolocation position to latlng object that maps API understand
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    geocoder = new google.maps.Geocoder();

    // Geocode the current position to get current city or country
    geocoder.geocode({
        'location': latlng
    }, function(userResults, userStatus) {
        if(userStatus === 'OK') {

            let params = (new URL(document.location)).searchParams;

            var query = [{
                key: 'city',
                value: ""
            },{
                key: 'search',
                value: params.get('search')
            },{
                key: 'page',
                value: params.get('page')
            },{
                key: 'sort',
                value: params.get('sort')
            }];


            // call info.php to get restaurants in the city or country
            downloadUrl(window.location.origin + '/api/restaurants/query', query, function(data) {
                var xml = data.responseXML;
                var restaurants = xml.documentElement.getElementsByTagName('restaurant');

                // convert xml results to an array of objects
                Array.prototype.forEach.call(restaurants, function(restaurant) {
                    restaurantsList.push({
                        id: restaurant.getAttribute('id'),
                        name: restaurant.getAttribute('name'),
                        description: restaurant.getAttribute('description'),
                        city: restaurant.getAttribute('city'),
                        foodtype: restaurant.getAttribute('foodType'),
                        url: restaurant.getAttribute('url'),
                        lat: restaurant.getAttribute('url').match(/\@(-?[\d\.]*)/)[1], // get latitude value from place url
                        lng: restaurant.getAttribute('url').match(/\@-?[\d\.]*\,([-?\d\.]*)/)[1] // get longitude value from place url
                    });
                });

                // iterate the restaurants array
                restaurantsList.forEach(function(restaurant, index) {
                    var location = {
                        lat: parseFloat(restaurant.lat),
                        lng: parseFloat(restaurant.lng)
                    };

                    // get distance between client and restaurant location using distance matrix API
                    var distanceService = new google.maps.DistanceMatrixService();
                    distanceService.getDistanceMatrix({
                        origins: [latlng],
                        destinations: [location],
                        travelMode: 'DRIVING'
                    }, function(distanceResult, distanceStatus) {
                        if (distanceStatus == 'OK') {

                            // find the current restaurant using text search in places API
                            var service2 = new google.maps.places.PlacesService(map);
                            service2.textSearch({
                                location: location,
                                radius: 10,
                                query: restaurant.name
                            }, function(restaurantResults, restaurantStatus) { // use only the first result and ignore the rest

                                if(restaurantStatus == google.maps.places.PlacesServiceStatus.OK) {

                                    // prepare represntation of price range
                                    var price = '';
                                    for(var i = 0; i < restaurantResults[0].price_level; i++) {
                                        price += '$';
                                    }

                                    // add the restaurant to the template with data got from database
                                    $('.restaurant-list-item-wrapper').html($('.restaurant-list-item-wrapper').html() + `
                                        <div class="restaurant-list-item clearfix">
                                            <div class="GridLex-grid-noGutter-equalHeight">
                                                <div class="GridLex-col-3_sm-3_xss-12">
                                                    <div class="image">
                                                    <a href="restaurant/${restaurant.id}?restaurant=${restaurant.id}"><img src="${restaurantResults[0].photos[0].getUrl()}" alt="Image"/></a>
                                                    </div>
                                                </div>
                                                <div class="GridLex-col-9_sm-9_xss-12">
                                                    <div class="GridLex-grid-noGutter-equalHeight">
                                                        <div class="GridLex-col-9_sm-12 content-wrapper">
                                                            <div class="content">
                                                                <h5><a href="restaurant/${restaurant.id}?restaurant=${restaurant.id}">${restaurantResults[0].name}</a></h5>
                                                                <p class="location"><i class="fa fa-map-marker"></i> ${restaurantResults[0].formatted_address}</p>
                                                                <p><i class="fa fa-car"></i> ${distanceResult.rows[0].elements[0].distance.text}</p>
                                                                <p class="short-info">${restaurant.description}</p>
                                                                <p class="cuisine">
                                                                    Cuisine: ${restaurant.foodtype.split(',').map(type => {
                                                                        return `<span>${type}</span>`;
                                                                    })}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="GridLex-col-3_sm-12 meta-wrapper">
                                                            <div class="meta">
                                                                <div class="rating-wrapper">
                                                                    <div class="rating-item">
                                                                        <input type="hidden" class="rating" data-filled="oi oi-star" data-empty="oi oi-star" data-fractions="2" data-readonly value="${(Math.round(restaurantResults[0].rating * 2) / 2).toFixed(1)}"/>
                                                                    </div>
                                                                    <span class="texting"> (${restaurantResults[0].user_ratings_total} reviews)</span>
                                                                </div>
                                                                <div class="right-bottom">
                                                                    <div class="price">Average price: <span>${price}</span></div>
                                                                    <div class="clear"></div>
                                                                    <a href="${restaurant.id}?restaurant=${restaurant.id}" class="btn btn-primary btn-sm btn-block">Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                }
                            });
                        }
                    });
                });

                // this fixes when rating not showing
                setTimeout(() => {
                    $('.rating').rating();
                }, 1000);
            });
        }
    });
}


// If geolocation disabled get restaurants by db + Gmap !
function showError(error) {
  if(error.code==1){
            map = new google.maps.Map(document.getElementById("hotel-detail-map"), {
                center: { lat: 26.8349514, lng: 26.3822562 },
                zoom: 5,
                disableDefaultUI: true,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                }
            });

            let params = (new URL(document.location)).searchParams;

            var query = [{
                key: 'city',
                value: ""
            },{
                key: 'search',
                value: params.get('search')
            },{
                key: 'page',
                value: params.get('page')
            },{
                key: 'sort',
                value: params.get('sort')
            }];

            // call info.php to get restaurants in the city or country
            downloadUrl(window.location.origin + '/api/restaurants/query', query, function(data) {
                var xml = data.responseXML;
                var restaurants = xml.documentElement.getElementsByTagName('restaurant');

                // convert xml results to an array of objects
                Array.prototype.forEach.call(restaurants, function(restaurant) {
                    restaurantsList.push({
                        id: restaurant.getAttribute('id'),
                        name: restaurant.getAttribute('name'),
                        description: restaurant.getAttribute('description'),
                        city: restaurant.getAttribute('city'),
                        foodtype: restaurant.getAttribute('foodType'),
                        url: restaurant.getAttribute('url'),
                        lat: restaurant.getAttribute('url').match(/\@(-?[\d\.]*)/)[1], // get latitude value from place url
                        lng: restaurant.getAttribute('url').match(/\@-?[\d\.]*\,([-?\d\.]*)/)[1] // get longitude value from place url
                    });
                });

                // iterate the restaurants array
                restaurantsList.forEach(function(restaurant, index) {
                    var location = {
                        lat: parseFloat(restaurant.lat),
                        lng: parseFloat(restaurant.lng)
                    };

                    // get distance between client and restaurant location using distance matrix API
                    var distanceService = new google.maps.DistanceMatrixService();
                    distanceService.getDistanceMatrix({
                        origins: [location],
                        destinations: [location],
                        travelMode: 'DRIVING'
                    }, function(distanceResult, distanceStatus) {
                        if (distanceStatus == 'OK') {

                            // find the current restaurant using text search in places API
                            var service2 = new google.maps.places.PlacesService(map);
                            service2.textSearch({
                                location: location,
                                radius: 10,
                                query: restaurant.name
                            }, function(restaurantResults, restaurantStatus) { // use only the first result and ignore the rest
                                if(restaurantStatus == google.maps.places.PlacesServiceStatus.OK) {

                                    // prepare represntation of price range
                                    var price = '';
                                    for(var i = 0; i < restaurantResults[0].price_level; i++) {
                                        price += '$';
                                    }

                                    // add the restaurant to the template with data got from database
                                    $('.restaurant-list-item-wrapper').html($('.restaurant-list-item-wrapper').html() + `
                                        <div class="restaurant-list-item clearfix">
                                            <div class="GridLex-grid-noGutter-equalHeight">
                                                <div class="GridLex-col-3_sm-3_xss-12">
                                                    <div class="image">
                                                    <a href="restaurant/${restaurant.id}?restaurant=${restaurant.id}"><img src="${restaurantResults[0].photos[0].getUrl()}" alt="Image"/></a>
                                                    </div>
                                                </div>
                                                <div class="GridLex-col-9_sm-9_xss-12">
                                                    <div class="GridLex-grid-noGutter-equalHeight">
                                                        <div class="GridLex-col-9_sm-12 content-wrapper">
                                                            <div class="content">
                                                                <h5><a href="restaurant/${restaurant.id}?restaurant=${restaurant.id}">${restaurantResults[0].name}</a></h5>
                                                                <p class="location"><i class="fa fa-map-marker"></i> ${restaurantResults[0].formatted_address}</p>
                                                                <p><i class="fa fa-car"></i> ${distanceResult.rows[0].elements[0].distance.text}</p>
                                                                <p class="short-info">${restaurant.description}</p>
                                                                <p class="cuisine">
                                                                    Cuisine: ${restaurant.foodtype.split(',').map(type => {
                                                                        return `<span>${type}</span>`;
                                                                    })}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="GridLex-col-3_sm-12 meta-wrapper">
                                                            <div class="meta">
                                                                <div class="rating-wrapper">
                                                                    <div class="rating-item">
                                                                        <input type="hidden" class="rating" data-filled="oi oi-star" data-empty="oi oi-star" data-fractions="2" data-readonly value="${(Math.round(restaurantResults[0].rating * 2) / 2).toFixed(1)}"/>
                                                                    </div>
                                                                    <span class="texting"> (${restaurantResults[0].user_ratings_total} reviews)</span>
                                                                </div>
                                                                <div class="right-bottom">
                                                                    <div class="price">Average price: <span>${price}</span></div>
                                                                    <div class="clear"></div>
                                                                    <a href="restaurant/${restaurant.id}?restaurant=${restaurant.id}" class="btn btn-primary btn-sm btn-block">Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                }
                            });
                        }
                    });
                });

                // this fixes when rating not showing
                setTimeout(() => {
                    $('.rating').rating();
                }, 1000);
            });

  }

}