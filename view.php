<?php 
   require('config.php'); //veritabanı bağlantısı
?>
<html>
  <head>
   <style>
         .row{
           padding-left: 50;
           width: 500;
        }
       body{
        background-image:linear-gradient(to bottom left, orange, green);
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
      <div class="container">
         <div class="row">
               <div class="col-md-12">
                <h2>  View Task </h2>
               <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""> Task Title </label>
                        <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId" value=" <?php echo $select_title ; ?>" disabled>
                    </div>
                   <div class="form-group">
                     <label for=""> Task Description </label>
                     <textarea class="form-control" name="description" id="" rows="4" disabled> <?php echo $select_des; ?> </textarea>
                   </div>
                   <div class="form-group">
                     <label for=""> Deadline </label>
                     <input type="date" name="deadline" value="<?php echo $select_deadline;?>" disabled> 
                   </div>
                 </div>
                  <a name ="" id="" class="btn btn-secondary" href="index.php" role="button"> Back </a>
              </form>
                  </div>    
              </div>          
            </div>
</body>
</html>

