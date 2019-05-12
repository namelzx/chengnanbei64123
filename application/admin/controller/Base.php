<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 16:52
 */

namespace app\admin\controller;


use app\common\model\CityModel;
use think\Controller;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token,x-token");

class Base extends Controller
{


    public function upload()
    {

        $common = config('common');
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move('./uploads');
        if ($info) {
            // 成功上传后 获取上传信息
            // 输出 jpg
            return json(['path' => $common['url'] . '/uploads/' . $info->getSaveName()]);
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }

    public function getCity()
    {
        $res = CityModel::all();
        return json($res);
    }
}