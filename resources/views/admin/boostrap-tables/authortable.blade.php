<div id="author_table_data">
        <table class="table table-borderless">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$author->name}}</td>
                    <td>{{$author->email}}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#authorupdatemodel{{$author->authorId}}">Edit</button></td>
                    @include('/admin/boostrap-models/authorupdatemodel')
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#authordeletemodel{{$author->authorId}}">Delete</button></td>
                    @include('/admin/boostrap-models/authordeletemodel')
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
