<html>

<style>
	
.h2 {
  color: #FFFAFA;
}

.mylist {
  list-style-type: none;

  color: #FFFAFA;
}
.parent
{


  overflow: hidden;
  width: 800px;
}

.child
{


  float: left;
  width: 700px;
  height: 200px;
}
.mylist1
{
	margin-top: 30px;
	  list-style-type: none;
}
.tags
{


	  background-color: DodgerBlue; /* Blue background */
  border: 2px; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  border-radius: 0 5px 5px 0;  
  font-size: 16px; /* Set a font size */
  cursor: pointer;
}
button {
    color: #444444;
    background: #F3F3F3;
    border: 1px #DADADA solid;
    padding: 5px 10px;
    border-radius: 2px;
    font-weight: bold;
    font-size: 9pt;
    outline: none;
}

button:hover {
    border: 1px #C6C6C6 solid;
    box-shadow: 1px 1px 1px #EAEAEA;
    color: #333333;
    background: #F7F7F7;
}

button:active {
    box-shadow: inset 1px 1px 1px #DFDFDF;   
}
</style>
<div class="parent">
<div class="child">	
<h2 class="h2">Song Details</h2>

<ul class="mylist">
<?php
session_start();
include "con1.php";
$sid = mysqli_real_escape_string($db,$_GET['sno']);
$query = "SELECT * FROM song_info WHERE id = $sid";
$result = $db->query($query);
$sno=$_GET['sno'];
while ($row = $result->fetch_assoc()) { 
	$sname=$row['song_title'];
	$mov=$row['movie'];	
	$year=$row['year_of_release'];
	$singers=$row['singers'];
	$wlink=$row['watch_link'];
	$dlink=$row['download_link'];
	$mcom=$row['music_director'];			
}	

   echo 
  '
  <li>Song Name:   '.$sname.'</li>
  <li>Movie:   '.$mov.'</li>
  <li>Year Of Release:   '.$year.'</li>
  <li>Singers:   '.$singers.'</li>
  <li>Music Director:   '.$mcom.'</li>        
  '
?>
</ul>
</div>
<div class="child">
	<h2></h2>
	<?php
	    echo
	    '
          <li class="mylist"> <a class="tags" href="action.php?sno='.$sno.'&tp=1"  target="_blank">WATCH</a></li>
          <li class="mylist1"><a class="tags" href="action.php?sno='.$sno.'&tp=2  target="_blank"">DOWNLOAD</a></li>
        '  
      ?>  
</div>	
</div>
</html>