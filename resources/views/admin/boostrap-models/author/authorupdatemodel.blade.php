<div id="authorupdatemodel{{$author->authorId}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Updating Author</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="authorupdateform{{$author->authorId}}" action="/admin/author/update/{{$author->authorId}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                        <label for="authorName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="authorName" placeholder="Enter Name" value="{{$author->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="authorEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="authorEmail" placeholder="Enter Email" value="{{$author->email}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="authorupdatemodel{{$author->authorId}}-close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
            $(document).ready(function(){
              $('#authorupdateform'+{{$author->authorId}}).on('submit',function(event){
                  event.preventDefault();
                  $('#authorupdatemodel'+{{$author->authorId}}+'-close-modal').click();
                  $.ajax({
                      url:"/admin/author/update/"+{{$author->authorId}},
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
