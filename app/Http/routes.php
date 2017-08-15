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

	Route::get('history', 'HomeController@getHistory');


	// Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLoginFront');
	Route::post('auth/login', 'Auth\AuthController@postLoginFront');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

	// Resend routes...
	Route::get('auth/resend', 'Auth\AuthController@getResend');

	Route::get('mind-before', 'HomeController@mindBefore');

	//Route::get('language/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');

	// Admin
	Route::get('admin', [
		'uses' => 'AdminController@admin',
		'as' => 'admin',
		'middleware' => 'admin'
	]);

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

	Route::resource('drug', 'DrugController');

    // Mind
    Route::get('mind/order', ['uses' => 'MindController@indexOrder', 'as' => 'mind.order']);
    Route::get('mind', 'MindController@indexFront');
    Route::put('postActmind/{id}', 'MindController@postActmind');

    Route::resource('mind', 'MindController');

    // Pharmacies
    Route::get('pharmacies/order', ['uses' => 'PharmaciesController@indexOrder', 'as' => 'pharmacies.order']);
    Route::get('pharmacies', 'PharmaciesController@indexFront');
    Route::put('postActpharmacies/{id}', 'PharmaciesController@postActpharmacies');
    Route::get('pharmacies/search', 'PharmaciesController@search');

    Route::post('postChangeProvince', 'PharmaciesController@postChangeProvince');

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

	Route::resource('transactions', 'TransactionController');


	// Blog
	Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
	Route::get('articles', 'BlogController@indexFront');
	Route::get('blog/tag', 'BlogController@tag');
	Route::get('blog/search', 'BlogController@search');

	Route::put('postseen/{id}', 'BlogController@updateSeen');
	Route::put('postactive/{id}', 'BlogController@updateActive');


	Route::resource('blog', 'BlogController');

	// Comment
	Route::resource('comment', 'CommentController', [
		'except' => ['create', 'show']
	]);

	Route::put('commentseen/{id}', 'CommentController@updateSeen');
	Route::put('uservalid/{id}', 'CommentController@valid');


	// Contact
	Route::resource('contact', 'ContactController', [
		'except' => ['show', 'edit']
	]);


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
//Route::auth();
//
//Route::get('/home', 'HomeController@index');
