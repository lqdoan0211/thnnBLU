<?php

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
//Frontend 
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/lien-he','HomeController@lienhe');

//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet/{khoahoc_id}','KhoahocController@details_khoahoc');

//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

//Send Mail 
Route::get('/send-mail','HomeController@send_mail');

//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');




//Checkout
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');

Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Order

Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
Route::get('/delete-order/{order_code}', 'CheckOutController@delete_order' );


//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');
Route::get('/delete-slide/{slider_id}', 'SliderController@delete_slide' );


//khoa hoc tin hoc
Route::get('/add-khoahoc','KhoahocController@add_khoahoc');
Route::get('/edit-khoahoc/{khoahoc_id}','KhoahocController@edit_khoahoc');

Route::get('/delete-khoahoc-th/{khoahoc_id}','KhoahocController@delete_khoahoc_th');
Route::get('/delete-khoahoc-av/{khoahoc_id}','KhoahocController@delete_khoahoc_av');

Route::get('/all-khoahoc-av','KhoahocController@all_khoahoc_av');
Route::get('/all-khoahoc-th','KhoahocController@all_khoahoc_th');

Route::get('/unactive-khoahoc-th/{khoahoc_id}','KhoahocController@unactive_khoahoc_th');
Route::get('/active-khoahoc-th/{khoahoc_id}','KhoahocController@active_khoahoc_th');

Route::get('/unactive-khoahoc-av/{khoahoc_id}','KhoahocController@unactive_khoahoc_av');
Route::get('/active-khoahoc-av/{khoahoc_id}','KhoahocController@active_khoahoc_av');

Route::post('/save-khoahoc','KhoahocController@save_khoahoc');
Route::post('/update-khoahoc/{khoahoc_id}','KhoahocController@update_khoahoc');
Route::get('/download', 'KhoahocController@getDownload');

//dang ky
Route::get('/show-dang-ky/{khoahoc_id}/{customers_id}','DangkyController@show_dangky');
Route::get('/add-to-dangky/{khoahoc_id}/{customers_id}','DangkyController@add_dangky');
Route::post('/update-hocvien-dangky/{customers_id}','DangkyController@update_hocvien_dangky');
Route::post('/exp-dangky','DangkyController@export_csv');

Route::get('/all-dangky','DangkyAdminController@all_dangky_ok');
Route::get('/unactive-dangky/{khoahoc_id}','DangkyAdminController@unactive_dangky');
Route::get('/active-dangky/{khoahoc_id}','DangkyAdminController@active_dangky');
Route::get('/unactive-dangky-chitiet/{dangky_id}','DangkyAdminController@unactive_dangky_chitiet');
Route::get('/active-dangky-chitiet/{dangky_id}','DangkyAdminController@active_dangky_chitiet');
Route::get('/delete-dangky/{dangky_code}','DangkyAdminController@delete_dangky');


//hoc vien
Route::get('/edit-hocvien/{customers_id}','HocvienController@edit_hocvien');
Route::post('/update-hocvien/{customers_id}','HocvienController@update_hocvien');
Route::get('/show-hocvien/{customers_id}','HocvienController@show_hocvien');
Route::get('/doimatkhau/{customers_id}','HocvienController@reset_password');
Route::get('/delete-hocvien/{customers_id}','HocvienAdminController@delete_hocvien');
Route::get('/all-hocvien','HocvienAdminController@all_hocvien');
