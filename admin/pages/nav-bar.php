	<!------------------nav bar------------------------------>
		<nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
  <!-- <a class="navbar-brand" href="#"> <?=$_SESSION['role']?></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>	

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
	  <a class="nav-link active" href="add-blog.php">Add Blog</a>
      </li>
      <li class="nav-item active">
	  <a class="nav-link " href="view-blog.php">View Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">User</a>
		
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="view_comment.php">Comments</a>
      </li>
    </ul>
	
  </div>
  <ul>
  <ul class="navbar-nav">
  <li class="nav-item active">
        <a class="navbar-brand" href="#"><?=$_SESSION['role']?></span></a>
      </li>
  <li class="nav-item">
  <!-- <a class="nav-link" href="#" style="width:50px !imortant"s><?=$_SESSION['name']?></span></a> -->
   </li>
   <li class="nav-item">
  <a href="../logout.php" class="nav-link btn-dark float-right" style="color:#fff">Logout</a>
   </li>
   </ul>
  
</nav>
		<!-----------------end nav bar---------------------------->
	
   </div>