@extends('layout_admin.master')
@section('content')
<div class="container-fluid p-0">
    
    
    <h1 class="h3 mb-3">{{__('text.ship')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <a href="{{route('ship.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>{{__('text.add')}}</a> 
                   
                </div>
                
                <div class="card-body">
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
                            @foreach ($ships as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->customer->name}}</td>
                                    <td>{{$item->agent->name}}</td>
                                    <td>{{$item->operation_station->name}}</td>
                                    <td>{{$item->type_merchandise->name}}</td>
                                    <td>{{$item->tallybook->sum('load')}} KG</td>
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
                                        <a href="{{URL::to('/ship/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                        <a href="{{URL::to('/ship/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                       
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a>
                                       
                                    </td> 
                                </tr>
                                @include('admin.ship.modaldelete')
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection