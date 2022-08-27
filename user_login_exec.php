<?php
    if(isset($_POST['login'])){
        if(empty($_POST['email'])){
            echo "<script>alert('Please fill E-mail!!');
            location='user_login.php';
		    </script>";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Please fill valid E-mail!!');
            location='user_login.php';
		    </script>";
        }
        elseif(empty($_POST['pwd'])){
            echo "<script>alert('Please fill password!!');
            location='user_login.php';
		    </script>";
        }
        else{
            include('config.php');
            $sql="select * from tbl_user where email='".$_POST['email']."'";
            $result=mysqli_query($con,$sql);
            $fetched_data=mysqli_fetch_array($result);
            if($_POST['email']==$fetched_data['email'] && stripslashes($_POST['pwd'])==$fetched_data['pwd']){
                session_start();
                $_SESSION['id']=$_POST['email'];
                header('Location:index.php');
            }
            else{
                echo "<script>alert('Please enter valid email password!!');
                location='user_login.php';
		        </script>";
            }
        }
    }
    else{
        echo "<script>location='user_login.php'</script>";
    }
?>