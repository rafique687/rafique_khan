<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../db_conn.php";
    // Handle form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
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
                $sql = "INSERT INTO blog (title, short_description, image) VALUES ('$title', '$short_description', '$image')";
                if (mysqli_query($conn, $sql)) {
                echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully!']);
                }
                else
                {
                    echo json_encode(['status' => 'success', 'message' => 'Propblem to upload blog!']); 
                }
            } else {
                
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload the file.']);
            }
        } else {
           
            echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Please upload a JPEG or PNG image.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded or error uploading the file.']);
    }
}
?>
