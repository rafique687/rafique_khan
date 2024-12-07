<?php 
   session_start();
   include "../db_conn.php";
   
    ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
	<title>Add Blog </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
		<?php 
        
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    
        
        include("nav-bar.php");
             
    $sql = "SELECT * FROM blog"; 
    $result=mysqli_query($conn, $sql);
?>
<body>
    <div class="container">
        <h2>Blog Records</h2>
        <table id="blogTable" class="display">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Publish Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $i=1;
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['short_description'] . "</td>
                                <td>" . $row['publish_date'] . "</td>
                                <td>  <a href='edit.php?id=".$row['id']."'>Edit</a> 
                                        <a href='javascript:void(0);' class='del' key=".$row['id'].">Delete</a></td>
                              </tr>";
                              $i++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close(); 
?>
 <!-------------------------------------------------------------------------------------------------->
</div>
    

  <script type="text/javascript">
        $(document).ready( function () {
            $('#blogTable').DataTable();
        });
    </script>
</body>
</html>
<?php }else{
	header("Location: redirect.php");
} ?>



<script>
	$(document).ready(function () {
    $('.del').on('click', function (e) {
        e.preventDefault(); 
      var id=$(this).attr('key');
      

        $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: {'id':id},
            success: function(response) { console.log(response);
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Blog Deleted successfully!');
                    window.location.href = "view-blog.php";
                    
                } else {
                    $('#error-message').text(data.message).show();
                }
            },
            error: function() {
                $('#error-message').text('There was an error with the request. Please try again.').show();
            }
        });
    });



});

</script>