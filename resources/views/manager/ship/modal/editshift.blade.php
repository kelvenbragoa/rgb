<div class="modal" id="exampleEditShift{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.shift')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-shiftship.update',$item->id)}}">
          @csrf
          @method('PATCH')
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.shift')}}:</label>
              <input type="text" class="form-control" readonly value="{{$item->shift->name}}" required>
          </div>

        

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.date')}}:</label>
            <input type="date" class="form-control" readonly value="{{$item->date}}" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.status')}}:</label>
            <select type="text" class="form-control" value="{{$item->shift->name}}" name="status" required>
                <option value="1" @if ($item->status == 1 ) selected @endif>{{__('text.opened')}}</option>
                <option value="0" @if ($item->status == 0 ) selected @endif>{{__('text.closed')}}</option>
            </select>
        </div>

          
         

         
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>