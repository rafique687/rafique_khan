<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../db_conn.php";
    
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) 
    {  
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $uploadDir = '../../blogimage/';

        
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            if (in_array($fileType, $allowedTypes)) {
            $uploadFilePath = $uploadDir . basename($fileName);

           
            if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                $title=$_POST['title'];
                $short_description=$_POST['description'];
                $image = $_FILES['image']['name'];
            }
            else {
                
                echo json_encode(['status' => 'error', 'message' => 'Invalid file Type.']);exit;
            }
        }
    }
     else
        {
                $title=$_POST['title'];
                $short_description=$_POST['description'];
                $image = $_POST['old_image'];
         }

         $sql="UPDATE blog SET title= '$title',short_description='$short_description',image='$image' WHERE id=".$_POST['id'];
       
        if (mysqli_query($conn, $sql)) 
        {
            echo json_encode(['status' => 'success', 'message' => 'Blog Update successfully!']);
        }
        else
        {
        echo json_encode(['status' => 'success', 'message' => 'Propblem to upload blog!']); 
        }
        } 
       
        
    

?>
