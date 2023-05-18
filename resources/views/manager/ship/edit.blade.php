@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.ship')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.edit')}} {{__('text.ship')}}</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{ route('manager-ship.update', $ship->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                     
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('text.name')}}" value="{{ $ship->name }}" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.customer')}}</label>
                                <select  class="form-control" name="customer_id" id="customer_id" placeholder="{{__('text.customer')}}" required>
                                    @foreach ($customer as $item)
                                        <option value="{{$item->id}}"  @if ($item->id == $ship->customer_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.agent')}}</label>
                                <select  class="form-control" name="agent_id" id="agent_id" placeholder="{{__('text.agent')}}" required>
                                    @foreach ($agent as $item)
                                        <option value="{{$item->id}}"  @if ($item->id == $ship->agent_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.expected_load')}} (KG)</label>
                                <input type="number" class="form-control" name="expected_load" id="expected_load" placeholder="{{__('text.expected_load')}}" value="{{ $ship->expected_load }}" required>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.landing_date')}}</label>
                                <input type="date" class="form-control" name="landing_date" id="landing_date" placeholder="{{__('text.landing_date')}}" value="{{ $ship->landing_date }}" required>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.landing_time')}}</label>
                                <input type="time" class="form-control" name="landing_time" id="landing_time" placeholder="{{__('text.landing_time')}}" value="{{ $ship->landing_time }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.departure_date')}}</label>
                                <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="{{__('text.departure_date')}}" value="{{ $ship->departure_date }}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.departure_time')}}</label>
                                <input type="time" class="form-control" name="departure_time" id="departure_time" placeholder="{{__('text.departure_time')}}" value="{{ $ship->departure_time }}" >
                            </div>
                    
                        </div>

                      

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.type_merchandise')}}</label>
                                <select type="text" class="form-control" name="type_merchandise_id" id="type_merchandise_id" placeholder="{{__('text.type_operation')}}" >
                                    @foreach ($type_merchandises as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $ship->type_merchandise_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.cm')}}</label>
                                <input type="text" class="form-control" name="cm" id="cm" placeholder="{{__('text.cm')}}" value="{{ $ship->cm }}" >
                            </div>
                    
                        </div>

                       

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.work_order')}}</label>
                                <input type="text" class="form-control" name="work_order" id="work_order" placeholder="{{__('text.work_order')}}" value="{{ $ship->work_order }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.type_operation')}}</label>
                                <select type="text" class="form-control" name="type_operation_id" id="type_operation_id" placeholder="{{__('text.type_operation')}}" >
                                    @foreach ($type_operation as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $ship->type_operation_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.operation_station')}}</label>
                                <select type="text" class="form-control" name="operation_station_id" id="operation_station_id" placeholder="{{__('text.operation_station')}}" >
                                    @foreach ($operation_station as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $ship->operation_station_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                    
                        </div>

                       

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.first_rope_release_date')}}</label>
                                <input type="date" class="form-control" name="first_rope_release_date" placeholder="{{__('text.first_rope_release_date')}}" value="{{ $ship->first_rope_release_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.first_rope_release_time')}}</label>
                                <input type="time" class="form-control" name="first_rope_release_time" placeholder="{{__('text.first_rope_release_time')}}" value="{{ $ship->first_rope_release_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.last_rope_release_date')}}</label>
                                <input type="date" class="form-control" name="last_rope_release_date" placeholder="{{__('text.last_rope_release_date')}}" value="{{ $ship->last_rope_release_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.last_rope_release_time')}}</label>
                                <input type="time" class="form-control" name="last_rope_release_time" placeholder="{{__('text.last_rope_release_time')}}" value="{{ $ship->last_rope_release_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.ladder_positioning_date')}}</label>
                                <input type="date" class="form-control" name="ladder_positioning_date" placeholder="{{__('text.ladder_positioning_date')}}" value="{{ $ship->ladder_positioning_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.ladder_positioning_time')}}</label>
                                <input type="time" class="form-control" name="ladder_positioning_time" placeholder="{{__('text.ladder_positioning_time')}}" value="{{ $ship->ladder_positioning_time }}" >
                            </div>
                    
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.ladder_positioning_out_time')}}</label>
                                <input type="time" class="form-control" name="ladder_positioning_out_time" placeholder="{{__('text.ladder_positioning_out_time')}}" value="{{ $ship->ladder_positioning_out_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.migration_on_board_date')}}</label>
                                <input type="date" class="form-control" name="migration_on_board_date" placeholder="{{__('text.migration_on_board_date')}}" value="{{ $ship->migration_on_board_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.migration_on_board_time')}}</label>
                                <input type="time" class="form-control" name="migration_on_board_time" placeholder="{{__('text.migration_on_board_time')}}" value="{{ $ship->migration_on_board_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.migration_on_board_out_time')}}</label>
                                <input type="time" class="form-control" name="migration_on_board_out_time" placeholder="{{__('text.migration_on_board_out_time')}}" value="{{ $ship->migration_on_board_out_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.inspection_date')}}</label>
                                <input type="date" class="form-control" name="inspection_date" placeholder="{{__('text.inspection_date')}}" value="{{ $ship->inspection_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.inspection_time')}}</label>
                                <input type="time" class="form-control" name="inspection_time" placeholder="{{__('text.inspection_time')}}" value="{{ $ship->inspection_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.inspection_out_time')}}</label>
                                <input type="time" class="form-control" name="inspection_out_time" placeholder="{{__('text.inspection_out_time')}}" value="{{ $ship->inspection_out_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.material_positioning_date')}}</label>
                                <input type="date" class="form-control" name="material_positioning_date" placeholder="{{__('text.material_positioning_date')}}" value="{{ $ship->material_positioning_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.material_positioning_time')}}</label>
                                <input type="time" class="form-control" name="material_positioning_time" placeholder="{{__('text.material_positioning_time')}}" value="{{ $ship->material_positioning_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.material_positioning_out_time')}}</label>
                                <input type="time" class="form-control" name="material_positioning_out_time" placeholder="{{__('text.material_positioning_out_time')}}" value="{{ $ship->material_positioning_out_time }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start_operation_date')}}</label>
                                <input type="date" class="form-control" name="start_operation_date" placeholder="{{__('text.start_operation_date')}}" value="{{ $ship->start_operation_date }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start_operation_time')}}</label>
                                <input type="time" class="form-control" name="start_operation_time" placeholder="{{__('text.start_operation_time')}}" value="{{ $ship->start_operation_time }}" >
                            </div>
                    
                        </div>

                        <input type="hidden" class="form-control" name="is_deleted" value="0" >

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.created_by_user')}}</label>
                                <input type="text" class="form-control" placeholder="{{__('text.created_by_user')}}" value="{{$ship->user->name }}"  readonly>
                            </div>
                    
                        </div>

                      


                       

                      
                       
        
                        <button type="submit" class="btn btn-primary">{{__('text.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection