<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
     $email = $user->checkInput($email);
     $password = $user->checkInput($password);

     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $error = "Email has invalid format";
     }else {
         if(!$user->login($email,$password)){
             $error = "The email or password are not correct";
         }

     }

    }else {
        $error = "Please type username and password";
    }

}

?>

<div class="login-div">
    <form method="post">
        <ul>
            <li>
                <input type="text" name="email" placeholder="Please enter your Email here"/>
            </li>
            <li>
                <input type="password" name="password" placeholder="password"/><input type="submit" name="login" value="Log in"/>
            </li>
            <li>
                <input type="checkbox" Value="Remember me">Remember me
            </li>
        </ul>

        <?php
        if(isset($error)){?>
            <li class="error-li">
                <div class="span-fp-error"><?php echo $error ?></div>
            </li>
       <?php }
        ?>



    </form>
</div>
