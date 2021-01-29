<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>


    <div class="container">
        <?php
        if (isset($_SESSION["create"])) {
        ?>
            <div class="alert alert-<?php echo $_SESSION["create"] == "success" ? "success" : "danger"; ?>" role="alert">
                <?php echo "<br>" . $_SESSION["create"]; ?>
            </div>
        <?php
            unset($_SESSION["create"]);
        }
        ?>
        <a href="?action=create" class="btn btn-info">Them moi san pham</a>
        <h2>Danh sach san pham</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Titile</th>
                    <th>Price</th>
                    <th>Avartar</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <style>
            img{
                width: 100px;
                height: auto;
            }
            </style>
                <?php
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                if (isset($data)) {
                    foreach ($data as $product) {
                ?>
                        <tr>
                            <td><?php echo $product["id"] ?></td>
                            <td><?php echo $product["title"] ?></td>
                            <td><?php echo $product["price"] ?></td>
                            <td>
                                <img src="
                                <?php
                                echo file_exists($product["avatar"])?$product["avatar"]:"img/blank-img.jpg";
                                ?>
                                " alt="Image">
                            </td>
                            <td><?php echo $product["content"] ?></td>
                            <td><?php echo $product["create_at"] ?></td>
                            <td>
                                <a href="?action=edit&id=<?php echo $product["id"]; ?>" class="btn btn-warning">Sua</a>
                                <span class="btn btn-danger" onclick="Check(<?php echo $product['id']; ?>)">Xoa</span>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td>Rỗng</td>
                        <td>Rỗng</td>
                        <td>Rỗng</td>
                        <td>Rỗng</td>
                        <td>Rỗng</td>
                        <td>Rỗng</td>

                        <td>

                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
    <script>
        function Check(id) {
            var r = confirm("Có chắc bạn muốn xóa sản phẩm số " + id);
            if (r == true) {
                window.location.href = "?action=delete&id=" + id;
            }
        }
    </script>
</body>

</html>