<?php

    echo "<section id='center'>";
    echo "<form class='newform' method='post' action='./admin/category/createcat.php'>
          <fieldset>
            <legend>Add new Category</legend>
            <br>
            <label> Name: </label>
            <input type='text' name='name'><br><br>
            <label>Image URL:</label>
            <input type='text' name='url'><br><br>
            <input class='newsubmit' type='submit' value='Create'>
          </fieldset>
        </form>";
    echo "</section>";

?>