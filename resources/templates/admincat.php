<?php
    echo "<section id='center'>";
    $qry = "SELECT * FROM categories WHERE Deleted = 1 ORDER BY ID DESC;";
    echo "<div class='adminlist'>";
    echo "<br><br>";
    echo "<div class='admntop'></div>";
    $result=mysqli_query($con,$qry);
    $counter = 1;
    while ($r = $result->fetch_array())
    {   
        echo "<form action='admin/category/updatecatname.php' method='post'>
              <div class='adminid'>
                <input type='hidden' name='id' value='".$r['ID']."'>
                </input>
              </div>";
        echo "<div class='adminname'>
              <input type='text' readonly onclick='editName(this.id)' onblur='unfocusName(this.id)' id='input".$counter."' value='".$r['Name']."' name='name'></input>
              <b>
                  <button id='admin".$counter."' type='submit' class='clearcss'>
                     <i class='fa fa-floppy-o' aria-hidden='true'></i>
                  </button>
              </b>
              </form>
              </div>";
        if (strlen($r['PictureURL']) > 32)
        {
            $url = substr($r['PictureURL'],0,31).'...';
        }
        else
        {
            $url = $r['PictureURL'];
        }
        $name = strtolower($r['Name']);
        $name = preg_replace('/\s+/', '-', $name);
        $fullurl = "".$r['PictureURL'];
        
        echo "<form id='urlform' action='admin/category/updatecaturl.php' method='post'>
              <div class='adminurl'>
              <input type='text' hidden value='".$r['ID']."'class='hidden' name='id'>
              <input type='text' class='urlinput' readonly onclick='editURL(this.id,\"$fullurl\")' onblur='unfocusURL(this.id)' id='url".$counter."' value='".$url."' name='url'></input>
              <b>
                  <button id='urlbtn".$counter."' type='submit' class='clearcss'>
                     <i class='fa fa-floppy-o' aria-hidden='true'></i>
                  </button>
              </b>
              
              
              </div></form>";
        
        if($r['Active']==1)
        {
            echo "<a href='./admin/category/deactivatecat?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-times' aria-hidden='true'></i></div>
                  </a>";
        }
        else
        {
            echo "<a href='./admin/category/activatecat?".$r['ID']."'>
                  <div class='active adminicon'><i class='fa fa-check' aria-hidden='true'></i></div>
                  </a>";
        }
        echo "<a href='./admin/category/deletecat?".$r['ID']."'>
              <div class='active adminicon'><i class='fa fa-trash' aria-hidden='true'></i></div>
              </a>";
        echo "<br>";
        $counter++;
    }
echo "</section>";
echo "<a href='./admin/category/new/'>
          <div class='newbtn'>
            <div class='btnicon'>
                <i class='fa fa-plus-circle' aria-hidden='true'></i>
            </div>
            <div class='btntext'>New Category</div>
          </div>
          </a><br><br>";
?>