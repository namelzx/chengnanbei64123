<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 16:53
 */

namespace app\admin\controller;


use app\common\model\AdminUserModel;
use Firebase\JWT\JWT;
use think\Exception;
use think\Request;

define('KEY', '1gHuiop975cdashyex9Ud23ldsvm2Xq'); //密钥

class Login extends Base
{

    /**
     * 后台管理员登陆
     */
    public function adminLogin()
    {
        try {
            $data = input('param.');
            if (empty($data)) {
                return json('登陆失败');
            }

            $hasUser = AdminUserModel::where('username', $data['username'])->find();

            if (empty($hasUser)) {
                return json(logomsg(500, '', '', '管理员不存在'));
            }
            if ($data['password'] !== $hasUser['password']) {
                return json(logomsg(500, '', '', '密码错误'));
            }

            if (1 != $hasUser['status']) {
                return json(logomsg(500, '', '', '该账号被禁用'));
            }

            $token = [
                'iss' => '梁泽祥', //签发者
                'aud' => '梁泽祥', //jwt所面向的用户
                'iat' => time(), //签发时间
                'nbf' => time(), //在什么时间之后该jwt才可用
                'exp' => time() + 100000, //过期时间-10min
                'roles' => ['editor'],
                'data' => [
                    'user' => $hasUser,
                ]
            ];

            $jwt = JWT::encode($token, KEY);
            return json(logomsg(200, $jwt, '', '描述'));
            return json($jwt);
        } catch (Exception $e) {
            return json($e->getMessage());
        }
    }


    /**
     * 获取用户信息
     */
    public function adminInfo(Request $request)
    {
        $jwt = $request->header('X-Token');
        if (empty($jwt)) {
            echo 'x-token没有';
            die();
        }

        $decoded = JWT::decode($jwt, KEY, array('HS256'));
        $arr = (array)$decoded;
        return json(logomsg(200, $jwt, $arr, '获取成功'));
    }

    public  function adminLogOut(){
        return '';
    }
}