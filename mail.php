<html>
<head>
	<title>uiuxdesignschool</title>
</head>
<body>
<?php

	try {
 
  $name = $_REQUEST['cname'];
  $visitor_email = $_REQUEST['cemail'];
  $mobile = $_REQUEST['cnumber'];
  $conn = new PDO("mysql:host=localhost:3306;dbname=elightac_uiuxleads","elightac_uiux","uiuxds@2023");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO uiux(name,email,phone) VALUES ('$name','$visitor_email','$mobile')";
  $conn->exec($sql);
//   header('Content-disposition: attachment; filename=UIUX BROCHURE-2.pdf');
//   header('Content-type: application/pdf');
//   readfile('UIUX BROCHURE-2.pdf');
  
 
    }
 
 catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>
<script>
    window.location.href="https://uiuxdesignschool.in";
</script>
</body>
</html>