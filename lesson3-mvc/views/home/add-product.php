<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .preview-img{
            min-height: 137px;
            border: 1px solid #ccc;
        }
        .product-form{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container product-form">
        <form action="<?php echo BASE_URL . 'save-product'?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            <?php foreach ($cates as $ca):?>
                                <option value="<?php echo $ca->id?>"><?php echo $ca->cate_name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" placeholder="Nhập giá sản phẩm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng views</label>
                        <input type="number" name="views" placeholder="Nhập số lượt xem sản phẩm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <div class="col-6">
                    <div class="preview-img">

                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <textarea name="detail" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary" type="submit">Lưu</button>&nbsp;
                <a href="<?php echo BASE_URL . 'san-pham'?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>