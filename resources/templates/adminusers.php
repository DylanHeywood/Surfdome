<?php
echo "<section id='center'";
$qry = "SELECT * FROM users ORDER BY ID DESC;";
echo "<div class='adminlist'>";
echo "<br><br>";
echo "<div class='admntop'></div>";
$result=mysqli_query($con,$qry);
$counter = 1;
while ($r = $result->fetch_array())
{
    echo "<div class='fakeform two'>
              <input type='text' hidden value='".$r['ID']."'class='hidden' name='id'>
              <input type='text' class='username' readonly value='".$r['FirstName']." ".$r['Surname']."'>
              <input type='text' class='useremail' readonly value='".$r['Email']."'>
           </div>";
    if($r['Active']==1)
    {
        echo "<a href='./admin/users/ban-user?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-times' aria-hidden='true'></i></div>
                  </a>";
    }
    else
    {
        echo "<a href='./admin/users/unban-user?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-check' aria-hidden='true'></i></div>
                  </a>";
    }
    if($r['RoleID']==1)
    {
        echo "<a href='./admin/users/promoteuser?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-level-up' aria-hidden='true'></i></div>
                  </a>";
    }
    else
    {
        echo "<a href='./admin/users/demoteuser?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-level-down' aria-hidden='true'></i></div>
                  </a>";
    }

}
echo "</section>";