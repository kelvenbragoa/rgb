@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tallyclerk')}}</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.tallyclerk')}}</h5>
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
                    
                    <form method="POST" id="form" action="{{route('tallyclerk.store')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('text.name')}}" value="{{ old('name') }}" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                <input type="text" class="form-control" name="email" id="source" placeholder="{{__('text.email')}}" value="{{ old('email') }}" required>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.mobile')}}</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="{{__('text.mobile')}}" value="{{ old('mobile') }}" required>
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
        <div class="col-md-4">
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
        </div>
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