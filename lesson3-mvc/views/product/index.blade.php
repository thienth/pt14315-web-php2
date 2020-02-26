@extends('layouts.admin')
@section('title', "Danh sách sản phẩm")

@section('content')
    <div class="row">
        @if(isset($_GET['msg']))
        <p style="color: red;">{{$_GET['msg']}}</p>
        @endif
        <table class="table table-stripped">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th width="100">Image</th>
            <th>Price</th>
            <th>Star</th>
            <th>
                <a class="btn btn-success btn-sm" href="{{BASE_URL . 'products/add'}}"><i class="fas fa-plus"></i> Thêm</a>
            </th>
            </thead>
            <tbody>
            @foreach($products as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->getCategoryName()}}</td>
                <td>
                    <img src="{{BASE_URL . $pro->image}}" class="img-thumbnail">
                </td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->star}}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{BASE_URL . 'products/edit-product?id=' . $pro->id}}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{BASE_URL . 'products/remove-product?id=' . $pro->id}}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection