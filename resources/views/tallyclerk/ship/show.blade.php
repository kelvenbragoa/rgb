@extends('layout_tally_clerk.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.ship')}}</h1>

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
            <a href="{{route('manager-ship.index')}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{__('text.name')}}: {{$ship->name}}</p>
                                    <p>{{__('text.customer')}}: {{$ship->customer->name}}</p>
                                    <p>{{__('text.created_by_user')}}: {{$ship->user->name}}</p>
                                    <p>{{__('text.landing_date')}}: {{$ship->landing_date}}</p>
                                    <p>{{__('text.landing_time')}}: {{$ship->landing_date}}</p>
                                    <p>{{__('text.departure_date')}}: {{$ship->departure_date}}</p>
                                    <p>{{__('text.departure_time')}}: {{$ship->departure_time}}</p>
                                    <p>{{__('text.agent')}}: {{$ship->agent}}</p>
                                    <p>{{__('text.type_merchandise')}}: {{$ship->type_merchandise}}</p>
                                    <p>{{__('text.cm')}}: {{$ship->cm}}</p>
                                    <p>{{__('text.work_order')}}: {{$ship->work_order}}</p>
                                    <p>{{__('text.type_operation')}}: {{$ship->type_operation->name}}</p>
                                    <p>{{__('text.first_rope_release_date')}}: {{$ship->first_rope_release_date}}</p>
                                    <p>{{__('text.first_rope_release_time')}}: {{$ship->first_rope_release_time}}</p>
                                    <p>{{__('text.last_rope_release_date')}}: {{$ship->last_rope_release_date}}</p>
                                    <p>{{__('text.last_rope_release_time')}}: {{$ship->last_rope_release_time}}</p>
                                    <p>{{__('text.ladder_positioning_date')}}: {{$ship->ladder_positioning_date}}</p>
                                    <p>{{__('text.ladder_positioning_time')}}: {{$ship->ladder_positioning_time}}</p>
                                    <p>{{__('text.migration_on_board_date')}}: {{$ship->migration_on_board_date}}</p>
                                    <p>{{__('text.migration_on_board_time')}}: {{$ship->migration_on_board_time}}</p>
                                    <p>{{__('text.inspection_date')}}: {{$ship->inspection_date}}</p>
                                    <p>{{__('text.inspection_time')}}: {{$ship->inspection_time}}</p>
                                    <p>{{__('text.material_positioning_date')}}: {{$ship->material_positioning_date}}</p>
                                    <p>{{__('text.material_positioning_time')}}: {{$ship->material_positioning_time}}</p>
                                    <p>{{__('text.start_operation_date')}}: {{$ship->start_operation_date}}</p>
                                    <p>{{__('text.start_operation_time')}}: {{$ship->start_operation_time}}</p>

                                    <hr>

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3><strong>{{__('text.shift')}}</strong></h3>
                                        </div> 
                                    </div>
                                    <a href="" data-toggle="modal" data-target="#exampleAddShift" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.shift')}}</a>
                                    @include('manager.ship.modal.addshift')
                    
                                    <div class="table-responsive">
                                        <table id="myTable2" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}}</th>
                                                    <th style="width:25%">{{__('text.date')}}</th>
                                                    <th style="width:25%">Nº {{__('text.tallyclerk')}}</th>
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ship->shifts as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->shift->name}}</td>
                                                        <td>{{$item->date}}</td>
                                                        <td>{{$item->tallyclerkship->count()}}</td>
                                                       
                                                       <td class="table-action">
                                                            {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenterEditTask{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> --}}
                                                            <a href="{{URL::to('manager-shiftship/'.$item->id.'/manager-tallyclerkship')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterDeleteTask{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="trash"></i></a>
                                                        </td> 
                                                    </tr>
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