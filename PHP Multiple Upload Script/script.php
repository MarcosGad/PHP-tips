<?PHP 

if($_SERVER['REQUEST_METHOD'] == 'POST'):

 $image = $_FILES['my_work']; 

 echo '<pre>';
 print_r($image); 
 echo "</pre>";

 $image_name = $_FILES['my_work']['name']; 
 $image_type = $_FILES['my_work']['type'];
 $image_temp = $_FILES['my_work']['tmp_name'];
 $image_size = $_FILES['my_work']['size'];
 
 echo 'Image Name:' . $image_name . '<br>';
 echo 'Image type:' . $image_type . '<br>';
 echo 'Image temp:' . $image_temp . '<br>';
 echo 'Image size:' . $image_size . '<br>';


 move_uploaded_file($image_temp, 'C:\xampp\htdocs\PHP Multiple Upload Script/up/' . $image_name); 

endif; 


?>



<form class="" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="my_work" value=""><br><br>
	<input type="submit" name="" value="Upload">
</form>