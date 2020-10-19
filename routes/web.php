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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@index')->middleware('CheckLogin')->name('home');
Route::get('login','LoginController@getLogin')->name('login');
Route::post('login','LoginController@postLogin')->name('login');
Route::get('logout','LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('CheckRole')->group(function () {

        Route::get('post','PostController@index')->name('post');
        Route::get('post/create','PostController@create')->name('post.create');
        Route::get('post/edit/{id}','PostController@edit')->name('post.edit');
        Route::get('post/delete/{id}','PostController@delete')->name('post.delete');
        Route::post('post/save/{id?}','PostController@save')->name('post.save');

        Route::get('user','UserController@index')->name('user');
        Route::get('user/create','UserController@create')->name('user.create');
        Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
        Route::get('user/{id}','UserController@delete')->name('user.delete');
        Route::post('user/save/{id?}','UserController@save')->name('user.save');
        Route::post('import','userController@import')->name('user.import');

        Route::get('list','UserPostController@index')->name('list');
        Route::get('list/delete','UserPostController@delete')->name('list.delete');

        Route::get('report','TopicReportController@index')->name('topic.report');
        Route::get('report/create','TopicReportController@create')->name('topic.report.create');
        Route::get('report/edit','TopicReportController@edit')->name('topic.report.edit');
        Route::get('report/delete','TopicReportController@delete')->name('topic.report.delete');
        Route::get('report/detail','TopicReportController@detailReport')->name('topic.report.detailReport');
        Route::get('report/download/{id}','TopicReportController@download')->name('topic.report.download');
        Route::post('report/save/{id?}', 'TopicReportController@save')->name('topic.report.save');

        Route::post('comment/create','CommentController@create')->name('comment.create');
        Route::get('comment/{id}','CommentController@comment')->name('comment');


});



Route::prefix('student')->middleware('CheckLogin','CheckIsStudent')->group(function () {
    Route::get('information', 'StudentController@informationStudent')->name('student.information');
    Route::get('edit', 'StudentController@edit')->name('student.edit');
    Route::post('save/{id}', 'StudentController@save')->name('student.save');
    Route::get('information', 'StudentController@informationStudent')->name('student.information');
    Route::get('register/{user_id}/{post_id}', 'StudentController@register')->name('student.register');
    Route::get('post', 'StudentController@post')->name('student.post');
    Route::get('post/delete', 'StudentController@deletePost')->name('student.post.delete');
    Route::get('viewpost', 'StudentController@viewpost')->name('student.post.viewpost');

    Route::get('report', 'ReportController@index')->name('student.report.index');
    Route::get('report/create/{topic_id}', 'ReportController@create')->name('student.report.create');
    Route::get('report/eidt/{topic_id}', 'ReportController@edit')->name('student.report.edit');
    Route::get('report/download{topic_id}', 'ReportController@download')->name('student.report.download');
    Route::post('report/save/{id?}', 'ReportController@save')->name('student.report.save');

    Route::get('comment/{topic_id}', 'CommentController@commentStudent')->name('student.comment');
    Route::post('comment/create', 'CommentController@createCommentStudent')->name('student.comment.create');

});




