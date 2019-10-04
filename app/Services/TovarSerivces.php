<?php

namespace App\Services;


use App\Models\Linktovar;
use App\Models\Tovar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TovarSerivces{
    /**
     * Получаем список
     * @return int
     */
    public function countrecord(){
        $count=Tovar::all()->count();
        return $count;
    }


    /**
     * Показываем данные определенного товара
     * @param $id
     * @return mixed
     */
    public function SelectId($id){
       $data=Tovar::find($id);
        return $data;
    }

    /**
     * Создаем запись
     * @param Request $request
     */
    public function create (Request $request){
        $modelTovar=new Tovar();
        $modelTovar->nametovar=$request->input('nametovar');
        $modelTovar->save();
        $id=$modelTovar->id;
        $arGroupSelect=$request->input('group');
        foreach ($arGroupSelect as $item){
            $modelLink=new Linktovar();
            $modelLink->group_id=$item;
            $modelLink->tovar_id=$id;
            $modelLink->save();
        }
    }

    /**
     * Получаем селект
     * @return \Illuminate\Support\Collection
     */
    public function select(){
        $datas=DB::table('linktovars')
            ->select('tovars.id','groups.namegroup','tovars.nametovar','linktovars.group_id')
            ->leftJoin('groups', 'linktovars.group_id', '=', 'groups.id')
            ->leftJoin('tovars', 'linktovars.tovar_id', '=', 'tovars.id')
            ->orderBy('tovars.id', 'desc')
            ->get();
        return $datas;
    }

    /**
     * Проверяе входит для редактирования
     * @param $id
     * @param $idgroup
     * @return int
     */
    public function SelectIdGroup($id,$idgroup){
        $datas=DB::table('linktovars')
            ->select('tovars.id','groups.namegroup','tovars.nametovar','linktovars.group_id')
            ->leftJoin('groups', 'linktovars.group_id', '=', 'groups.id')
            ->leftJoin('tovars', 'linktovars.tovar_id', '=', 'tovars.id')
            ->where('linktovars.tovar_id',$id)
            ->where('linktovars.group_id',$idgroup)
            ->count();
        return $datas;
    }

    /**
     * Обновляем записи
     * @param Request $request
     * @param Tovar $tovar
     */
    public function update(Request $request,Tovar $tovar){
        $tovar->nametovar=$request->input('nametovar');
        $tovar->save();
        $id=$tovar->id;
        $arGroupSelect=$request->input('group');

        $deletLink = Linktovar::where('tovar_id', '=', $id)->delete();


        foreach ($arGroupSelect as $item){
            $modelLink=new Linktovar();
            $modelLink->group_id=$item;
            $modelLink->tovar_id=$id;
            $modelLink->save();
        }
    }

    /**
     * Удалить
     * @param $id
     */
    public function delete($id){
        $deletLink = Linktovar::where('tovar_id', '=', $id)->delete();
        $deletLink = Tovar::where('id', '=', $id)->delete();
    }
}