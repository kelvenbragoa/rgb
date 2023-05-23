<div class="modal" id="exampleEditDestination{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.destination')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-destination.update',$item->id)}}">
          @csrf
          @method('PATCH')
         
        <div class="modal-body">
          

        

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.destination')}}:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" placeholder="{{__('text.destination')}}" required>
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