<?php 

// $num1=$_POST["num1"];
// $num2=$_POST["num2"];
// $operation=$_POST["operation"];

// switch($operation){
//     case('+'):
//         echo "$num1 $operation $num2 = " .$num1 + $num2;
//         break;
//     case('-'):
//         echo "$num1 $operation $num2 = " .$num1 - $num2;
//         break;
//     case('*'):
//         echo "$num1 $operation $num2 = " .$num1 * $num2;
//         break;
//     case('/'):
//         echo "$num1 $operation $num2 = " .$num1 / $num2;
//         break;
//         default:
//         echo"operation not valid ";
// }

// if(isset($_POST['submit'])){
//     $user_name=$_POST['user_name'];
//     $password=$_POST['password'];
//     if(isset($_POST['check']) && $_POST['check']==true){
//         setcookie('user_name' , $user_name ,time()*60);
//         setcookie('password' , $password ,time()*60);
//     }

// }
// print_r($_POST);
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
     $user_name=$_POST['name'];
     $password=$_POST['password'];
     $_SESSION['name']=$user_name;
     $_SESSION['password']=$password;
     $error=[];

     if(strlen($user_name) <3){
        $error[]="please enter name over than 3 char";

     }elseif(strlen($user_name) >12){
        $error[]="please enter name less than 12 char";

     }elseif(strlen($password) >12){
        $error[]="please enter password less than 12 ";

     };
    
     
     if($error){
        $_SESSION['errors']=$error;
        header("location:home.php");
        exit();
     }
      $_SESSION['name']=$user_name;
        header("location:welcome.php");
        exit();
     
 



}

?>