<?php
$qry = "SELECT * FROM users where Email = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param('s', $useremail);
$stmt->execute();
$result = $stmt->get_result();
echo "<h2 class='infohead'>Your Information</h2>";
    $userid = 0;
    while ($row = $result->fetch_assoc())
    {
    $userid = $row['ID'];
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Email:
        </div>
        <div class='profileinfo disabled'>";
            echo $row['Email'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Name:
        </div>
        <div class='profileinfo'>";
            echo $row['FirstName']." ".$row['Surname'];
            echo "</div></div>";
    $datearray = explode("-",$row['DOB']);
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Date of birth:
        </div>
        <div class='profileinfo'>";
            echo $datearray[2]."/".$datearray[1]."/".$datearray[0];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Phone Number:
        </div>
        <div class='profileinfo'>";
            echo $row['Phone'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Secondary Phone Number:
        </div>
        <div class='profileinfo'>";
            echo $row['Phone2'];
            echo "</div></div>";
    }
    $qry = "SELECT * FROM deliveryaddresses where UserID = ? AND Active = 1";
    $stmt = $con->prepare($qry);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc())
    {
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Address Line 1:
        </div>
        <div class='profileinfo'>";
            echo $row['Address'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Address Line 2:
        </div>
        <div class='profileinfo'>";
            echo $row['Address2'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Postcode:
        </div>
        <div class='profileinfo'>";
            echo $row['Postcode'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            City:
        </div>
        <div class='profileinfo'>";
            echo $row['City'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            County:
        </div>
        <div class='profileinfo'>";
            echo $row['County'];
            echo "</div></div>";
    echo "<div class='profilerow'>
        <div class='profilelabel'>
            Country:
        </div>
        <div class='profileinfo'>";
            echo $row['Country'];
            echo "</div></div>";
    }
    echo "<a href='./my-account/edit-personal/'><div id='updatepass'> Edit Personal </div></a>";
    echo "<a href='./my-account/edit-address/'><div id='updatepass'> Edit Address </div></a>";
    echo "<a href='./my-account/new-password/'><div id='updatepass'> Change Password </div></a>";