<?php
//REDIS
Route::get('/redis', function(){
	$users = cache()->remember('users', 10, function(){
		return ['alex', 'billy']; 
	});

	dd($users);
});

//QUEUES

Route::get('/queues', function(){
	dispatch(new App\Jobs\LogSomething);
});


//ALERT
Route::get('/alert', function(){
	alert()->success('Success', 'Optional');
	return redirect()->route('home');
});

Route::get('/about', function () {
	//Notify funciona de maravilla
	//notify()->flash('You have asdasd in.', 'success', ['timer' => 2000,]);
    return view('about');
});
Route::post('/about', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

//NOTIFICATIONS
Route::get('/notify', function(){
	notify()->flash('You have signed in.', 'success', ['timer' => 2000,]);
	//notify()->flash('You have not signed in.', 'danger');
	return view('welcome');
});

Route::get('/mauri', function(){
	dispatch(new \App\Jobs\LogSomething);
	return view('home');
});

//BLOG
Route::get('/post', function(){
	return view('post.post');
});

Route::get('/post/{post}', [
	'as' => 'post.show',
	'uses' => 'PostController@show',
]);
Route::post('/post/{post}', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/blog', [
	'as' => 'blog',
	'uses' => 'PostsController@index',
]);
Route::post('/blog', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/posts/{tag}', [
	'as' => 'posts.tagged',
	'uses' => 'PostsController@tagged',
]);
Route::post('/posts/{tag}', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));


//MENU
Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index',
]);
Route::post('/', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/policy', function () {
    return view('policy');
});
Route::post('/policy', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/transport', function () {
    return view('transport');
});
Route::post('/transport', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/terms', function () {
    return view('terms');
});
Route::post('/terms', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));



Route::get('/pay', function () {
    return view('pay');
});
Route::post('/pay', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/fiesta', function () {
    return view('fiesta');
});
Route::post('/fiesta', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/buy', function () {
    return view('buy');
});
Route::post('/buy', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

Route::get('/faq', function () {
	//notify()->flash('You have signed in.', 'success', ['timer' => 4000,]);
	//alert()->success('Success', 'Muchas gracias')->autoclose(15000);
    Alert::success('Ahora un pedido se esta haciendo para ti, gracias por tu compra', 'Danke! - Gracias!')->persistent("OK")->autoclose(15000);
    //Alert::success('Random lorempixel.com : <img src="http://lorempixel.com/150/150/">', 'Gracias! - Danke!')->autoclose(15000)->html();
    return view('faq');
});
Route::post('/faq', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);

//SHOPPING CART
Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index',
]);
/*Route::post('/', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));*/

Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart',
]);

Route::get('/adding/{id}', [
	'uses' => 'ProductController@getAddByOne',
	'as' => 'product.addByOne', 
]);

Route::get('/reduce/{id}', [
	'uses' => 'ProductController@getReduceByOne',
	'as' => 'product.reduceByOne',
]);

Route::get('/remove/{id}',[
	'uses' => 'ProductController@getRemoveItem',
	'as' => 'product.remove',
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart',
]);
Route::post('/shopping-cart', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));

//SEARCH
Route::get('/search', [
	'uses' => 'SearchController@getResults',
	'as' => 'search.results',
]);
Route::post('/search', array(
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));








//SESSION
Route::group(['middleware' => ['auth']], function(){

/*
	//VIDEO
	Route::get('/upload', 'VideoUploadController@index');
	Route::post('/upload', 'VideoUploadController@store');

	Route::get('/videos', 'VideoController@index');		
	Route::get('/videos/{video}/edit', 'VideoController@edit');		
	
	Route::post('/videos', 'VideoController@store');		
	Route::delete('/videos/{video}', 'VideoController@delete');		
	Route::put('/videos/{video}', 'VideoController@update');	

////////////
*/
	//SHOPPING CART
	Route::get('/checkout', [ 
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
	]);
	Route::post('/checkout', [ 
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
	]);
///////////
	Route::get('/checkoutsin', [ 
		'uses' => 'ProductController@getCheckoutSin',
		'as' => 'checkoutsin',
	]);
	Route::post('/checkoutsin', [ 
		'uses' => 'ProductController@postCheckoutSin',
		'as' => 'checkoutsin',
	]);

//////////

	Route::get('/rechnung', [ 
		'uses' => 'ProductController@getRechnung',
		'as' => 'rechnung',
	]);
	Route::post('/rechnung', [ 
		'uses' => 'ProductController@postRechnung',
		'as' => 'rechnung',
	]);

//////////

	Route::get('/rechnungsin', [ 
		'uses' => 'ProductController@getRechnungSin',
		'as' => 'rechnungsin',
	]);
	Route::post('/rechnungsin', [ 
		'uses' => 'ProductController@postRechnungSin',
		'as' => 'rechnungsin',
	]);

//////////

	Route::get('/paypal', [ 
		'uses' => 'ProductController@getPaypal',
		'as' => 'paypal',
	]);
	Route::post('/paypal', [ 
		'uses' => 'ProductController@postPaypal',
		'as' => 'paypal',
	]);


	//TCHATTY
	Route::get('/user/{name}', [
		'uses' => 'ProfileController@getProfile',
		'as' => 'profile.index',		
	]);

	Route::get('/profile/edit', [
		'uses' => 'ProfileController@getEdit',
		'as' => 'profile.edit',		
	]);
	Route::post('/profile/edit', [
		'uses' => 'ProfileController@postEdit',
	]);

	Route::get('/friends', [
		'uses' => 'FriendController@getIndex',
		'as' => 'friend.index',		
	]);

	Route::get('/friends/add/{name}', [
		'uses' => 'FriendController@getAdd',
		'as' => 'friend.add',		
	]);	

	Route::get('/friends/accept/{name}', [
		'uses' => 'FriendController@getAccept',
		'as' => 'friend.accept',		
	]);	

	Route::post('/status', [
		'uses' => 'StatusController@postStatus',
		'as' => 'status.post',		
	]);	

	Route::post('/status/{statusId}/reply', [
		'uses' => 'StatusController@postReply',
		'as' => 'status.reply',		
	]);	

	Route::get('/status/{statusId}/likee', [
		'uses' => 'StatusController@getLikee',
		'as' => 'status.likee',		
	]);	

	Route::post('/friends/delete/{name}', [
		'uses' => 'FriendController@postDelete',
		'as' => 'friend.delete',		
	]);	
/*
	//FEEDBACK
	Route::get('/feedbacks', 'FeedbackController@index');
	Route::post('/feedbacks', 'FeedbackController@store');

	Route::post('/feedbacks/{feedback}/likes', 'FeedbackLikeController@store');

	Route::get('/feedback', function () {
	    return view('feedback');
	});
*/
	//CHANNEL
	Route::get('/channel/{channel}/edit', 'ChannelSettingsController@edit');
	Route::put('/channel/{channel}/edit', 'ChannelSettingsController@update');
	Route::post('/channel/{channel}/edit', array(
		'Middleware' => 'LanguageSwitcher',
		'uses' => 'LanguageController@index',
	));
	
	Route::get('/channel/{channel}/orders', [ 
		'uses' => 'ProductController@getProfile',
		'as' => 'users.profile',
	]);
	Route::post('/channel/{channel}/orders', array(
		'Middleware' => 'LanguageSwitcher',
		'uses' => 'LanguageController@index',
	));

	Route::get('/channel/{channel}', 'ChannelController@show');
	Route::post('/channel/{channel}', array(
		'Middleware' => 'LanguageSwitcher',
		'uses' => 'LanguageController@index',
	));

	//IMAGES UPLOAD
	Route::get('/image/upload', [ 
		'uses' => 'ImageController@abrir',
		'as' => 'image.abrir',
	]);

	Route::group(['prefix' => 'image'], function(){
		Route::get('/upload/{name}', [
			'uses' => 'ImageController@index',
			'as' => 'image.index',
		]);
		Route::post('/upload', [
			'uses' => 'ImageController@create',
			'as' => 'image.create',
		]);
	});

/*
	Route::get('/channel/settings', 'UserSettingsController@edit');
		Route::post('/channel/settings', array(
			'Middleware' => 'LanguageSwitcher',
			'uses' => 'LanguageController@index',
		));
	Route::put('/channel/settings', 'UserSettingsController@update');	

	Route::post('/videos/{video}/votes', 'VideoVoteController@create');
	Route::delete('/videos/{video}/votes', 'VideoVoteController@remove');
*/
});