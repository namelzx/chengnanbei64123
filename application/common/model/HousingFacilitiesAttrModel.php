<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-13
 * Time: 16:43
 */

namespace app\common\model;


use think\Model;

class HousingFacilitiesAttrModel extends Model
{


    protected $table = 't_facilities_attr';
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

    /**
     * @param $id
     * @return int
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     * 删除城市
     */
    public static function getIDByDelete($id)
    {
        $res = self::where('attr_id',$id)->delete();
        return $res;
    }
}