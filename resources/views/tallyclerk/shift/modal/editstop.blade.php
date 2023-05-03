<div class="modal" id="exampleEditStop{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.tally_book')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('tallyclerk-stop.update',$item->id)}}">
          @csrf
         @method('PATCH')
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.start_date')}}:</label>
              <input type="datetime-local" name="start_date" class="form-control" value="{{$item->start_date}}" placeholder="{{__('text.start_date')}}" readonly required>
          </div>

         

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">{{__('text.reason')}}:</label>
          <textarea type="time" name="reason" class="form-control" placeholder="{{__('text.reason')}}" required>{{$item->reason}}</textarea>
        </div>

      
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.end_date')}}:</label>
            <input type="datetime-local" name="end_date" class="form-control"  placeholder="{{__('text.end_date')}}" required>
        </div>

        


        

         

          
         

        <input type="hidden" class="form-control" name="status" value="1"> 
          
          <input type="hidden" class="form-control" name="ship_id" value="{{$tally_clerk_ships->ship->id}}"> 
          <input type="hidden" class="form-control" name="shift_ship_id" value="{{$tally_clerk_ships->shiftship->id}}"> 
          
          
         
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>