@extends('layout_tally_clerk.master')
@section('content')
<div class="container-fluid p-0">
    
    
    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     {{-- <a href="{{route('manager-ship.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>{{__('text.add')}}</a>  --}}
                   
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
                    <table id="myTableTallyClerk" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:20%">{{__('text.date')}}</th>
                                <th style="width:20%">{{__('text.shift')}}</th>
                                <th style="width:15%">{{__('text.name')}}</th>
                                <th style="width:25%">{{__('text.type_merchandise')}}</th>
                                <th style="width:15%">{{__('text.status')}}</th>

                               
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tally_clerk_ships as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{date('d-m-Y',strtotime($item->shiftship->date))}}</td>
                                    <td>{{$item->shiftship->shift->name}}</td>
                                    <td>{{$item->ship->name}}</td>
                                    <td>{{$item->ship->type_merchandise->name}}</td>
                                    <td>
                                        @if ($item->shiftship->status==0) 
                                        <span class="badge bg-danger">{{__('text.closed')}} </span> 
                                        @endif
                                        @if ($item->shiftship->status==1) 
                                        <span class="badge bg-success">{{__('text.opened')}} </span> 
                                        @endif
                                        @if ($item->shiftship->status==2) 
                                        <span class="badge bg-warning">{{__('text.opened')}} </span> 
                                        @endif
                                    </td>
                                   
                                   

                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/manager-ship/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        <a href="{{URL::to('/tallyclerk-shift/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                       
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                       
                                    </td> 
                                </tr>
                                {{-- @include('manager.ship.modaldelete') --}}
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