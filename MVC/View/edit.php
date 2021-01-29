<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $error = 0;
    if (isset($_POST) && !empty($_POST)) {
        if (!isset($_POST["title"]) || strlen($_POST["title"]) == 0) {
            echo "<br>Phải nhập tên sản phẩm";
            $error += 1;
        }
        if (!isset($_POST["price"]) || strlen($_POST["price"]) == 0) {
            echo "<br>Phải nhập giá sản phẩm";
            $error += 1;
        }
        if (isset($_POST["avatar"])) {
            $arr = explode(".", $_POST["avatar"]);
            if (isset($arr[1])) {
                $file = array("png", "jpg", "jpeg", "gif");
                $arr[1] = strtolower($arr[1]);
                if (in_array($arr[1], $file)) {
                    echo "Ảnh đạt yêu cầu";
                } else {
                    echo "<br>Ảnh không được ngoài định dạng png, jpg, jpeg, gif";
                    $error += 1;
                }
            }
        }

        if ($error == 0) {
            $save_product["title"] = $_POST["title"];
            $save_product["price"] = $_POST["price"];
            if ($_FILES["avatar"]["name"] != "") {
                // Upload File - return sql_link
                if (!empty($_FILES["avatar"])) {
                    $fileName = $_FILES["avatar"]["name"];
                    $source_Temp = $_FILES["avatar"]["tmp_name"];
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($fileName);
                    echo $target_file;
                    // die;
                    // echo is_dir($targetLocaion)==true?1:0;
                    if (!is_dir($target_dir)) { //Check if folder is exist or not
                        mkdir($target_dir, 0777, true);
                    }

                    if (move_uploaded_file($source_Temp, $target_file)) {
                        echo "<br>Upload success";
                        $sql_link = "img/" . $fileName;
                        echo $sql_link;
                    } else {
                        echo "<br>Upload fail";
                    }
                }
                // $save_product["avatar"] = "img/".$_POST["avatar"];
                $save_product["avatar"] = isset($sql_link) ? $sql_link : "img/blank-img.jpg";
            } else {
                $save_product["avatar"] = $product["avatar"];
            }
            $save_product["content"] = $_POST["content"]!=" "?$_POST["content"]:"no comment";
            // echo $save_product["content"];
            // echo gettype ($save_product["content"]);
            // if($save_product["content"]==" "){
            //     echo "<br> content: 1";
            // }else{
            //     echo "<br> content: 0";
            // }
        }
    }
    ?>

    <div class="container">
        <h2>Them moi san pham</h2>
        <!-- Muon upload file phair co cai enctype -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo $product["title"] ?>">
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo $product["price"] ?>">
            </div>
            <div class="form-group">
                <label for="avatar">Ảnh sản phẩm:</label>
                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar" value="<?php echo $product["avatar"] ?>">

            </div>
            <div class="form-group">
                <label for="content">Mô tả sản phẩm:</label>
                <textarea name="content" id="content" cols="30" rows="10"><?php echo $product["content"] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-info">Reset</button>
        </form>
    </div>

</body>


</html>