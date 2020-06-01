<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('faculties', 'FacultyController');
    Route::get('faculties/{faculty}/edit_head', 'FacultyController@edit_head')->name('faculties.edit_head');
    Route::put('faculties/{faculty}/update_head', 'FacultyController@update_head')->name('faculties.update_head');
    Route::resource('faculties.departments', 'DepartmentController');
    Route::get('faculties/{faculty}/department/{department}/edit_head', 'DepartmentController@edit_head')->name('faculties.departments.edit_head');
    Route::put('faculties/{faculty}/department/{department}/update_head', 'DepartmentController@update_head')->name('faculties.departments.update_head');
    Route::get('get_departments_ajax', 'DepartmentController@get_departments_ajax')->name('get_departments_ajax');
    Route::get('get_advisors_by_department_ajax', 'StudentController@get_advisors_by_department_ajax')->name('get_advisors_by_department_ajax');

    Route::resource('teachers', 'TeacherController')->except('show');
    Route::resource('teacher-assistants', 'TeacherAssistantController')->except('show');
    Route::get('teacher-assistants/academic-advisor/{teacherAssistant}', 'TeacherAssistantController@makeAcademicAdvisor')->name('teacher-assistants.makeAcademicAdvisor');

    Route::resource('students', 'StudentController')->except('show');

    Route::middleware('role:student')->group(function () {

        //type students routes here

    });

});

