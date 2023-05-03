<div class="modal" id="exampleCloseOperation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.close_operation')}}</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{__('text.close_operation_info')}}
        </div>
        <div class="modal-footer">
            <form method="POST" action="">
                @csrf
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <a href="{{URL::to('/closeoperation/'.$ship->id)}}"  class="btn btn-success" >{{__('text.submit')}}</a>
            </form>
        </div>
      </div>
    </div>
  </div>