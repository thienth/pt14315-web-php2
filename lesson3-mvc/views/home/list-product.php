<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Danh sách sản phẩm</title>
</head>
<body>
<a href="<?php echo BASE_URL ?>">Trang chủ</a>
<?php if(isset($_GET['msg'])): ?>
    <p style="color: red;"><?php echo $_GET['msg']; ?></p>
<?php endif; ?>
<table>
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
</body>
</html>