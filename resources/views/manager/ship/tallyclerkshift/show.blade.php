@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">
    
    <h1 class="h3 mb-3">{{__('text.tallyclerk')}}</h1>
    <a href="{{URL::to('manager-shiftship/'.$shiftship->id.'/manager-tallyclerkship')}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3>{{__('text.general')}}</h3>
                                        </div> 
                                    </div>


                                    <p><strong>{{__('text.tallyclerk')}}: </strong> {{$tallyclerk->name}}</p>
                                    <p><strong>{{__('text.mobile')}}: </strong> {{$tallyclerk->mobile}}</p>
                                    <p><strong>{{__('text.email')}}: </strong> {{$tallyclerk->email}}</p>
                                    <p><strong>{{__('text.shift')}}: </strong> {{$shiftship->shift->name}}</p>
                                    <p><strong>{{__('text.date')}}: </strong> {{date('d-m-Y',strtotime($shiftship->date))}}</p>
                                    <p><strong>{{__('text.ship')}}: </strong> {{$ship->name}}</p>

                                    <hr>

                                    <div class="w-100">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.tally_book')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$tallybook->count()}}</h3>
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
                                                                <h3 class="mt-1 mb-3">{{$tallybook->sum('load')}} KG</h3>
                                                                
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
                                                                <h3 class="mt-1 mb-3">{{$stops->count()}}</h3>
                                                                
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
                                            <h3>{{__('text.tally_book')}}</h3>
                                        </div> 
                                    </div>

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
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tallybook as $item)
                                                    
                                               
                                                
                                                    <tr>
                                                        
                                                        <td>{{date('H:i',strtotime($item->time))}} | {{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td>{{$item->truck_plate}}</td>
                                                        <td>{{$item->trailer_plate}}</td>
                                                        <td>{{$item->type_merchandise->name}}</td>
                                                        <td>{{$item->load}} KG</td>
                                                        <td>{{$item->basement->name ?? ''}}</td>
                                                        <td>{{$item->destination->name ?? ''}}</td>
                                                        <td>{{$item->obs}}</td>

                                                    
                                                    </tr>
                                                    {{--@include('tallyclerk.shift.modal.edittallybook')
                                                    @include('tallyclerk.shift.modal.deletetask')
                                                     @include('tallyclerk.shift.modal.edittask')
                                                    @include('tallyclerk.shift.modal.copytask')
                                                    @include('tallyclerk.shift.modal.deletetask') --}}
                                                    @endforeach
                                              
                                            </tbody>
                                        </table>
                                        </div>

                                        <hr>

                                            <div class="row mb-2 mb-xl-3">
                                                <div class="col-auto d-none d-sm-block">
                                                    <h3>{{__('text.stop')}}</h3>
                                                </div> 
                                            </div>

                                            <div class="table-responsive">
                                                <table id="myTable3" class="table display" >
                                                    <thead>
                                                        <tr>
                                                            {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                            <th style="width:15%">{{__('text.start_date')}}</th>
                                                            
                                                            <th style="width:15%">{{__('text.end_date')}}</th>
                                                            <th style="width:15%">{{__('text.time')}} {{__('text.stop')}}</th>
                                    
                                                            <th style="width:30%">{{__('text.reason')}}</th>
                                                            <th style="width:12%">{{__('text.created_by_user')}}</th>
                                                            <th style="width:15%">{{__('text.status')}}</th>
                                                            
                                                            
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