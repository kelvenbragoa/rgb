@extends('layout_customer.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.reports')}}</h1>

    <div class="row">
       
        <div class="col-md-12">
            <a href="{{URL::to('/customer-ship/'.$ship->id)}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
            <a href="{{URL::to('/customer-general-report/'.$ship->id)}}" target="_blank" class="btn btn-pill btn-primary mb-3"><i class="far fa-file"></i>{{__('text.download')}}</a>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <p><strong>{{__('text.name')}}</strong> : {{$ship->name}}</p>

                                            <p><strong>{{__('text.customer')}}</strong> : {{$ship->customer->name}}</p>

                                            <p><strong>{{__('text.agent')}}</strong> : {{$ship->agent->name}}</p>

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

                                    <hr style="border: 2px solid rgb(0, 0, 0);">
                                    
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


                                    <hr style="border: 2px solid rgb(0, 0, 0);">

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3><strong>{{__('text.shift')}}</strong></h3>
                                        </div> 
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}}</th>
                                                    <th style="width:25%">{{__('text.date')}}</th>
                                                    <th style="width:25%">Nº {{__('text.tallyclerk')}}</th>
                                                    <th style="width:20%">{{__('text.load')}}</th>
                                                   
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ship->shifts as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->shift->name}}</td>
                                                        <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td>{{$item->tallyclerkship->count()}}</td>
                                                        <td>{{$item->tallybook->sum('load')}} KG</td>
                                                        
                                                       
                                                      
                                                    </tr>
                                                    
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>

                                        <hr style="border: 2px solid rgb(0, 0, 0);">

                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto d-none d-sm-block">
                                                <h3><strong>{{__('text.basement')}}</strong></h3>
                                            </div> 
                                        </div>

                                       


                                    <div class="table-responsive">
                                        <table class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}} {{__('text.basement')}}</th>
                                                    <th style="width:25%">{{__('text.ship')}}</th>
                                                    <th style="width:25%">Nº {{__('text.tally_book')}}</th>
                                                    <th style="width:25%">{{__('text.load')}}</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ship->basements as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$ship->name}}</td>
                                                        <td>{{$item->tallybook->count()}}</td>
                                                        <td>{{$item->tallybook->sum('load')}} KG</td>
                                                      
                                                    </tr>
                                                   
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>


                                    @foreach ($ship->shifts as $itemshift)
                                        <p><strong>Turno: </strong>{{$itemshift->shift->name}}</p>
                                        <p><strong>Data: </strong> {{date('d-m-Y',strtotime($itemshift->date))}}</p>
                                        <p><strong>Total Carga:</strong>{{$itemshift->tallybook->sum('load')}} KG</p>
                                        <p><strong>Conferentes:</strong>{{$itemshift->tallyclerkship->count()}}</p>

                                       
                                        
                                        <p><h4>Tallybook</h4> </p>
                                        <div class="table-responsive">
                                            <table class="table display">
                                                <thead>
                                                    <tr>
                                                        {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                        <th style="width:10%">{{__('text.time')}} | {{__('text.date')}} </th>
                                                        <th style="width:12%">{{__('text.truck_plate')}}</th>
                                                        <th style="width:12%">{{__('text.trailer_plate')}}</th>
                                                        <th style="width:15%">{{__('text.type_merchandise')}}</th>
                                                        <th style="width:10%">{{__('text.load')}}</th>
                                                        <th style="width:12%">{{__('text.basement')}}</th>
                                                        <th style="width:12%">{{__('text.tallyclerk')}}</th>
                                                        <th style="width:30%">{{__('text.obs')}}</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($itemshift->tallybook as $item)
                                                        
                                                   
                                                    
                                                        <tr>
                                                            
                                                            <td>{{date('H:i',strtotime($item->time))}} | {{date('d-m-Y',strtotime($item->date))}}</td>
                                                            <td>{{$item->truck_plate}}</td>
                                                            <td>{{$item->trailer_plate}}</td>
                                                            <td>{{$item->type_merchandise->name}}</td>
                                                            <td>{{$item->load}} KG</td>
                                                            <td>{{$item->basement->name}}</td>
                                                            <td>{{$item->tallyclerk->name}}</td>
                                                            <td>{{$item->obs}}</td>
    
                                                            
                                                        </tr>
                                                       
                                                        @endforeach
                                                  
                                                </tbody>
                                            </table>
                                            </div>

                                            <p><h4>Paragens</h4> </p>

                                            <div class="table-responsive">
                                                <table class="table display" >
                                                    <thead>
                                                        <tr>
                                                            <th style="width:15%">{{__('text.start_date')}}</th>
                                                            <th style="width:15%">{{__('text.end_date')}}</th>
                                                            <th style="width:15%">{{__('text.time')}} {{__('text.stop')}}</th>
                                                            <th style="width:30%">{{__('text.reason')}}</th>
                                                            <th style="width:12%">{{__('text.created_by_user')}}</th>
                                                            <th style="width:15%">{{__('text.status')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($itemshift->stops as $item)
                                                            
                                                       
                                                        
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
                                                          
                                                                <td>{{$item->reason}}</td>
                                                                <td>{{$item->user->name}}</td>
                                                                <td>
                                                                    @if ($item->status == 0)
                                                                    <span class="badge bg-danger">{{__('text.ongoing')}} </span> 
                                                                    @else
                                                                    <span class="badge bg-success">{{__('text.finished')}} </span> 
                                                                    @endif
                                                                </td>
                                                            
        
                                                                
                                                                
                                                                {{--<td class="table-action">
                                                                        @if ($item->end_date == null && $item->created_by_user_id == Auth::user()->id)
                                                                        <a href="" data-toggle="modal" data-target="#exampleEditStop{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                                        @endif
                                                                        
                                                                         <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> 
                                                                        <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a> 
                                                                       
                                                                </td> --}}
                                                             
                                                           
                                                            </tr>
                                                           
                                                           {{-- @include('tallyclerk.shift.modal.editstop')
                                                             @include('tallyclerk.shift.modal.edittask')
                                                            @include('tallyclerk.shift.modal.copytask')
                                                            @include('tallyclerk.shift.modal.deletetask') --}}
                                                            @endforeach
                                                      
                                                    </tbody>
                                                </table>
                                                </div>

                                           
                                                <hr style="border: 2px solid rgb(0, 0, 0);">
                                    @endforeach

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