<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','pageController@index');

//authentication admin pages
Route::get('auth/login','adminAuthController@getLogin');
Route::post('auth/login','adminAuthController@postLogin');
Route::get('auth/logout','adminAuthController@logout');

//client
Route::get('/newletters/{alias}','pageController@newletters_detail');
Route::get('/categories/{alias}','pageController@newletter_list');


// Administrator
Route::group(['prefix' => 'admin','middleware'=>'adminAuth'], function() {
    
    Route::get('/','adminController@index');

    //Quản lý tin tức
    Route::group(['prefix' => 'new'], function() {
    	//create new
        Route::get('/create','adminNewController@create')->name('get_create_new');
        Route::post('/create','adminNewController@postCreate');
		
		//Update new
		Route::get('/edit/{id}','adminNewController@store');
		Route::post('/edit/{id}','adminNewController@postStore');

        //browse news
        Route::get('/browse','adminNewController@browse')->name('get_browse');
        Route::get('/browse/multi/{data}','adminNewController@browse_multi_actived');

        //publish news
        Route::get('/publish','adminNewController@publish')->name('get_publish');
        Route::get('/publish/multi/{data}','adminNewController@publish_multi_actived');

        // published news
        Route::get('/published','adminNewController@published')->name('get_published');


        //draft new
        Route::get('/draft','adminNewController@draft')->name('get_draft');
        Route::post('/draft','adminNewController@postDraft');

        //move draft news to trash
        Route::get('/delete/{id}','adminNewController@moveToTrash')->name('moveToTrash_one');
        Route::get('/delete/multi/{data}','adminNewController@moveToTrash_multi')->name('moveToTrash_multi');

        Route::get('/permanently/delete/{id}','adminNewController@permanentlyDelete')->name('delete_permanently_one');
        Route::get('/permanently/delete/multi/{data}','adminNewController@permanentlyDelete_multi')->name('delete_permanently_multi');

        //trash
        Route::get('/trash','adminNewController@trash')->name('get_trash');

        //search
        Route::get('/search','adminNewController@search')->name('get_search');
        Route::post('/search','adminNewController@postSearch');
    });

    // Quản lý loại tin
    Route::group(['prefix' => 'category'], function() {

        Route::get('/','adminCategoryController@index');

        //Them moi chuyen muc
        Route::get('/create','adminCategoryController@create')->name('get_create_category');
        Route::post('/create','adminCategoryController@postCreate');

        //Update categories
        Route::get('/edit/{id}','adminCategoryController@store')->where('id','[0-9]+');
        Route::post('/edit/{id}','adminCategoryController@postStore')->where('id','[0-9]+');

        //Trash
        Route::get('/trash','adminCategoryController@trash');
        Route::get('/delete/{id}','adminCategoryController@moveToTrash');
        Route::get('/delete/multi/{data}','adminCategoryController@moveToTrashMulti');

        Route::get('/delete/permanently/{id}','adminCategoryController@Delete');
        Route::get('/delete/permanently/multi/{data}','adminCategoryController@DeleteMulti');
    });

    //Quản lý cán bộ
    Route::group(['prefix'=>'employee'],function(){
        Route::get('/','adminEmployeeController@index')->name('manager_employee');

        Route::get('/create','adminEmployeeController@create')->name('create_employee');
        Route::post('/create','adminEmployeeController@postCreate');

        Route::get('/edit/{id}','adminEmployeeController@store');
        Route::post('/edit/{id}','adminEmployeeController@postStore');

        Route::get('/delete/{id}','adminEmployeeController@moveToTrash');
        Route::get('/delete/multi/{data}','adminEmployeeController@moveToTrash_multi');

        Route::get('/trash','adminEmployeeController@trash')->name('trash_employee');

        //Xóa vĩnh viễn
        Route::get('/permanently/delete/{id}','adminEmployeeController@destroy');
        Route::get('/permanently/delete/multi/{data}','adminEmployeeController@destroy_multi');

        //ajax
        Route::get('/ajax/getSubject/{facultyID}','adminEmployeeController@getSubject');
    });

    //Quản lý khoa
    Route::group(['prefix' => 'faculty'], function() {
        Route::get('/','adminFacultyController@index')->name('manager_faculty');

        Route::get('/create','adminFacultyController@create')->name('create_faculty');
        Route::post('/create','adminFacultyController@postCreate');

        Route::get('/edit/{id}','adminFacultyController@store');
        Route::post('/edit/{id}','adminFacultyController@postStore');

        Route::get('/delete/{id}','adminFacultyController@moveToTrash');
        Route::get('/delete/multi/{data}','adminFacultyController@moveToTrash_multi');

        Route::get('/trash','adminFacultyController@trash')->name('trash_faculty');

        Route::get('/permanently/delete/{id}','adminFacultyController@destroy');
        Route::get('/permanently/delete/multi/{data}','adminFacultyController@destroy_multi');
    });

    //Quản lý bộ môn - phòng - ban
    Route::group(['prefix'=>'subject'],function(){
        Route::get('/','adminSubjectController@index')->name('manager_subject');

        Route::get('/create','adminSubjectController@create')->name('create_subject');
        Route::post('/create','adminSubjectController@postCreate');

        Route::get('/edit/{id}','adminSubjectController@store');
        Route::post('/edit/{id}','adminSubjectController@postStore');

        Route::get('/delete/{id}','adminSubjectController@moveToTrash');
        Route::get('/delete/multi/{data}','adminSubjectController@moveToTrash_multi');

        Route::get('/trash','adminSubjectController@trash')->name('trash_subject');

        Route::get('/permanently/delete/{id}','adminSubjectController@destroy');
        Route::get('/permanently/delete/multi/{data}','adminSubjectController@destroy_multi');
    });

    //Quản lý đề tài nghiên cứu khoa học
    Route::group(['prefix'=>'sciencestudy'],function(){

        Route::get('/','adminSciencestudyController@index')->name('manager_sciencestudy');

        Route::get('/create','adminSciencestudyController@create')->name('create_sciencestudy');
        Route::post('/create','adminSciencestudyController@postCreate');

        Route::get('/edit/{id}','adminSciencestudyController@store');
        Route::post('/edit/{id}','adminSciencestudyController@postStore');

        Route::get('/delete/{id}','adminSciencestudyController@destroy');
        Route::get('/delete/multi/{data}','adminSciencestudyController@destroy_multi');
    });

    //Quản lý loại tài liệu
    Route::group(['prefix'=>'documenttype'],function(){
        Route::get('/','adminDocumentTypeController@index')->name('manager_documenttype');

        Route::get('/create','adminDocumentTypeController@create')->name('create_documenttype');
        Route::post('/create','adminDocumentTypeController@postCreate');

        Route::get('/delete/{id}','adminDocumentTypeController@destroy');
        Route::get('/delete/multi/{data}','adminDocumentTypeController@destroy_multi');

        Route::get('/edit/{id}','adminDocumentTypeController@store');
        Route::post('/edit/{id}','adminDocumentTypeController@postStore');

        //ajax
        Route::get('ajax/allid','adminDocumentTypeController@allid');
    });

    //Quản lý văn bản
    Route::group(['prefix'=>'document'],function(){
        Route::get('/','adminDocumentController@index')->name('manager_document');

        Route::get('/create','adminDocumentController@create')->name('create_document');
        Route::post('/create','adminDocumentController@postCreate');

        Route::get('/edit/{id}','adminDocumentController@store');
        Route::post('/edit/{id}','adminDocumentController@postStore');

        Route::get('/delete/{id}','adminDocumentController@destroy');
        Route::get('/delete/multi/{data}','adminDocumentController@destroy_multi');

        //ajax
        Route::get('ajax/allid','adminDocumentController@allid');
    });

    //Quản lý file đính kèm
    Route::group(['prefix'=>'file'],function(){
       Route::get('/','adminFileController@index')->name('manager_file');

        Route::post('/create','adminFileController@postCreate');

        Route::get('/edit/{id}','adminFileController@store');
        Route::post('/edit/{id}','adminFileController@postStore');

        Route::get('/delete/{id}','adminFileController@destroy');
        Route::get('/delete/multi/{data}','adminFileController@destroy_multi');

        //ajax
        Route::get('ajax/allid','adminFileController@allid');
    });

    //Quản lý Album file đính kèm
    Route::group(['prefix'=>'albumfile'],function(){
        Route::get('/','adminAlbumFileController@index')->name('manager_album_file');

        Route::post('/create','adminAlbumFileController@postCreate');

        Route::get('/edit/{id}','adminAlbumFileController@store');
        Route::post('/edit/{id}','adminAlbumFileController@postStore');

        Route::get('/delete/{id}','adminAlbumFileController@destroy');
        Route::get('/delete/multi/{data}','adminAlbumFileController@destroy_multi');

        //ajax
        Route::get('ajax/allid','adminAlbumFileController@allid');
    });
});