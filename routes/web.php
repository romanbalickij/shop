<?php



Route::group(['namespace' => 'Commerce'], function (){
      /**HomeController*/
   Route::get('/', 'HomeController@index')->name('home.index');
   Route::get('/show/{slug}', 'HomeController@show')->name('show.product');

     /**ShopController **/
   Route::get('/Shop' , 'ShopController@index')->name('shop.index');
   Route::get('/shop/sale', 'ShopController@hotProduct')->name('shop.hotProduct');
   Route::get('/shop/{slug}', 'ShopController@category')->name('shop.category');
   Route::get('/shop/brand/{slug}', 'ShopController@brand')->name('shop.brand');

    /**CartController*/
  Route::post('/cart', 'CartController@store')->name('cart.store');
  Route::delete('/cart/{product}', 'CartController@delete')->name('cart.delete');

});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

