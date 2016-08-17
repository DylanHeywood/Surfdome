<?php
include '../resources/core/db.php';
/**
 *  This class will be used to create the menus for my surfdome project
 *  Create the main menu, Category menu and brand menu
 * @author Dylan
 *
 */
class Menu
{
	function __construct()
	{
		$queryResult = null;
	}
	
	function mainMenu($con)
	{
		$queryResult = "";
        $queryResult = $queryResult. "<section id='menu'>
        <div id='menutitle'>MENU</div>"; 
        $qry = "SELECT * FROM users WHERE Email = ?";
        if(isset($_SESSION['UserLoggedIn'])){
            $email = $_SESSION['UserLoggedIn'];
        }
        elseif(isset($_COOKIE['UserLoggedIn']))
        {
            $email = $_COOKIE['UserLoggedIn'];
        }
        else{
            $email = "LOGGED OUT";
        }
        if($stmt = $con->prepare($qry)){
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc())
        {
            if($row['RoleID'] == 2)
            {
                $queryResult = $queryResult."<a href='./admin/'><div class='menuitems'> ADMIN </div></a> ";
            }
        }
        $stmt->close();
        }
		$qry = "SELECT * FROM menu"; 
		$result=mysqli_query($con,$qry); 
		while ($row = $result->fetch_array()) 
		{
			$queryResult = $queryResult. "<a href='".$row['Link']."'><div class='menuitems'>".$row["Name"]."</div></a>";
		}
		$queryResult = $queryResult. "</section>"; 
		return $queryResult;
	}
	function categoryMenu()
	{
		$queryResult = ""; //clear string
		$qry = "SELECT * FROM categories"; //store query inside of variable qry
		$result=mysqli_query($con,$qry); //run the query stored inside of qry
		$queryResult = $queryResult+ "<section id='optionsmenu'>
                    <div id='menutitle'>CATEGORIES</div>"; //open section and add title to string
		while ($row = $result->fetch_array()) //runs through every field returned from qry
		{
			$queryResult = $queryResult+ "<a href='./categories/".strtolower(str_replace(" ","-",$row['Name']))."'><div class='menuitems ALT'>".$row["Name"]."</div></a>";
            // add all the returned information to the string
		}
		$queryResult = $queryResult+ "</section>"; //close section
		return $queryResult; //return string
	}
	function brandMenu()
	{
		$queryResult = ""; //clear string
		$qry = "SELECT * FROM brands"; //store query inside of qry variable
		$result=mysqli_query($con,$qry);
		$queryResult = $queryResult+ "<section id='optionsmenu'>
                    <div id='menutitle'>BRANDS</div>";
		while ($row = $result->fetch_array())
		{
			$queryResult = $queryResult+ "<a href='./categories/brands/".strtolower(str_replace(" ","-",$row['Name']))."'><div class='menuitems ALT'>".$row["Name"]."</div></a>";
		}
		$queryResult = $queryResult+ "</section>";
		return $queryResult;
	}
}