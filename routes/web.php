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

    Route::get('post/verify/register','VerifyRegisterPost@index')->name('post.VerifyRegister');
    Route::get('post/verify/register/list/{id}','VerifyRegisterPost@list')->name('post.VerifyRegister.list');
    Route::get('post/verify/register/evaluate/{id}','VerifyRegisterPost@evaluate')->name('post.VerifyRegister.evaluate');
    Route::get('post/verify/register/infoStudent/{id}','VerifyRegisterPost@infoStudent')->name('post.VerifyRegister.infoStudent');

    Route::get('post/deadline','PostController@deadline')->name('post.deadline');
    Route::get('post/saveDeadline/{id?}','PostController@saveDeadline')->name('post.saveDeadline');

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
    Route::get('comment/delete/{id}','CommentController@deleteComment')->name('comment.delete');

    Route::get('verify','VerifyPostController@index')->name('verify');
    Route::get('verify/list/{id}','VerifyPostController@list')->name('verify.list');
    Route::get('verify/evaluate/{id}','VerifyPostController@evaluate')->name('verify.evaluate');
    Route::post('verify/note/{id}','VerifyPostController@note')->name('verify.note');

    Route::get('confirm','ConfirmPostController@index')->name('confirm');
    Route::get('confirm/list/{id}','ConfirmPostController@list')->name('confirm.list');
    Route::post('confirm/evaluate','ConfirmPostController@evaluate');
    Route::get('confirm/evaluate/{id}','ConfirmPostController@evaluate')->name('confirm.evaluate');
    Route::get('confirm/detail/{id}','ConfirmPostController@detail')->name('confirm.detail');

    Route::get('protect/post','ProtectPostController@index')->name('protect.post');
    Route::get('protect/post/list/{id}','ProtectPostController@list')->name('protect.list');
    Route::post('protect/post/evaluate','ProtectPostController@evaluate');
    Route::get('protect/post/evaluate/{id}','ProtectPostController@evaluate');
    Route::post('protect/post/note/{id}','ProtectPostController@note')->name("protect.note");

    Route::get('score/post','ScorePostController@index')->name('score.post');
    Route::post('score/post/save','ScorePostController@save')->name('score.save');

    Route::get('messenger/lecturer/{id}','MessengerController@lecturer')->name('lecturer.messenger');
    Route::get('messenger/assessor/{id}','MessengerController@assessor')->name('assessor.messenger');
    Route::post('messenger/assessor/save/{id}','MessengerController@save')->name('assessor.messenger.save');


});

Route::prefix('student')->middleware('CheckLogin','CheckIsStudent')->group(function () {
    Route::get('information', 'StudentController@informationStudent')->name('student.information');
    Route::get('edit', 'StudentController@edit')->name('student.edit');
    Route::post('save/{id}', 'StudentController@save')->name('student.save');
    Route::get('register/{user_id}/{post_id}', 'StudentController@register')->name('student.register');
    Route::get('post','StudentController@post')->name('student.post');
    Route::get('post/delete', 'StudentController@deletePost')->name('student.post.delete');
    Route::get('viewpost', 'StudentController@viewpost')->name('student.post.viewpost');
    Route::get('lecturer/{id}', 'StudentController@lecturer')->name('student.lecturer');

    Route::get('report', 'ReportController@index')->name('student.report.index');
    Route::get('report/create/{topic_id}', 'ReportController@create')->name('student.report.create');
    Route::get('report/eidt/{topic_id}', 'ReportController@edit')->name('student.report.edit');
    Route::get('report/download{topic_id}', 'ReportController@download')->name('student.report.download');
    Route::post('report/save/{id?}', 'ReportController@save')->name('student.report.save');

    Route::get('comment/{topic_id}', 'CommentController@commentStudent')->name('student.comment');
    Route::post('comment/create', 'CommentController@createCommentStudent')->name('student.comment.create');
    Route::get('comment/delete/{id}','CommentController@deleteComment')->name('student.comment.delete');

    Route::get('messenger','MessengerController@student')->name('student.messenger');
    Route::post('messenger/save/{id}','MessengerController@save');


});

