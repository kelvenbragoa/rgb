@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.ship')}}</h1>
    <a href="{{route('manager-ship.index')}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
    <a href="{{URL::to('/manager-general-report/'.$ship->id)}}" target="_blank" class="btn btn-pill btn-primary mb-3"><i class="far fa-file"></i>{{__('text.download')}}</a>

    <div class="row">
        @if (Session::has('messageSuccess'))
                       
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{Session::get('messageSuccess')}}</strong>
            </div>
        </div>
    @endif
    @if (Session::has('messageError'))
   
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>{{Session::get('messageError')}}</strong>
        </div>
    </div>
    @endif
        <div class="col-md-12">
            
            <div class="row">
                <p><strong>{{__('text.status')}}</strong> :  @if ($ship->status==1) <span class="badge bg-danger">{{__('text.closed')}} </span> @endif @if ($ship->status==0) <span class="badge bg-success">{{__('text.opened')}} </span> @endif</p>
                
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    @if ($ship->status==1)
                                    <a href="{{URL::to('/manager-closeoperation/'.$ship->id)}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-eye"></i>{{__('text.result_operation')}}</a>
                                @endif

                                    {{-- <div class="row">
                                        <div class="col-xl-12 col-xxl-12 d-flex">
                                            <div class="w-100">
                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-4">{{__('text.ship')}} {{__('text.name')}}</h5>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h3 class="mt-1 mb-3">{{$ship->name}}</h3>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}



                                    <h1 class="h3 mb-3">{{__('text.general_data')}}  {{__('text.ship')}}</h1>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.name')}}</strong> : {{$ship->name}}</p>

                                            <p><strong>{{__('text.customer')}}</strong> : {{$ship->customer->name}}</p>

                                            <p><strong>{{__('text.agent')}}</strong> : {{$ship->agent->name}}</p>

                                            <p><strong>{{__('text.expected_load')}}</strong> : {{$ship->expected_load}} KG</p>

                                            <p><strong>{{__('text.landing_date')}}</strong> : @if ($ship->landing_date != null) {{  date('d-m-Y',strtotime($ship->landing_date))}} @else {{__('text.undefined')}} @endif </p>

                                            <p><strong>{{__('text.landing_time')}}</strong> : @if ($ship->landing_time != null) {{date('H:i',strtotime($ship->landing_time)) }} @else {{__('text.undefined')}} @endif </p>

                                            <p><strong>{{__('text.departure_date')}}</strong> : @if ($ship->departure_date != null) {{date('d-m-Y',strtotime($ship->departure_date))}} @else {{__('text.undefined')}} @endif</p>

                                            <p><strong>{{__('text.departure_time')}}</strong> :@if ($ship->departure_time != null) {{ date('H:i',strtotime($ship->departure_time))}} @else {{__('text.undefined')}} @endif</p>

                                            <p><strong>{{__('text.created_by_user')}}</strong> :  {{$ship->user->name}} ({{$ship->user->email}})</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.operation_station')}}</strong> : {{$ship->operation_station->name}}</p>
                                            <p><strong>{{__('text.type_merchandise')}}</strong> : {{$ship->type_merchandise->name}}</p>
                                            <p><strong>{{__('text.cm')}}</strong> : {{$ship->cm}}</p>
                                            <p><strong>{{__('text.work_order')}}</strong> : {{$ship->work_order}}</p>
                                            <p><strong>{{__('text.type_operation')}}</strong> : {{$ship->type_operation->name}}</p>
                                            <p><strong>{{__('text.first_rope_release_date')}}</strong> : @if ($ship->first_rope_release_date != null) {{date('d-m-Y',strtotime($ship->first_rope_release_date)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.first_rope_release_time')}}</strong> : @if ($ship->first_rope_release_time != null) {{date('H:i',strtotime($ship->first_rope_release_time)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.last_rope_release_date')}}</strong> : @if ($ship->last_rope_release_date != null) {{date('d-m-Y',strtotime($ship->last_rope_release_date)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.last_rope_release_time')}}</strong> : @if ($ship->last_rope_release_time != null) {{date('H:i',strtotime($ship->last_rope_release_time)) }} @else {{__('text.undefined')}} @endif</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.ladder_positioning_date')}}</strong> : @if ($ship->ladder_positioning_date != null) {{date('d-m-Y',strtotime($ship->ladder_positioning_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.ladder_positioning_time')}}</strong> : @if ($ship->ladder_positioning_time != null) {{date('H:i',strtotime($ship->ladder_positioning_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.migration_on_board_date')}}</strong> : @if ($ship->migration_on_board_date != null) {{date('d-m-Y',strtotime($ship->migration_on_board_date)) }}@else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.migration_on_board_time')}}</strong> : @if ($ship->migration_on_board_time != null) {{date('H:i',strtotime($ship->migration_on_board_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.inspection_date')}}</strong> : @if ($ship->inspection_date != null) {{ date('d-m-Y',strtotime($ship->inspection_date))}} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.inspection_time')}}</strong> : @if ($ship->inspection_time != null) {{date('H:i',strtotime($ship->inspection_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.material_positioning_date')}}</strong> : @if ($ship->material_positioning_date != null) {{date('d-m-Y',strtotime($ship->material_positioning_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.material_positioning_time')}}</strong> : @if ($ship->material_positioning_time != null)  {{date('H:i',strtotime($ship->material_positioning_time)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.start_operation_date')}}</strong> : @if ($ship->start_operation_date != null) {{date('d-m-Y',strtotime($ship->start_operation_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.start_operation_time')}}</strong> : @if ($ship->start_operation_time != null) {{date('H:i',strtotime($ship->start_operation_time))}} @else {{__('text.undefined')}} @endif </p>
                                        </div>


                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <hr>
                                    
                                    <div class="w-100">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.shift')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$ship->shifts->count()}}</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.basement')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$ship->basements->count()}}</h3>
                                                                
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
                                                                <h3 class="mt-1 mb-3">{{$ship->tallybook->sum('load')}} KG</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.stop')}} </h5> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$ship->stops->count()}}</h3>
                                                                
                                                            </div>
                                                            <div class="col">
                                                                <h4 class="mt-1 mb-3">{{$time_total}} {{__('text.hours')}}</h4>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3><strong>{{__('text.shift')}}</strong></h3>
                                        </div> 
                                    </div>
                                    @if ($ship->status == 0)
                                    <a href="" data-toggle="modal" data-target="#exampleAddShift" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.shift')}}</a>
                                    @include('manager.ship.modal.addshift')
                                    @endif
                    
                                    <div class="table-responsive">
                                        <table id="myTable2" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}}</th>
                                                    <th style="width:25%">{{__('text.date')}}</th>
                                                    <th style="width:25%">Nº {{__('text.tallyclerk')}}</th>
                                                    <th style="width:20%">{{__('text.load')}}</th>
                                                    <th style="width:15%">{{__('text.status')}}</th>
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ship->shifts as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->shift->name}}</td>
                                                        <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td>{{$item->tallyclerkship->count()}}</td>
                                                        <td>{{$item->tallybook->sum('load')}} KG</td>
                                                        <td>
                                                            @if ($item->status==0) 
                                                            <span class="badge bg-danger">{{__('text.closed')}} </span> 
                                                            @endif
                                                            @if ($item->status==1) 
                                                            <span class="badge bg-success">{{__('text.opened')}} </span> 
                                                            @endif
                                                        </td>
                                                       
                                                       <td class="table-action">
                                                            @if ($ship->status == 0)
                                                             <a href="" data-toggle="modal" data-target="#exampleEditShift{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                            @endif
                                                            {{--<a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> --}}
                                                            <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a>
                                                            @if ($ship->status == 0)
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterDeleteShift{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="trash"></i></a>
                                                            @endif
                                                        </td> 
                                                    </tr>
                                                    @include('manager.ship.modal.editshift')
                                                    @include('manager.ship.modal.deleteshift')
                                                    {{-- @include('manager.meeting.modal.edittask')
                                                    @include('manager.meeting.modal.copytask')
                                                    @include('manager.meeting.modal.deletetask') --}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>


                                        <hr>

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3><strong>{{__('text.basement')}}</strong></h3>
                                        </div> 
                                    </div>
                                    @if ($ship->status == 0)
                                    <a href="" data-toggle="modal" data-target="#exampleAddBasement" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.basement')}}</a>
                                    @include('manager.ship.modal.addbasement')
                                    @endif
                    
                                    <div class="table-responsive">
                                        <table id="myTable" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}} {{__('text.basement')}}</th>
                                                    <th style="width:25%">{{__('text.ship')}}</th>
                                                    <th style="width:25%">{{__('text.stevedor_number')}}</th>
                                                    <th style="width:25%">Nº {{__('text.tally_book')}}</th>
                                                    <th style="width:25%">{{__('text.load')}}</th>
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ship->basements as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$ship->name}}</td>
                                                        <td>{{$item->stevedor_number}}</td>
                                                        <td>{{$item->tallybook->count()}}</td>
                                                        <td>{{$item->tallybook->sum('load')}} KG</td>
                                                       <td class="table-action">
                                                        <a href="{{URL::to('/manager-basement/'.$item->id)}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a>
                                                            {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenterEditTask{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> 
                                                            <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a>--}}
                                                            @if ($ship->status == 0)
                                                            <a href="" data-toggle="modal" data-target="#exampleEditBasement{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterDeleteBasement{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="trash"></i></a>
                                                            @endif
                                                        </td> 
                                                    </tr>
                                                    @include('manager.ship.modal.deletebasement')
                                                    @include('manager.ship.modal.editbasement')
                                                    {{-- @include('manager.meeting.modal.edittask')
                                                    @include('manager.meeting.modal.copytask')
                                                    @include('manager.meeting.modal.deletetask') --}}
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