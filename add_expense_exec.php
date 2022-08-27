<?php
    if(isset($_POST['add'])){
        if(empty($_POST['expense'])){
            echo "<script>alert('Please fill Expense Amount!!');
            location='add_expense.php';
		    </script>";
        }
        elseif(empty($_POST['date'])){
            echo "<script>alert('Please fill Date!!');
            location='add_expense.php';
		    </script>";
        }
        else{
            include 'config.php';
            session_start();
            $sql="insert into tbl_expenses(user_id,expense,expense_date,expense_cate)values('".$_SESSION['id']."',".$_POST['expense'].",'".$_POST['date']."','".$_POST['cate']."')";
            $res=mysqli_query($con,$sql);
            if($res){
                echo "<script>alert('Expense added succussfully!!');
                location='add_expense.php';
                </script>"; 
            }
            else{
                echo "<script>alert('Error while adding expense! Please try after sometime!');
                location='add_expense.php';
                </script>";
            }
        }
    }
?>