@extends('layout_admin.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{__('text.name')}}: {{$shift->name}}</p>
                                    <p>{{__('text.start_time')}}: {{$shift->start_time}}</p>
                                    <p>{{__('text.end_time')}}: {{$shift->end_time}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection