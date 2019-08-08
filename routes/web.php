<?php



Route::group(['namespace' => 'Commerce'], function (){
      /**HomeController*/
   Route::get('/', 'HomeController@index')->name('home.index');
   Route::get('/show/{slug}', 'HomeController@show')->name('show.product');

     /**ShopController **/
   Route::get('/Shop' ,      'ShopController@index')->name('shop.index');
   Route::post('/Shop' ,     'ShopController@index')->name('shop.sort');
   Route::get('/shop/sale',  'ShopController@hotProduct')->name('shop.hotProduct');
   Route::get('/shop/{slug}','ShopController@category')->name('shop.category');
   Route::post('/shop/search','ShopController@search')->name('shop.search');

    /**CartController*/
   Route::post('/cart', 'CartController@store')->name('cart.store');
   Route::delete('/cart/{product}', 'CartController@delete')->name('cart.delete');

    /**CheckoutController*/
   Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
   Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');



   Route::get('/thankyou', 'ConfirmationController@index')->name('thankyou');

});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

