<form class="p-2 mb-2 bg-body-tertiary border-bottom">
    <input type="search" id="myInput" onkeyup="myFunction()" class="form-control" autocomplete="true" placeholder="Type to filter...">
  </form>
  <table id="myTable">
      <tr class="header">
        <th style="width:40%;">Description</th>
        <th style="width:30%;">Category</th>
        <th style="width:20%;">Actions</th>
      </tr>
      @foreach ($products as $key => $product)
          <tr>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category->description }}</td>
              <td>
                  <a class="btn btn-primary" href="/products/detail/{{$product->id}}"><span class="fa fa-pencil"></span></a>
                  <a class="btn btn-danger" href="/products/delete/{{$product->id}}"><span class="fa fa-trash"></span></a>
              </td>
          </tr>
      @endforeach
  </table>