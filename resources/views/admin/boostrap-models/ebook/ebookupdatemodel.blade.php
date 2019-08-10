<div id="ebookupdatemodel{{$ebook->eid}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Adding eBook</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/admin/ebook/update/{{$ebook->eid}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                        <div class="form-group row">
                        <label for="ebookTitle" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="ebookTitle" value="{{$ebook->title}}" placeholder="Enter title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="ebookDescription" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="ebookDescription" rows="3" placeholder="Enter description" required>{{$ebook->desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ebookCategory" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select id="ebookCategory" class="form-control" name="category" required>
                                    <option selected>{{$ebook->category}}</option>
                                    <option value="eMagazine">eMagazine</option>
                                    <option value="eNewspaper">eNewspaper</option>
                                    <option value="eJournal">eJournal</option>
                                    <option value="othereBook">Other eBooks</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="ebookAuthor" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <select id="ebookAuthor" class="form-control" name="author" required>
                                        <option selected>{{$ebook->author}}</option>
                                        @foreach ($authors as $author)
                                            <option value="{{$author->name}}">{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="ebookPublisher" class="col-sm-2 col-form-label">Publisher</label>
                                    <div class="col-sm-10">
                                        <select id="ebookPublisher" class="form-control" name="publisher" required>
                                            <option selected>{{$ebook->publisher}}</option>
                                            @foreach ($publishers as $publisher)
                                                <option value="{{$publisher->name}}">{{$publisher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        <div class="form-group row">
                        <label for="ebookPrice" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="number" class="form-control" id="ebookPrice" value="{{$ebook->price}}" placeholder="Enter price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="ebookCoverpic" class="col-sm-2 col-form-label">Choose Cover</label>
                            <div class="col-sm-10">
                                <input name="coverpic" type="file" class="form-control" id="ebookCoverpic" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="ebookPdf" class="col-sm-2 col-form-label">Choose Pdf</label>
                            <div class="col-sm-10">
                                <input name="pdf" type="file" class="form-control" id="ebookPdf" accept=".pdf" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>

