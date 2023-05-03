@extends('layout_admin.master')
@section('content')
<div class="container-fluid p-0">
    
    
    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <a href="{{route('shift.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>{{__('text.add')}}</a> 
                   
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
                                <th style="width:25%">{{__('text.name')}}</th>
                                <th style="width:25%">{{__('text.start_time')}}</th>
                                <th style="width:25%">{{__('text.end_time')}}</th>
                               
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shifts as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td>
                                   
                                   

                                    <td class="table-action">
                                        <a href="{{URL::to('/shift/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                        <a href="{{URL::to('/shift/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                       
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a>
                                       
                                    </td> 
                                </tr>
                                @include('admin.shift.modaldelete')
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