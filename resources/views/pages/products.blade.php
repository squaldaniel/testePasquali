@extends('model')
@section('header')
    @include('components.topmenu')
@endsection
@section('scriptshead')
    @include('components.filterTableCss')
@endsection
@section('body')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <h1 class="display-4 fw-normal text-body-emphasis text-center">
            Products
        </h1>
        <!-- messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="fa fa-exclamation-triangle"></span> <strong>Atention!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fa fa-check-circle"></span> <strong>Congratulations!</strong>
                <p class="text text-success">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- end messages -->
        <div class="row align-items-center g-lg-5 py-5">
            <!-- col 1 -->
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="POST" action="/products/add" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="productname" id="productname" placeholder="product"
                            required>
                        <label for="productname">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="category" class="form-select" id="">
                            <option value="">Category</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="statusA" value='1'
                                checked>
                            <label class="form-check-label" for="statusA">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="statusD" value="0">
                            <label class="form-check-label" for="statusD">
                                Disabled
                            </label>
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary" id="btnupdate" type="submit">
                        Register
                    </button>
                    <hr class="my-4">
                    <small class="text-body-secondary">Create your product and choose the category</small>
                </form>
            </div>
            <!-- col 2-->
            <div class="col-lg-7 text-center text-lg-start">
                <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px"
                    data-bs-theme="light">
                    @include('components.filterProductsTable')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptfooter')
    @include('components.filterTableScript')
@endsection
