<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-13
 * Time: 16:36
 */

namespace app\admin\controller;


use app\common\model\HousingAttrModel;
use app\common\model\HousingFacilitiesModel;

class Facilities extends Base
{

    public function getDataByList()
    {
        $data = input('param.');
        $res = HousingFacilitiesModel::GetByList($data);
        $attr=HousingAttrModel::all();
        return json(msg(200, $res, $attr));
    }
    /**
     * 添加数据
     */
    public function postDataByAdd()
    {
        $data = input('param.');

        if (empty($data['facilities_id'])) {
            $res = HousingFacilitiesModel::create($data);
            //添加轮播图
            //添加属性

            return json(msg(200, $res, '添加成功'));
        }
        $res = HousingFacilitiesModel::where('facilities_id', $data['facilities_id'])->update($data);
        return json(msg(200, $res, '更新成功'));
    }

    /**
     * 添加数据
     */
    public function getIdByDelete()
    {
        $data = input('param.');
        $res = HousingFacilitiesModel::getIDByDelete($data['facilities_id']);
        return json(msg(200, $res, '删除成功'));
    }

    public function postDataByStauts()
    {
        $data = input('param.');
        HousingFacilitiesModel::where('facilities_id', $data['facilities_id'])->update($data);
        return json($data);
    }
}