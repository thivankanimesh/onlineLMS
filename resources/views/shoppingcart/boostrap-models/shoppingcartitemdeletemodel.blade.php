<div id="shoppingcartitemdeletemodel{{$shoppingCartItem->lineNo}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Removing Item From Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/admin/shoppingcart/removefromcart/{{$shoppingCartItem->lineNo}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                        <div class="form-group row">
                            <h1>Are you sure to remove?</h1>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Remove</button>
                </div>
            </form>
          </div>
        </div>
      </div>
