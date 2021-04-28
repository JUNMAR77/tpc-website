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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transcript-of-record', 'TranscriptOfRecordController@tor')->name('tor');

/*
|About SJA Pages --------------------------------------------------------------------------
*/

Route::get('/school-profile', 'AboutController@school_profile')->name('school_profile');
Route::get('/vision-mission', 'AboutController@vision_mission')->name('vision_mission');
Route::get('/history', 'AboutController@history')->name('history');
Route::get('/hymn', 'AboutController@hymn')->name('hymn');
Route::get('/award-and-recognition', 'AboutController@award_recognition')->name('award_recognition');
Route::get('/administration-and-offices', 'AboutController@administration_offices')->name('administration_offices');
Route::get('/faculty-and-staff', 'AboutController@faculty_staff')->name('faculty_staff');

/*
|Academic Pages --------------------------------------------------------------------------
*/

Route::get('/bael', 'AcademicController@bael')->name('bael');
Route::get('/baps', 'AcademicController@baps')->name('baps');
Route::get('/bsa', 'AcademicController@bsa')->name('bsa');
Route::get('/bsais', 'AcademicController@bsais')->name('bsais');
Route::get('/bsis', 'AcademicController@bsis')->name('bsis');
/*
|Students Pages --------------------------------------------------------------------------
*/

Route::get('/students-organizations', 'StudentsController@students_organizations')->name('students_organizations');
Route::get('/students-services', 'StudentsController@students_services')->name('students_services');
Route::get('/publication', 'StudentsController@publication')->name('publication');
Route::get('/students-council', 'StudentsController@students_council')->name('students_council');
Route::get('/students-handbook', 'StudentsController@students_handbook')->name('students_handbook');
Route::get('/guidance-services', 'StudentsController@guidance_services')->name('guidance_services');
Route::get('/library-services', 'StudentsController@library_services')->name('library_services');

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
