<?php

 class Data
 {
     private $_connection;
     private static $_instance;
     private $_host = "localhost";
     private $_username = "dylan_heywood";
     private $_password = "pass123";
     private $_database = "dylan_surfdome";
     private $error = "";
     
    /**
     * Create mysql object for database connection
     * store error message if connection fails
     */
    private function Data() 
    {
        $this->_connection = new mysqli($this->_host,$this->_username,$this->_password,$this->_database);
        //store the mysqli conenction object inside of the variable _connection
        if(mysqli_connect_error()) //if the connection failed
        {
            trigger_error("Failed to connect to MySQL: ".mysql_connect_error(), E_USER_ERROR);
            $this->error = "Failed to connect to MySQL: ".mysql_connect_error(); //store error message
        }
    }
     
    /**
     * @return object mysqli
     */
    public function getConnection()
    {
        return $this->_connection; //return the object _connection
    }
     
     
     
     
     
     
	public static function getInstance()
    {
		if(!self::$_instance)
        {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
     
     private function __clone() { }
     
     
     /**
      * This will take a limit as an integer and return a list of names from the database
      * @param  integer $limit max amount of product names
      * @return array String of product names
      */
     public function getProductNames($limit)
     {
         
        $qry = "SELECT Name FROM products WHERE Deleted = 1 LIMIT $limit";
//        $result=mysqli_query($this->getConnection(),$qry);
        
        $result = $this->getConnection()->query($qry);
         
        $namesList = array();
       while ( $row = $result->fetch_assoc())
        {
           array_push($namesList, $row['Name']);
        }

         return $namesList;
     }
     /**
      * Find the newest products inside of the database
      * @param  integer $limit Max amount of returned fields
      * @return array Array of returned fields from query
      */
     public function productInfo($limit)
     {
        $qry = "SELECT
                    *
                    FROM products WHERE Deleted = 1 
                    ORDER BY 
                    ID
                    DESC
                    LIMIT 
                    $limit
                    "; // store query inside of qry variable
        $result = $this->getConnection()->query($qry);
         // execute query and store the array inside of the result variable
        return $result; //return the array
         
     }
     public function topProducts($limit)
     {
         $qry = "SELECT ProductID, COUNT(ProductID) AS idCOUNT 
                 FROM orders
                 GROUP BY ProductID
                 ORDER BY COUNT(ProductID) DESC LIMIT 6";
         $result = $this->getConnection()->query($qry);
         return $result;
             
     }
/*     public function getAdverts();
     {
         $qry = "SELECT P.Name,P.ID,pur.Price,img.URL FROM products P, purchases as pur, images as img WHERE P.ID=pur.ProductID and P.ID=img.ProductID ORDER BY ID DESC LIMIT $limit";
        $result = $this->getConnection()->query($qry);
        return $result;
     }*/
 }
