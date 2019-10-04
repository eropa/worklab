@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Главная</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Кол-во групп</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $countrecord=new \App\Services\GroupServices();
                                    echo $countrecord->countrecord();
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Кол-во товаров</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $countrecord=new \App\Services\TovarSerivces();
                                echo $countrecord->countrecord();
                                ?>
                             </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
    </div>
    <br>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1>
                        Тестовое задание на вакансию php разработчика в компанию WorkLab
                    </h1>
                    Необходимо спроектировать простейшее REST API для каталога товаров.
                    <hr>
                    <b>Приложение должно содержать:</b>
                    <br>Категории товаров, вложенность не требуется
                    <br>Конкретные товары, которые принадлежат к какой-то категории (один товар может принадлежать нескольким категориям)
                    <br>Пользователей и их профиль, которые могут авторизоваться
                    <hr>
                    <b>Возможные действия:</b>
                    <br>Получение списка всех категорий +
                    <br>Получение списка товаров в конкретной категории +
                    <br>Получение товара по id +
                    <br>Авторизация пользователей +
                    <br>Редактирования профиля пользователя +
                    <br>Добавление/Редактирование/Удаление категории (для авторизованных пользователей)
                    <br>Добавление/Редактирование/Удаление товара (для авторизованных пользователей)
                    <hr><h2>Требования / Ограничения / Технологии</h2>
                    <hr>
                    <b>При проектировании учесть стек технологий</b>

                    <br> PHP;
                    <br>Framework – Laravel;
                    <br>MySQL
                    <br>Документация в формате https://swagger.io/;
                    <hr><h2>Результат</h2>
                    Диаграмма БД (можно через DBeaver), описательная часть по полям.
                    <br>Роутеры в формате Laravel. https://laravel.com/docs/5.8/routing
                    <br>Одна модель Eloquent, на Ваш выбор. https://laravel.com/docs/5.8/eloquent
                    <br>Документация в swagger.oi одного контроллера, на Ваш выбор.
                    <br>Код должен проходить тесты PSR-2
                </div>
            </div>
        </div>


    </div>


@endsection
