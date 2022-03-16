<?php

include 'configdata/config.php';

$email_exist='';
$fillcase='';
if (isset($_POST['signup'])) {
    $email=$_POST['email'];
    $sql="SELECT * FROM comptes WHERE email = '$email'";
    $result= mysqli_query($config,$sql);
    $name=$_POST['name']; 
    $email=$_POST['email']; 
    $password=$_POST['password'];
    //if the variables of inputs are still empty this condition  will be true
    if(!$email && !$name){
        $fillcase = 'Fill All The Fields';
    }
    //if the email that the users entered is exist in the table of database this condistion will be true
    else if (mysqli_num_rows( $result ) > 0){
    $email_exist = 'Email Already Exist'; 
    // normal insert form with correct email
}else{
    $v="INSERT INTO `comptes` VALUES ('','$name','$email','$password')";
    $query=mysqli_query($config,$v);
    header("location:index.php");
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LEARNING-APPLICATION/signup</title>
    <link rel="stylesheet" href="./bootstrap5/css/bootstrap.css">
    <script src="./bootstrap5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="contanr d-flex justify-content-center align-items-center ">
        <div class="col-lg-5 col-sm-8 col-md-6 ">
            <div class="bg-light p-4 shadow" style=" border-radius: 20px;">
                <div class=" d-flex flex-column">
                    <div class="ms-4">
                        <h1 class="ps-2 border-start">E-class</h1>
                    </div>
                    <div class="text-center">
                        <h3 class="text-uppercase">Sign Up</h3>
                        <p class="text-muted">Enter your credentials to create your account</p>
                    </div>
                    <form action="signup.php" method="POST">
                        <div class="text-center">
                        <?php
                        //if the fiels empty print that 
                        if($fillcase){
                            echo "<p class=\"bg-danger p-2 fw-bold text-white rounded shadow\">  $fillcase </p>";
                        }
                        // if the entered email already exist print what in this statment
                        if($email_exist){ 
                            echo "<p class=\"bg-danger p-2 fw-bold text-white rounded shadow\">  $email_exist </p>";
                        }

                        ?>
                    </div>
                    
                    <div class=" d-flex flex-column text-muted ">
                        <label for="email" class="col-form-label">Name</label>
                        <input  type="name" id="name" placeholder="Enter your Name" name="name" 
                            class="w-100 rounded-3 border  p-2 bg-transparent form-control">
                    </div>

                    <div class=" d-flex flex-column text-muted ">
                        <label for="email" class="col-form-label">E-mail</label>
                        <input  type="email" id="email" placeholder="Enter your email" name="email" 
                            class="w-100 rounded-3 border  p-2 bg-transparent form-control">
                    </div>
                    
                    <div class=" d-flex flex-column text-muted mt-3 text">
                        <label for="">Password</label>
                        <input type="password" placeholder="Enter your password" name="password" 
                            class="w-100 rounded-3 border p-2 bg-transparent form-control">
                    </div>

                    <div class=" d-flex flex-column text-muted mt-3 text">
                        <label for="">Confirm Your Password</label>
                        <input type="password" placeholder="Confirm your password" name="passwordconfirmation" 
                            class="w-100 rounded-3 border p-2 bg-transparent form-control">
                    </div>
                    
                    <div class="mt-3">
                        <input type="submit" name="signup" value="Sign up"  class="btn btn-info w-100 rounded-3 border-1 text-white text-uppercase">
                    </div>
                    
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

