<?php
    if(isset($_POST['update'])){
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
            $sql="update tbl_expenses set expense=".$_POST['expense'].",expense_date='".$_POST['date']."',expense_cate='".$_POST['cate']."' where expense_id=".$_POST['e_id']."";
            $res=mysqli_query($con,$sql);
            if($res){
                echo "<script>alert('Expense Updated succussfully!!');
                location='manage_expense.php';
                </script>"; 
            }
            else{
                echo "<script>alert('Error while updating expense! Please try after sometime!');
                location='manage_expense.php';
                </script>";
            }
        }
    }
?>