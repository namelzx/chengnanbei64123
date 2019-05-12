<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 17:20
 */

namespace app\common\model;


use think\Model;

/**
 * Class 房源模型
 * @package app\common\model
 */
class HousingModel extends Model
{

    protected $table = 't_housing';
    protected $createTime = 'create_time';


    public function getArrt()
    {
        return $this->hasMany('HousingAttrModel','housing_id','id');
    }

    public static function GetByList($data)
    {
        $where = [];
        $res = self::where($where)->paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;
    }

    public static function getIDByDelete($id)
    {
        $res = self::where('id', $id)->delete();
        return $res;
    }

}