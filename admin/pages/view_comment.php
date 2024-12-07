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
             
    $sql = "SELECT cmt.comment,cmt.id,cmt.comment_on,cmt.status,usr.name,blg.title FROM comment as cmt 
    INNER JOIN users as usr ON cmt.commet_by=usr.id
    INNER JOIN blog as blg ON blg.id=cmt.blogid"; 
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
                    <th>Comment</th>
                    <th>User</th>
                    <th>Date</th>
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
                                <td>" . $row['comment'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['comment_on'] . "</td>";  ?>
                                <td>  <a href='edit.php?id="<?php echo $row['id'];?>"'>Edit</a> 
                                <select name='status' data-key="<?php echo $row['id'];?>" class='comment_status'>
                                        <option disale>Change Status</option>
                                        <option <?php if($row['status']==1){ echo 'selected'; }?> value='1'>Active</option>
                                        <option <?php if($row['status']==0){ echo 'selected'; } ?> value='0'>De-active</option>
                                </select>
                                <?php 
                                        echo "<a href='javascript:void(0);' class='del' key=".$row['id'].">Delete</a></td>
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
            url: 'delete_comment.php',
            type: 'POST',
            data: {'id':id},
            success: function(response) { console.log(response);
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Comment Deleted successfully!');
                    window.location.href = "view_scomment.php";
                    
                } else {
                    $('#error-message').text(data.message).show();
                }
            },
            error: function() {
                $('#error-message').text('There was an error with the request. Please try again.').show();
            }
        });
    });


    $('.comment_status').on('change', function (e) { 
        e.preventDefault(); 
      var id=$(this).attr('data-key');
      var sts=$(this).val();
      

        $.ajax({
            url: 'change_status.php',
            type: 'POST',
            data: {'id':id,'status':sts},
            success: function(response) { console.log(response);
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Comment Status changed!');
                    window.location.href = "view_comment.php";
                    
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