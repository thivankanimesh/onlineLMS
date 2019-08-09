<div id="publisher_table_data">
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

                @foreach ($publishers as $publisher)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$publisher->name}}</td>
                    <td>{{$publisher->email}}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#publisherupdatemodel{{$publisher->publisherId}}">Edit</button></td>
                    @include('/admin/boostrap-models/publisher/publisherupdatemodel')
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#publisherdeletemodel{{$publisher->publisherId}}">Delete</button></td>
                    @include('/admin/boostrap-models/publisher/publisherdeletemodel')
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
