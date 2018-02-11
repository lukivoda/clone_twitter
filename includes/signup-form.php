<?php
if(isset($_POST['signup'])){

    $screenName = $_POST['screenName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //checking that all inputs are not empty
    if(!empty($screenName) && !empty($email) && !empty($password) ){

        //cleaning the inputs
        $screenName = $user->checkInput($screenName);
        $email = $user->checkInput($email);
        $password = $user->checkInput($password);

        //checking if the email is valid
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $error = "You've entered invalid email";
     }elseif (strlen($screenName)>20){
            $error = "Your name must not exceeds 20 letters";
     }elseif (strlen($password)<6 || strlen($password)>12){
            $error =  "Your password length should be between 6 and 12 characters!";
        }else {
            //if input email exists we are printing error
          if($user->checkEmail($email)){
              $error =  "This email already exists in our database";

          }else{ // we  are executing the register method
             $user->register($screenName,$email,$password);
             header("Location:home.php");
          }
        }

    }else {
        $error = "All fields are required";
    }

}

?>

<form method="post">
    <div class="signup-div">
        <h3>Sign up </h3>
        <ul>
            <li>
                <input type="text" name="screenName" placeholder="Full Name"/>
            </li>
            <li>
                <input type="email" name="email" placeholder="Email"/>
            </li>
            <li>
                <input type="password" name="password" placeholder="Password"/>
            </li>
            <li>
                <input type="submit" name="signup" Value="Signup for Twitter">
            </li>
        </ul>

        <?php
        if(isset($error)){?>
            <ul>
            <li class="error-li">
                <div class="span-fp-error"><?php echo $error ?></div>
            </li>
            </ul>
        <?php }
        ?>


    </div>
</form>
