@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить товар</h1>
    </div>

    <br>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ url('tovar') }}">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text"
                                   name="nametovar"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Группа товара</label>
                            <select multiple class="form-control"  name="group[]">
                                @foreach($DataGrs as $DataGr)
                                    <option value="{{$DataGr->id}}">{{ $DataGr->namegroup }}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


@endsection
