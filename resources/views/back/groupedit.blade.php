@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить группу товара</h1>
    </div>

    <br>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ url('group/'.$group->id) }}">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text"
                                   name="namegroup"
                                   class="form-control"
                                   value="{{$group->namegroup}}">
                        </div>
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


@endsection
