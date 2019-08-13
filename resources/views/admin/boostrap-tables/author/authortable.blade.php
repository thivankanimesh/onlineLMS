<div id="author_table_data">
        <table id="author_table" class="table table-borderless">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="authortablebody">

                @foreach ($authors as $author)
                <tr id="tr{{$author->authorId}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$author->name}}</td>
                    <td>{{$author->email}}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#authorupdatemodel{{$author->authorId}}">Edit</button></td>
                    @include('/admin/boostrap-models/author/authorupdatemodel')
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#authordeletemodel{{$author->authorId}}">Delete</button></td>
                    @include('/admin/boostrap-models/author/authordeletemodel')
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
