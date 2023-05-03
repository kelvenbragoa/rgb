@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.agent')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{__('text.name')}}: {{$agent->name}}</p>
                                    <p>{{__('text.email')}}: {{$agent->email}}</p>
                                    <p>{{__('text.mobile')}}: {{$agent->mobile}}</p>
                                    <p>{{__('text.address')}}: {{$agent->address}}</p>

                                    <hr>


                                      
                                    <div class="w-100">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.ship')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$agent->ships->count()}}</h3>
                                                                
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
                                                                <h3 class="mt-1 mb-3">{{$load}} KG</h3>
                                                                
                                                            </div>
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            

                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="myTable" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:15%">{{__('text.name')}}</th>
                                                    <th style="width:12%">{{__('text.customer')}}</th>
                                                    <th style="width:12%">{{__('text.agent')}}</th>
                                                    <th style="width:12%">{{__('text.operation_station')}}</th>
                                                    <th style="width:15%">{{__('text.type_merchandise')}}</th>
                                                    <th style="width:12%">{{__('text.load')}}</th>
                                                    <th style="width:10%">{{__('text.cm')}}</th>
                                                    <th style="width:15%">{{__('text.work_order')}}</th>
                                                    <th style="width:10%">{{__('text.status')}}</th>
                    
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($agent->ships as $item)
                                                    <tr>
                                                        {{-- <td>{{$item->id}}</td> --}}
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->customer->name}}</td>
                                                        <td>{{$item->agent->name}}</td>
                                                        <td>{{$item->operation_station->name}}</td>
                                                        <td>{{$item->type_merchandise->name}}</td>
                                                        <td>{{$item->tallybook->sum('load')}}</td>
                                                        <td>{{$item->cm}}</td>
                                                        <td>{{$item->work_order}}</td>
                                                        <td>
                                                            @if ($item->status==1) 
                                                                <span class="badge bg-danger">{{__('text.closed')}} </span> 
                                                            @endif
                                                            @if ($item->status==0) 
                                                                    <span class="badge bg-success">{{__('text.opened')}} </span> 
                                                            @endif
                                                        </td>
                                                       
                                                       
                    
                                                        <td class="table-action">
                                                            <a href="{{URL::to('/manager-ship/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                                           
                                                           
                                                           
                                                        </td> 
                                                    </tr>
                                                   
                                                @endforeach
                                            </tbody>
                                        </table>
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