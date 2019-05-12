<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2019-05-12
 * Time: 22:02
 */

namespace app\admin\controller;


use app\common\model\HousingAttrModel;
use app\common\model\HousingModel;

class Housing extends Base
{

    public function getDataByList()
    {
        $data = input('param.');
        $res = HousingModel::GetByList($data);
        return json(msg(200, $res, '获取城市列表'));
    }

    /**
     * 添加数据
     */
    public function postDataByAdd()
    {
        $data = input('param.');
        $arrt = input('param.arrt');

        if (empty($data['id'])) {
            $res = HousingModel::create($data['ruleForm']);

            $arr = [];
            foreach ($arrt as $i => $item) {
                $arr[$i] = $arrt[$i];
            }

            HousingAttrModel::postDataByAll($arrt);

            return json(msg(200, $res, '添加成功'));
        }
        $res = HousingModel::where('id', $data['id'])->update($data);
        return json(msg(200, $res, '更新成功'));
    }


    /**
     * 添加数据
     */
    public function getIdByDelete()
    {
        $data = input('param.');
        $res = HousingModel::getIDByDelete($data['id']);
        return json(msg(200, $res, '删除成功'));
    }

    public function postDataByStauts()
    {
        $data = input('param.');
        HousingModel::where('id', $data['id'])->update($data);
        return json($data);
    }

    public function getIdByDetails()
    {
        $id = input('param.id');
        $res = HousingModel::with(['getArrt'])->where('id', $id)->find();
        return json(msg(200, $res, '获取详细信息'));
    }


}