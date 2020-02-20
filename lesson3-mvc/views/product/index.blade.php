<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <a href="<?php echo BASE_URL ?>">Trang chủ</a>
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
                        <a href="{{BASE_URL . 'edit-product?id=' . $pro->id}}">Sửa</a>
                        <a href="{{BASE_URL . 'remove-product?id=' . $pro->id}}">Xóa</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>