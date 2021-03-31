<?php
function cleanInput($data) {		
    $data = trim($data);		
    $data = stripslashes($data);		
    $data = htmlspecialchars($data);		
    return $data;	
}//cleanInput

function passwordLength($data) {
    $data = str_repeat("*", strlen($data));
    return $data;
}//password length output
?>