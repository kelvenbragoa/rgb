<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  

    <style type="text/css">
        @page {
            margin: 0px;
        }
        .break-page{
          page-break-after: always;
        }
        body {
            margin-top: 20px;
            margin-bottom: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice {
            margin: 30px;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #19a1f5;
            color: #000;
            margin: 5px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .body {
            margin: 30px;
        }
        table , tr , td{
        border:1px solid black;
        border-collapse: collapse;
}
    </style>

</head>
<body>

<div class="information" style="background-color: #fff;">
    <img src="http://atas.inogest.co.mz/files/sys/logoinogesticon.png" alt="Logo" width="120" class="logo"/>
    <h4>RGB SERVIÇOS E INVESTIMENTOS MOÇAMBIQUE. LDA</h4>

</div>


<br/>



<div class="invoice">
    <h3 style="text-align: center">{{__('text.result_operation')}}</h3>

    {{-- <div class="body">
        CORPO
    </div> --}}

    <table width="95%">
       
        
        <tr>
           <td colspan="7" align="center" style="background-color: #19a1f5">{{__('text.ship')}}</td>
        </tr>

        <tr>
           <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.name')}}</td>
           <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->name}}</td>
        </tr>
        <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.customer')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->customer->name}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.agent')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->agent->name}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.landing_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->landing_date != null) {{  date('d-m-Y',strtotime($ship->landing_date))}} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.landing_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0"> @if ($ship->landing_time != null) {{date('H:i',strtotime($ship->landing_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         {{-- <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.departure_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->departure_date != null) {{date('d-m-Y',strtotime($ship->departure_date))}} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.departure_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->departure_time != null) {{ date('H:i',strtotime($ship->departure_time))}} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.created_by_user')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->user->name}} ({{$ship->user->email}})</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.operation_station')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->operation_station->name}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.type_merchandise')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->type_merchandise->name}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.cm')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->cm}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.work_order')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->work_order}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.type_operation')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">{{$ship->type_operation->name}}</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.first_rope_release_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0"> @if ($ship->first_rope_release_date != null) {{date('d-m-Y',strtotime($ship->first_rope_release_date)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.first_rope_release_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->first_rope_release_time != null) {{date('H:i',strtotime($ship->first_rope_release_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.last_rope_release_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->last_rope_release_date != null) {{date('d-m-Y',strtotime($ship->last_rope_release_date)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.last_rope_release_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->last_rope_release_time != null) {{date('H:i',strtotime($ship->last_rope_release_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.ladder_positioning_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->ladder_positioning_date != null) {{date('d-m-Y',strtotime($ship->ladder_positioning_date)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.ladder_positioning_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->ladder_positioning_time != null) {{date('H:i',strtotime($ship->ladder_positioning_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.migration_on_board_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->migration_on_board_date != null) {{date('d-m-Y',strtotime($ship->migration_on_board_date)) }}@else {{__('text.undefined')}} @endif </td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.migration_on_board_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->migration_on_board_time != null) {{date('H:i',strtotime($ship->migration_on_board_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.inspection_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0"> @if ($ship->inspection_date != null) {{ date('d-m-Y',strtotime($ship->inspection_date))}} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.inspection_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->inspection_time != null) {{date('H:i',strtotime($ship->inspection_time)) }} @else {{__('text.undefined')}} @endif </td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.material_positioning_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->material_positioning_date != null) {{date('d-m-Y',strtotime($ship->material_positioning_date)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.material_positioning_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0"> @if ($ship->material_positioning_time != null)  {{date('H:i',strtotime($ship->material_positioning_time)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.start_operation_date')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->start_operation_date != null) {{date('d-m-Y',strtotime($ship->start_operation_date)) }} @else {{__('text.undefined')}} @endif</td>
         </tr>
         <tr>
            <td  colspan="1" align="left" style="background-color: #c0bfbf">{{__('text.start_operation_time')}}</td>
            <td  colspan="6" align="left" style="background-color: #f0f0f0">@if ($ship->start_operation_time != null) {{date('H:i',strtotime($ship->start_operation_time))}} @else {{__('text.undefined')}} @endif</td>
         </tr> --}}
        

   </table>

   <table width="95%">
       
        
   

    <tr>
       <td colspan="4" align="center" style="background-color: #19a1f5">{{__('text.info')}}</td>
    </tr>

    <tr>
       <td  style="background-color: #f0f0f0">{{__('text.ship')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.basement')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.tally_book')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.load')}}</td>
 
       
    </tr>
    
    <tr>
       <td  style="background-color: #f0f0f0">{{$basement->ship->name}}</td>
       <td  style="background-color: #f0f0f0">{{$basement->name}}</td>
       <td  style="background-color: #f0f0f0">{{$basement->tallybook->count()}}</td>
       <td  style="background-color: #f0f0f0">{{$basement->tallybook->sum('load')}} KG</td>
       
       
    </tr>
   

   
    



</table>

<hr width="95%">



<table width="95%">
       
        
   

    <tr>
       <td colspan="8" align="center" style="background-color: #19a1f5">{{__('text.tally_book')}}</td>
    </tr>

    <tr>
       <td  style="background-color: #f0f0f0">{{__('text.time')}} | {{__('text.date')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.truck_plate')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.trailer_plate')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.type_merchandise')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.load')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.basement')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.tallyclerk')}}</td>
       <td  style="background-color: #f0f0f0">{{__('text.obs')}}</td>
       
    </tr>
    @foreach ($basement->tallybook as $item)
    <tr>
        <td style="background-color: #f0f0f0">{{date('H:i',strtotime($item->time))}} | {{date('d-m-Y',strtotime($item->date))}}</td>
        <td style="background-color: #f0f0f0">{{$item->truck_plate}}</td>
        <td style="background-color: #f0f0f0">{{$item->trailer_plate}}</td>
        <td style="background-color: #f0f0f0">{{$item->type_merchandise->name}}</td>
        <td style="background-color: #f0f0f0">{{$item->load}} KG</td>
        <td style="background-color: #f0f0f0">{{$item->basement->name}}</td>
        <td style="background-color: #f0f0f0">{{$item->tallyclerk->name}}</td>
        <td style="background-color: #f0f0f0">{{$item->obs}}</td>
    </tr>
    @endforeach
   

    



</table>






    
   
    






</div>



 <div class="information" style="position: absolute; bottom: 0; width:100%">
   <p style="color: black; font-size:10px; text-align:center">&copy; {{ date('Y') }} INOVATIS MZ LTD - Todos Direitos Reservados.InoGest,Impulsionando a Gestão.</p>    
</div> 
</body>
</html>
