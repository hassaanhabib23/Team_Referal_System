<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    header("Location:http://localhost/Team_Referal_system/referal_info.php");
    $firstname = "";
    $lastname = "";
    $email = "";
    $username="";
    $password = "";
    $confirmpassword="";
    $errors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];
        $password = $_POST["password"]; 
        $username=$_POST['username'];
        $confirmpassword=$_POST["confirmpassword"];
        $conn = new mysqli("localhost", "root", "", "team_referal_system");
        $sql1="SELECT * FROM sign_up WHERE username='$username'";
        $data=$conn->query($sql1);
        if (empty($firstname)) {
            array_push($errors, "Empty First Name");
        }
        if (empty($lastname)) {
            array_push($errors, "Empty last Name field");
        }
        if (empty($email)) {
            array_push($errors, "Empty email field");
        }
        if (empty($username)){
            array_push($errors,"Empty Username field");
        }
        if($data->num_rows>0){
            array_push($errors,"username already exist");
        }
        if (empty($password)) {
            array_push($errors, "Empty password field");
        }
        if($password!=$confirmpassword){
            array_push($errors,"Password doesnot match");
        } 
        else {
            if(is_numeric($firstname)){
                array_push($errors,"Invalid first name");
            }
            if(is_numeric($lastname)){
                array_push($errors,"Invalid last name");
            }
            if(!empty($email)){
                if(!str_contains($email,"@")||!str_contains($email,".com")){
                    array_push($errors,"Invalid email format");
                }
            }
            else{
                $conn = new mysqli("localhost", "root", "", "team_referal_system");
                $sql = "INSERT INTO sign_up (first_name,last_name,email,username,passwords) VALUES ('$firstname','$lastname','$email','$username','$password')";
                $conn->query($sql);
                
            
            }
            
        }
    }
    ?>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align:center">

            <label class="headingStyling">
                <h4>SignUp Form</h4>
            </label>
            <input type="text" placeholder="First Name" id="hello" class="fieldStyling" name="fname" value="<?php echo $firstname ?>" autocomplete="off"><br><br>
            <input type="text" placeholder="Last Name" class="fieldStyling" name="lname" value="<?php echo $lastname ?>" autocomplete="off"><br><br>
            <input type="text" name="email" placeholder="Email" class="fieldStyling" autocomplete="off" value="<?php echo $email ?>"><br><br>
            <input type="text" name="username" placeholder="Username" id="usernamefield" oninput="input()" autocomplete="off" value="<?php echo $username ?>"><br><br>
            <input type="text" name="referal_code" placeholder="Referal Code(Optional)" id="fieldstyle" autocomplete="off" ><br><br>
            <input type="password" name="password" placeholder="Password" class="fieldStyling" value="<?php echo $password ?>"><br><br>
            <input type="password" name="confirmpassword" placeholder="ConfirmPassword" class="fieldStyling" value=""><br><br>
            <Button class="buttonStyling">SignUp</Button>
        </form>
        <div style="padding:5px;">
            <ul style="color:red; "><?php
                                    foreach ($errors as $error) { ?>
                    <li><?php echo $error ?></li>
                <?php } ?>
            </ul>
        </div>
        <p id="demo"></p>
    </div>
    <script src="referal_link.js"></script>
</body>
</html>