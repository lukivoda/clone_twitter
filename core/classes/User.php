<?php
class User {

    //cleaning inputs
    public function checkInput($input) {

        //Convert the predefined characters to HTML entities:
        $input = htmlspecialchars($input);

        //strip whitespace from the beginning and end of a string.
        $input = trim($input);

        //remove the backslash in the string
        $input = stripcslashes($input);

        return $input;

    }

     // login method
    public function login($email,$password){
        $db = Db::getConnection();

        $query = "SELECT id from users WHERE email = :email and password = :password";
        $statement = $db->prepare($query);
        $statement->bindParam(":email",$email,PDO::PARAM_STR);
        $statement->bindParam(":password",md5($password),PDO::PARAM_STR);

        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);

        $count = $statement->rowCount();
         //if we have result(success)
        if($count > 0){
            //we are saving the id from the users table in session
         $_SESSION['user_id'] = $user->id;
           // relocating to home page
         header("Location:home.php");
        }else {
            return false;
        }

    }

    //method for displaying user object(parameter is $_SESSION['user_id'])
    public function userData($user_id){
        $db = Db::getConnection();

        $query = "SELECT * FROM users WHERE id =:user_id";
        $statement = $db->prepare($query);
        $statement->bindParam("user_id",$user_id,PDO::PARAM_STR);

        $statement->execute();
        $user_object = $statement->fetch(PDO::FETCH_OBJ);

        return $user_object;

    }

   // logging user out with destroying session and redirecting to index page
    public function logOut() {
        $_SESSION = array();
        session_destroy();
        header("Location:../index.php");

    }

}