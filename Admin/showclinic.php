<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
table{
    width: 75%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}

th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>

</head>
<body background= "../images/mgrchange.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN</font></li>
<br>
<h2>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Doktor</a>
    <div class="dropdown-content">
      <a href="adddoctor.php">Dodaj Doktora</a>
      <a href="deletedoctor.php">Usuń Doktora</a>
      <a href="showdoctor.php">Pokaż Doktorów</a>
	  <a href="showdoctorschedule.php">Pokaż grafik Doktorów</a>
    </div>
  </li>
  
  <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Klinika</a>
    <div class="dropdown-content">
      <a href="addclinic.php">Dodaj Klinikę</a>
      <a href="deleteclinic.php">Usuń Klinikę</a>
      <a href="adddoctorclinic.php">Przypisz Doktora do Kliniki</a>
	  <a href="addmanagerclinic.php">Przypisz Recepcjonistę do Kliniki</a>
	  <a href="deletedoctorclinic.php">Usuń Doktora z Kliniki</a>
	  <a href="deletemanagerclinic.php">Usuń Recepcjonistę z Kliniki</a>
	  <a href="showclinic.php">Pokaż Kliniki</a>
    </div>
  </li>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Recepcjonista</a>
    <div class="dropdown-content">
      <a href="addmanager.php">Dodaj Recepcjonistę</a>
      <a href="deletemanager.php">Usuń recepcjonistę</a>
	  <a href="showmanager.php">Pokaż Recepcjonistę</a>
    </div>
  </li>
  
    <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Wyloguj</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>POKAŻ KLINIKI</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
$con = mysqli_connect('localhost','root','','klinika');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM clinic order by City,Town,CID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>WSZYSTKIE KLINIKI W BAZIE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CID</th>
<th>Nazwa</th>
<th>Adres</th>
<th>Region</th>
<th>Miasto</th>
<th>Kontakt</th>
<th>MID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['town'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['contact'] . "</td>";
	echo "<td>" . $row['mid'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>