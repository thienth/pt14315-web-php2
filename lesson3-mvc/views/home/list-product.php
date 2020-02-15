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
                <?php if(isset($_GET['msg'])): ?>
                    <p style="color: red;"><?php echo $_GET['msg']; ?></p>
                <?php endif; ?>
                <table class="table table-stripped">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Star</th>
                    <th>
                        <a href="<?php echo BASE_URL . 'add-product'?>">Thêm</a>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach($products as $pro) :?>
                        <tr>
                            <td><?php echo $pro->id ?></td>
                            <td><?php echo $pro->name ?></td>
                            <td><?php echo $pro->price ?></td>
                            <td><?php echo $pro->star ?></td>
                            <td>
                                <a href="<?php echo BASE_URL . 'edit-product?id=' . $pro->id?>">Sửa</a>
                                <a href="<?php echo BASE_URL . 'remove-product?id=' . $pro->id?>">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>