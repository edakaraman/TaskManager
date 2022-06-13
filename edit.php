<?php 
   require('config.php'); //veritabanı bağlantısı
?>
<html>
  <head>
  	<style>
         h1{
       	 text-align: center;
       }
         .row{
       	  padding-left: 50;
          width: 500;
       }
       body{
        background-image:linear-gradient(to bottom left, red, yellow);
       }
       h2{
        text-align: center;
       }

  	</style>
  	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
    <body>
      <?php
           if(isset($_GET['id']))
         {
            $id = $_GET['id'];
            $select_query="SELECT * FROM taskinfo where id = $id";
            $select_result = mysqli_query($conn,$select_query);
            $select_row = $select_result->fetch_assoc();
            $select_title = $select_row['title'];
            $select_des = $select_row['description'];
            $select_deadline=$select_row['deadline'];
          }
      ?>

    <?php
          if(isset($_POST['submit']))
      {
          $title = $_POST['title'];
          $description = $_POST['description'];
          $deadline = $_POST['deadline'];

             if($title != "" && $description != "" && $deadline !="")
          {
             $edit_query = "UPDATE taskinfo SET title='$title',description='$description',deadline = '$deadline' WHERE id = $id"; //veritabanındaki bilgiler güncellenir

            $edit_result = mysqli_query($conn,$edit_query);

              if($edit_result)
           {
              $message2 = "INFORMATION UPDATED.";
              echo "<script type='text/javascript'>alert('$message2');</script>"; //uyarı mesajı verir
           }
              else
           {
              echo "Task could not be edited";
           }
         }
           else
         {
           echo "YOU ENTERED MISSING INFORMATION!";
         }
      }

    ?>
      <div class="container">
  	  	   <div class="row">
  	  	   	   <div class="col-md-12">
                <h2>  Edit Task </h2>
  	  	   	   <form action="#" method="POST" enctype="multipart/form-data">
  	  	   	   	  <div class="form-group">
  	  	   	   	 	   <label for=""> Task Title </label>
  	  	   	   	 	   <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId" value=" <?php echo $select_title ; ?>">
  	  	   	   	  </div>

                   <div class="form-group">
                     <label for=""> Task Description </label>
                     <textarea class="form-control" name="description" id="" rows="4" > <?php echo $select_des; ?> </textarea>
                   </div>
                   <div class="form-group">
                     <label for=""> Deadline </label>
                     <input type="date" name="deadline" value="<?php echo $select_deadline;?>" > 
                   </div>

                 </div>
                 <button type="submit" name="submit" class="btn btn-primary btn-sm">
                  Submit </button>
                  <a name ="" id="" class="btn btn-secondary" href="index.php" role="button"> Back </a>
  	  	   	  </form>
  	  	   	   	</div> 	 
              </div>  	 		
  	  	   	</div>
  	  	 
</body>
</html>

