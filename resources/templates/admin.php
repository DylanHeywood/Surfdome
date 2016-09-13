<?php
require_once ("../resources/core/functions.php");
?>
<header class='smallerbg'>
    <?php
    if (!isset($url[4])) {
        $url[4] = null;
    }
    if (isset($_SESSION['UserLoggedIn']) || isset($_COOKIE['UserLoggedIn'])) {
        $qry = "SELECT * FROM users WHERE Email = ?";
        if (isset($_SESSION['UserLoggedIn'])) {
            $email = $_SESSION['UserLoggedIn'];
        } else {
            $email = $_COOKIE['UserLoggedIn'];
        }
        if ($stmt = $con->prepare($qry)) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                if ($row['RoleID'] !== 2) {
                    header("Location: ../../");
                }
            }
            $stmt->close();
        } else {
            echo $qry;
        }
    } else {
        header("Location: ../");
    }
    ?>
    <section id="headercontent">
        <?php
        if ($url[4] == null) {
            echo "<h1 class='admintitle'> Surfdome Admin Panel </h1>";
        } elseif ($url[4] == "category") {
            echo "<h1 class='admintitle'> Surfdome Categories </h1>";
        } elseif ($url[4] == "products") {
            echo "<h1 class='admintitle'> Surfdome Products </h1>";
        } elseif ($url[4] == "sub-category") {
            echo "<h1 class='admintitle'> Surfdome Subcategories </h1>";
        } elseif ($url[4] == "users") {
            echo "<h1 class='admintitle'> Surfdome Users </h1>";
        } elseif ($url[4] == "category") {
            echo "<h1 class='admintitle'> Surfdome Categories </h1>";
        }
        elseif ($url[4] == "reports") {
            echo "<h1 class='admintitle'> Admin Reports </h1>";
        }
        ?>
        <section id="lander">
            <?php
            if ($url[4] == null) {

                ?>
                <a href="./admin/category/">
                    <div class="adminopt">
                        <img src="https://image.freepik.com/free-icon/ontology_318-31278.png" alt="Category">
                        <h1>Categories</h1>
                    </div>
                </a>
                <a href="./admin/sub-category/">
                    <div class="adminopt">
                        <img src="https://image.freepik.com/free-icon/category_318-30744.png" alt="Sub Category">
                        <h1>Sub Categories</h1>
                    </div>
                </a>
                <a href="./admin/products/">
                    <div class="adminopt">
                        <img src="https://cdn3.iconfinder.com/data/icons/mobibusiness/512/product_basket-256.png"
                             alt="Product">
                        <h1>product</h1>
                    </div>
                </a>
                <a href="./admin/users/">
                    <div class="adminopt">
                        <img src="http://simpleicon.com/wp-content/uploads/users.png" alt="User">
                        <h1>user</h1>
                    </div>
                </a>

                <?php
            } elseif ($url[4] == "category" && $url[5] == null) {
                require_once("../resources/templates/admincat.php");
            } elseif ($url[4] == "users" && $url[5] == null) {
                require_once("../resources/templates/adminusers.php");
            } elseif ($url[4] == "users" && preg_match('/promoteuser/', $url[5])) {
                require_once("../resources/templates/promoteuser.php");
            } elseif ($url[4] == "users" && preg_match('/demoteuser/', $url[5])) {
                require_once("../resources/templates/demoteuser.php");
            } elseif ($url[4] == "users" && preg_match('/unban-user/', $url[5])) {
                require_once("../resources/templates/unbanuser.php");
            } elseif ($url[4] == "users" && preg_match('/ban-user/', $url[5])) {
                require_once("../resources/templates/banuser.php");
            } elseif ($url[4] == "category" && preg_match('/updatecatname/', $url[5])) {
                require_once("../resources/templates/updatecatname.php");
            } elseif ($url[4] == "category" && preg_match('/updatecaturl/', $url[5])) {
                require_once("../resources/templates/updatecaturl.php");
            } elseif ($url[4] == "category" && preg_match('/deactivatecat/', $url[5])) {
                require_once("../resources/templates/deactivatecat.php");
            } elseif ($url[4] == "category" && preg_match('/activatecat/', $url[5])) {
                require_once("../resources/templates/activatecat.php");
            } elseif ($url[4] == "category" && preg_match('/deletecat/', $url[5])) {
                require_once("../resources/templates/deletecat.php");
            } elseif ($url[4] == "category" && $url[5] == "new") {
                require_once("../resources/templates/newcat.php");
            } elseif ($url[4] == "category" && $url[5] == "createcat.php") {
                require_once("../resources/templates/createcat.php");
            } elseif ($url[4] == "sub-category" && $url[5] == null) {
                require_once("../resources/templates/adminsubcat.php");
            } elseif ($url[4] == "sub-category" && preg_match('/updatesubcatname/', $url[5])) {
                require_once("../resources/templates/updatesubcatname.php");
            } elseif ($url[4] == "sub-category" && preg_match('/updatesubcaturl/', $url[5])) {
                require_once("../resources/templates/updatesubcaturl.php");
            } elseif ($url[4] == "sub-category" && preg_match('/deactivatesubcat/', $url[5])) {
                require_once("../resources/templates/deactivatesubcat.php");
            } elseif ($url[4] == "sub-category" && preg_match('/activatesubcat/', $url[5])) {
                require_once("../resources/templates/activatesubcat.php");
            } elseif ($url[4] == "sub-category" && preg_match('/deletesubcat/', $url[5])) {
                require_once("../resources/templates/deletesubcat.php");
            } elseif ($url[4] == "sub-category" && $url[5] == "new") {
                require_once("../resources/templates/newsubcat.php");
            } elseif ($url[4] == "sub-category" && $url[5] == "createsubcat.php") {
                require_once("../resources/templates/createsubcat.php");
            } elseif ($url[4] == "products" && $url[5] == null) {
                require_once("../resources/templates/adminproducts.php");
            } elseif ($url[4] == "products" && $url[5] == "all") {
                require_once("../resources/templates/allproducts.php");
            } elseif ($url[4] == "products" && preg_match('/editproduct/', $url[5])) {
                require_once("../resources/templates/editproduct.php");
            } elseif ($url[4] == "products" && $url[5] == 'change-product') {
                require_once("../resources/templates/changeproduct.php");
            } elseif ($url[4] == "products" && preg_match('/subcategories/', $url[5])) {
                require_once("../resources/templates/productsubcat.php");
            } elseif ($url[4] == "products" && preg_match('/categories/', $url[5])) {
                require_once("../resources/templates/productcat.php");
            } elseif ($url[4] == "products" && preg_match('/deactivateproduct/', $url[5])) {
                require_once("../resources/templates/deactivateproduct.php");
            } elseif ($url[4] == "products" && preg_match('/activateproduct/', $url[5])) {
                require_once("../resources/templates/activateproduct.php");
            } elseif ($url[4] == "products" && preg_match('/deleteproduct/', $url[5])) {
                require_once("../resources/templates/deleteproduct.php");
            } elseif ($url[4] == "products" && $url[5] === 'new') {
                require_once("../resources/templates/newproduct.php");
            } elseif ($url[4] == "products" && $url[5] === 'create') {
                require_once("../resources/templates/newproduct.php");
            } elseif ($url[4] == "products" && $url[5] === 'create2') {
                require_once("../resources/templates/checkfirst.php");
            } elseif ($url[4] == "products" && $url[5] === 'add') {
                require_once("../resources/templates/addproduct.php");
            } elseif ($url[4] == "reports") {
                require_once("../resources/templates/adminreports.php");
            }

            ?>
        </section>
        <div id="fillerbox"></div>
    </section>
    <?php
    if ($url[4] !== "")
    {
    ?>
    <section id="admnfooter">

        <div class="adminfooter">
            <a href="./admin/category/">
                <img src="https://image.freepik.com/free-icon/ontology_318-31278.png" alt="Category">
                <h1>Categories</h1>
            </a>
        </div>
        <div class="adminfooter">
            <a href="./admin/sub-category/">
                <img src="https://image.freepik.com/free-icon/category_318-30744.png" alt="Sub Category">
                <h1>Sub Categories</h1>
            </a>
        </div>
        <div class="adminfooter">
            <a href="./admin/products/">
                <img src="https://cdn3.iconfinder.com/data/icons/mobibusiness/512/product_basket-256.png" alt="Product">
                <h1>Products</h1>
            </a>
        </div>
        <div class="adminfooter">
            <a href="./admin/users/">
                <img src="http://simpleicon.com/wp-content/uploads/users.png" alt="User">
                <h1>Users</h1>
            </a>
        </div>
        <br><br>
        <?php
        }
        ?>
    </section>
    <a href="./">
        <section id='closeadmin'>Close Admin Panel</section>
    </a><a href="./admin/reports/">
        <section id='adminreports'>Admin Reports</section>
    </a>
</header>