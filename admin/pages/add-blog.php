<?php 
//login template
   session_start();
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Blog </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<div class="containner">
		<?php include("nav-bar.php");?>
      <div class="container  justify-content-cr align-items-center"
      style="min-height: 100vh">
      <form id="frm" class="border shadow p-3 rounded" action="upload_blog.php" method="post" enctype="multipart/form-data" style="width: 100%;">
    <h1 class="text-center p-3">Add Blog</h1>
    <div id="error-message" class="alert alert-danger" style="display:none;"></div>
    
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title">
    </div>

    <div class="mb-3">
        <label for="short-description" class="form-label">Short description</label>
        <textarea class="form-control" name="description" id="short-description" rows="2" cols="12"></textarea>
    </div>

    <div class="mb-1">
        <label class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="image" id="uploadfile">
    </div>

    <button type="submit" class="btn btn-primary">SAVE</button>
</form>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function () {
    $('#frm').on('submit', function (e) {
        e.preventDefault(); 

        var fileInput = $('#uploadfile')[0];
        var file = fileInput.files[0]; 
        var validTypes = ['image/jpeg', 'image/png', 'image/jpg']; 

        if (file) {
           
            if ($.inArray(file.type, validTypes) === -1) {
                alert('Please upload a valid image (JPEG, PNG).');
                return; 
            }
        }

        var formData = new FormData(this); 

        $.ajax({
            url: 'upload_blog.php',
            type: 'POST',
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Blog added successfully!');
                    $('#frm')[0].reset(); 
                } else {
                    $('#error-message').text(data.message).show(); // Show error message if there's an issue
                }
            },
            error: function() {
                $('#error-message').text('There was an error with the request. Please try again.').show();
            }
        });
    });
});

</script>

      </div>
			  </div>
</body>
</html>
<?php }else{
	header("Location: redirect.php");
} ?>