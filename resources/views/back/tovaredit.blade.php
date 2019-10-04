@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать товар</h1>
    </div>

    <br>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ url('tovar/'.$data->id) }}">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text"
                                   name="nametovar"
                                   value="{{$data->nametovar}}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Группа товара</label>
                            <select multiple class="form-control"  name="group[]">
                                @foreach($DataGrs as $DataGr)
                                    <option value="{{$DataGr->id}}"
                                        <?php
                                                $selG=new \App\Services\TovarSerivces();
                                                if($selG->SelectIdGroup($data->id,$DataGr->id)){
                                                    echo "selected";
                                                }
                                        ?>
                                    >{{ $DataGr->namegroup }}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


@endsection
