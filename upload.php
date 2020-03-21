

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8"/> 
   <title>Upload file</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
      body {
            background color: white;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            font-family: Arial, Helvetica, sans-serif;
            width:800px;
            margin:auto;
        }
        li{
            margin-bottom:50px;
        }
   </style>
    <style type="text/css">
        body{ font-family:Arial, Helvetica, sans-serif }
        .form-class{
            margin-top:20px;
            font-size:16px;
        }
        .upload-btn{
            margin-top:20px;
            margin-bottom:20px;
            font-weight: bold;
        }
        .input-btn{
            margin-top:30px;
        }
        #dlt-btn{
            background: red;
            border: 1px solid red;
            border-radius: 5px;
            color: white;
            height: 30px;
            width: 80px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
        <a href="welcome.php" class="btn btn-danger">Back </a>
    
</body> 
<body><center>
<h1 style="color:black;font-weight:bold">Upload Your File</h1>
 <?php
 $dbh=new PDO("mysql:host=localhost;dbname=registration","root","");
 if(isset($_POST['btn'])){
 	  $name=$_FILES['myfile']['name'];
 	  $type=$_FILES['myfile']['type'];
 	  $data=file_get_contents($_FILES['myfile']['tmp_name']);
 	  $stmt=$dbh->prepare("insert into uploads values('',?,?,?)");
 	  $stmt->bindParam(1,$name);
 	  $stmt->bindParam(2,$type);
 	  $stmt->bindParam(3,$data);
 	  $stmt->execute();
    }
 ?>
 
 <form method="post" enctype="multipart/form-data" class="form-class">
    <span>
      <input type="file" name="myfile" class="input-btn"/>
      <button type="submit" name="btn" class="btn btn-primary upload-btn">Upload</button>
      </span>
 </form>
 
    <p></p>
    <ol>
    <?php
    $stat= $dbh->prepare("select * from uploads");
    $stat-> execute();
    while($row=$stat->fetch()){
        echo "<li><a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."<a href=delete.php?id=".$row['id']."> <br/>
        <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='700'/>    
        
        <button id=dlt-btn >Delete It</button></a></li>";
       /* echo "<li><a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a><br/>
        <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='200'/></li>";*/
    }   
    ?>

    </ol>
 </center> 
 </body>
 </html>