@extends('layout_admin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.shift')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.edit')}} {{__('text.shift')}}</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{ route('shift.update', $shift->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                     
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('text.name')}}" value="{{ $shift->name }}" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start_time')}}</label>
                                <input type="time" class="form-control" name="start_time" id="start_time" placeholder="{{__('text.start_time')}}" value="{{ $shift->start_time }}" required>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.end_time')}}</label>
                                <input type="time" class="form-control" name="end_time" id="end_time" placeholder="{{__('text.end_time')}}" value="{{ $shift->end_time }}" required>
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