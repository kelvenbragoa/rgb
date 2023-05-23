<div class="modal" id="exampleAddTallyBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.tally_book')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST"  id="form" action="{{route('tallyclerk-tallybook.store')}}">
          @csrf
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.ship')}}:</label>
              <input type="text" class="form-control" value="{{$tally_clerk_ships->ship->name}}" placeholder="{{__('text.date')}}" required readonly>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.shift')}}:</label>
            <input type="text" class="form-control" value="{{$tally_clerk_ships->shiftship->shift->name}}"  required readonly>
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
          <input type="text" class="form-control" value="{{date('d-m-Y',strtotime($tally_clerk_ships->shiftship->date))}}"  required readonly>
      </div>

      <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{__('text.basement')}}:</label>
        <select type="text" class="form-control" id="basement_id" name="basement_id"   required>
          @foreach ($tally_clerk_ships->ship->basements as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach

          
        </select>
    </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">{{__('text.destination')}}:</label>
      <select type="text" class="form-control" id="destination_id" name="destination_id"   required>
        @foreach ($tally_clerk_ships->ship->destinations as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach

        
      </select>
  </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
      <input type="date" class="form-control" name="date" value="{{$tally_clerk_ships->shiftship->date}}" required>
  </div>

  <div class="form-group">
    <label for="recipient-name" class="col-form-label">{{__('text.time')}}:</label>
    <input type="time" class="form-control" name="time" value="{{date('H:i')}}" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.load')}}:</label>
  <input type="number" step="0.01" class="form-control" name="load" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.qty_load')}}:</label>
  <input type="number" class="form-control"  value="0" name="qty_load" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.qty_truck')}}:</label>
  <input type="number" class="form-control" value="1" name="qty_truck" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.type_bag')}}:</label>
  <select type="text" class="form-control" name="type_of_bag_id" required>
    @foreach ($type_bag as $item)
      <option value="{{$item->id}}">{{$item->load}}</option>
    @endforeach
    {{-- <option value="25">25KG</option>
    <option value="50">50KG</option>
    <option value="100">100KG</option> --}}
  </select>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.name')}}:</label>
  <input type="text" class="form-control"  name="name" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.bi')}}:</label>
  <input type="text" class="form-control"  name="bi">
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.truck_plate')}} (Ex:AAA-300-MC):</label>
  <input type="text" class="form-control"  name="truck_plate">
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.trailer_plate')}} (Ex:AA-300-MC):</label>
  <input type="text" class="form-control"  name="trailer_plate">
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.barcode')}}:</label>
  <input type="text" class="form-control"  name="barcode" required>
</div>

<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.type_merchandise')}}:</label>
  <input type="text" readonly class="form-control"  value="{{$tally_clerk_ships->ship->type_merchandise->name}}">
  <input type="hidden" class="form-control"  name="type_merchandise_id" value="{{$tally_clerk_ships->ship->type_merchandise_id}}">
</div>


<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('text.obs')}}:</label>
  <textarea type="text" class="form-control" name="obs" required></textarea>
</div>

        

         

          
         

          
          
          <input type="hidden" class="form-control" name="ship_id" value="{{$tally_clerk_ships->ship->id}}"> 
          <input type="hidden" class="form-control" name="shift_ship_id" value="{{$tally_clerk_ships->shiftship->id}}"> 
          <input type="hidden" class="form-control" name="created_by_user_id" value="{{Auth::user()->id}}"> 
          <input type="hidden" class="form-control" name="tally_clerk_id" value="{{Auth::user()->tally_clerk_id}}">
          <input type="hidden" class="form-control" name="tally_clerk_ship_id" value="{{$tally_clerk_ships->id}}">  
         
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info" id="buttonSubmit">{{__('text.submit')}}</button>
                <div class="spinner-border text-info mr-2" role="status" id="spinner" style="display: none">
                  <span class="sr-only">Loading...</span>
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("buttonSubmit").onclick = function() {myFunction()};

    function myFunction() {

    document.getElementById('buttonSubmit').style.display = "none";
    document.getElementById('spinner').style.display = "block";
    document.getElementById('form').submit();
    }
</script>