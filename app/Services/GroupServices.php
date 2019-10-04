<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Linktovar;
use App\Models\Tovar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupServices{

    /**
     * Получаем кол-груп в базе
     * @return int
     */
    public function countrecord(){
        $count=Group::all()->count();
        return $count;
    }

    /**
     * Получаем все записи в базе
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function select(){
        $datas=Group::all();
        return $datas;
    }

    /**
     * Получаем товар по этой категории
     * @param $id
     * @return static
     */
    public function SelectTovarGr($id){
       // $datas=Tovar::all()->where('group_id',$id);
        $datas=DB::table('linktovars')
            ->select('tovars.id','groups.namegroup','tovars.nametovar','linktovars.group_id')
            ->leftJoin('groups', 'linktovars.group_id', '=', 'groups.id')
            ->leftJoin('tovars', 'linktovars.tovar_id', '=', 'tovars.id')
            ->where('linktovars.group_id',$id)
            ->get();
        return $datas;
    }

    /**
     * Добавление записи
     * @param Request $request
     */
    public function create(Request $request){
        $model=new Group();
        $model->namegroup=$request->input('namegroup');
        $model->save();
    }

    /**
     * Обновление значения
     * @param Request $request
     * @param Group $group
     */
    public function update(Request $request, Group $group){
        $group->namegroup=$request->namegroup;
        $group->save();
    }

    /**
     *
     * @param $id
     */
    public function delete($id){
        $deletLink = Linktovar::where('group_id', '=', $id)->delete();
        $deletLink = Group::where('id', '=', $id)->delete();
    }
}