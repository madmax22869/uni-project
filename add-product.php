<?php

session_start();

if ($_SESSION['admin' === 0]){
    header('home.php');
}

    require_once 'connect.php';

    $err = false;

    if (isset($_POST[add_product])){
        $title = trim($_POST['title']);
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        if(empty($title)){
            $titleErr = "Please add title";
            $err = true;
        }
        if(empty($price)){
            $price_err = "Please specify price";
            $err = true;
        }
        if(empty($quantity)){
            $quantityErr = "Please specify quantity";
            $err = true;
        }
        if(empty($description)){
            $descriptionErr = "Please specify description";
            $err = true;
        }
        if(empty($category)){
            $categoryErr = "Please specify category";
            $err = true;
        }

        $conn = dbconnect();

        $sql = "SELECT * FROM products WHERE title = '$title'";
        $result-> $conn->query($sql);

        if ($result->num_rows > 0){
            echo 'there is product already existing with this name';
            $err = true;
        }

        $sql = "SELECT * FROM categories WHERE product_category = '$category'";
        $result-> $conn->query($sql);

        if ($result->num_rows > 0){
            echo 'there is category already existing with this name';
            $err = true;
        }


        if ($err === false){



            $sql = "INSERT INTO products(title,price,quantity,description) VALUES (?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('siis', $title, $price, $quantity ,$description);

            if($stmt->execute()){
                echo 'product has been added';
            } else{
                echo 'there is an issue with db query in product table';
                $err = true;
            }

            $sql = "INSERT INTO categories (product_category) VALUES (?)"



        }


    }