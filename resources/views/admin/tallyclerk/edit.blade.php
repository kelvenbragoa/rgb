@extends('layout_admin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tallyclerk')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.edit')}} {{__('text.tallyclerk')}}</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{ route('tallyclerk.update', $tallyclerk->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                     
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('text.name')}}" value="{{ $tallyclerk->name }}" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="{{__('text.email')}}" value="{{ $tallyclerk->email }}" required readonly>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.mobile')}}</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="{{__('text.mobile')}}" value="{{ $tallyclerk->mobile }}" required>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.operation_station')}}</label>
                                <select type="text" class="form-control" name="operation_station_id" id="operation_station_id" placeholder="{{__('text.operation_station')}}" value="{{ old('operation_station') }}" required>
                                    @foreach ($operation_station as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $tallyclerk->operation_station_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
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