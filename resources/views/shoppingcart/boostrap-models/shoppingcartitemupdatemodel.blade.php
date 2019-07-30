<div id="shoppingcartitemupdatemodel{{$shoppingCartItem->lineNo}}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chnage Quantity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/shoppingcart/changequantity/{{$shoppingCartItem->lineNo}}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <div class="container">

                        <div class="form-group">
                          <label for="quantity">Enter quantity :</label>
                          <input name="quantity" type="number" class="form-control" id="quantity"  placeholder="Enter quantity">
                        </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Done</button>
            </div>
        </form>
      </div>
    </div>
  </div>
