<?php

//Andmebaasipäring uudiskirjaga liitumiseks

include("../partials/connect.php");

$email = $_POST['email'];

$query = "INSERT INTO newsletter (email) VALUES ('$email')";

$result = mysqli_query($connect, $query);

/*
SAVING NAME AND EMAIL TO A TXT FILE
Create a myemails.txt file and put it in the same directory.
    */

$pfileName  = "emailid.txt";
$MyFile     = fopen($pfileName, "a");
$nline = $email . "\r\n";
// USE THIS TO SAVE ONLY THE EMAIL: $nline=$email."\r\n";
fwrite($MyFile, $nline);
fclose($MyFile);
echo "<script>
    
    alert('Liitusite uudiskirjaga!');

    window.location.href='../index.php';
    
    </script>";
die;
?>



?>