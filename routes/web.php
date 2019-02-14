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

//Landing Page

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/courses', 'CourseController@index')->name('courses.index');

Route::get('/course/create', 'CourseController@create')->name('courses.create');

Route::get('/course/{course}', 'CourseController@show')->name('courses.show');

Route::post('/course/store', 'CourseController@store')->name('courses.store');

Route::post('/course/join', 'CourseController@join')->name('courses.join');

Route::get('/resources', 'ResourceController@index')->name('resources.index');

Route::get('/resource/create/{course_id}', 'ResourceController@create')->name('resources.create');

Route::post('/resource/store', 'ResourceController@store')->name('resources.store');

Route::get('/notes', 'NoteController@index')->name('notes.index');

Route::get('/content/create/{course_id}', 'CurriculumController@create')->name('curricula.create');

Route::post('/content/store', 'CurriculumController@store')->name('curricula.store');

Route::get('/{user}', function(App\User $user) {
    return view('profile.index', compact('user'));
});

