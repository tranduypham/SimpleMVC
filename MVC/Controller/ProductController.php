<?php
class ProductController
{
    public function index()
    {
        // echo "<br>" . __METHOD__;    
        $model = new ProductModel();
        $data = $model->index();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // // die;
        include "mvc/view/index.php";
    }
    public function create()
    {
        include "mvc/view/create.php";

        if (isset($create_product)) {
            // echo "<pre>";
            // print_r($create_product);
            // echo "</pre>";
            $model = new ProductModel();
            $result = $model->create($create_product);
            if ($result == true) {
                $_SESSION["create"] = "success";
            } else {
                $_SESSION["create"] = "fail";
            }
?>
            <script>
                window.location.href = "?action=index";
            </script>
<?php
            header('Location: index.php');
            exit;
        }
    }
    public function edit()
    {
        $id = $_GET["id"];
        echo $id;
        // die;
        $model = new ProductModel();
        $data = $model->edit($id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $product = $data[0];

        include "mvc/view/edit.php";
        if (isset($save_product)) {
            
            $result = $model->save($save_product, $id);
            if ($result == true) {
                $_SESSION["create"] = "success";
            } else {
                $_SESSION["create"] = "fail";
            }

            header('Location: index.php');
            exit;
        }
    }
    public function delete()
    {
        $id = $_GET["id"];
        echo "Xóa sản phẩm id số $id";
        $model = new ProductModel();
        $result = $model->delete($id);
        if ($result == true) {
            $_SESSION["create"] = "success";
        } else {
            $_SESSION["create"] = "fail";
        }
        header('Location: index.php');
        exit;
    }
}
