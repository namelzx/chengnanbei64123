<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 16:53
 */

namespace app\common\model;

use think\Model;

/**
 * Class 管理员信息模型
 * @package app\common\model
 */
class AdminUserModel extends Model
{
    protected $table = 't_admin_user';

    protected $createTime = 'create_time';

}