<?php
include_once "Database.php";
class ProductModel extends Database
{

    public function index()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function create($create_product)
    {
        $title = $create_product['title'];
        $price = $create_product['price'];
        $avatar = $create_product['avatar'];
        $content = $create_product['content']==""?$create_product['content']:" ";
        
        $sql = "INSERT INTO `products` (`id`, `title`, `price`, `avatar`, `content`) VALUES (NULL, '$title', '$price', '$avatar', '$content')";
        echo $sql;
        
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute();
        // echo "<br>" . $result==true? 1: 0;
        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // $data = $stmt->fetchAll();
        return $result;
    }
    public function edit($id)
    {
        $sql = "SELECT * FROM products WHERE ID = '$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function save($save_product,$id){
        $title = $save_product['title'];
        $price = $save_product['price'];
        $avatar = $save_product['avatar'];
        echo "<br>" . (int)$save_product["content"]==0?1:0;
        $content = $save_product["content"];
        $sql = "UPDATE `products` SET `title` = '$title', `price` = '$price', `avatar` = '$avatar', `content` = '$content' WHERE `products`.`id` = $id;";
        echo "<br>" . $sql;
        // die;
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute();
        return $result;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `products`.`id` = $id";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute();
        return $result;
    }
}
