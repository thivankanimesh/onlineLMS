<div id="authordeletemodel{{$author->authorId}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Deleting Author</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="authordeleteform{{$author->authorId}}" action="/admin/author/delete/{{$author->authorId}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                        <div class="form-group row">
                            <h1>Are you sure to delete?</h1>
                        </div>

                </div>
                <div class="modal-footer">
                    <button id="authordeletemodel{{$author->authorId}}-close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      {{-- <script>
        $(document).ready(function(){
          $('#authordeleteform'+{{$author->authorId}}).on('submit',function(event){
              event.preventDefault();
              $('#authordeletemodel'+{{$author->authorId}}+'-close-modal').click();
              $.ajax({
                  url:"/admin/author/delete/"+{{$author->authorId}},
                  method:"GET",
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
