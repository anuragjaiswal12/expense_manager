<?php
    if(isset($_GET['id'])){
        include 'config.php';
        $sql="delete from tbl_expenses where expense_id=".$_GET['id']."";
        $res=mysqli_query($con,$sql);
        if($res){
            echo "<script>alert('Expense deleted successfully!!');
            location='manage_expense.php';
		    </script>";
        }
        else{
            echo "<script>alert('Error while deleting expense!Please try again after some time!!');
            location='manage_expense.php';
		    </script>";
        }
    }
?>