<!DOCTYPE html>
<html>

<head>


</head>
<body>

<?php

include_once "connect.php";

$err = false;

if (isset($_POST['log-in'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    if(empty($login)){
        $loginErr = "Please enter your login";
        $err = true;
    }
    if(empty($password)){
        $passErr = "Please enter your password";
        $err = true;
    }

    $conn = dbconnect();

    $login_try = trim($login); //?????
    // echo ' Password = '.$password;
    $sql = "SELECT * FROM users WHERE login = '$login_try'";
    $result = $conn->query($sql);

    // echo $sql;

    if($result->num_rows === 1){
        while ($row = $result->fetch_assoc()){
            $password_hash_db = $row["password"];
            $password_valid = password_verify($password, $password_hash_db);
            if($password_valid===true){
                $login = $login_try;
                $admin = $row['admin'];
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['admin'] = $admin;
                echo "login successful";
            }else {
                echo "there is no account found with this login or password";
                $err = true;
            }
        }
    } else {
        echo "there is no account found with this login or password";
        $err = true;
    }

    $conn->close();




}

?>


<section>
    <div>
        <form method="post" action="login.php">
            <div class="container">
                <h1>Login</h1>
                <p>Fill in your details.</p>
                <label for="login"><b>Login</b></label>
                <input type="text" name="login" required>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required>

                <input type="submit" name="log-in" value="Sign Up">

            </div>
        </form>
    </div>

</section>



</body>

</html>