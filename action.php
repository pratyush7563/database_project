<html>
<?php
   //echo"hi1";
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'admin');
   define('DB_PASSWORD', 'admin123');
   define('DB_DATABASE', 'songs');
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $sid = mysqli_real_escape_string($db,$_GET['sno']);
   $query = "SELECT * FROM song_info WHERE id = $sid";
   $result = $db->query($query);
   $row = $result->fetch_assoc();
   //echo "hi2";
   if($_GET['tp']==1)
   	{ 
   	  //echo "hi";	
      $query = "UPDATE song_info SET total_plays = total_plays+1 WHERE id = $sid";
      $db->query($query);
      $url=$row['watch_link'];  
   	}
   else{
      $query = "UPDATE song_info SET total_downloads = total_downloads+1 WHERE id = $sid";
      $db->query($query);
      $url=$row['download_link'];
   	}	
   	mysqli_close($db);
?>
<script>window.location.href="<?php echo $url?>,_blank";</script>
</html>