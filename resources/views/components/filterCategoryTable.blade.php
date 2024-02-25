<form class="p-2 mb-2 bg-body-tertiary border-bottom">
    <input type="search" id="myInput" onkeyup="myFunction()" class="form-control" autocomplete="true"
        placeholder="Type to filter...">
</form>
<table id="myTable">
    <tr class="header">
        <th style="width:60%;">Description</th>
        <th style="width:40%;">Actions</th>
    </tr>
    @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $category->description }}</td>
            <td>
                <a class="btn btn-primary" href="/category/detail/{{ $category->id }}"><span
                        class="fa fa-pencil"></span></a>
                <a class="btn btn-danger" href="/category/delete/{{ $category->id }}" id="btndelete"><span
                        class="fa fa-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>
