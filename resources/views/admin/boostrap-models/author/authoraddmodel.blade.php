<div id="addAuthor" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Adding Author</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="authorAddForm" action="/admin/author/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                        <label for="authorName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="authorName" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="authorEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="authorEmail" placeholder="Enter Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
            $(document).ready(function(){
              $('#authorAddForm').on('submit',function(event){
                  event.preventDefault();
                  $('#btn-close-modal').click();
                  $.ajax({
                      url:"/admin/author/add",
                      method:"POST",
                      data: new FormData(this),
                      contentType:false,
                      cache:false,
                      processData:false,
                      dataType:"json",
                      success:function(data){
                          var html='';
                          if(data.success){
                              $('#author_table_data').load(window.location + " #author_table_data");
                          }
                      }
                  });

              });
            });
          </script> --}}
