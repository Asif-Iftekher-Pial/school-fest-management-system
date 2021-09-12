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
*/

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/', 'MainController@index');

Route::get('/mission_&_vission', 'MainController@mission');
Route::get('/terms_&_conditions', 'MainController@conditions');
Route::get('/chairman_message', 'MainController@message');
Route::get('/about_us', 'MainController@about');

Route::get('/contact_us', 'MainController@contact');
Route::get('/our_partners', 'MainController@partner');
Route::get('/registration_process', 'MainController@process');
Route::get('/registration_notice', 'MainController@notice');

Route::get('/stem-fest-2020', 'MainController@stem2020');


Route::get('/photo-gallery', 'MainController@photoGallery');
Route::get('/video-gallery', 'MainController@videoGallery');

Auth::routes();

Route::get('/school-dashboard', 'HomeController@index')->name('home');
Route::get('/school-profile', 'School\ProfileController@viewProfile');
Route::get('/school-profile/edit/{id}', 'School\ProfileController@editProfile');
Route::patch('/school-profile/update/{id}', 'School\ProfileController@updateProfile');

Route::get('/student-groups', 'School\StudentGroupController@index');
Route::get('/student-groups/create', 'School\StudentGroupController@groupCreate');
Route::post('/student-groups/store', 'School\StudentGroupController@groupStore');
Route::get('/student-groups/edit/{id}', 'School\StudentGroupController@groupEdit');
Route::patch('/student-groups/update/{id}', 'School\StudentGroupController@groupUpdate');

Route::get('/students', 'School\StudentController@index');
Route::get('/students/create', 'School\StudentController@create');
Route::post('/students/store', 'School\StudentController@store');
Route::get('/students/edit/{id}', 'School\StudentController@edit');
Route::patch('/students/update/{id}', 'School\StudentController@update');

Route::get('/get-group', 'School\StudentGroupController@getgroups');
Route::get('/get-class', 'School\StudentGroupController@getclass');

// Admin Routes

Route::get('/admin', 'Admin\Auth\AdminLoginController@showAdminLogin')->name('admin.login');
Route::post('/admin', 'Admin\Auth\AdminLoginController@Login');


Route::get('/admin/home', 'Admin\Auth\AdminController@index');
Route::get('/admin/user_list', 'Admin\Auth\AdminController@userList');
Route::get('/admin/register', 'Admin\Auth\AdminController@register');
Route::post('/admin/register', 'Admin\Auth\AdminController@registerUser');
Route::get('/admin/user/{id}/edit', 'Admin\Auth\AdminController@editUser');
Route::patch('/admin/user/{id}', 'Admin\Auth\AdminController@updateUser');
Route::get('/admin/user/changepassword', 'Admin\Auth\AdminController@changeUserPassword');
Route::patch('/admin/changepassword/{id}', 'Admin\Auth\AdminController@updatePassword');

Route::get('/admin/school-list', 'Admin\SchoolController@index');
Route::get('/admin/school/profile/{id}', 'Admin\SchoolController@schoolProfile');
Route::get('/admin/school/{id}/edit', 'Admin\SchoolController@schoolEdit');
Route::patch('/admin/school/{id}', 'Admin\SchoolController@schoolUpdate');
Route::get('/admin/students-group-list', 'Admin\SchoolController@studentGroup');
 
Route::get('/admin/students-list', 'Admin\StudentController@index');


Route::resource('/admin/events', 'Admin\EventController');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/groups', 'Admin\GroupController');
Route::resource('/admin/sponsors', 'Admin\SponsorController');
Route::resource('/admin/sliderimages', 'Admin\SliderImageController');
Route::resource('/admin/albums', 'Admin\AlbumController');
Route::resource('/admin/albumimages', 'Admin\ImageController');
Route::resource('/admin/committees', 'Admin\CommitteeController');
Route::resource('/admin/videogallery', 'Admin\VideoGalleryController');


Route::resource('/admin/pageSetup','Admin\PageController');
Route::resource('/admin/mission','Admin\MissionVissionController');
Route::resource('/admin/chairman','Admin\ChairmanMessageController');


Route::get('/{any}', function ($any) {

  return Redirect::to('/');

})->where('any', '.*');
