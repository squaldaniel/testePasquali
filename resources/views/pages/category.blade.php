@extends('model')
@section('scriptshead')
    @include('components.filterTableCss')
@endsection
@section('header')
    @include('components.topmenu')
@endsection
@section('body')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <h1 class="display-4 fw-normal text-body-emphasis text-center">
            Category
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
                <form method="POST" action="/category/add" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="categoryname" id="categoryname"
                            placeholder="category" required>
                        <label for="categoryname">Category Name</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    <hr class="my-4">
                    <small class="text-body-secondary">Create the category</small>
                </form>
            </div>
            <!-- col 2-->
            <div class="col-lg-7 text-center text-lg-start">
                <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px"
                    data-bs-theme="light">
                    @include('components.filterCategoryTable')
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scriptfooter')
    @include('components.filterTableScript')
    <script>
        document.getElementById('btndelete').addEventListener('click', function(event) {
            event.preventDefault();
            var confirmacao = confirm('Do you really want to delete this item?');
            if (confirmacao) {
                window.location.href = this.href;
            } else {
                console.log('action Canceled');
            }
        });
    </script>
@endsection
