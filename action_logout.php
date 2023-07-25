<?php 
if(isset($_SESSION['useremail']))
{
                unset($_SESSION['authenticated']);
                unset($_SESSION['useremail']);
                unset($_SESSION['usernames']);
                unset($_SESSION['user_role']);
                unset($_SESSION['userorganisation']);
                unset($_SESSION['provinceuser']);
                header('location:index.php');
}

?>