<?php
echo "<section id='center'";
$qry = "SELECT * FROM products WHERE Deleted = 1 ORDER BY ID DESC;";
echo "<div class='adminlist'>";
echo "<br><br>";
echo "<div class='admntop'></div>";
$result=mysqli_query($con,$qry);
$counter = 1;
while ($r = $result->fetch_array())
{
    echo "<div class='fakeform'>
              <input type='text' hidden value='".$r['ID']."'class='hidden' name='id'>
              <input type='text' class='adminname' readonly value='".$r['Name']."'>
           </div>";
$query="SELECT * FROM purchases WHERE ProductID=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $r['ID']);
    $stmt->execute();
    $rslt = $stmt->get_result();
    while ($row = $rslt->fetch_assoc())
    {
        echo "<input type='text' class='adminprice' readonly value='".$row['Price']."'></input>";
    }
    echo "<a href='./admin/products/editproduct?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-pencil' aria-hidden='true'></i></div>
                  </a>";
    if($r['Active']==1)
    {
        echo "<a href='./admin/products/deactivateproduct?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-times' aria-hidden='true'></i></div>
                  </a>";
    }
    else
    {
        echo "<a href='./admin/products/activateproduct?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-check' aria-hidden='true'></i></div>
                  </a>";
    }
    echo "<a href='./admin/products/deleteproduct?".$r['ID']."'>
              <div class='active adminicon'><i class='fa fa-trash' aria-hidden='true'></i></div>
              </a>";
    echo "<br>";
    $counter++;
}
echo "</section>";
echo "<a href='./admin/products/new/'>
          <div class='newbtn'>
            <div class='btnicon'>
                <i class='fa fa-plus-circle' aria-hidden='true'></i>
            </div>
            <div class='btntext'>New Product</div>
          </div>
          </a><br><br>";