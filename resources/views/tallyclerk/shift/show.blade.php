@extends('layout_tally_clerk.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.shift')}} {{__('text.ship')}}</h1>

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
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


    
        <div class="col-md-12">
            <a href="{{route('tallyclerk-shift.index')}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
            <div class="row">
                <div class="alert @if ($tally_clerk_ships->shiftship->status==0) alert-danger @else alert-success @endif alert-dismissible" role="alert">
                    {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button> --}}
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>
                            @if ($tally_clerk_ships->shiftship->status==0)
                            {{__('text.shift')}} {{__('text.closed')}}
                            @else
                            {{__('text.shift')}} {{__('text.opened')}}
                            @endif
                        </strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.name')}}</strong> : {{$tally_clerk_ships->ship->name}}</p>

                                            <p><strong>{{__('text.customer')}}</strong> : {{$tally_clerk_ships->ship->customer->name}}</p>

                                            <p><strong>{{__('text.agent')}}</strong> : {{$tally_clerk_ships->ship->agent->name}}</p>

                                             <p><strong>{{__('text.expected_load')}}</strong> : {{$tally_clerk_ships->ship->expected_load}} KG</p>

                                            <p><strong>{{__('text.landing_date')}}</strong> : @if ($tally_clerk_ships->ship->landing_date != null) {{  date('d-m-Y',strtotime($tally_clerk_ships->ship->landing_date))}} @else {{__('text.undefined')}} @endif </p>

                                            <p><strong>{{__('text.landing_time')}}</strong> : @if ($tally_clerk_ships->ship->landing_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->landing_time)) }} @else {{__('text.undefined')}} @endif </p>

                                            <p><strong>{{__('text.departure_date')}}</strong> : @if ($tally_clerk_ships->ship->departure_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->departure_date))}} @else {{__('text.undefined')}} @endif</p>

                                            <p><strong>{{__('text.departure_time')}}</strong> :@if ($tally_clerk_ships->ship->departure_time != null) {{ date('H:i',strtotime($tally_clerk_ships->ship->departure_time))}} @else {{__('text.undefined')}} @endif</p>

                                            <p><strong>{{__('text.created_by_user')}}</strong> :  {{$tally_clerk_ships->ship->user->name}} ({{$tally_clerk_ships->ship->user->email}})</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.type_merchandise')}}</strong> : {{$tally_clerk_ships->ship->operation_station->name}}</p>
                                            <p><strong>{{__('text.type_merchandise')}}</strong> : {{$tally_clerk_ships->ship->type_merchandise->name}}</p>
                                            <p><strong>{{__('text.cm')}}</strong> : {{$tally_clerk_ships->ship->cm}}</p>
                                            <p><strong>{{__('text.work_order')}}</strong> : {{$tally_clerk_ships->ship->work_order}}</p>
                                            <p><strong>{{__('text.type_operation')}}</strong> : {{$tally_clerk_ships->ship->type_operation->name}}</p>
                                            <p><strong>{{__('text.first_rope_release_date')}}</strong> : @if ($tally_clerk_ships->ship->first_rope_release_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->first_rope_release_date)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.first_rope_release_time')}}</strong> : @if ($tally_clerk_ships->ship->first_rope_release_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->first_rope_release_time)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.last_rope_release_date')}}</strong> : @if ($tally_clerk_ships->ship->last_rope_release_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->last_rope_release_date)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.last_rope_release_time')}}</strong> : @if ($tally_clerk_ships->ship->last_rope_release_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->last_rope_release_time)) }} @else {{__('text.undefined')}} @endif</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.ladder_positioning_date')}}</strong> : @if ($tally_clerk_ships->ship->ladder_positioning_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->ladder_positioning_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.ladder_positioning_time')}}</strong> : @if ($tally_clerk_ships->ship->ladder_positioning_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->ladder_positioning_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.migration_on_board_date')}}</strong> : @if ($tally_clerk_ships->ship->migration_on_board_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->migration_on_board_date)) }}@else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.migration_on_board_time')}}</strong> : @if ($tally_clerk_ships->ship->migration_on_board_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->migration_on_board_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.inspection_date')}}</strong> : @if ($tally_clerk_ships->ship->inspection_date != null) {{ date('d-m-Y',strtotime($tally_clerk_ships->ship->inspection_date))}} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.inspection_time')}}</strong> : @if ($tally_clerk_ships->ship->inspection_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->inspection_time)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.material_positioning_date')}}</strong> : @if ($tally_clerk_ships->ship->material_positioning_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->material_positioning_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.material_positioning_time')}}</strong> : @if ($tally_clerk_ships->ship->material_positioning_time != null)  {{date('H:i',strtotime($tally_clerk_ships->ship->material_positioning_time)) }} @else {{__('text.undefined')}} @endif</p>
                                            <p><strong>{{__('text.start_operation_date')}}</strong> : @if ($tally_clerk_ships->ship->start_operation_date != null) {{date('d-m-Y',strtotime($tally_clerk_ships->ship->start_operation_date)) }} @else {{__('text.undefined')}} @endif </p>
                                            <p><strong>{{__('text.start_operation_time')}}</strong> : @if ($tally_clerk_ships->ship->start_operation_time != null) {{date('H:i',strtotime($tally_clerk_ships->ship->start_operation_time))}} @else {{__('text.undefined')}} @endif </p>
                                        </div>


                                        
                                    </div>
                                    {{--<p>{{__('text.name')}}: {{$tally_clerk_ships->ship->name}}</p>
                                    <p>{{__('text.customer')}}: {{$tally_clerk_ships->ship->customer->name}}</p>
                                    <p>{{__('text.created_by_user')}}: {{$tally_clerk_ships->ship->user->name}}</p>
                                    <p>{{__('text.landing_date')}}: {{$tally_clerk_ships->ship->landing_date}}</p>
                                    <p>{{__('text.landing_time')}}: {{$tally_clerk_ships->ship->landing_date}}</p>
                                    <p>{{__('text.departure_date')}}: {{$tally_clerk_ships->ship->departure_date}}</p>
                                    <p>{{__('text.departure_time')}}: {{$tally_clerk_ships->ship->departure_time}}</p>
                                    <p>{{__('text.agent')}}: {{$tally_clerk_ships->ship->agent}}</p>
                                    <p>{{__('text.type_merchandise')}}: {{$tally_clerk_ships->ship->type_merchandise}}</p>
                                    <p>{{__('text.cm')}}: {{$tally_clerk_ships->ship->cm}}</p>
                                    <p>{{__('text.work_order')}}: {{$tally_clerk_ships->ship->work_order}}</p>
                                    <p>{{__('text.type_operation')}}: {{$tally_clerk_ships->ship->type_operation->name}}</p>
                                    <p>{{__('text.first_rope_release_date')}}: {{$tally_clerk_ships->ship->first_rope_release_date}}</p>
                                    <p>{{__('text.first_rope_release_time')}}: {{$tally_clerk_ships->ship->first_rope_release_time}}</p>
                                    <p>{{__('text.last_rope_release_date')}}: {{$tally_clerk_ships->ship->last_rope_release_date}}</p>
                                    <p>{{__('text.last_rope_release_time')}}: {{$tally_clerk_ships->ship->last_rope_release_time}}</p>
                                    <p>{{__('text.ladder_positioning_date')}}: {{$tally_clerk_ships->ship->ladder_positioning_date}}</p>
                                    <p>{{__('text.ladder_positioning_time')}}: {{$tally_clerk_ships->ship->ladder_positioning_time}}</p>
                                    <p>{{__('text.migration_on_board_date')}}: {{$tally_clerk_ships->ship->migration_on_board_date}}</p>
                                    <p>{{__('text.migration_on_board_time')}}: {{$tally_clerk_ships->ship->migration_on_board_time}}</p>
                                    <p>{{__('text.inspection_date')}}: {{$tally_clerk_ships->ship->inspection_date}}</p>
                                    <p>{{__('text.inspection_time')}}: {{$tally_clerk_ships->ship->inspection_time}}</p>
                                    <p>{{__('text.material_positioning_date')}}: {{$tally_clerk_ships->ship->material_positioning_date}}</p>
                                    <p>{{__('text.material_positioning_time')}}: {{$tally_clerk_ships->ship->material_positioning_time}}</p>
                                    <p>{{__('text.start_operation_date')}}: {{$tally_clerk_ships->ship->start_operation_date}}</p>
                                    <p>{{__('text.start_operation_time')}}: {{$tally_clerk_ships->ship->start_operation_time}}</p>
                                    <p>{{$tally_clerk_ships->shiftship->status}}</p> --}}
                                    <hr>

                                    <div class="w-100">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.shift')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tally_clerk_ships->shiftship->shift->name}}</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.date')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{date('d-m-Y',strtotime($tally_clerk_ships->date))}}</h3>
                                                                
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
                                                                <h3 class="mt-1 mb-3">{{$tally_clerk_ships->shiftship->stops->count()}}</h3>
                                                                
                                                            </div>
                                                            <div class="col">
                                                                <h5 class="mt-1 mb-3">{{$time_total}} {{__('text.hours')}}</h5>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.used_equipment')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tally_clerk_ships->shiftship->equipments->count()}}</h3>
                                                                
                                                            </div>
                                                            <div class="col">
                                                                <h5 class="mt-1 mb-3">{{$time_equipment_total}} {{__('text.hours')}}</h5>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.load')}} {{__('text.total')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tally_clerk_ships->shiftship->tallybook->sum('load')}} KG</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.load')}} ({{Auth::user()->name}}) </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tally_book->sum('load')}} KG</h3>
                                                                
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
                                            <h3><strong>{{__('text.tally_book')}}</strong></h3>
                                            <h4><strong>{{__('text.tallyclerk')}}: {{Auth::user()->name}}</strong></h4>
                                        </div> 
                                    </div>

                                    @if ($tally_clerk_ships->shiftship->status == 1)
                                        <a href="" data-toggle="modal" data-target="#exampleAddTallyBook" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.tally_book')}}</a>
                                        @include('tallyclerk.shift.modal.addtallybook')
                                    @endif
                                   
                    
                                    <div class="table-responsive">
                                        <table id="myTable2" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:10%">{{__('text.time')}} | {{__('text.date')}} </th>
                                                    <th style="width:12%">{{__('text.truck_plate')}}</th>
                                                    <th style="width:12%">{{__('text.trailer_plate')}}</th>
                                                    <th style="width:15%">{{__('text.type_merchandise')}}</th>
                                                    <th style="width:10%">{{__('text.load')}}</th>
                                                    <th style="width:12%">{{__('text.basement')}}</th>
                                                    <th style="width:12%">{{__('text.destination')}}</th>
                                                    <th style="width:30%">{{__('text.obs')}}</th>
                                                    @if ($tally_clerk_ships->shiftship->status == 1)
                                                        <th>{{__('text.action')}}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tally_book as $item)
                                                    
                                               
                                                
                                                    <tr>
                                                        
                                                        <td>{{date('H:i',strtotime($item->time))}} | {{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td>{{$item->truck_plate}}</td>
                                                        <td>{{$item->trailer_plate}}</td>
                                                        <td>{{$item->type_merchandise->name}}</td>
                                                        <td>{{$item->load}} KG</td>
                                                        <td>{{$item->basement->name ?? ''}}</td>
                                                        <td>{{$item->destination->name ?? ''}}</td>
                                                        <td>{{$item->obs}}</td>

                                                        @if ($tally_clerk_ships->shiftship->status == 1)
                                                        <td class="table-action">
                                                                <a href="" data-toggle="modal" data-target="#exampleEditTallyBook{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                                {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> 
                                                                <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a> --}}
                                                                <a href="" data-toggle="modal" data-target="#exampleModalCenterDeleteTallyBook{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="trash"></i></a>
                                                            </td> 
                                                        @endif
                                                    </tr>
                                                    @include('tallyclerk.shift.modal.edittallybook')
                                                    @include('tallyclerk.shift.modal.deletetask')
                                                    {{-- @include('tallyclerk.shift.modal.edittask')
                                                    @include('tallyclerk.shift.modal.copytask')
                                                    @include('tallyclerk.shift.modal.deletetask') --}}
                                                    @endforeach
                                              
                                            </tbody>
                                        </table>
                                        </div>

                                        <hr>

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3><strong>{{__('text.stop')}}</strong></h3>
                                        </div> 
                                    </div>

                                    @if ($tally_clerk_ships->shiftship->status == 1)
                                        <a href="" data-toggle="modal" data-target="#exampleAddStop" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.stop')}}</a>
                                        @include('tallyclerk.shift.modal.addstop')
                                    @endif
                                    
                                   
                    
                                    <div class="table-responsive">
                                        <table id="myTable" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:15%">{{__('text.start_date')}}</th>
                                                    
                                                    <th style="width:15%">{{__('text.end_date')}}</th>
                                                    <th style="width:15%">{{__('text.time')}} {{__('text.stop')}}</th>
                                                    <th style="width:15%">{{__('text.basement')}}</th>
                                                    <th style="width:30%">{{__('text.reason')}}</th>
                                                    <th style="width:12%">{{__('text.created_by_user')}}</th>
                                                    <th style="width:15%">{{__('text.status')}}</th>
                                                    @if ($tally_clerk_ships->shiftship->status == 1)
                                                        <th>{{__('text.action')}}</th>
                                                    @endif
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($stops as $item)
                                                    
                                               
                                                
                                                    <tr>
                                                        
                                                        <td>{{date('d-m-Y H:i',strtotime($item->start_date))}}</td>
                                                        
                                                        <td>
                                                            @if ($item->end_date != null)
                                                                
                                                            {{date('d-m-Y H:i',strtotime($item->end_date))}}
                                                                
                                                            @endif
                                                        </td>

                                                         @if ($item->end_date == null)
                                                            <?php
                                                                $created_at = strtotime($item->start_date);
                                                                $closed_at = strtotime(Date::now());

                                                                $time = $closed_at - $created_at;


                                                            ?>
                                                            <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                                            @else
                                                            <?php
                                                            $created_at = strtotime($item->start_date);
                                                            $closed_at = strtotime($item->end_date);

                                                            $time = $closed_at - $created_at;


                                                            ?>
                                                            <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                                            @endif
                                                  
                                                        <td>{{$item->basement->name ?? __('text.general')}}</td>
                                                        <td>{{$item->reason}}</td>
                                                        <td>{{$item->user->name}}</td>
                                                        <td>
                                                            @if ($item->status == 0)
                                                            <span class="badge bg-danger">{{__('text.ongoing')}} </span> 
                                                            @else
                                                            <span class="badge bg-success">{{__('text.finished')}} </span> 
                                                            @endif
                                                        </td>
                                                    

                                                        @if ($tally_clerk_ships->shiftship->status == 1)
                                                        
                                                        <td class="table-action">
                                                                @if ($item->end_date == null && $item->created_by_user_id == Auth::user()->id)
                                                                <a href="" data-toggle="modal" data-target="#exampleEditStop{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                                @endif
                                                                
                                                                {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> 
                                                                <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a> --}}
                                                               
                                                        </td> 
                                                        @endif
                                                   
                                                    </tr>
                                                   
                                                    @include('tallyclerk.shift.modal.editstop')
                                                    {{-- @include('tallyclerk.shift.modal.edittask')
                                                    @include('tallyclerk.shift.modal.copytask')
                                                    @include('tallyclerk.shift.modal.deletetask') --}}
                                                    @endforeach
                                              
                                            </tbody>
                                        </table>
                                        </div>

                                          {{-- Registro de utilização de equipamento --}}

                                          <hr>

                                          <div class="row mb-2 mb-xl-3">
                                              <div class="col-auto d-none d-sm-block">
                                                  <h3>{{__('text.used_equipment')}}</h3>
                                              </div> 
                                          </div>
                                          {{-- @if ($shiftship->ship->status == 0)
                                          @if ($shiftship->status == 1)
                                              <a href="" data-toggle="modal" data-target="#exampleAddEquipment" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.used_equipment')}}</a>
                                              @include('manager.ship.tallyclerkshift.modal.addequipment')
                                          @endif
                                          @endif --}}


                                          <div class="table-responsive">
                                              <table id="myTable4" class="table display" >
                                                  <thead>
                                                      <tr>
                                                          {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                          <th style="width:15%">{{__('text.start_date')}}</th>
                                                          
                                                          <th style="width:15%">{{__('text.end_date')}}</th>
                                                          <th style="width:15%">{{__('text.hours_used')}}</th>
                                  
                                                          <th style="width:30%">{{__('text.name')}} {{__('text.equipment')}}</th>
                                                          <th style="width:30%">{{__('text.reference')}}</th>
                                                          <th style="width:30%">{{__('text.operator')}}</th>
                                                          <th style="width:12%">{{__('text.created_by_user')}}</th>
                                                          <th style="width:15%">{{__('text.status')}}</th>
                                                          {{-- <th style="width:15%">{{__('text.action')}}</th> --}}
                                                          
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach ($used_equipments as $item)
                                                          
                                                     
                                                      
                                                          <tr>
                                                              
                                                              <td>{{date('d-m-Y H:i',strtotime($item->start_date))}}</td>
                                                              
                                                              <td>
                                                                  @if ($item->end_date != null)
                                                                      
                                                                  {{date('d-m-Y H:i',strtotime($item->end_date))}}
                                                                      
                                                                  @endif
                                                              </td>
                                                              @if ($item->end_date == null)
                                                              <?php
                                                                  $created_at = strtotime($item->start_date);
                                                                  $closed_at = strtotime(Date::now());
  
                                                                  $time = $closed_at - $created_at;
  
  
                                                              ?>
                                                              <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                                              @else
                                                              <?php
                                                              $created_at = strtotime($item->start_date);
                                                              $closed_at = strtotime($item->end_date);
  
                                                              $time = $closed_at - $created_at;
  
  
                                                              ?>
                                                              <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                                              @endif
                                                        
                                                              <td>{{$item->name}}</td>
                                                              <td>{{$item->reference}}</td>
                                                              <td>{{$item->operator}}</td>
                                                              <td>{{$item->user->name}}</td>
                                                              <td>
                                                                  @if ($item->status == 0)
                                                                  <span class="badge bg-danger">{{__('text.ongoing')}} </span> 
                                                                  @else
                                                                  <span class="badge bg-success">{{__('text.finished')}} </span> 
                                                                  @endif
                                                              </td>
                                                          
      
                                                              
                                                              
                                                              {{-- <td class="table-action">
                                                                      @if ($item->end_date == null)
                                                                      <a href="" data-toggle="modal" data-target="#exampleEditEquipment{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                                      @endif
                                                                      
                                                                       <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> 
                                                                      <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a> 
                                                                     
                                                              </td>  --}}
                                                         
                                                          </tr>
                                                         {{-- @include('manager.ship.tallyclerkshift.modal.editequipment')
                                                          @include('tallyclerk.shift.modal.editstop')
                                                           @include('tallyclerk.shift.modal.edittask')
                                                          @include('tallyclerk.shift.modal.copytask')
                                                          @include('tallyclerk.shift.modal.deletetask') --}}
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