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

Route::get('/', 'App\Http\Controllers\HomePageController@home_page')->name('home_page');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/transcript-of-record', 'App\Http\Controllers\TranscriptOfRecordController@tor')->name('tor');

/*
|About SJA Pages --------------------------------------------------------------------------
*/

Route::get('/school-profile', 'App\Http\Controllers\AboutController@school_profile')->name('school_profile');
Route::get('/vision-mission', 'App\Http\Controllers\AboutController@vision_mission')->name('vision_mission');
Route::get('/history', 'App\Http\Controllers\AboutController@history')->name('history');
Route::get('/hymn', 'App\Http\Controllers\AboutController@hymn')->name('hymn');
Route::get('/award-and-recognition', 'App\Http\Controllers\AboutController@award_recognition')->name('award_recognition');
Route::get('/administration-and-offices', 'App\Http\Controllers\AboutController@administration_offices')->name('administration_offices');
Route::get('/faculty-and-staff', 'App\Http\Controllers\AboutController@faculty_staff')->name('faculty_staff');

/*
|Academic Pages --------------------------------------------------------------------------
*/

Route::get('/bael', 'App\Http\Controllers\AcademicController@bael')->name('bael');
Route::get('/baps', 'App\Http\Controllers\AcademicController@baps')->name('baps');
Route::get('/bsa', 'App\Http\Controllers\AcademicController@bsa')->name('bsa');
Route::get('/bsais', 'App\Http\Controllers\AcademicController@bsais')->name('bsais');
Route::get('/bsis', 'App\Http\Controllers\AcademicController@bsis')->name('bsis');
/*
|Students Pages --------------------------------------------------------------------------
*/

Route::get('/students-organizations', 'App\Http\Controllers\StudentsController@students_organizations')->name('students_organizations');
Route::get('/students-services', 'App\Http\Controllers\StudentsController@students_services')->name('students_services');
Route::get('/publication', 'App\Http\Controllers\StudentsController@publication')->name('publication');
Route::get('/students-council', 'App\Http\Controllers\StudentsController@students_council')->name('students_council');
Route::get('/students-handbook', 'App\Http\Controllers\StudentsController@students_handbook')->name('students_handbook');
Route::get('/guidance-services', 'App\Http\Controllers\StudentsController@guidance_services')->name('guidance_services');
Route::get('/library-services', 'App\Http\Controllers\StudentsController@library_services')->name('library_services');

Route::group(['prefix' => 'registrar', 'middleware' => ['auth', 'userroles'], 'roles' => ['registrar']], function() {
    Route::get('dashboard', 'Registrar\RegistrarDashboardController@index')->name('registrar.dashboard');

    Route::group(['prefix' => 'my-account', 'middleware' => ['auth']], function() {
        Route::get('', 'Registrar\UserProfileController@view_my_profile')->name('registrar.my_account.index');
        // Route::post('change-my-password', 'Registrar\UserProfileController@change_my_password')->name('my_account.change_my_password');
        Route::post('update-profile', 'Registrar\UserProfileController@update_profile')->name('registrar.my_account.update_profile');
        Route::post('fetch-profile', 'Registrar\UserProfileController@fetch_profile')->name('registrar.my_account.fetch_profile');
        Route::post('change-my-photo', 'Registrar\UserProfileController@change_my_photo')->name('registrar.my_account.change_my_photo');
        Route::post('change-my-password', 'Registrar\UserProfileController@change_my_password')->name('registrar.my_account.change_my_password');
    });

    
    Route::group(['prefix' => 'student-grade-sheet'], function() {
        Route::get('', 'Registrar\GradeSheetController@index')->name('registrar.student_grade_sheet');
        Route::post('list-class-subject-details', 'Registrar\GradeSheetController@list_class_subject_details')->name('registrar.student_grade_sheet.list_class_subject_details');
        Route::post('list-students-by-class', 'Registrar\GradeSheetController@list_students_by_class')->name('registrar.student_grade_sheet.list_students_by_class');
    });
    
});

Route::group(['prefix' => 'registrar/class-details', 'middleware' => 'auth', 'roles' => ['admin', 'root', 'registrar']], function() {
    Route::get('', 'Registrar\ClassListController@index')->name('registrar.class_details');
    Route::post('', 'Registrar\ClassListController@index')->name('registrar.class_details');
    Route::post('modal-data', 'Registrar\ClassListController@modal_data')->name('registrar.class_details.modal_data');
    Route::post('save-data', 'Registrar\ClassListController@save_data')->name('registrar.class_details.save_data');
    Route::post('deactivate-data', 'Registrar\ClassListController@deactivate_data')->name('registrar.class_details.deactivate_data');
    Route::post('fetch_section-by-grade-level', 'Registrar\ClassListController@fetch_section_by_grade_level')->name('registrar.class_details.fetch_section_by_grade_level');
});

Route::group(['prefix' => 'registrar/class-subjects/{class_id}', 'middleware' => 'auth'], function() {
    Route::get('', 'Registrar\ClassSubjectsController@index')->name('registrar.class_subjects');
    Route::post('', 'Registrar\ClassSubjectsController@index')->name('registrar.class_subjects');
    Route::post('modal-data', 'Registrar\ClassSubjectsController@modal_data')->name('registrar.class_subjects.modal_data');
    Route::post('save-data', 'Registrar\ClassSubjectsController@save_data')->name('registrar.class_subjects.save_data');
    Route::post('deactivate-data', 'Registrar\ClassSubjectsController@deactivate_data')->name('registrar.class_subjects.deactivate_data');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
