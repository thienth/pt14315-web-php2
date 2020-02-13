<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <a href="http://localhost/pt14315-web/lesson3-mvc">Trang chủ</a>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Star</th>
        </thead>
        <tbody>
        <?php foreach($products as $pro) :?>
            <tr>
                <td><?php echo $pro->id ?></td>
                <td><?php echo $pro->name ?></td>
                <td><?php echo $pro->price ?></td>
                <td><?php echo $pro->star ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>