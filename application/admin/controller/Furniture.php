<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-13
 * Time: 16:31
 */

namespace app\admin\controller;


use app\common\model\FurnitureModel;

class Furniture extends Base
{

    public function getDataByList()
    {
        $data = input('param.');
        $res = FurnitureModel::GetByList($data);
        return json(msg(200, $res, '获取城市列表'));
    }

    /**
     * 添加数据
     */
    public function postDataByAdd()
    {
        $data = input('param.');

        if (empty($data['id'])) {
            $res = FurnitureModel::create($data);
            //添加轮播图
            //添加属性

            return json(msg(200, $res, '添加成功'));
        }
        $res = FurnitureModel::where('id', $data['id'])->update($data);
        return json(msg(200, $res, '更新成功'));
    }

    /**
     * 添加数据
     */
    public function getIdByDelete()
    {
        $data = input('param.');
        $res = FurnitureModel::getIDByDelete($data['id']);
        return json(msg(200, $res, '删除成功'));
    }

    public function postDataByStauts()
    {
        $data = input('param.');
        FurnitureModel::where('id', $data['id'])->update($data);
        return json($data);
    }

}