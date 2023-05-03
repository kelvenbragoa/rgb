@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tallyclerk')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{__('text.name')}}: {{$tallyclerk->name}}</p>
                                    <p>{{__('text.email')}}: {{$tallyclerk->email}}</p>
                                    <p>{{__('text.mobile')}}: {{$tallyclerk->mobile}}</p>

                                    <hr>


                                      
                                    <div class="w-100">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.shift')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tallyclerk->ships->count()}}</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.load')}} </h5> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tallyclerk->tallybook->sum('load')}} KG</h3>
                                                                
                                                            </div>
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            

                                        </div>
                                    </div>
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