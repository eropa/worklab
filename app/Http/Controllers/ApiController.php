<?php

namespace App\Http\Controllers;

use App\Services\GroupServices;
use App\Services\TovarSerivces;
use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="localhost:8000",
 *   basePath="/",
 *   @SWG\Info(
 *     title="Мой тест API",
 *     version="1.0.0"
 *   )
 * )
 */
class ApiController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/ApiGroup",
     *     description="Возрошаем список групп в базе",
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Нет данных"
     *     )
     * )
     */
    public function ApiGroup(GroupServices $groupServices){
        return json_encode($groupServices->select());
    }
    /**
     * @SWG\Get(
     *     path="/ApiTovar",
     *     description="Возрошаем список товара в базе",
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Нет данных"
     *     )
     * )
     */
    public function ApiTovar(TovarSerivces $tovarSerivces){
        return json_encode($tovarSerivces->select());
    }

}
