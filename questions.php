<?php
session_start();
// Uncomment the 2 lines below to see errors on the page.
error_reporting(E_ALL);
ini_set("display_errors","On");

require_once "questions.class.php";

$_SESSION['questions'] =  questions::get_questions();

?>
<html>
<head>
	<title>Questions</title>
</head>
<body>

</body>
</html>


