<?php

use Illuminate\Support\Facades\Route;

# This is All admin Route


Route::group(['namespace' => 'Admin', 'middleware' => ['guest:admin', 'throttle:15,1']], function () {
    ################### login Route to Admin Dashboard #################
    Route::get('login', 'LoginController@getLogin')->name('admin-login');
    Route::post('login', 'LoginController@login')->name('admin-login');
    ################### end login Route to Admin Dashboard #################
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    ######### logout admin #############
    Route::post('logout', 'LoginController@logout')->name('logout-admin');
    ######### end logout admin #########
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    ################### Edit Information Admin #######################
    Route::get('edit' , 'EditInformationAdmin@edit')->name('edit-admin-info');
    Route::post('edit' , 'EditInformationAdmin@update')->name('update-admin-info');
    ################### end Edit Information Admin #######################

    ######### CRUD users and Create new Admin #############
    Route::group(['prefix' => 'users'], function () {
        ############## create new admin and CRUD users ###################
        Route::resource('users' , 'CRUDAllUserController');
        ############## end create new admin and CRUD users ###################
        Route::post('search-input' , 'CRUDAllUserController@searchInput')->name('search-input-users');
    });
    ########## end CRUD users and Create new Admin #########

    ########## CRUD Restaurant and Create new Restaurant #############
    Route::resource('restaurant', 'RestaurantController');
    Route::post('restaurant/search-input' , 'RestaurantController@searchInput')->name('search-input-restaurants');
    ######### end CRUD users and Create new Admin #########

    ########## Manage All Booking #############
    Route::resource('booking', 'BookingController');
    Route::post('booking/search-input' , 'BookingController@searchInput')->name('search-input-last-booking');
    Route::post('booking/search-inputAllBooking' , 'BookingController@searchAllBooking')->name('search-input-for-allBooking');
    Route::get('booking/allbooking' , 'BookingController@show')->name('allBooking');
    ######### end Manage All Booking #########
    
    ######### Users -> Restaurant views ########
    Route::resource('users_restaurant' , 'usersRestaurantController');
    Route::get('spicific_user/{user}' , 'usersRestaurantController@showSpicificUserRestaurant')->name('spicific-users');
    ######### Users -> Restaurant views ########  
    
});

