<?php



Route::group(['namespace' => 'Commerce'], function (){
      /**HomeController*/
   Route::get('/', 'HomeController@index')->name('home.index');

   Route::get('/Shop' , 'ShopController@index')->name('shop.index');
   Route::get('/shop/sale', 'ShopController@hotProduct')->name('shop.hotProduct');
   Route::get('/shop/{slug}', 'ShopController@category')->name('shop.category');

});