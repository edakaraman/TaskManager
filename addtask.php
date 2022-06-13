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
        background-image:linear-gradient(to bottom left,gray, Aquamarine);
       }
       h2{
        text-align: center;
       }
  	</style>
  	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
   <body>
    <?php
          if(isset($_POST['submit'])) //submit butonuna tıklanırsa
      {
          $title = $_POST['title'];
          $description = $_POST['description'];
          $deadline = $_POST['deadline'];

             if($title != "" && $description != "" && $deadline !="") //bütün bilgiler doldurulursa
          {
             $insert_query = "INSERT INTO taskinfo(title,description,deadline) VALUES('$title','$description','$deadline')";

            $insert_result = mysqli_query($conn,$insert_query);

              if($insert_result){
              echo header("Location:index.php?msg=csuccess");
           }
              else{
              echo "Task could not be added";
           }
         }
           else //eksik bilgi girilmesi durumunda
         {
           $message = "Missing information!";
           echo "<script type='text/javascript'>alert('$message');</script>"; //uyarı mesajı verir
         }
      }

    ?>
      <div class="container">
        <a name ="" id="" class="btn btn-secondary" href="index.php" role="button"> Back </a>
  	  	   <div class="row">
  	  	   	   <div class="col-md-12">
                <h2>  Add Task </h2>
  	  	   	   <form action="#" method="POST" enctype="multipart/form-data">
  	  	   	   	  <div class="form-group">
  	  	   	   	 	   <label for=""> Task Title </label>
  	  	   	   	 	   <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
  	  	   	   	  </div>
                   <div class="form-group">
                     <label for=""> Task Description </label>
                     <textarea class="form-control" name="description" id="" rows="4"></textarea>
                   </div>
                   <div class="form-group">
                     <label for=""> Deadline </label>
                     <input type="date" name="deadline"value="">
                   </div>
                </div>
                 <button type="submit" name="submit" class="btn btn-primary btn-sm">
                  Submit </button>  
  	  	   	  </form>
  	  	   	</div> 	 
          </div>  	 		
  	  	</div>	 
  </body>
</html>

