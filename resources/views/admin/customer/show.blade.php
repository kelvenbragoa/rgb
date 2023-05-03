@extends('layout_admin.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.customer')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">

                                    <p>{{__('text.name')}}: {{$customer->name}}</p>
                                    <p>{{__('text.email')}}: {{$customer->email}}</p>
                                    <p>{{__('text.mobile')}}: {{$customer->mobile}}</p>
                                    <p>{{__('text.address')}}: {{$customer->address}}</p>


                                    <hr>


                                      
                                    <div class="w-100">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.ship')}} </h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$customer->ships->count()}}</h3>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">{{__('text.load')}} </h5> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class="mt-1 mb-3">{{$load}} KG</h3>
                                                                
                                                            </div>
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </div>

                                    <hr>

                                    <div class="table-responsive">
                                        <table id="myTable" class="table display" >
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                                    <th style="width:15%">{{__('text.name')}}</th>
                                                    <th style="width:12%">{{__('text.customer')}}</th>
                                                    <th style="width:12%">{{__('text.agent')}}</th>
                                                    <th style="width:12%">{{__('text.operation_station')}}</th>
                                                    <th style="width:15%">{{__('text.type_merchandise')}}</th>
                                                    <th style="width:12%">{{__('text.load')}}</th>
                                                    <th style="width:10%">{{__('text.cm')}}</th>
                                                    <th style="width:15%">{{__('text.work_order')}}</th>
                                                    <th style="width:10%">{{__('text.status')}}</th>
                    
                                                   
                                                    <th>{{__('text.action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customer->ships as $item)
                                                    <tr>
                                                        {{-- <td>{{$item->id}}</td> --}}
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->customer->name}}</td>
                                                        <td>{{$item->agent->name}}</td>
                                                        <td>{{$item->operation_station->name}}</td>
                                                        <td>{{$item->type_merchandise->name}}</td>
                                                        <td>{{$item->tallybook->sum('load')}}</td>
                                                        <td>{{$item->cm}}</td>
                                                        <td>{{$item->work_order}}</td>
                                                        <td>
                                                            @if ($item->status==1) 
                                                                <span class="badge bg-danger">{{__('text.closed')}} </span> 
                                                            @endif
                                                            @if ($item->status==0) 
                                                                    <span class="badge bg-success">{{__('text.opened')}} </span> 
                                                            @endif
                                                        </td>
                                                       
                                                       
                    
                                                        <td class="table-action">
                                                           
                                                            <a href="{{URL::to('/ship/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                                           
                                                          
                                                           
                                                        </td> 
                                                    </tr>
                                                    
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


{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
   
    new Chart(document.getElementById("chartjs-dashboard-bar2"), {
        type: "bar",
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Otu", "Nov", "Dez"],
            datasets: [{
                label: "Este ano",
                backgroundColor: window.theme.primary,
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,
                data: [<?php echo $dados_graficobarra1 ?>],
                barPercentage: .75,
                categoryPercentage: .5
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 10000
                    }
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    }
                }]
            }
        }
    });
    });
    </script> --}}

@endsection