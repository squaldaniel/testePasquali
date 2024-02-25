@extends('model')
@section('scriptshead')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
@section('header')
    @include('components.topmenu')
@endsection
@section('body')
<h3 class="display-4 fw-normal text-body-emphasis text-center">
    Category detail
</h3>
<div class="col-md-10 mx-auto col-lg-5">
    <form method="POST" action="/category/update/{{$category->id}}" 
        class='p-4 p-md-5 border rounded-3 bg-body-tertiary'
        id='meuFormulario'>
        @csrf
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="productname"
            name="productname"
            value="{{$category->description}}"
            required >
        <label for="productname">Category Name</label>
      </div>
      <div>
        @if ($category->status == 1)
            <div class="form-check">
                <input class="form-check-input" type="radio" 
                name="status"
                value="1"
                id="statusA"
                checked>
                <label class="form-check-label" for="statusA">
                Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio"
                name="status"
                value="0"
                id="statusD" >
                <label class="form-check-label" for="statusD">
                  Disabled
                </label>
            </div>
        @else
            <div class="form-check">
                <input class="form-check-input"
                type="radio"
                name="status"
                id="statusA"
                Value="1">
                <label class="form-check-label" for="statusA">
                Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"
                type="radio"
                name="status"
                id="statusD"
                Value="0"
                checked>
                <label class="form-check-label" for="statusD">
                Disabled
                </label>
          </div>
        @endif
      </div>
      <div class="row">
        <button class="w-45 btn btn-primary col-auto ms-2" id="btnupdate" type="submit">
            Update
            <span class="fa fa-check"></span>
        </button>
      </div>
      <hr class="my-4">
      <small class="text-body-secondary">If necessary, update the category</small>
    </form>
</div>
@endsection
@section('scriptfooter')
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnupdate").click(function() {
            $("#meuFormulario").attr("action", "/category/update/{{$category->id}}");
        });
        $("#btnupdate").click(function() {
            $("#meuFormulario").attr("action", "/category/update/{{$category->id}}");
        });
    });
</script>
@endsection