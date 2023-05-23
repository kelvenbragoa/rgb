<div class="modal" id="exampleEditTallyBook{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.edit')}} {{__('text.tally_book')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('tallyclerk-tallybook.update',$item->id)}}">
          @csrf
          @method('PATCH')
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.ship')}}:</label>
              <input type="text" class="form-control" value="{{$item->ship->name}}"  required readonly>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.shift')}}:</label>
            <input type="text" class="form-control" value="{{$item->shiftship->shift->name}}"  required readonly>
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
          <input type="text" class="form-control" value="{{date('d-m-Y',strtotime($item->shiftship->date))}}"  required readonly>
      </div>

      <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{__('text.basement')}}:</label>
        <select type="text" class="form-control" id="basement_id" name="basement_id"  required>
          @foreach ($tally_clerk_ships->ship->basements as $item2)
            <option value="{{$item2->id}}" @if ($item2->id == $item->basement_id) selected @endif>{{$item2->name}}</option>
          @endforeach

          
        </select>
    </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">{{__('text.destination')}}:</label>
      <select type="text" class="form-control" id="destination_id" name="destination_id"  required>
        @foreach ($tally_clerk_ships->ship->destinations as $item2)
          <option value="{{$item2->id}}" @if ($item2->id == $item->destination_id) selected @endif>{{$item2->name}}</option>
        @endforeach
      </select>
  </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
      <input type="date" class="form-control" name="date" value="{{$item->date}}" required>
  </div>

  <div class="form-group">
    <label for="recipient-name" class="col-form-label">{{__('text.time')}}:</label>
    <input type="time" class="form-control" name="time" value="{{$item->time}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.load')}}:</label>
  <input type="number" step="0.01" class="form-control" name="load" value="{{$item->load}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.qty_load')}}:</label>
  <input type="number" class="form-control"   name="qty_load" value="{{$item->qty_load}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.qty_truck')}}:</label>
  <input type="number" class="form-control"  name="qty_truck" value="{{$item->qty_truck}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.type_bag')}}:</label>
  <select type="text" class="form-control" name="type_of_bag_id" required>
    @foreach ($type_bag as $item3)
      <option value="{{$item3->id}}" @if ($item3->id == $item->type_of_bag_id) selected @endif>{{$item3->load}} KG</option>
    @endforeach
    {{-- <option value="25">25KG</option>
    <option value="50">50KG</option>
    <option value="100">100KG</option> --}}
  </select>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.name')}}:</label>
  <input type="text" class="form-control"  name="name" value="{{$item->name}}" required>
</div>
<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.bi')}}:</label>
  <input type="text" class="form-control"  name="bi" value="{{$item->bi}}" required>
</div>


<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.truck_plate')}} (Ex:AAA-300-MC):</label>
  <input type="text" class="form-control"  name="truck_plate" value="{{$item->truck_plate}}">
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.trailer_plate')}} (Ex:AA-300-MC):</label>
  <input type="text" class="form-control"  name="trailer_plate" value="{{$item->trailer_plate}}">
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.barcode')}}</label>
  <input type="text" class="form-control"  name="barcode" value="{{$item->barcode}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.type_merchandise')}}:</label>
  <input type="text" readonly class="form-control"  value="{{$tally_clerk_ships->ship->type_merchandise->name}}">
  <input type="hidden" class="form-control"  name="type_merchandise_id" value="{{$tally_clerk_ships->ship->type_merchandise_id}}">
</div>



<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.obs')}}:</label>
  <textarea type="text" class="form-control" name="obs" required>{{$item->obs}}</textarea>
</div>

        

         

          
         

          
          
          <input type="hidden" class="form-control" name="ship_id" value="{{$item->ship_id}}"> 
          <input type="hidden" class="form-control" name="shift_ship_id" value="{{$item->shift_ship_id}}"> 
          <input type="hidden" class="form-control" name="created_by_user_id" value="{{$item->created_by_user_id}}"> 
          <input type="hidden" class="form-control" name="tally_clerk_id" value="{{$item->tally_clerk_id}}"> 
         
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>