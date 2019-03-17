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

Route::get('/about', function() {
    return view('about');
})->middleware('guest');

Route::get('/contact', function() {
    return view('contact');
})->middleware('guest');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/courses', 'CourseController@index')->name('courses.index');

Route::group(['prefix' => 'course', 'middleware' => 'auth'], function(){
    Route::get('/create', 'CourseController@create')->name('courses.create');
    Route::get('/{course}', 'CourseController@show')->name('courses.show');
    Route::post('/store', 'CourseController@store')->name('courses.store');
    Route::get('/edit/{course}', 'CourseController@edit')->name('courses.edit');
    Route::put('/update/{course}', 'CourseController@update')->name('courses.update');
    Route::post('/join', 'CourseController@join')->name('courses.join');
    Route::put('/unpublish/{course}', 'CourseController@unpublish')->name('courses.unpublish');
    Route::put('/publish/{course}', 'CourseController@publish')->name('courses.publish');
    Route::get('/course/search', 'CourseController@search')->name('courses.search');
});

Route::get('/resources', 'ResourceController@index')->name('resources.index');

Route::get('/resource/create/{course_id}', 'ResourceController@create')->name('resources.create');

Route::post('/resource/store', 'ResourceController@store')->name('resources.store');

Route::delete('/resource/delete/{resource}', 'ResourceController@destroy')->name('resources.destroy');

Route::get('/notes', 'NoteController@index')->name('notes.index');

Route::get('/notes/create', 'NoteController@create')->name('notes.create');

Route::post('/notes/store', 'NoteController@store')->name('notes.store');

Route::get('/notes/show/{note}', 'NoteController@show')->name('notes.show');

Route::get('/content/create/{course_id}', 'CurriculumController@create')->name('curricula.create');

Route::post('/content/store', 'CurriculumController@store')->name('curricula.store');

Route::get('/content/{curriculum}', 'CurriculumController@show')->name('curricula.show');

Route::put('/content/update/{curriculum}', 'CurriculumController@update')->name('curricula.update');

Route::delete('/content/delete/{curriculum}', 'CurriculumController@destroy')->name('curricula.destroy');

Route::get('/announcement/create/{course_id}', 'UpdateController@create')->name('updates.create');

Route::post('/announcement/store', 'UpdateController@store')->name('updates.store');

Route::get('/{user}','ProfileController@index')->name('profiles.index');

Route::get('/{user}/edit', 'ProfileController@edit')->name('profiles.edit');

Route::put('/{user}/edit/update', 'ProfileController@update')->name('profiles.update');

Route::get('/download/{file}', function($file)
{
    $path = storage_path().'/'.'app'.'/public/uploads/'.$file;
    if (file_exists($path)) {
        return response()->download($path);
    }
});

Route::get('/document/{document}', function(App\Resource $document) {
    $path = storage_path().'/'.'app'.'/public/uploads/'.$document->file_url;
    if (file_exists($path)) {
        return view('document', ['url' => $path]);
    } else {
        abort(404);
    }
})->name('document.preview');

