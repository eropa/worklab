@extends('layouts.myapp')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Товар № <b>{{ $data->id }}</b></h1>
    </div>

    <br>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    Название товара - <b>{{ $data->nametovar }}</b>
                    <hr><h2>Группа товара</h2>
                    @foreach($DataGrs as $DataGr)
                            <?php
                                $selG=new \App\Services\TovarSerivces();
                                if($selG->SelectIdGroup($data->id,$DataGr->id))
                                {
                                    echo $DataGr->namegroup."<br>";
                                }
                            ?>
                    @endforeach
                </div>
            </div>
        </div>


    </div>


@endsection
