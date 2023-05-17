@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.ship')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.ship')}}</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    @endif
                    
                    <form method="POST" id="form" action="{{route('manager-ship.store')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('text.name')}}" value="{{ old('name') }}" required>
                            </div>
                            
                        </div>

                        <div class="row">
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.customer')}}</label>
                                <select type="time" class="form-control" name="customer_id" id="customer_id" placeholder="{{__('text.customer')}}" value="{{ old('customer') }}" required>
                                    @foreach ($customer as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.agent')}}</label>
                                <select type="time" class="form-control" name="agent_id" id="agent_id" placeholder="{{__('text.agent')}}" value="{{ old('agent') }}" required>
                                    @foreach ($agent as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.expected_load')}} (KG)</label>
                                <input type="number" class="form-control" name="expected_load" id="expected_load" placeholder="{{__('text.expected_load')}}" value="{{ old('expected_load') }}" required>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.landing_date')}}</label>
                                <input type="date" class="form-control" name="landing_date" id="landing_date" placeholder="{{__('text.landing_date')}}" value="{{ old('landing_date') }}" required>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.landing_time')}}</label>
                                <input type="time" class="form-control" name="landing_time" id="landing_time" placeholder="{{__('text.landing_time')}}" value="{{ old('landing_time') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.departure_date')}}</label>
                                <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="{{__('text.departure_date')}}" value="{{ old('departure_date') }}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.departure_time')}}</label>
                                <input type="time" class="form-control" name="departure_time" id="departure_time" placeholder="{{__('text.departure_time')}}" value="{{ old('departure_time') }}" >
                            </div>
                    
                        </div>

                        

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.type_merchandise')}}</label>
                                {{-- <input type="text" class="form-control" name="type_merchandise" id="type_merchandise" placeholder="{{__('text.type_merchandise')}}" value="{{ old('type_merchandise') }}" > --}}
                                <select type="text" class="form-control" name="type_merchandise_id" id="type_merchandise_id" placeholder="{{__('text.type_merchandise')}}" value="{{ old('type_operation') }}" >
                                    @foreach ($type_merchandises as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.cm')}}</label>
                                <input type="text" class="form-control" name="cm" id="cm" placeholder="{{__('text.cm')}}" value="{{ old('cm') }}" >
                            </div>
                    
                        </div>

                       

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.work_order')}}</label>
                                <input type="text" class="form-control" name="work_order" id="work_order" placeholder="{{__('text.work_order')}}" value="{{ old('work_order') }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.type_operation')}}</label>
                                <select type="text" class="form-control" name="type_operation_id" id="type_operation_id" placeholder="{{__('text.type_operation')}}" value="{{ old('type_operation_id') }}" >
                                    @foreach ($type_operation as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.operation_station')}}</label>
                                <select type="text" class="form-control" name="operation_station_id" id="operation_station_id" placeholder="{{__('text.operation_station')}}" value="{{ old('operation_station') }}" >
                                    @foreach ($operation_station as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                    
                        </div>

                       

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.first_rope_release_date')}}</label>
                                <input type="date" class="form-control" name="first_rope_release_date" placeholder="{{__('text.first_rope_release_date')}}" value="{{ old('first_rope_release_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.first_rope_release_time')}}</label>
                                <input type="time" class="form-control" name="first_rope_release_time" placeholder="{{__('text.first_rope_release_time')}}" value="{{ old('first_rope_release_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.last_rope_release_date')}}</label>
                                <input type="date" class="form-control" name="last_rope_release_date" placeholder="{{__('text.last_rope_release_date')}}" value="{{ old('last_rope_release_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.last_rope_release_time')}}</label>
                                <input type="time" class="form-control" name="last_rope_release_time" placeholder="{{__('text.last_rope_release_time')}}" value="{{ old('last_rope_release_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.ladder_positioning_date')}}</label>
                                <input type="date" class="form-control" name="ladder_positioning_date" placeholder="{{__('text.ladder_positioning_date')}}" value="{{ old('ladder_positioning_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.ladder_positioning_time')}}</label>
                                <input type="time" class="form-control" name="ladder_positioning_time" placeholder="{{__('text.ladder_positioning_time')}}" value="{{ old('ladder_positioning_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.migration_on_board_date')}}</label>
                                <input type="date" class="form-control" name="migration_on_board_date" placeholder="{{__('text.migration_on_board_date')}}" value="{{ old('migration_on_board_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.migration_on_board_time')}}</label>
                                <input type="time" class="form-control" name="migration_on_board_time" placeholder="{{__('text.migration_on_board_time')}}" value="{{ old('migration_on_board_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.inspection_date')}}</label>
                                <input type="date" class="form-control" name="inspection_date" placeholder="{{__('text.inspection_date')}}" value="{{ old('inspection_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.inspection_time')}}</label>
                                <input type="time" class="form-control" name="inspection_time" placeholder="{{__('text.inspection_time')}}" value="{{ old('inspection_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.material_positioning_date')}}</label>
                                <input type="date" class="form-control" name="material_positioning_date" placeholder="{{__('text.material_positioning_date')}}" value="{{ old('material_positioning_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.material_positioning_time')}}</label>
                                <input type="time" class="form-control" name="material_positioning_time" placeholder="{{__('text.material_positioning_time')}}" value="{{ old('material_positioning_time')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start_operation_date')}}</label>
                                <input type="date" class="form-control" name="start_operation_date" placeholder="{{__('text.start_operation_date')}}" value="{{ old('start_operation_date')  }}" >
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start_operation_time')}}</label>
                                <input type="time" class="form-control" name="start_operation_time" placeholder="{{__('text.start_operation_time')}}" value="{{ old('start_operation_time')  }}" >
                            </div>
                    
                        </div>

                        <input type="hidden" class="form-control" name="is_deleted" value="0" >

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.created_by_user')}}</label>
                                <input type="text" class="form-control" placeholder="{{__('text.created_by_user')}}" value="{{ Auth::user()->name }}"  readonly>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                               
                                <input type="hidden" class="form-control" name="created_by_user_id" id="created_by_user_id" placeholder="{{__('text.created_by_user')}}" value="{{ Auth::user()->id }}" >
                                <input type="hidden" class="form-control" name="status" id="status" value="0" >
                            </div>
                    
                        </div>




                        <button type="submit" class="btn btn-primary" id="buttonSubmit">{{__('text.submit')}}</button>
                        <div class="spinner-border text-info mr-2" role="status" id="spinner" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.users')}}</h5>
                </div>
                <div class="card-body">
                   <div class="row">
                    <h2>{{__('text.after_creating_employee')}}</h2>
                    <h2><span style="color: rgb(0, 0, 0)">{{__('text.email')}}</span>: <span id="result1" style="color: rgb(128, 0, 0)"></span></h2>
                    <h2><span style="color: rgb(0, 0, 0)">{{__('text.password')}}</span>: <span id="result2" style="color: rgb(128, 0, 0)"></span></h2>
                   </div>
                   
                    
                </div>
            </div>
        </div> --}}
    </div>

</div>


<script>
    const source = document.getElementById('source');
    const result1 = document.getElementById('result1');
    const result2 = document.getElementById('result2');

const inputHandler = function(e) {
  result1.innerHTML = e.target.value;
  result2.innerHTML = e.target.value;
}

source.addEventListener('input', inputHandler);
source.addEventListener('propertychange', inputHandler);
</script>


<script>
    document.getElementById("buttonSubmit").onclick = function() {myFunction()};

    function myFunction() {

    document.getElementById('buttonSubmit').style.display = "none";
    document.getElementById('spinner').style.display = "block";
    document.getElementById('form').submit();
    }
</script>
@endsection