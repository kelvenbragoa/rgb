@extends('layout_admin.master')
@section('content')


<div class="container-fluid p-0">
    
    <h1 class="h3 mb-3">{{__('text.basement')}}</h1>
    <a href="{{URL::to('/ship/'.$basement->ship_id)}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
    <a href="{{URL::to('/basement-report/'.$basement->id)}}" target="_blank" class="btn btn-pill btn-primary mb-3"><i class="far fa-file"></i>{{__('text.download')}}</a>
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

                                    <p><strong>{{__('text.ship')}}: </strong> {{$basement->ship->name}}</p>
                                    <p><strong>{{__('text.basement')}}: </strong> {{$basement->name}}</p>
                                    <p><strong>{{__('text.tally_book')}}: </strong> {{$basement->tallybook->count()}}</p>
                                    <p><strong>{{__('text.load')}}: </strong> {{$basement->tallybook->sum('load')}} KG</p>
                               

                                  

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
                                                    <th style="width:12%">{{__('text.tallyclerk')}}</th>
                                                    <th style="width:30%">{{__('text.obs')}}</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($basement->tallybook as $item)
                                                    
                                               
                                                
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
                                                    {{--@include('tallyclerk.shift.modal.edittallybook')
                                                    @include('tallyclerk.shift.modal.deletetask')
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