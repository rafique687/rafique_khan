<?php
include "../db_conn.php";

    if(isset($_POST['id']))
    {
        $qry="DELETE FROM comment WHERE id=".$_POST['id'];
        $fire=mysqli_query($conn,$qry);
        if($fire)
        {
            echo json_encode(['status' => 'success', 'message' => 'Comment Delete successfully!']);
        }
        else
        {
            echo json_encode(['status' => 'error', 'message' => 'Proble to delete Comment.']);
        }
    }
    ?>