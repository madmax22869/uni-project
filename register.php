<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>


</head>

<body>

<?php

include_once "connect.php";

$err = false;

if (isset($_POST['create'])){
   
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    if(empty($login)){
        $loginErr = 'Please enter login';
        $err = true;
    }
    if(empty($password)){
        $passErr = 'Please enter password';
        $err = true;
    }
    if(empty($email)){
        $emailErr = 'Please enter email';
        $err = true;
    }
    if(empty($street)){
        $streetErr = 'Please enter street';
        $err = true;
    }
    if(empty($suburb)){
        $suburbErr = 'Please enter suburb';
        $err = true;
    }
    if(empty($city)){
        $cityErr = 'Please enter city';
        $err = true;
    }
    if(empty($postcode)){
        $postcodeErr = 'Please enter postcode';
        $err = true;
    }

    $conn = dbconnect();

    $login_try = trim($_POST['login']);
    $sql = "SELECT * FROM users WHERE login = '$login_try'";
    $result = $conn->query($sql);

    echo $login_try, $sql, $result->num_rows;

    if($result->num_rows > 0){
        echo 'Please use different login';
        $err = true;
    } else{
        $login = $login_try;
    }

    echo ' Password = '.$password;

    if($err === false){

        $sql = "INSERT INTO users (login, email, password, street, suburb, city, postcode) VALUES (?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
    
        $param_password = password_hash($password, PASSWORD_BCRYPT);
        echo ' PasswordHash = '.$param_password;
    
        $stmt->bind_param("ssssssi", $login, $email, $param_password, $street, $suburb, $city, $postcode);
    
        if($stmt->execute()){
    
            session_start();
            $_SESSION['login'] = $login;
        } else{
    
            echo "there is some issues with your login";
        }
    
        $stmt->close();
    
        $conn->close();
    
    }








    // echo $login . " " . $password . " " . $email . " " . $street . " " . $suburb . " " . $city . " " . $postcode;


}
?>

<section>
    <div>
        <form method="post" action="register.php">
            <div class="container">
                <h1>Registration Form</h1>
                <p>Fill in your details.</p>
                <label for="login"><b>Login</b></label>
                <input type="text" name="login" required>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required>

                <label for="email"><b>E-mail</b></label>
                <input type="email" name="email" required>

                <label for="street"><b>Street number and Name</b></label>
                <input type="text" name="street" required>

                <label for="suburb"><b>Suburb</b></label>
                <input type="text" name="suburb" required>

                <label for="city"><b>City</b></label>
                <input type="text" name="city" required>

                <label for="postcode"><b>Postcode</b></label>
                <input type="text" name="postcode" required>

                <input type="submit" name="create" value="Sign Up">

            </div>
        </form>
    </div>

</section>


</body>

</html>