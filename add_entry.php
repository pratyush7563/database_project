
<html>




<body>


<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
</style>







<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Please Fill In The Details Of Song</h3>
    <fieldset>
      <input placeholder="Song Name" name="sn" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Movie" name="mv" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Year Of Realease" name="yor" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Music Director" name="md" type="text" tabindex="2" required>
    </fieldset>    
    <fieldset>
      <input placeholder="Song Type" name="st" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Singer Type" name="singt" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Singers" name="sing" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Watch Link" name="wl" type="text" tabindex="2" required>
    </fieldset>                    
    <fieldset>
      <input placeholder="Download Link" name="dl" type="text" tabindex="2" required>
    </fieldset>               
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Submit</button>
    </fieldset>
  </form>
</div>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     session_start(); 
     include "con2.php";
     echo "hello";
    $sn = mysqli_real_escape_string($db,$_POST['sn']);
    $mv = mysqli_real_escape_string($db,$_POST['mv']); 
    $yor = mysqli_real_escape_string($db,$_POST['yor']);
    $md = mysqli_real_escape_string($db,$_POST['md']);     
    $st = mysqli_real_escape_string($db,$_POST['st']);
    $singt = mysqli_real_escape_string($db,$_POST['singt']);     
    $sing = mysqli_real_escape_string($db,$_POST['sing']);
    $wl = mysqli_real_escape_string($db,$_POST['wl']);     
    $wl = mysqli_real_escape_string($db,$_POST['dl']); 
    $query="INSERT INTO song_info (song_title,movie,year_of_release,music_director,song_type,singer_type,singers,watch_link,download_link,total_plays,total_downloads) VALUE('$sn','$mv',$yor,'$md','$st','$singt','$sing','$wl','$dl',0,0)";
    echo "allrighy";
    $db->query($query);
    echo "<script>window.location.href='welcome_admin.php';</script>";   
    exit(0);

    }
?>
</body>
</html>