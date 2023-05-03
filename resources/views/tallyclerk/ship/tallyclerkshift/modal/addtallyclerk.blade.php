<div class="modal" id="exampleAddTallyClerkShift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.shift')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-shiftship.manager-tallyclerkship.store',$shiftship->id)}}">
          @csrf
         
        <div class="modal-body">
          <label for="recipient-name" class="col-form-label">{{__('text.select')}} {{__('text.tallyclerk')}} : <input type="button" class="btn btn-secondary" onclick='selectemployee()' value="{{__('text.select_all')}}"/> <input type="button" class="btn btn-secondary" onclick='deselectemployee()' value="{{__('text.deselect_all')}}"/>   </label>

          <div class="row">
            <div class="col">
            <div class="form-group">
            
              @foreach ($tallyclerks as $item)
               
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="tally_clerk_id" name="tally_clerk_id[]">
                    <span class="form-check-label">
                      {{$item->name}} ({{$item->email}})
                    </span>
                  </label>
                
              @endforeach
            </div>    
        </div>
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