@extends('layout')
@section('dashboard-content')
    <h1> Update product form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('post-product-edit-form') }}/{{ $product->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Product name </label>
            <input type="text" class="form-control" value="{{ $product->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="productName">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product price </label>
            <input type="number" class="form-control" value="{{ $product->price }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productPrice">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product discount </label>
            <input type="number" class="form-control" value="{{ $product->discount }}"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productDiscount">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select product category </label>
            <select class="form-control" name="category">
                <option> Select </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product Photo </label>
            <input type="file" class="form-control" name="productPhoto" onchange="loadPhoto(event)">
        </div>

        <div class="form-group">
            <img id="photo" height="100" width="100">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Is Hot Product </label>
            <input type="checkbox" name="isHotProduct" @if($product->is_hot_product > 0) checked @endif/>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Is New Arrival </label>
            <input type="checkbox" name="isNewArrival"  @if($product->is_new_arrival > 0) checked @endif/>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@stop
