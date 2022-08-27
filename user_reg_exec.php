<?php
    if(isset($_POST['signup'])){
        if(empty($_POST['firstName'])){
            echo "<script>alert('Please fill first name!!');
            location='user_reg.php';
		    </script>";
        }
        elseif(empty($_POST['lastName'])){
            echo "<script>alert('Please fill last name!!');
            location='user_reg.php';
		    </script>";
        }
        elseif(empty($_POST['email'])){
            echo "<script>alert('Please fill E-mail!!');
            location='user_reg.php';
		    </script>";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Please fill valid E-mail!!');
            location='user_reg.php';
		    </script>";
        }
        elseif(empty($_POST['pwd'])){
            echo "<script>alert('Please fill password!!');
            location='user_reg.php';
		    </script>";
        }
        elseif(empty($_POST['c_pwd'])){
            echo "<script>alert('Please fill confirm password!!');
            location='user_reg.php';
		    </script>";
        }
        elseif($_POST['pwd']!=$_POST['c_pwd']){
            echo "<script>alert('Password and Confirm password should be same!!');
            location='user_reg.php';
            </script>";
        }
        else{
            include 'config.php';
            $val_email="select * from tbl_user where email='".$_POST['email']."'";
            $result=mysqli_query($con,$val_email);
            if(mysqli_num_rows($result)>0){
                echo "<script>alert('E-Mail already taken!!');
                location='user_reg.php';
                </script>";
            }
            else{
                $sql="insert into tbl_user (first_name,last_name,email,pwd) values('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['email']."','".$_POST['pwd']."')";
                $res=mysqli_query($con,$sql);
                if($res){
                    echo "<script>alert('Registred Successfully!!');
                    location='user_login.php';
                    </script>";
                }
                else{
                    echo "<script>alert('Some error occured please try again after some time!!');
                    location='user_reg.php';
                    </script>";
                }
            }
        }
    }
    else{
        echo "<script>location='user_reg.php'</script>";
    }
?>