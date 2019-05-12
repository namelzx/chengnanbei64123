<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::group('admin/', function () {
    Route::rule('login', 'admin/Login/adminLogin');
    Route::rule('info', 'admin/Login/adminInfo');
    Route::rule('logout', 'admin/Login/adminLogOut');
    Route::rule('upload', 'admin/Base/upload');
    Route::rule('getCity', 'admin/Base/getCity');


    /**
     * 城市模块管理
     */
    Route::get('city/getDataByList', 'admin/city/getDataByList');
    Route::post('city/postDataByAdd', 'admin/city/postDataByAdd');
    Route::get('city/getIdByDelete', 'admin/city/getIdByDelete');
    Route::post('city/postDataByStauts', 'admin/city/postDataByStauts');

    /**
     * 房源管理
     */
    Route::get('housing/getDataByList', 'admin/housing/getDataByList');
    Route::post('housing/postDataByAdd', 'admin/housing/postDataByAdd');
    Route::get('housing/getIdByDelete', 'admin/housing/getIdByDelete');
    Route::post('housing/postDataByStauts', 'admin/housing/postDataByStauts');
    Route::get('housing/getIdByDetails', 'admin/housing/getIdByDetails');



});

Route::get('hello/:name', 'index/hello');

return [

];
