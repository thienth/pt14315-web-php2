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
        <form id="edit-product-form" action="<?php echo BASE_URL . 'save-edit-product'?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" placeholder="Nhập tên sản phẩm"
                               value="<?= $model->name ?>"
                               class="form-control">
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
                        <input type="number" name="price" placeholder="Nhập giá sản phẩm"
                               value="<?= $model->price ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng views</label>
                        <input type="number" name="views" placeholder="Nhập số lượt xem sản phẩm"
                               value="<?= $model->views ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="5"><?= $model->short_desc ?></textarea>
                    </div>
                </div>

                <div class="col-6">
                    <div class="preview-img row">
                        <div class="col-8 offset-2">
                            <img class="img-preview img-fluid" src="<?= BASE_URL . 'public/images/default-img.jpg'?>" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input onchange="encodeImageFileAsURL(this)" type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <textarea name="detail" class="form-control" rows="10"><?= $model->detail ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary" type="submit">Lưu</button>&nbsp;
                <a href="<?php echo BASE_URL . 'san-pham'?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>

        //jQuery.validator.addMethod("checkProductName", function(value, element) {
        //    var proName = element.value;
        //    var requestUrl = "<?//= BASE_URL . 'check-product-existed?name='?>//" + proName;
        //    var resultData = true;
        //    fetch(requestUrl)
        //        .then((response) => {
        //            return response.json();
        //        })
        //        .then((result) => {
        //            resultData = result;
        //        });
        //    return resultData;
        //
        //}, "demo error text");
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $(".preview-img img").attr('src', "<?= BASE_URL . 'public/images/default-img.jpg'?>");
            }else{
                var reader = new FileReader();
                reader.onloadend = function() {
                    if(reader.result){
                        $(".preview-img img").attr('src', reader.result);
                    }
                }
                reader.readAsDataURL(file);
            }
        }

        // tên sp: phải nhập
        // độ dài tối đa = 50

        // giá: phải nhập
        // giá tối thiểu: 1
        // lượt views: o bắt buộc nhập
        // nếu nhập thì phải là số dương

        // ảnh: bắt buộc nhập
        // định dạng ảnh (chỉ cho phép nhập các file đuôi jpg, png, jpeg, gif)
        $('#add-product-form').validate({
            rules:{
                name: {
                    // checkProductName: true,
                    required: true,
                    rangelength: [4, 20],
                    remote: {
                        url: "<?= BASE_URL . 'check-product-existed' ?>",
                        type: "post",
                        dataType: "json",
                        data: {
                            name:  function(){
                                return $("[name='name']").val()
                            }
                        }
                    }
                },
                price: {
                    required: true,
                    min: 1
                }
            },
            messages:{
                name: {
                    required: 'Vui lòng nhập tên sản phẩm',
                    rangelength: "Tên sản phẩm nằm trong khoảng 4-20 ký tự",
                    remote: "Tên sản phẩm đã tồn tại, vui lòng chọn tên khác"
                },
                price: {
                    required: 'Vui lòng nhập giá sản phẩm',
                    min: "Giá sản phẩm ít nhất bằng 1"
                }
            }
        });
    </script>
</body>
</html>