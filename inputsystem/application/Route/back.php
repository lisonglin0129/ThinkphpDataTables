<?php

use think\Route;
/* 
Route::get([
		'/admin/'     => 	'admin/index/index',
		
		'/login/[:id]'  =>    ['admin/login/test',[],['id'=>'\d+']],
		
		'/login/'  	  => 	'admin/login/index'
]); */
Route::rule('/admin','admin/index/index');
Route::rule('/content','admin/Common/content');
Route::get('/login/','admin/login/index');
Route::post('/loginAction','admin/login/login');
//--退出
Route::get('/loginout','admin/login/loginout');
//--进票操作
Route::get('/bil','admin/Bill/index');
Route::post('/bil/source','admin/Bill/getData');
Route::get('/download','admin/Bill/download');