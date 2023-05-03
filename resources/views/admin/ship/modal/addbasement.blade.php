<div class="modal" id="exampleAddBasement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.basement')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('basement.store')}}">
          @csrf
         
        <div class="modal-body">
          

        

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.basement')}}:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('text.basement')}}" required>
          </div>

          
         

          
          <input type="hidden" class="form-control" id="ship_id" name="ship_id" value="{{$ship->id}}"> 
          
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>