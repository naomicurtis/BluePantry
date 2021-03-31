<?php

require_once ('../app_config.php');
require_once (APP_ROOT.APP_FOLDER_NAME . '/scripts/echoHTML.php');
require_once (APP_ROOT.APP_FOLDER_NAME . '/scripts/errorDisplay.php');
require_once (APP_ROOT.APP_FOLDER_NAME . '/scripts/utilities.php');

$myJSFile = APP_FOLDER_NAME . '/clientScripts/customerRegistration.js';
$myCSSFile = APP_FOLDER_NAME . '/styles/customerRegistration.css';

if (isset($_POST['Cust_TUID']))
    $Cust_TUID = cleanInput($_POST['Cust_TUID']);
if (isset($_POST['password1']))
    $password1 = cleanInput($_POST['password1']);
if (isset($_POST['password2']))
    $password2 = cleanInput($_POST['password2']);
if (isset($_POST['Cust_Residency']))
    $Cust_Residency = cleanInput($_POST['Cust_Residency']);
if (isset($_POST['Cust_academic_year']))
    $Cust_acadmeic_year = cleanInput($_POST['Cust_academic_year']);
//cleanInput function

if ($Cust_TUID == ""){
    echoError("Enter an your TU ID", $myJSFile, $myCSSFile);
    exit();
}
if (!filter_var($Cust_TUID, FILTER_VALIDATE_Cust_TUID)) {
    echoError("Invalid TU ID", $myJSFile, $myCSSFile);
    exit();
}
if (!preg_match('/^[0-9]{7,}$/', $Cust_TUID)) {
    echoError("Please enter a valid TU ID", $myJSFile, $myCSSFile);
    exit();
}
//validating customer's TU ID

if ($password1 == ""){
    echoError("Enter password", $myJSFile, $myCSSFile);
    exit();
    }
if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password1)) {
    echoError("Please enter a valid password", $myJSFile, $myCSSFile);
    exit();
}
if ($password2 == ""){
    echoError("Re-enter the password", $myJSFile, $myCSSFile);
    exit();
    }
if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password2)) {
    echoError("Please enter a valid password", $myJSFile, $myCSSFile);
    exit();
}
if (strcmp($password1, $password2) !== 0) {
    echoError("Passwords must be matching", $myJSFile, $myCSSFile);
    exit();
}
//validating passwords, might be unnecessary

if ($Cust_Residency == ""){
    echoError("Enter your Residency Status", $myJSFile, $myCSSFile);
    exit();
    }
if ($Cust_Residency !== "Off-Campus" && $Cust_Residency !== "Dorm" && $Cust_Residency !== "Apartment" && $Cust_Residency !== "Greek Housing"){
    echoError("Please enter a valid Residency Status.", $myJSFile, $myCSSFile);
    exit();
    }

//validating customer's residency status

if ($Cust_acadmeic_year == ""){
    echoError("Enter your academic year", $myJSFile, $myCSSFile);
    exit();
    }
if ($Cust_acadmeic_year !== "Freshman" && $Cust_acadmeic_year !== "Sophomore" && $Cust_acadmeic_year !== "Junior" && $Cust_acadmeic_year !== "Senior"
    && $Cust_acadmeic_year !== "Graduate Student" && $Cust_acadmeic_year !== "TU Employee"){
    echoError("Please enter a valid academic year", $myJSFile, $myCSSFile);
    exit();
    }
    //validating customer's academic year

$Cust_TUID_escaped = htmlspecialchars($Cust_TUID);
$password1_escaped = htmlspecialchars($password1);
$password2_escaped = htmlspecialchars($password2);
$Cust_Residency_escaped = htmlspecialchars($Cust_Residency);
$Cust_academic_year_escaped = htmlspecialchars($Cust_acadmeic_year);
//validations

$password1Length = passwordLength($password1);
$password2Length = passwordLength($password2);
//Changes passwords to stars for security

$encryptedPasswd = md5($password1_escaped);

require_once (APP_ROOT . APP_FOLDER_NAME . '/scripts/DbConnection.php');

$myDataBase = new Database(DSN1, USER1, PASSWD1, $myJSFile, $myCSSFile);
$myDB = $myDataBase -> getDB();
$insertStmt = "INSERT into customers_main (Cust_TUID,password,Cust_Residency,Cust_acaemic_year) VALUES (:tuid,:cp,:cr,:ca)";
try {
    $stmt = $myDB -> prepare($insertStmt);
    $stmt -> bindValue(':tuid', $Cust_TUID_escaped);
    $stmt -> bindValue(':cp', $encryptedPasswd);
    $stmt -> bindValue(':cr', $Cust_Residency_escaped);
    $stmt -> bindValue(':ca', $Cust_academic_year_escaped);
    $stmt -> execute();
    $stmt -> closeCursor();
} catch (Exception $e) {
    echoError($e -> getMessage(), $myJSFile, $myCSSFile);
    exit(1);
}

echoHead($myJSFile,$myCSSFile);
echoHeader("Customer Registration");

echo '

            <div id="data">
                <fieldset>
                <legend>Registration Information</legend>

                
                <label>TUID:</label>
                <span>'. $Cust_TUID_escaped . '</span><br>

                <label>Password:</label>
                <span>' . $password1Length . '</span><br>
                
                <label>Verify Password:</label>
                <span>' . $password2Length . '</span>
                
                </fieldset><br>


                <fieldset>
                <legend>Customer Information</legend>

                <label>Residency:</label>
                <span>'. $Cust_Residency_escaped . '</span><br>

                <label>Academic Year:</label>
                <span>'. $Cust_academic_year_escaped . '</span><br>

                </fieldset><br>



                <fieldset>
                <legend>Submit Your Membership</legend>
                <div id="buttons" class="bottombuttons">
                <input type="submit" value="Submit">
                <input type="reset" class = "resetButton" value="Reset Fields"><br>
                </div>
                </fieldset><br>';
                echoFooter();
?>