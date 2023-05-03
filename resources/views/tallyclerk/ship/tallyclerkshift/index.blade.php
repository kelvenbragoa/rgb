@extends('layout_tally_clerk.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>

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
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>
                                </div>
                                

                                <div class="card-body">
                                    <a href="{{URL::to('/manager-ship/'.$shiftship->ship->id)}}" class="btn btn-pill btn-primary mb-3"><i class="far fa-arrow-left"></i>{{__('text.back')}}</a>
                                    <p>{{__('text.shift')}}: {{$shiftship->shift->name}}</p>
                                    <p>{{__('text.date')}}: {{$shiftship->date}}</p>
                                    <p>{{__('text.ship')}}: {{$shiftship->ship->name}}</p>

                                    <hr>

                                    <div class="row mb-2 mb-xl-3">
                                        <div class="col-auto d-none d-sm-block">
                                            <h3>{{__('text.tallyclerk')}}</h3>
                                        </div> 
                                    </div>
                                    <a href="" data-toggle="modal" data-target="#exampleAddTallyClerkShift" class="btn btn-pill btn-primary mb-3"><i class="far fa-plus"></i>{{__('text.add')}} {{__('text.tallyclerk')}}</a>
                                     @include('manager.ship.tallyclerkshift.modal.addtallyclerk') 
                    
                                    <div class="table-responsive">
                                        <table id="myTable2" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:25%">{{__('text.name')}}</th>
                                                    <th style="width:25%">{{__('text.email')}}</th>
                                                    <th style="width:25%">{{__('text.mobile')}}</th>
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shiftship->tallyclerkship as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->tallyclerk->name}}</td>
                                                        <td>{{$item->tallyclerk->email}}</td>
                                                        <td>{{$item->tallyclerk->mobile}}</td>
                                                       
                                                       <td class="table-action">
                                                            {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenterEditTask{{$item->id}}" title="{{__('text.edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterCopyTask{{$item->id}}" title="{{__('text.copy_task')}}"><i class="align-middle" data-feather="copy"></i></a> --}}
                                                             <a href="{{URL::to('shiftship/'.$item->id.'/tallyclerk')}}"  title="{{__('text.show')}}"><i class="align-middle" data-feather="eye"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}" title="{{__('text.delete')}}"><i class="align-middle" data-feather="trash"></i></a>
                                                        </td> 
                                                    </tr>
                                                    @include('admin.ship.tallyclerkshift.modal.deletetallyclerk')
                                                    {{-- @include('manager.meeting.modal.copytask')
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