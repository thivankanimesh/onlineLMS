<div id="ebook_table_data">
    <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Price</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($ebooks as $ebook)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td><img src="{{Storage::url('coverpics/'.$ebook->coverpic)}}"  alt="..." width="50" height="50"></td>
                <td>{{$ebook->title}}</td>
                <td>{{$ebook->author}}</td>
                <td>{{$ebook->price}}</td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ebookupdatemodel{{$ebook->eid}}">Edit</button></td>
                @include('/admin/boostrap-models/ebook/ebookupdatemodel')
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ebookdeletemodel{{$ebook->eid}}">Delete</button></td>
                @include('/admin/boostrap-models/ebook/ebookdeletemodel')
            </tr>

            @endforeach

        </tbody>
    </table>

</div>
