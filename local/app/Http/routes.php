<?php

Route::group(['middleware' => ['web']], function () {

	// Home
	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);

    // Auth front-end
    Route::put('postProductCart', 'HomeController@postProductCart');
    Route::get('checkout', 'HomeController@getCheckout');
    Route::get('before-buy', 'HomeController@getBeforeBuy');
    Route::get('process-buy', 'HomeController@getProcessBuy');
    Route::post('process-buy', 'HomeController@postProcessBuy');
    Route::get('quy-dinh', 'HomeController@getQuydinh');
    Route::get('ho-tro', 'HomeController@getHotro');
    Route::get('profile', 'HomeController@getProfile');
    Route::post('updateProfile', 'HomeController@updateProfile');
	Route::get('history', 'HomeController@getHistory');
    Route::resource('/tim-kiem', 'HomeController@searchData');
    Route::get('orderview/{id}', 'HomeController@showOrder');

    Route::post('/settLogo',['as'       =>'settLogo','uses' => 'HomeController@settLogo']);
    Route::post('/settHotline',['as'       =>'settHotline','uses' => 'HomeController@settHotline']);
    Route::post('/settMuaho',['as'       =>'settMuaho','uses' => 'HomeController@settMuaho']);
    Route::post('/settVanchuyen',['as'       =>'settVanchuyen','uses' => 'HomeController@settVanchuyen']);
    Route::post('/settQD',['as'       =>'settQD','uses' => 'HomeController@settQD']);
    Route::post('/settHT',['as'       =>'settHT','uses' => 'HomeController@settHT']);
    Route::post('/settKMVC',['as'       =>'settKMVC','uses' => 'HomeController@settKMVC']);
    Route::post('/settMinDiscount',['as'       =>'settMinDiscount','uses' => 'HomeController@settMinDiscount']);
    // test pdf
    Route::get('doPdf', 'HomeController@doPdf');

    // Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLoginFront');
	Route::post('auth/login', 'Auth\AuthController@postLoginFront');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

	// Resend routes...
	Route::get('auth/resend', 'Auth\AuthController@getResend');

	Route::get('mind-before', 'HomeController@mindBefore');
	// Admin
	Route::get('admin', [
		'uses' => 'AdminController@admin',
		'as' => 'admin',
		'middleware' => 'admin'
	]);

    Route::get('getsettings', 'HomeController@getsettings');
    Route::group(['prefix' => 'getsettings'], function() {
        Route::get('/',['as'       =>'getsettings','uses' => 'HomeController@getsettings']);
    });
    // Group Drug
    Route::get('groupdrug/order', ['uses' => 'GroupDrugController@indexOrder', 'as' => 'groupdrug.order']);
    Route::get('groupdrug', 'GroupDrugController@indexFront');
    Route::put('postActgroupdrug/{id}', 'GroupDrugController@postActgroupdrug');
    Route::get('groupdrug/search', 'GroupDrugController@search');
    Route::resource('groupdrug', 'GroupDrugController');

	// Drug
	Route::get('drug/order', ['uses' => 'DrugController@indexOrder', 'as' => 'drug.order']);
	Route::get('drug', 'DrugController@indexFront');
	Route::put('postActdrug/{id}', 'DrugController@postActdrug');
	Route::get('drug/search', 'DrugController@search');
    Route::resource('drugs/import', 'DrugController@import');
	Route::resource('drug', 'DrugController');
    Route::get('drugs/export', 'DrugController@export');

    // Mind
    Route::get('mind/order', ['uses' => 'MindController@indexOrder', 'as' => 'mind.order']);
    Route::get('mind', 'MindController@indexFront');
    Route::put('postActmind/{id}', 'MindController@postActmind');
    Route::resource('mind', 'MindController');
    Route::get('minds/export', 'MindController@export');


    // Pharmacies
    Route::get('pharmacies/order', ['uses' => 'PharmaciesController@indexOrder', 'as' => 'pharmacies.order']);
    Route::get('pharmacies', 'PharmaciesController@indexFront');
    Route::put('postActpharmacies/{id}', 'PharmaciesController@postActpharmacies');
    Route::get('pharmacies/search', 'PharmaciesController@search');
    Route::post('postChangeProvince', 'PharmaciesController@postChangeProvince');
    Route::put('postPharStatus', 'PharmaciesController@postPharStatus');
    Route::resource('pharmacies', 'PharmaciesController');

    // Customer
    Route::get('customer/order', ['uses' => 'CustomerController@indexOrder', 'as' => 'customer.order']);
    Route::get('customer', 'CustomerController@indexFront');
    Route::put('postActcustomer/{id}', 'CustomerController@postActcustomer');
    Route::get('customer/search', 'CustomerController@search');
    Route::resource('customer', 'CustomerController');

	// Transaction

    Route::post('postTransactionSend', 'TransactionController@postTransactionSend');

	Route::get('transactions/order', ['uses' => 'TransactionController@indexOrder', 'as' => 'transactions.order']);
	Route::get('transactions', 'TransactionController@indexFront');
	Route::put('postActtransactions', 'TransactionController@postActtransactions');
	Route::get('transactions/search', 'TransactionController@search');
	Route::post('postChangeProvince', 'TransactionController@postChangeProvince');
    Route::get('in-hoa-don', 'TransactionController@in_hoa_don');

    Route::resource('transactions/import', 'TransactionController@import');
    Route::get('transactions/export', 'TransactionController@export');
    Route::get('transactions/exportdrugs', 'TransactionController@exportdrugs');
	Route::resource('transactions', 'TransactionController');


    // Discount
    Route::get('discount/order', ['uses' => 'DiscountController@indexOrder', 'as' => 'discount.order']);
    Route::get('discount', 'DiscountController@indexFront');
    Route::resource('discount', 'DiscountController');

    // Shipping
    Route::get('shipping/order', ['uses' => 'ShippingController@indexOrder', 'as' => 'shipping.order']);
    Route::get('shipping', 'ShippingController@indexFront');
    Route::resource('shipping', 'ShippingController');

	// User
	Route::get('user/sort/{role}', 'UserController@indexSort');

	Route::get('user/roles', 'UserController@getRoles');
	Route::post('user/roles', 'UserController@postRoles');
	Route::put('userseen/{user}', 'UserController@updateSeen');
	Route::resource('user', 'UserController');

    Route::get('administrator', 'Auth\AuthController@getLogin');
    Route::post('administrator', 'Auth\AuthController@postLogin');
    Route::get('administrator/logout', 'Auth\AuthController@getLogout');
    Route::get('administrator/confirm/{token}', 'Auth\AuthController@getConfirm');

    // Resend routes...
    Route::get('administrator/resend', 'Auth\AuthController@getResend');

    // Registration routes...
    Route::get('administrator/register', 'Auth\AuthController@getRegister');
    Route::post('administrator/register', 'Auth\AuthController@postRegister');

	// Password reset link request routes...
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');

});

