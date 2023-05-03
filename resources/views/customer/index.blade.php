@extends('layout_customer.master')
@section('content')


<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>{{__('text.dashboard')}}</strong></h3>
            </div>

            
        </div>

        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">{{__('text.load')}}</h5>
                                    <h1 class="mt-1 mb-3">{{$tallybook}} KG</h1>
                                    <div class="mb-1">
                                        {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-sm-6">
                           
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">{{__('text.ship_operation')}}</h5>
                                    <h1 class="mt-1 mb-3">{{$ship->count()}}</h1>
                                    <div class="mb-1">
                                        {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                        <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">{{__('text.load')}}</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-bar2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>{{__('text.shifts_for_today')}} {{date('d-m-Y')}}</strong></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        @forelse ($shiftship as $item)
                            <div class="col-sm-3">
                                <div class="card" @if ($item->status == 0) style="background-color:rgb(250, 141, 141)" @endif @if ($item->status == 1) style="background-color:rgb(152, 250, 141)" @endif>
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">{{__('text.ship')}}: {{$item->ship->name}}</h5>
                                        <h5 class="card-title mb-4">{{__('text.operation_station')}}: {{$item->ship->operation_station->name}}</h5>
                                        <h5 class="card-title mb-4">{{__('text.shift')}}: {{$item->shift->name}}</h5>
                                        <h5 class="card-title mb-4">{{__('text.tallyclerk')}}: {{$item->tallyclerkship->count()}}</h5>
                                        <h5 class="card-title mb-4">{{__('text.tally_book')}}: {{$item->tallybook->count()}}</h5>
                                        {{-- <h5 class="card-title mb-4">{{__('text.load')}}: {{$item->tallybook->sum('load')}} KG</h5> --}}
                                        <h1 class="mt-1 mb-3">{{$item->tallybook->sum('load')}} KG</h1>
                                        <div class="mb-1">
                                            <a href="{{URL::to('shiftship/'.$item->id.'/tallyclerkship')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        
                        @empty
                        
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">{{__('text.no_shift')}}</h5>
                                    {{-- <h1 class="mt-1 mb-3">{{$manager->count()}}</h1> --}}
                                    <div class="mb-1">
                                        {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        @endforelse
                        
                        
                    </div>
                </div>
            </div>

           
        </div>



    </div>
</main>


@endsection