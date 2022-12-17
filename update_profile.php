<?php
    if(isset($_POST['update_profile'])){
        if(empty($_POST['firstName'])){
            echo "<script>alert('Please fill First Name!!');
            location='profile.php';
		    </script>";
        }
        elseif(empty($_POST['lastName'])){
            echo "<script>alert('Please fill Last Name!!');
            location='profile.php';
		    </script>";
        }
        elseif(!empty($_FILES['file'])){
            $filename=$_FILES['file']['name'];
            $tmp=$_FILES['file']['tmp_name'];
            $ext=pathinfo($filename,PATHINFO_EXTENSION);
            $allowed=array('png','jpg','jpeg');
            if(!in_array($ext,$allowed)){
                echo "<script>alert('Please upload valid file!!');
                location='profile.php';
                </script>";
            }
            else{
                $folder="./upload/".$filename;
                include 'config.php';
                session_start();
                $sql="update tbl_user set first_name='".$_POST['firstName']."',last_name='".$_POST['lastName']."',pic_path='".$folder."' where email='".$_SESSION['id']."'";
                $result=mysqli_query($con,$sql);
                if($result && move_uploaded_file($tmp,$folder)){
                    echo "<script>alert('Profile updated successfully!!');
                    location='profile.php';
                    </script>";
                }
                else{
                    echo "<script>alert('Error while updateing profile!Please try again after sometime!!');
                    location='profile.php';
                    </script>";
                }
            }
        }
        else{
            include 'config.php'; 
            session_start();
            $sql="update tbl_user set first_name='".$_POST['firstName']."',last_name='".$_POST['lastName']."' where email='".$_SESSION['id']."'";
            $result=mysqli_query($con,$sql);
            if($result){
                echo "<script>alert('Profile updated successfully!!');
                location='profile.php';
                </script>";
            }
            else{
                echo "<script>alert('Error while updateing profile!Please try again after sometime!!');
                location='profile.php';
                </script>";
            }
        }
    }
?>
