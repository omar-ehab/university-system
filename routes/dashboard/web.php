<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    //routes of admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('terms', 'TermController');
        Route::get('terms/{term}/open_registration', 'TermController@open_registration')->name('terms.open_registration');
        Route::get('terms/{term}/close_registration', 'TermController@close_registration')->name('terms.close_registration');
        Route::resource('faculties', 'FacultyController');
        Route::resource('faculties.classrooms', 'ClassroomController')->except('show');
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
    });

    // head department
    Route::middleware('role:head_department')->group(function () {
        Route::get('departments/{department}/teachers', 'HeadDepartmentController@teachers')->name('department.teachers');
        Route::get('departments/{department}/teacher-assistants', 'HeadDepartmentController@teacherAssistants')->name('department.teacherAssistants');
        Route::get('departments/{department}/students', 'HeadDepartmentController@students')->name('department.students');
        Route::get('departments/{department}/courses', 'HeadDepartmentController@courses')->name('department.courses');
        Route::resource('courses', 'CourseController')->except('index');
        Route::get('courses/{course}/assign-teacher', 'CourseController@assign_teacher_page')->name('courses.assign_teacher_page');
        Route::post('courses/{course}/assign-teacher', 'CourseController@assign_teacher')->name('courses.assign_teacher');
        Route::get('courses/{course}/assign-teacher-assistant', 'CourseController@assign_teacher_assistant_page')->name('courses.assign_teacher_assistant_page');
        Route::post('courses/{course}/assign-teacher-assistant', 'CourseController@assign_teacher_assistant')->name('courses.assign_teacher_assistant');
        Route::get('courses/{course}/students', 'CourseController@students')->name('courses.students');
        Route::get('calender/{department}', 'HeadDepartmentController@calender')->name('calender');
        Route::get('teacher-assistants/academic-advisor/{academicAdvisor}/assignStudents', 'TeacherAssistantController@assignStudents')->name('teacher-assistants.assignStudents');
        Route::post('teacher-assistants/academic-advisor/{academicAdvisor}/assignStudentsSave', 'TeacherAssistantController@assignStudentsSave')->name('teacher-assistants.assignStudentsSave');
    });

    //routes of teacher
    Route::middleware('role:teacher')->group(function () {
        Route::get('/{teacher}/my-courses', 'TeacherController@myCourses')->name('teacher.my-courses');
        Route::get('/{teacher}/course/{course}', 'TeacherController@myCourse')->name('teacher.course');
        Route::get('/{teacher}/course/{course}/students', 'TeacherController@courseStudents')->name('teacher.courseStudents');
        Route::get('/{teacher}/alerts', 'TeacherController@alerts')->name('teacher.alerts');
        Route::get('/{teacher}/alerts/{alert}/approve', 'TeacherController@approve_alert')->name('teacher.approve_alert');
        Route::get('/{teacher}/alerts/{alert}/disprove', 'TeacherController@disprove_alert')->name('teacher.disprove_alert');
        Route::get('teacher/{teacher}/calender/', 'TeacherController@calender')->name('teacher.calender');

    });

    //routes of teacher assistant
    Route::middleware('role:teacher_assistant')->group(function () {
        Route::get('teacher_assistants/{teacherAssistant}/courses', 'TeacherAssistantController@courses')->name('teacher_assistants.courses');
        Route::get('teacher_assistants/{teacherAssistant}/course/{course}', 'TeacherAssistantController@myCourse')->name('teacher_assistants.course');
        Route::get('teacher_assistants/{teacherAssistant}/course/{course}/students', 'TeacherAssistantController@courseStudents')->name('teacher_assistants.courseStudents');
        Route::get('teacher_assistants/{teacherAssistant}/calender/', 'TeacherAssistantController@calender')->name('teacher_assistants.calender');
    });
    Route::middleware(['role:teacher|teacher_assistant'])->group(function () {
        Route::get('materials/{course}', 'MaterialController@index')->name('materials.index');
        Route::get('materials/{course}/create', 'MaterialController@create')->middleware('role:teacher|teacher_assistant')->name('materials.create');
        Route::post('materials/{course}', 'MaterialController@store')->middleware('role:teacher|teacher_assistant')->name('materials.store');
        Route::get('materials/{course}/material/{material}/download', 'MaterialController@download')->name('materials.download');
        Route::delete('materials/{course}/material/{material}/destroy', 'MaterialController@destroy')->name('materials.destroy');
    });


    //routes of students
    Route::middleware('role:student')->group(function () {


    });

});

