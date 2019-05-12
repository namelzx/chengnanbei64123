<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 17:13
 */

namespace app\common\model;


use think\Model;

/**
 * Class 城市模型
 * @package app\common\model
 */
class CityModel extends Model
{
    protected $table = 't_city';


    public static function GetByList($data)
    {
        $res = self::paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;
    }

    public static function PostByData($data)
    {
        $res = self::allowField(true)->save($data);
        return $res->id;
    }

    public static function getIDByDelete($id)
    {
        $res = self::where('id',$id)->delete();
        return $res;
    }




}