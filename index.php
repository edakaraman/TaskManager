<?php 
   require('config.php'); //veritabanı bağlantısı
?>
<html>
  <head>
  	<style>
         h1{
       	 text-align: center;
         font-style: italic;
       }
         .row{
       	  padding-left: 50;
       }
       body{
          background-image: linear-gradient(to bottom right, purple,white);
        }
       
  	</style>
  	    <title> Task Monitoring </title>
  	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
    <body>
  	  <h1>  MY TASKS  </h1>
  	    <div class = "container">
  	  	  <div class="row">
  	  		<a name="" id="" class="btn btn-primary btn-sm" href="addtask.php" role="button"> Add Task </a>
  	  	  </div>
  	  	    <div class="row">
              <table class="table"> 
              	<thead>
              		<tr>
              			<th> Task No </th>
              			<th> Task Title </th>
              			<th> Deadline </th>
              			<th> Task Content </th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php
              		   $select_query = "SELECT * FROM taskinfo";
              		   $select_result = mysqli_query($conn,$select_query);
              		   $indIncre = 0;
              		   while($data = mysqli_fetch_array($select_result))
              		   {
              		   	  $indIncre++; //indexlerin arttırılması
              		 ?>
              		 <tr>
              			<td scope = "row"> <?php echo $indIncre; ?> </td>
              			<td> <?php echo $data['title']; ?> </td>
              			<td> <?php echo $data['deadline']; ?> </td>
              			<td>
                        <a name="" id="" class="btn btn-info btn-sm" href="view.php?id= <?php echo $data['id']; ?>" role="button">View
              			    <a name="" id="" class="btn btn-primary btn-sm" href="edit.php?id= <?php echo $data['id']; ?>" role="button"> Edit</a>
              				  <a name ="" id="" class="btn btn-danger btn-sm" href="delete.php?id= <?php echo $data['id']; ?>" role="button">Delete</a>
              			
              			</td>
              		</tr>
              		<?php
              	}	   
              ?> 		
             </tbody>
  	  	  </div>

</body>
</html>

