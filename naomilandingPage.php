<?php
require_once('../app_config.php');
require_once(APP_ROOT.APP_FOLDER_NAME . '/scripts/echoHTML.php');
echoHead(APP_FOLDER_NAME . '/clientScripts/customerRegistration.js', APP_FOLDER_NAME . '/styles/customerRegistration.css');
echoHeader("Customer Registration");

echo '
        <form action="' . WEB_ROOT.APP_FOLDER_NAME . '/scripts/customerRegistration.php" onsubmit = "return passwordCheck();" method="post">

            <div id="data">
                <fieldset>
                <legend>Registration Information</legend>

                <label>Customer TU ID:</label>
                <input type="text" id="Cust_TUID" name="Cust_TUID" class = "inputBoxes" pattern="[0-9]{7}" required><br>

                <label>Password:</label>
                <input type="password" id="password1" name="password1" minlength="6" class = "inputBoxes" pattern="[A-Za-z0-9]{6,}" placeholder="At least 6 letters or numbers" required><br>
                
                <label>Verify Password:</label>
                <input type="password" id="password2" name="password2" minlength="6" class = "inputBoxes" pattern="[A-Za-z0-9]{6,}" required>
                
                </fieldset><br>


                <fieldset>
                <legend>Customer Information</legend>

                <label>Customer Residency:</label>
                <select name="Cust_Residency" id="Cust_Residency">
                <option value="Off-Campus">Gold</option>
                <option value="Dorm">Silver</option>
                <option value="Apartment">Bronze</option>
                <option value="Greek Housing">Bronze</option>
                </select><br>

              <label>Customer Academic Year:</label>
                <select name="Cust_Academic_Year" id="Cust_Academic_Year">
                <option value="Freshman">Gold</option>
                <option value="Sophomore">Silver</option>
                <option value="Junior">Bronze</option>
                <option value="Senior">Bronze</option>
                <option value="Graduate Student">Bronze</option>
                <option value="TU Employee">Bronze</option>
                </select><br>
                
                </fieldset><br>



            </form>';
             echoFooter();
            
?>