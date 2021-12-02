<?php

$link = mysqli_connect("localhost", "root", "", "feedback"); //root as default username 

// Check connection
if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);



// Attempt insert query execution
$sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
if (mysqli_query($link, $sql)) {
  echo "<script>
    alert('Thank You For Contacting us');
                 
    window.location.href='index.html';
    </script>";
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
