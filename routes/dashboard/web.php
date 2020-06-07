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

    Route::resource('faculty_deans', 'HeadFacultyController')->except('show');
    Route::resource('head_departments', 'HeadDepartmentController')->except('show');

    
    
    Route::middleware('role:student')->group(function () {

        //type students routes here
       //al condistion msh shaaa3'aaaaaaaaal 
//studentttttt
Route::get('student', 'studentController@index')->name('student.index');
Route::get('student/{user}', 'studentController@showProfile')->name('student.profile');
Route::get('courses/{user}', 'studentController@showCourses')->name('student.myCourses');
Route::get('regiserCourses', 'studentController@registerCourses')->name('student.registerCourses');
Route::get('alerts/{user}', 'studentController@showAlerts')->name('student.alerts');
Route::get('payment', 'studentController@payOnline')->name('student.payment');
Route::get('courses/{course}/material', 'studentController@showCourseMaterial')->name('student.showCourseMaterial');
Route::get('transcript/{user}', 'studentController@showTranscript')->name('student.transcript');
Route::get('alerts/AlertData/{alert}', 'studentController@showAlertData')->name('student.alertData');

Route::get('transcript/termTranscript/{term}', 'studentController@showTermTranscript')->name('student.termTranscript');
Route::get('regiserCourses/addCourse/{course}', 'studentController@addCourse')->name('student.addCourse');



    });


    Route::middleware('role:academicAdvisor')->group(function () {

        //academic advisor routes here
        //Advisorrrrrrrrrr
    Route::get('academicAdvisor', 'AcadimicAdvisorController@index')->name('academicAdvisor.index');
    Route::get('academicAdvisor/{user}/profile', 'AcadimicAdvisorController@showMyProfile')->name('academicAdvisor.profile');
    Route::get('academicAdvisor/{user}/students', 'AcadimicAdvisorController@showMyStudents')->name('academicAdvisor.myStudents');
    Route::get('academicAdvisor/viewAllPendingRequests', 'AcadimicAdvisorController@viewAllPendingRequests')->name('academicAdvisor.allPendingRequests');
    Route::get('academicAdvisor/students/student/{student}', 'AcadimicAdvisorController@showStudentData')->name('academicAdvisor.showStudentData');
    Route::get('academicAdvisor/students/student/{student}/issueAlert', 'AcadimicAdvisorController@goIssue')->name('academicAdvisor.issueAlert');
    Route::POST('academicAdvisor/students/student/issueAlert/alert/{student}', 'AcadimicAdvisorController@storeAlert')->name('academicAdvisor.storeAlert');
    Route::get('academicAdvisor/students/student/{student}/studentPendingRequests', 'AcadimicAdvisorController@showStudentPendingRequests')->name('academicAdvisor.studentPendingRequests');
    Route::get('academicAdvisor/students/student/studentPendingRequests/{pendingRequest}/accept', 'AcadimicAdvisorController@acceptPendingRequests')->name('academicAdvisor.acceptPendingRequest');
    Route::get('academicAdvisor/students/student/studentPendingRequests/{pendingRequest}/decline', 'AcadimicAdvisorController@declinePendingRequests')->name('academicAdvisor.declinePendingRequest');
    Route::get('academicAdvisor/students/studentSearch', 'AcadimicAdvisorController@searchForStudent')->name('studentSearch');

    });



    Route::middleware('role:headFaculty')->group(function () {

     //Head Faculty area
     Route::get('headFaculty', 'HeadFaculty2Controller@index')->name('headFaculty.index');
     Route::get('headFaculty/allDepartments', 'HeadFaculty2Controller@showAllDepartments')->name('headFaculty.allDepartments');
     Route::get('headFaculty/allProfessors', 'HeadFaculty2Controller@showAllprofessors')->name('headFaculty.allProfessors');
     Route::get('headFaculty/allProfessors/departmentsProfessors/{department}', 'HeadFaculty2Controller@showDepartmentprofessors')->name('headFaculty.showDepartmentProfessors');

     


    });

    Route::middleware('role:headUniversity')->group(function () {

        //Head Faculty area
        Route::get('headUniversity', 'headUniversityController@index')->name('headUniversity.index');
        
        Route::get('headUniversity/allFaculties', 'headUniversityController@showAllFaculties')->name('headUniversity.allFaculties');

        Route::get('headUniversity/allFacultiesProfessors', 'headUniversityController@viewFacultiesProfessors')->name('headUniversity.allFacultiesProfessors');
   
        Route::get('headUniversity/allFacultiesProfessors/thisFacultyProfessors/{faculty}', 'headUniversityController@viewThisFacultyProfessors')->name('headUniversity.thisFacultyProfessors');
        
        Route::get('headUniversity/allFacultiesProfessors/thisFacultyProfessors/{teacher}/thisProfessorData', 'headUniversityController@viewThisProfessorData')->name('headUniversity.viewThisProfessor');

       });
   
    
});

