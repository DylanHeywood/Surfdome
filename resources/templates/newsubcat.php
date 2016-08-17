<?php

echo "<section id='center'>";
echo "<form class='newform' method='post' action='./admin/sub-category/createsubcat.php'>
          <fieldset>
            <legend>Add new Subcategory</legend>
            <br>
            <label> Name: </label>
            <input type='text' name='name'><br><br>
            <label>Category:</label>";
            
            $qry = "SELECT * FROM categories WHERE Deleted = 1";
            $stmt = $con->prepare($qry);
            $stmt->execute();
            $result = $stmt->get_result();
            echo "<select name='category'>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value= '" . $row['ID'] . "'>" . $row['Name'] . "</option>";
            }
            echo "<br><br><br>";
            echo "<input class='newsubmit' type='submit' value='Create'>
          </fieldset>
        </form>";
echo "</section>";

?>