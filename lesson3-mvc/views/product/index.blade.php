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
            <th width="100">Image</th>
            <th>Price</th>
            <th>Star</th>
            <th>
                <a href="{{BASE_URL . 'add-product'}}">Thêm</a>
            </th>
            </thead>
            <tbody>
            @foreach($products as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>
                    <img src="{{BASE_URL . $pro->image}}" class="img-thumbnail">
                </td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->star}}</td>
                <td>
                    <a href="{{BASE_URL . 'products/edit-product?id=' . $pro->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'products/remove-product?id=' . $pro->id}}">Xóa</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection