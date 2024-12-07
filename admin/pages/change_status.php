<?php
include "../db_conn.php";

    if(isset($_POST['status']))
    {
        $qry="update comment set status='".$_POST['status']."'WHERE id=".$_POST['id'];
        $fire=mysqli_query($conn,$qry);
        if($fire)
        {
            echo json_encode(['status' => 'success', 'message' => 'Comment status changed successfully!']);
        }
        else
        {
            echo json_encode(['status' => 'error', 'message' => 'Proble to change statuss Comment.']);
        }
    }
    ?>