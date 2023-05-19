<div class="modal" id="exampleAddStop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.stop')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('tallyclerk-stop.store')}}">
          @csrf
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.start_date')}}:</label>
              <input type="datetime-local" name="start_date" class="form-control"  placeholder="{{__('text.start_date')}}" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.basement')}}:</label>
            <select name="basement_id" class="form-control"  placeholder="{{__('text.basement')}}" required>
                <option value="0">{{__('text.general')}}</option>
                @foreach ($tally_clerk_ships->ship->basements as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                
            </select>
        </div>

         

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">{{__('text.reason')}}:</label>
          <textarea type="time" name="reason" class="form-control" placeholder="{{__('text.reason')}}" required></textarea>
      </div>

        


        

         

          
         

        <input type="hidden" class="form-control" name="status" value="0"> 
          
          <input type="hidden" class="form-control" name="ship_id" value="{{$tally_clerk_ships->ship->id}}"> 
          <input type="hidden" class="form-control" name="shift_ship_id" value="{{$tally_clerk_ships->shiftship->id}}"> 
          <input type="hidden" class="form-control" name="created_by_user_id" value="{{Auth::user()->id}}"> 
          <input type="hidden" class="form-control" name="tally_clerk_ship_id" value="{{$tally_clerk_ships->id}}"> 

          
          
         
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>