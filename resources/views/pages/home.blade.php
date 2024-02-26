<!-- template base -->
@extends('model')
<!-- Scripts adicionais -->
@section('scriptshead')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@show
@section('header')
    @include('components.topmenu')
@endsection
@section('body')
<div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-6 col-sm-6 col-lg-6">
            <div id="piechart" style="width: 450px; height: 250px;"></div>
        </div>
        <div class="col-lg-6">
            <h3 class="fw-bold text-body-emphasis lh-1 mb-3">
                Register your products and categories
            </h3>
            <ul class="dropdown-menu d-block position-static mx-0 shadow w-150px" data-bs-theme="light">
                <li>
                <a class="dropdown-item d-flex gap-2 align-items-center" href="/products">
                    <i class="fa fa-shopping-cart"></i>
                    Products
                </a>
                </li>
                <li>
                <a class="dropdown-item d-flex gap-2 align-items-center" href="#">
                    <i class="fa fa-gift"></i>
                    Categories
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('scriptfooter')
    @include('components.chartscript')
@endsection