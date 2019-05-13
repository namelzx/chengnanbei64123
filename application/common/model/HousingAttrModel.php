<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 23:07
 */

namespace app\common\model;


use think\Model;

/**
 * Class HousingAttrModel
 * @package app\common\model
 * 房源属性表
 */
class HousingAttrModel extends Model
{
    protected $table = 't_housing_attr';
    protected $createTime = 'create_time';


    //添加数据
    public static function postDataByAll($data)
    {

        $res = self::insertAll($data);
        return $res;
    }

}