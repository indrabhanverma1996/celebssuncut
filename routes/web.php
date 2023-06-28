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
Route::get('/', function () {
return view('welcome');
});
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(['prefix'=>"admin",'as' => 'admin.','middleware' => ['auth','AdminPanelAccess']], function () {
Route::get('/', 'HomeController@index')->name('home');     
Route::get('/dashboard', 'HomeController@home')->name('dashboard');  
Route::resource('/users', 'Admin\UserController');
Route::get('/celebrity', 'Admin\UserController@celebrity');
Route::resource('/roles', 'Admin\RoleController');
Route::resource('/permissions', 'Admin\PermissionController')->except(['show']);
Route::get('Category', 'Admin\CategoryController@index')->name('Category');
Route::get('category/create', 'Admin\CategoryController@create')->name('create');
Route::get('category/store', 'Admin\CategoryController@store')->name('store');
Route::get('category/edit/{id}', 'Admin\CategoryController@edit')->name('edit');
Route::get('category/update/{id}', 'Admin\CategoryController@update')->name('update');
Route::get('category/delete/{id}', 'Admin\CategoryController@delete')->name('delete');
Route::get('organization', 'Admin\AdminController@organization')->name('index');
Route::get('organization/create', 'Admin\AdminController@organizationCreate')->name('create');
Route::post('organization/store', 'Admin\AdminController@organizationstore')->name('store');
Route::get('organization/edit/{id}', 'Admin\AdminController@organizationEdit')->name('edit');
Route::post('organization/update/{id}', 'Admin\AdminController@organizationUpdate')->name('update');
Route::DELETE('organization/delete/{id}', 'Admin\AdminController@organizationDelete')->name('delete');
Route::resource('onfido', 'Admin\OnfidoController');
});
Route::group(['prefix'=>"Celeberity",'as' => 'Celeberity.'], function () {
Route::resource('Charity', 'Admin\CharityController');
Route::get('subscription', 'Admin\SubscriptionController@index')->name('subscription');
Route::get('subscription/create', 'Admin\SubscriptionController@create')->name('create');
Route::get('subscription/store', 'Admin\SubscriptionController@store')->name('store');
Route::get('subscription/edit/{id}', 'Admin\SubscriptionController@edit')->name('edit');
Route::get('subscription/update/{id}', 'Admin\SubscriptionController@update')->name('update');
Route::get('subscription/delete/{id}', 'Admin\SubscriptionController@delete')->name('delete');

//plan

Route::get('subscription/plan', 'Admin\SubscriptionController@subscription')->name('subscription');
Route::get('subscription/create', 'Admin\SubscriptionController@plancreate')->name('create');
Route::get('subscription/store', 'Admin\SubscriptionController@planstore')->name('store');
Route::get('subscription/edit/{id}', 'Admin\SubscriptionController@planedit')->name('edit');
Route::get('subscription/update/{id}', 'Admin\SubscriptionController@planupdate')->name('update');
Route::get('subscription/delete/{id}', 'Admin\SubscriptionController@plandestroy')->name('delete');
});
Route::group(['middleware' => ['auth','user_pannel_access']], function () {
Route::get('/', 'HomeController@index')->name('home');
Route::get('/stories/create', 'HomeController@stories')->name('stories');
Route::get('/stories/videos', 'HomeController@clips')->name('clips');

Route::get('/profile', 'SettingController@profile')->name('profile');
Route::get('/profile/{id}', 'SettingController@celeberityprofile')->name('celeberityprofile');
Route::get('/my/settings/profile', 'SettingController@editProfile')->name('profile');
Route::get('/my/settings/account', 'SettingController@account')->name('account');
Route::post('save-photo', 'SettingController@save');
Route::post('save-cover-photo', 'SettingController@saveCoverImage');
Route::post('save-userdetails', 'SettingController@saveuserDetails');
Route::get('/my/banking', 'ProfileController@banking')->name('banking');
Route::post('savebankdetails', 'ProfileController@savebankdetails')->name('savebankdetails');
Route::get('age-verifiying', 'ProfileController@proccessing_age_verification')->name('age-verifiying');
Route::get('age-verification', 'ProfileController@age_verification')->name('age-verification');
Route::get('card-number','ProfileController@cardno');
Route::post('addCard','ProfileController@addCard');
Route::post('changePassword','ProfileController@changePassword');
Route::post('onfidoapi', 'ProfileController@onfidoapi')->name('onfidoapi');
//Save post
Route::post('Realvideo', 'PostController@postRealvideo');
Route::post('createpost', 'PostController@store');
Route::post('singlepost', 'PostController@singlepost');
Route::post('poll', 'PostController@pollStore');
Route::DELETE('/posts/delete/{postId}/','PostController@destroy');
//Like posts
Route::post('like','LikeController@likePost');
Route::post('commentLike','LikeController@commentLike');
Route::post('replycommentLike','LikeController@replycommentLike');
Route::post('multilikepost','LikeController@multipostlike'
);
//Post Comment 
Route::post('comment','PostCommentController@addComment')->name('comment');

Route::get('/{postId}/comment/remove',[PostCommentController::class,'removeComment']);
Route::post('replycomment','PostCommentController@replycomment')->name('replycomment');
Route::post('/comment/remove','PostCommentController@removeComment');
Route::post('multipostcomment','PostCommentController@multipostcomment')->name('multipostcomment');


Route::get('getState','MeassageController@get_states');

//Payment section

Route::post('gocardlessPayment','PaymentController@index');

//messsge

Route::get('my/chats/','MeassageController@index')->name('chats');
Route::get('my/chats/send','MeassageController@user')->name('send');
Route::get('my/chats/chat/{id}','MeassageController@chat')->name('send');
Route::post('message/','MeassageController@message')->name('message');
Route::get('recentchat/','MeassageController@recentchat')->name('recentchat');
Route::get('search-user','MeassageController@searchUser')->name('search-user');
Route::DELETE('subscribeduser/Destroy/{id}','MeassageController@deleteSubscribeduser');

//Notification
Route::get('my/notifications','NotificationContoller@index')->name('notification');
Route::get('homeNotification','HomeController@index')->name('homeNotification');
//Subscriptions
Route::get('my/subscriptions','SubscriptionController@subscription')->name('subscription');
Route::post('subscribe','SubscriptionController@subscribe')->name('subscribe');
//Links
Route::get('liveuncuttv','LinkController@liveuncuttv');
Route::get('megastar','LinkController@megastar');

Route::get('payperclick','LinkController@payperclick');
Route::get('payperview','LinkController@payperview');
Route::get('poll','LinkController@poll');
Route::get('uncutvipclub','LinkController@uncutvipclub');
Route::get('vipmembership','LinkController@vipmembership');
Route::get('uncutsubscription','LinkController@uncutsubscription');
//
});
Route::get('auth/{provider}', 'Auth\SocialLoginController@redirectToGoogle');
Route::get('auth/{provider}/callback', 'Auth\SocialLoginController@handleGoogleCallback');