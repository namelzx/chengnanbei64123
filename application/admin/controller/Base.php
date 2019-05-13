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


    /**
     * 实例化阿里云OSS
     * @return object 实例化得到的对象
     * @return 此步作为共用对象，可提供给多个模块统一调用
     */
    function new_oss()
    {
        //获取配置项，并赋值给对象$config
        $config = config('aliyun_oss');
        //实例化OSS
        $oss = new \OSS\OssClient($config['KeyId'], $config['KeySecret'], $config['Endpoint']);
        return $oss;
    }


    /**
     * 上传指定的本地文件内容
     *
     * @param OssClient $ossClient OSSClient实例
     * @param string $bucket 存储空间名称
     * @param string $object 上传的文件名称
     * @param string $Path 本地文件路径
     * @return null
     */
    function uploadFile($bucket, $object, $Path)
    {
        //try 要执行的代码,如果代码执行过程中某一条语句发生异常,则程序直接跳转到CATCH块中,由$e收集错误信息和显示
        try {
            //没忘吧，new_oss()是我们上一步所写的自定义函数
            $ossClient = $this->new_oss();
            //uploadFile的上传方法
            $res = $ossClient->uploadFile($bucket, $object, $Path);
            return json($res);
        } catch (OssException $e) {
            //如果出错这里返回报错信息
            return $e->getMessage();
        }
    }
}