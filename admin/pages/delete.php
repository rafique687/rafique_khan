<?php
include "../db_conn.php";

    if(isset($_POST['id']))
    {
        $qry="DELETE FROM blog WHERE id=".$_POST['id'];
        $fire=mysqli_query($conn,$qry);
        if($fire)
        {
            echo json_encode(['status' => 'success', 'message' => 'Blog Delete successfully!']);
        }
        else
        {
            echo json_encode(['status' => 'error', 'message' => 'Proble to delete blog.']);
        }
    }
    ?>