<div class="modal" id="exampleAddShift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.shift')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-shiftship.store')}}">
          @csrf
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.shift')}}:</label>
              <select type="text" class="form-control" id="shift_id" name="shift_id" placeholder="{{__('text.shift')}}" required>
                @foreach ($shifts as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
          </div>

        

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="{{__('text.date')}}" required>
          </div>

          
         

          
          <input type="hidden" class="form-control" id="ship_id" name="ship_id" value="{{$ship->id}}"> 
          <input type="hidden" class="form-control" id="is_deleted" name="is_deleted" value="0"> 
          <input type="hidden" class="form-control" id="is_deleted" name="status" value="0"> 
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>