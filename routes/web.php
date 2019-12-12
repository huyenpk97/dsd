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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/cauhinh_KPI', function () {
    return view('cauhinh_KPI');
})->name('cauhinh_KPI');
Route::get('/chitiet_KPIduan', function () {
    return view('chitiet_KPIduan');
})->name('chitiet_KPIduan');
Route::get('/chitiet_KPIduanNV', function () {
    return view('chitiet_KPIduanNV');
})->name('chitiet_KPIduanNV');
Route::get('/chitiet_KPInhanvien', function () {
    return view('chitiet_KPInhanvien');
})->name('chitiet_KPInhanvien');
Route::get('/chitiet_KPIphongban', function () {
    return view('chitiet_KPIphongban');
})->name('chitiet_KPIphongban');

Route::get('/congviec_quytrinh', function () {
    return view('congviec_quytrinh');
})->name('congviec_quytrinh');
Route::get('/create_project', function () {
    return view('create_project');
})->name('create_project');
Route::get('/create_notification', function () {
    return view('create_notification');
})->name('create_notification');

Route::get('/detail_task_project', function () {
    return view('detail_task_project');
})->name('detail_task_project');

Route::get('/detail_project', function () {
    return view('detail_project');
})->name('detail_project');

Route::get('/ds_baocao', function () {
    return view('ds_baocao');
})->name('ds_baocao');

Route::get('/ds_congviec_thuong_xuyen', 'RecurrentsTask@ds_congviec_thuong_xuyen')->name('ds_congviec_thuong_xuyen');

Route::get('/ds_congviec_thuong_xuyen_cty', 'RecurrentsTask@ds_congviec_thuong_xuyen_cty')->name('ds_congviec_thuong_xuyen_cty');

Route::get('/ds_quytrinh', function () {
    return view('ds_quytrinh');
})->name('ds_quytrinh');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dsKPI_nhanvien', function () {
    return view('dsKPI_nhanvien');
})->name('dsKPI_nhanvien');

Route::get('/dsKPI_nhanvien', 'KPIManagementsController@listKPIEmployees')->name('dsKPI_nhanvien');

Route::get('/dsKPI_phongban', 'KPIManagementsController@listKPIDepartments')->name('dsKPI_phongban');


Route::get('/ketqua_congviec', function () {
    return view('ketqua_congviec');
})->name('ketqua_congviec');

Route::get('/list_notification', function () {
    return view('list_notification');
})->name('list_notification');

Route::get('/list_project', function () {
    return view('list_project');
})->name('list_project');

Route::get('/pheduyet_baocao', function () {
    return view('pheduyet_baocao');
})->name('pheduyet_baocao');

Route::get('/tao_quytrinh', function () {
    return view('tao_quytrinh');
})->name('tao_quytrinh');

Route::get('/taobaocao', function () {
    return view('taobaocao');
})->name('taobaocao');

Route::get('/taocongviec_quytrinh', function () {
    return view('taocongviec_quytrinh');
})->name('taocongviec_quytrinh');

Route::get('/taocongviec', function () {
    return view('taocongviec');
})->name('taocongviec');

Route::get('/thongke_congviec', function () {
    return view('thongke_congviec');
})->name('thongke_congviec');

Route::get('/thongke_KPI', function () {
    return view('thongke_KPI');
})->name('thongke_KPI');
Route::get('/detail_project/{id}', function ($id) {
    return view('detail_project', compact('id'));
})->name('detail_project');
Route::get('/detail_task_project/{id}', function ($id) {
    return view('detail_task_project', compact('id'));
})->name('detail_task_project');

Route::get('/create_task_project/{id}', function ($id) {
    return view('create_task_project', compact('id'));
})->name('create_task_project');
Route::get('/chitiet_quytrinh/{id}', function ($id) {
    return view('chitiet_quytrinh', compact('id'));
})->name('chitiet_quytrinh');