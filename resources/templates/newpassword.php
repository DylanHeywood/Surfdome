<?php
echo "<h2>New Password</h2><br><Br>";
if(isset($_SESSION['newpwerror']))
{
    if($_SESSION['newpwerror'] == "failed")
    {
        echo "<h3> Please make sure your password has at least 8 characters, 1 letter and 1 number </h3>";
    }
    else
    {
        echo "<h3> Please make sure your passwords match </h3>";
    }
    unset($_SESSION['newpwerror']);
    echo "<form method='POST' action='./my-account/change-password/'>
    <input required class='changepasswordinput' id='newpw' name='newpw' onkeyup='checkpw()' type='password' placeholder='Enter New Password'><Br><br>
    <input required class='changepasswordinput' id='newpwconfirm' name='newpwconfirm' onkeyup='checkpw()' type='password' placeholder='Confirm New Password'><br><br>
    <input required class='changepasswordinput' type='password' name='oldpw' placeholder='Enter Old Password'><br><br>
    <input type='submit' value='change password'><br><Br>
    </form>";
}
else
{
    echo "<form method='POST' action='./my-account/change-password/'>
    <input required class='changepasswordinput' id='newpw' name='newpw' onkeyup='checkpw()' type='password' placeholder='Enter New Password'><Br><br>
    <input required class='changepasswordinput' id='newpwconfirm' name='newpwconfirm' onkeyup='checkpw()' type='password' placeholder='Confirm New Password'><br><br>
    <input required class='changepasswordinput' type='password' name='oldpw' placeholder='Enter Old Password'><br><br>
    <input type='submit' value='change password'><br><Br>
    </form>";
}
?>
