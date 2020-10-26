<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
Route::namespace('Home')->group(function() {
    Route::get('/' , 'HomePageController@index')->name('home');
    ############## client page to browse all Reservation and favorite #################
    Route::get('client' , 'HomePageController@client');
    ############## end client page to browse all Reservation and favorite #################
    ############## contact page ##################
    Route::get('contact' , 'SendMailContactUsController@contact')->name('contact-us');
    Route::post('contact' , 'SendMailContactUsController@sendMailContact')->name('send-message');
    ############## end contact page ##################
    ############## Faq Page ##################
    Route::get('faq' , 'HomePageController@faq')->name('faq');
    ############## end faq Page ##################
    ############## show all restaurant and filter it from checkbox ##############
    Route::get('restaurant' , 'HomePageController@showRestaurant')->name('restaurant');
    Route::post('restaurant' , 'HomePageController@showRestaurant')->name('restaurant');
    ############## end show all restaurant and filter it from checkbox ##############
    Route::get('restaurant/search/{search?}' , 'HomePageController@searchForm')->name('searchFrom');
    Route::get('restaurant/{resId}' , 'HomePageController@restaurantInfo')->name('res-info');
    Route::post('restaurant/{resId}' , 'HomePageController@restaurantReserve')->name('reserve');
    Route::get('reservation-success' , 'HomePageController@reservationSuccess');
    Route::get('suggestion' , 'HomePageController@suggestion')->name('suggestion');
    Route::get('client' , 'HomePageController@clientDetails')->name('client-info');
    Route::get('edit' , 'HomePageController@edit')->name('edit-profile');
    Route::post('edit' , 'HomePageController@update')->name('edit-profile');
    Route::post('searchInput' , 'HomePageController@searchInput')->name('search');
    Route::get('dropdownlist','DropDownControllerForCountryAndCity@index');
    Route::post('get-city-list','DropDownControllerForCountryAndCity@getCityList');
    Route::post('saveRestaurant' , 'HomePageController@saveToFavorite')->name('favorite');
    Route::post('deleteRes' , 'HomePageController@deleteFav')->name('del-fav');

        ###################################### Contract Agreemnt #########################################
        Route::get('contract/restaurant/{hash}' , 'ContractController@contractPage')->name('contact-page');
        Route::post('contract/restaurant' , 'ContractController@submitContract')->name('contract-approve');
        ###################################### Contract Agreemnt #########################################



    Route::get('api/restaurant', 'MapController@Get_ById');
    
    Route::get('api/restaurants/query', 'MapController@Get_Restaurants');
    
    Route::get('api/restaurant/city', 'MapController@Get_Restaurants');
    
    Route::get('images', 'MapController@Get_image');


});


