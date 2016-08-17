<?php
echo "<section id='center'";
$qry = "SELECT * FROM subcategories WHERE Deleted = 1;";
echo "<div class='adminlist'>";
echo "<br><br>";
echo "<div class='admntop'></div>";
$result = mysqli_query($con, $qry);
$counter = 1;
while ($r = $result->fetch_array()) {
    echo "<form action='./admin/sub-category/updatesubcatname/' method='post'>";
    echo "<div class='adminid'>
                <input type='hidden' name='id' value='" . $r['ID'] . "'>";
    echo "</input>
              </div>";
    echo "<div class='adminname'>
              <input type='text' readonly onclick='editName(this.id)' onblur='unfocusName(this.id)' id='input" . $counter . "' value='" . $r['Name'] . "' name='name'>
              <b>
                  <button id='admin" . $counter . "' type='submit' class='clearcss'>
                     <i class='fa fa-floppy-o' aria-hidden='true'></i>
                  </button>
              </b>
              </form>
              </div>";

    $query = "SELECT Name FROM categories WHERE ID = ?";
    $stmt2 = $con->prepare($query);
    $stmt2->bind_param('i', $r['categoryID']);

    $stmt2->execute();
    $result2 = $stmt2->get_result();


    while ($row2 = $result2->fetch_assoc()) {

        echo "<form action='./admin/sub-category/updatesubcat-category/' method='post'>";

        echo "<div class='adminid'>
                <input type='hidden'  name='id' value='" . $r['ID'] . "'>";
        echo "</input>
              </div>";

        echo "<div class='adminname'>";
        //<input type='text' readonly onclick='editCat(this.id)' onblur='unfocusCat(this.id)'
        // id='input".$counter."' value='".$row2['Name']."' name='category'></input>";

        $qry3 = "SELECT * FROM categories WHERE Deleted = 1";
        $stmt3 = $con->prepare($qry3);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        echo "<select class='noarrow' name='category'>";
        while ($row3 = $result3->fetch_assoc()) {
            echo "<option ";
            if($row3['Name'] == $row2['Name'])
            {
                echo "selected ";
            }
            echo "value= '" . $row3['ID'] . "'>" . $row3['Name'] . "</option>";
        }
        echo "
            </select></div>
            </form>
            ";
    }
    echo "<TEST>";
    if ($r['active'] == 1) {
        echo "<a href='./admin/sub-category/deactivatesubcat?" . $r['ID'] . "'>
                  <div class='active adminicon'><i class='fa fa-times' aria-hidden='true'></i></div>
                  </a>";
    } else {
        echo "<a href='./admin/sub-category/activatesubcat?" . $r['ID'] . "'>
                  <div class='active adminicon'><i class='fa fa-check' aria-hidden='true'></i></div>
                  </a>";
    }
    echo "<a href='./admin/sub-category/deletesubcat?" . $r['ID'] . "'>
              <div class='active adminicon'><i class='fa fa-trash' aria-hidden='true'></i></div>
              </a>";
    echo "<br>";
    $counter++;
}
echo "</section>";
echo "<a href='./admin/sub-category/new/'>
          <div class='newbtn'>
            <div class='btnicon'>
                <i class='fa fa-plus-circle' aria-hidden='true'></i>
            </div>
            <div class='btntext'>New Sub-Category</div>
          </div>
          </a>";