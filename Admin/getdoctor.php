<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nieznany dokument</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT distinct DID FROM doctor_availability WHERE CID = '" . $_POST["cid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Wybierz Doktora</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="Select distinct Name from doctor where DID=".$rs["DID"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["DID"]; ?>"><?php echo $rs["DID"].":".$rs1["Name"]; ?></option>
<?php
		}
}
?>
</body>
</html>