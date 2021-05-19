<?php

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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', ['as' => 'public.home',   'uses' => 'UserController@index']);
    Route::get('/terms', 'TermsController@terms')->name('terms');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController',
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});


/*-----------------------------------------------

// Registered, activated, and is admin routes.

-----------------------------------------------*/
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {

    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);
    
    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);   

     Route::resource('New_Users', 'Admin\NewUsersController', [
        'names' => [
            'index'   => 'New_Users',
            'destroy' => 'New_Users.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('captains', 'Admin\CaptainsController', [
        'names' => [
            'index'   => 'captains',
            'destroy' => 'captains.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('players', 'Admin\PlayersController', [
        'names' => [
            'index'   => 'players',
            'destroy' => 'players.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('blogs', 'Admin\BlogsController', [
        'names' => [
            'index'   => 'blogs',
            'destroy' => 'blogs.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('announcements', 'Admin\AnnouncementsController', [
        'names' => [
            'index'   => 'announcements',
            'destroy' => 'announcements.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);


    Route::resource('admin/profile', 'Admin\AdminProfileController', [
        'names' => [
            'index'   => 'admin/profile',
            'update'   => 'admin/profile.update',
            'destroy' => 'admin/profile.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);


    Route::post('search-users', 'UsersManagementController@search')->name('search-users');


    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

});

/*-----------------------------------------------

Role for Authenticated and is captain

-----------------------------------------------*/

Route::group(['middleware' => ['auth', 'activated', 'role:captain', 'activity', 'twostep', 'checkblocked']], function () {

    Route::resource('captain/profile', 'Captain\CaptainProfileController', [
        'names' => [
            'index'   => 'captain/profile',
            'update'   => 'captain/profile.update',
            'destroy' => 'captain/profile.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);


    Route::post('search-users', 'UsersManagementController@search')->name('search-users');
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

});
/*-----------------------------------------------

Role for Authenticated and is Player

-----------------------------------------------*/

Route::group(['middleware' => ['auth', 'activated', 'role:player', 'activity', 'twostep', 'checkblocked']], function () {



    Route::resource('all_announcements', 'Player\AnnouncementsController', [
        'names' => [
            'index'   => 'all_announcements',
            'destroy' => 'all_announcements.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
   
    Route::resource('all_blogs', 'Player\BlogsController', [
        'names' => [
            'index'   => 'all_blogs',
            'destroy' => 'all_blogs',
        ],
        'except' => [
            'deleted',
        ],
    ]);

        Route::resource('player/profile', 'Player\PlayerProfileController', [
        'names' => [
            'index'   => 'player/profile',
            'update'   => 'player/profile.update',
            'destroy' => 'player/profile.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);



    Route::post('search-users', 'UsersManagementController@search')->name('search-users');
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

});

