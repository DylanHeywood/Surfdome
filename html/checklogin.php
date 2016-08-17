<?php
    echo("TEST");
    include ("../resources/core/init.php");
    $email = htmlspecialchars($_GET['email']);
    $password = htmlspecialchars($_GET['password']);
    $_SESSION['email']=$email;
    $_SESSION['pass']=$password;
    $sql = "SELECT * FROM users WHERE Email = ? AND Password = ?";
    $statement=$con->stmt_init();
    if(!$statement->prepare($sql))
    {
        echo "error:".$statement->error;        
    }
    else
    {
        $statement->bind_param('ss',$email,$password);
        $statement->execute();
        $results=$statement->get_result();
        if (count($results->fetch_assoc()) > 1)
        { // passed
            if(isset($_POST['remember']))
            {
                setcookie('UserLoggedIn',$email, time()+2678400);
            }
            else
            {
                 $_SESSION['UserLoggedIn'] = $email;
            }
            $user = array();
            $user = (explode("@",$email));
            $_SESSION['user'] = $user[0];
            header("Location: http://dev.idro.org.uk/~dylan.heywood/surfdomeCOPY/");
        }
        else
        { // failed
            $_SESSION['error']="login";
            header("Location: " .$_SERVER["HTTP_REFERER"]);
        }
      }
?>