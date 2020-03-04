<html>
<style> 







@import url(https://fonts.googleapis.com/css?family=Open+Sans);
.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 40px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #800000;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 80px;
  height: 40px;
  border: 1px solid #00B4CC;
  background: #25c481;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  margin-top: 30px;
  width: 30%;
  top: 50%;
  left: 50%;
}
  .btn0000 {
  background-color: DodgerBlue; /* Blue background */
  border: 2px; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  border-radius: 0 5px 5px 0;  
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}



table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
  margin: 50px;
}

/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}

</style>
<script>
	$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

<body>
   <div>
    <a  class="btn0000" onclick="window.open('../index.html','_self')"> Logout</a>
   </div>  
	<form method="post">
	<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" name="search" placeholder="Search By Song Name Or Movie Name">
      <button type="submit" class="searchButton">Search
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>
  <!--for demo wrap-->
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Song</th>
          <th>Movie</th>
          <th>Type</th>
          <th>Total Plays</th>
          <th>Total Downloads</th>         
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

    <?php
    session_start();
    //$_SESSION['song_number']='1';
    include "con1.php";
    if(! empty($_POST['search']) )
    {

        $search = mysqli_real_escape_string($db,$_POST['search']);
        
    $query = "SELECT * FROM song_info WHERE locate(LOWER('$search'),song_title)>0 OR locate(LOWER('$search'),movie)>0";
    //echo "trr";
    $result = $db->query($query);
    	//echo "if";
    while ($row = $result->fetch_assoc()) {   
        $field1name = $row["song_title"];
        $field2name = $row["movie"];
        $field3name = $row["song_type"];
        $field4name = $row["total_plays"];
        $field5name = $row["total_downloads"];    
        $sno=$row["id"];
        echo
        '<tr>
            <td><a href="song_play.php?sno='.$sno.'" target="if" >'.$field1name.'</a></td> 
            <td>'.$field2name.'</td> 
            <td>'.$field3name.'</td> 
            <td>'.$field4name.'</td> 
            <td>'.$field5name.'</td> 
        </tr>';      


    }
    }
    else
    {	
    $query = "SELECT * FROM song_info";
    //echo "trr";
    $result = $db->query($query);
    	//echo "if";
    while ($row = $result->fetch_assoc()) {   
        $field1name = $row["song_title"];
        $field2name = $row["movie"];
        $field3name = $row["song_type"];
        $field4name = $row["total_plays"];
        $field5name = $row["total_downloads"]; 
        $sno=$row["id"];   
       // echo $field1name;	
        echo
        '<tr>
            <td><a href="song_play.php?sno='.$sno.'" target="if"  >'.$field1name.'</a></td> 
            <td>'.$field2name.'</td> 
            <td>'.$field3name.'</td> 
            <td>'.$field4name.'</td> 
            <td>'.$field5name.'</td> 
        </tr>';
     } 
     }  
     ?>
      </tbody>
    </table>
  </div>
<div style="margin-top: 50px;">  
<iframe name="if" width=1500px height=500px frameborder="0"></iframe>  
</div>
</body>
</html>
