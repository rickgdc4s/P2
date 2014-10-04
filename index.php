<?php
//phpinfo();

error_reporting(0);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 0); # Display errors on page (instead of a log file) 

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <title>XKCD Password Generator</title>

<?php require 'logic.php'; ?>

</head>

<body>

<!-- CSCIE-15 Dynamic Web Applications. Fall, 2014
       Project P2 - The XKCD Password Generator -->

<h1>Rick's Fabulous (Well, almost fabulous) XKCD Password Generator</h1>


<h3>The XKCD Password is a password based on combining common but unrelated words, rather than <br>
combining letters, symbols, and numbers in often times hard to remember formats. Since an  <br>
XKCD generated password consists of common words, it is easier to remember than the most <br>
common techniques of creating secure, "strong" passwords, and might even be more secure, <br>
because it can have more "entropy" than other common paswword schemes.</h3>

<!-- To display the XKCD Password generated in logic.php, via PHP, loop thru the password array, echoing out each entry -->

<p><b>Your Generated XKCD Password is :</b> <?php if (isset($arrlength)) { for($x=0;$x<($arrlength*2);$x++) { echo ($password[$x]);}} ?></p>

<br>

<form method='GET' action='index.php'>
    Enter the Number of Words (Min 1, Max 20)
    <input type='text' id='numwords' name='numWords' maxlength='10'/><br /><br />

    Include numbers in the password ?
    <input type='checkbox' name='passNumber' value='checkbox'/><br /><br />

    Include a special symbol at the end of the password ?
    <input type='checkbox' name='passSymbol' value='checkbox'/><br /><br />

    <input type='submit' value='Generate Password!'><br>
</form>


</body>
</html>

 