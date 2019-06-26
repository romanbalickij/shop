<?php



Route::group(['namespace' => 'Commerce'], function (){
      /**HomeController*/
   Route::get('/', 'HomeController@index')->name('home.index');

   Route::get('/Shop' , 'ShopController@index')->name('shop.index');
});