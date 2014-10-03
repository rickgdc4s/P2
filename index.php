<?php
//phpinfo();

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file) 

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <title>XKCD Password Generator</title>

<?php require 'logic.php'; ?>

</head>

<body>

<h1>XKCD Password Generator</h1>

<form method='GET' action='index.php'>
    Enter Number of Words<br>
    <input type='text' name='numWords'><br>
    <input type='submit' value='Generate Password!'><br>
</form>

<pre>
    <?php print_r($_GET); ?>
</pre> 

<?php 

for($i=0;$i<$arrlength;$i++) {
    echo $words[$rand_keys[$i]] . "\n";
}


?>  

</body>
</html>

 