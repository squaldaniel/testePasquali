@extends('model')
@section('header')
    @include('components.topmenu')
@endsection
@section('body')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <!-- col 1 -->
        <div class="col-md-10 mx-auto col-lg-5">
            <form method="POST" action="/products/add" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="productname" id="productname" placeholder="product">
                <label for="productname">Product Name</label>
              </div>
              <div class="form-floating mb-3">
                <select name="category" class="form-select" id="">
                    <option value="">Category</option>
                    @foreach ($categories as $key => $category)
                      <option value="{{$category->id}}">{{$category->description}}</option>
                    @endforeach
                </select>
              </div>
              <div>
                <div class="form-check">
                    <input class="form-check-input" 
                    type="radio"
                    name="status"
                    id="statusA"
                    value='1' checked>
                    <label class="form-check-label" for="statusA">
                      Active
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input"
                    type="radio"
                    name="status"
                    id="statusD"
                    value="0" >
                    <label class="form-check-label" for="statusD">
                      Disabled
                    </label>
                  </div>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
              <hr class="my-4">
              <small class="text-body-secondary">Create your product and choose the category</small>
            </form>
        </div>
        <!-- col 2-->
        <div class="col-lg-7 text-center text-lg-start">
            <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px" data-bs-theme="light">
                <form class="p-2 mb-2 bg-body-tertiary border-bottom">
                  <input type="search" class="form-control" autocomplete="false" placeholder="Type to filter...">
                </form>
                <ul class="list-unstyled mb-0">
                  <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-success rounded-circle p-1"></span>
                    Action
                  </a></li>
                  <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-primary rounded-circle p-1"></span>
                    Another action
                  </a></li>
                  <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-danger rounded-circle p-1"></span>
                    Something else here
                  </a></li>
                  <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-info rounded-circle p-1"></span>
                    Separated link
                  </a></li>
                </ul>
              </div>
        </div>
    </div>
  </div>
@endsection