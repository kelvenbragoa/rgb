@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.config')}}</h1>

    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.config')}}</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                        {{__('text.account')}}
                    </a>
                  
                   
                   
                    
                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">


                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title mb-0">{{__('text.info')}}</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputFirstName">{{__('text.name')}}</label>
                                        <input type="text" class="form-control" id="inputFirstName" value="{{Auth::user()->name}}" placeholder="{{__('text.name')}}" readonly>
                                    </div>
                                   
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                    <input type="email" class="form-control" id="inputEmail4" value="{{Auth::user()->email}}" placeholder="{{__('text.email')}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputAddress">{{__('text.mobile')}}</label>
                                    <input type="text" class="form-control" id="inputAddress"  value="{{Auth::user()->mobile}}" readonly placeholder="{{__('text.mobile')}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputAddress2">{{__('text.role')}}</label>
                                    <input type="text" class="form-control" id="inputAddress2" value="{{Auth::user()->role->name ?? ''}}"  readonly>
                                </div>
                               
                                
                            </form>

                        </div>

                        <div class="card-body">
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
                            <h5 class="card-title">{{__('text.password')}}</h5>

                            <form method="POST" action="{{URL::to('/manager-changepassword')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordCurrent">{{__('text.current_password')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordCurrent" name="current_password" required>
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew">{{__('text.new_password')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" name="new_password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputPasswordNew2">{{__('text.verify_password')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordNew2" name="new_confirm_password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('text.submit')}}</button>
                            </form>

                        </div>
                    </div>

                </div>

               

                
            </div>
        </div>
    </div>

</div>

@endsection