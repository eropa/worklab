@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Спиоск товара в БД</h1>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @guest
                    @else
                        <a class="btn btn-primary" href="{{ url('group/create') }}" role="button">Добавить</a>
                    @endguest
                   <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название группы</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($datas as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{ $data->namegroup }}</td>
                            <td>
                                <a class="btn btn-primary"  href="{{ url('/group/'.$data->id) }}">
                                    Просмотреть

                                </a>
                                @guest
                                @else
                                    /
                                    <a class="btn btn-primary" href="{{ url('group/'.$data->id.'/edit ') }}" role="button">
                                        Редактировтаь</a>
                                    /
                                    <a class="btn btn-primary"
                                       href="#{{$data->id}}"
                                       onclick="event.preventDefault();
                                               document.getElementById('delet-form').action = '/group/{{$data->id}}';
                                               document.getElementById('delet-form').submit();"
                                    >
                                        Удалить
                                    </a>
                                    @endguest
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        @guest
                        @else
                        <!-- Logout Modal-->
                            <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                                            <form id="delet-form" action="{{ url('tovar/') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete" />
                                                <input type="hidden" name="_id" value="12" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest
                </div>
            </div>
        </div>


    </div>


@endsection
