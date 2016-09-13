<?php
if(isset($url[5]))
{
    if($url[5]=="all")
    {
        $qry = "SELECT * FROM pagehits WHERE UserID = ? ORDER BY Time DESC";
    }
    else
    {
        $qry = "SELECT * FROM pagehits WHERE UserID = ? ORDER BY Time DESC LIMIT 20";
    }
}
else
{
    $qry = "SELECT * FROM pagehits WHERE UserID = ? ORDER BY Time DESC LIMIT 20";
}
$stmt = $con->prepare($qry);
$stmt->bind_param('s', $ID);
$stmt->execute();
$result = $stmt->get_result();
echo "<div class='historyrow'>
         <div class='historytitle historyurl'>
              Url
         </div>
         <div class='historytitle historytime'>
               Time and date   
         </div></div>";
while ($row = $result->fetch_assoc())
while ($row = $result->fetch_assoc())
{
    echo "<div class='historyrow'>
                <a href='".$row['URL']."'><div class='historyurl'>".
                  $row['URL']
                ."</div></a>
                <div class='historytime'>".
                  $row['Time']
                ."</div></div>";
}
echo "<br><br>";
if(isset($url[5]))
{
    if($url[5]=="all")
    {
        echo "<a href='./my-account/history/'>Show less</a>";
    }
    else
    {
        echo "<a href='./my-account/history/all'>Show all</a>";
    }
}
else
{
    echo "<a href='./my-account/history/all'>Show all</a>";
}
echo "<br><Br>";