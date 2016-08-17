<?php
$qry = "SELECT * FROM users WHERE Email = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('s', $useremail);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc())
{
echo "<h2>Edit Personal</h2><br><Br>";
if(isset($_SESSION['newperserror']))
{
    if($_SESSION['newperserror']=="firstname") {
        $nameerror="Please enter a valid first name";
        
    }

    unset($_SESSION['newperserror']);
}
    echo "<form method='POST' action='./my-account/change-personal/'>
    <label>First Name: </label><br><input value='".$row['FirstName']."' required class='changepasswordinput' id='firstname' name='firstname' type='text' placeholder='Enter First Name'><Br><br>
    <label>Second Name: </label><br><input value='".$row['Surname']."' required class='changepasswordinput' id='secondname' name='secondname' type='text' placeholder='Enter Second Name'><br><br>
    <label>Primary Phone: </label><br><input value='".$row['Phone']."' required class='changepasswordinput' id='phone1' name='phone1' type='tel' placeholder='Enter Primary Phone'><br><br>
    <label>Secondary Phone: </label><br><input value='".$row['Phone2']."' class='changepasswordinput' id='phone2' name='phone2' type='tel' placeholder='Enter Secondary Phone'><br><br>
    <div id='dob'>
    <label>D.O.B:</label><Br>";
    $dob = explode("-",$row['DOB']);
    $year = $dob['0'];
    $month = $dob['1'];
    $day = $dob['2'];
    echo "<select name='month' id='month'>";
        if($month==1)
        {
            echo "<option selected value='1'>January</option>";
        }
        else
        {
            echo "<option value='1'>January</option>";
        }
    if($month==2)
    {
        echo "<option selected value='2'>February</option>";
    }
    else
    {
        echo "<option value='2'>February</option>";
    }
    if($month==3)
    {
        echo "<option selected value='3'>March</option>";
    }
    else
    {
        echo "<option value='3'>March</option>";
    }
    if($month==4)
    {
        echo "<option selected value='4'>April</option>";
    }
    else
    {
        echo "<option value='4'>April</option>";
    }
    if($month==1)
    {
        echo "<option selected value='5'>May</option>";
    }
    else
    {
        echo "<option value='5'>May</option>";
    }
    if($month==6)
    {
        echo "<option selected value='6'>June</option>";
    }
    else
    {
        echo "<option value='6'>June</option>";
    }
    if($month==7)
    {
        echo "<option selected value='7'>July</option>";
    }
    else
    {
        echo "<option value='7'>July</option>";
    }
    if($month==8)
    {
        echo "<option selected value='8'>August</option>";
    }
    else
    {
        echo "<option value='8'>August</option>";
    }
    if($month==9)
    {
        echo "<option selected value='9'>September</option>";
    }
    else
    {
        echo "<option value='9'>September</option>";
    }
    if($month==10)
    {
        echo "<option selected value='10'>October</option>";
    }
    else
    {
        echo "<option value='10'>October</option>";
    }
    if($month==1)
    {
        echo "<option selected value='11'>November</option>";
    }
    else
    {
        echo "<option value='11'>November</option>";
    }
    if($month==12)
    {
        echo "<option selected value='12'>December</option>";
    }
    else
    {
        echo "<option value='12'>December</option>";
    }
    echo "</select>
    <select name='date' id='date'>";
    foreach (range(1,31) as $number) {
        if($number==$day)
        {
            echo '<option selected value='.$number.'>'.$number.'</option>';
        }
        else
        {
            echo '<option value='.$number.'>'.$number.'</option>';
        }

    }
    echo "</select>";
    $already_selected_value = $year;
    $earliest_year = 1900;

    echo "<select name='year' id='year'>";
    foreach (range(date('Y'), $earliest_year) as $x) {
        echo '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
    }
    print '</select>';
    }
    echo "</select>
    </div><br><Br>
    <input type='submit' value='Update Personal'><br><Br>
    </form>";
