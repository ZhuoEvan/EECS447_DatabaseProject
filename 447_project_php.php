<!-- 
/* ===[ SECTION 01 ]=================================== *
 * File Name: 447_project_php.php                       *
 * Description: PHP of EECS 447 Project                 *
 * Creation Date: 04/09/2026                            *
 * Last Modification Date: 04/25/2026                   *
 * ==================================================== */
-->

<!-- 
/* ===[ SECTION 02 ]=================================== *
 * HTML Section                                         *
 * ==================================================== */
-->
<!DOCTYPE html>
<html>
<!-- Head Section -->
<head>
    <title>Database Project Result Page</title>
</head>

<!-- Body Section -->
<body style=
"font-family: Arial, Helvetica, sans-serif;
 margin: 0;">
    <header style=
    "background-color: blue;
    color: white;
    padding: 20px;
    text-align: center;">
    <h1>Neighborhood Information Database</h1>
    </header>

<div id=php_section 
 style=
 "padding: 25px;
  padding-left: 250px;">
<!-- 
/* ===[ SECTION 03 ]=================================== *
 * PHP Connection                                       *
 * ==================================================== */
-->
<?php

//Connection Variables
$WEB_ADDRESS = 'mysql.eecs.ku.edu';
$DB_USERNAME = '447s26_e982z299';
$DB_PASSWORD = 'YSenCQwu2iTc';
$DB_NAME     = '447s26_e982z299';

// Establish Connection to the Database
$CONNECTION = new mysqli($WEB_ADDRESS, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

//Connection Check
if ($CONNECTION ->connect_error)
    die('Could not connect: ' . $CONNECTION->connect_error);
echo("Successful Connection<br><br>");


/* ===[ SECTION 04 ]=================================== *
 * PHP SQL Query                                        *
 * ==================================================== */

//Receive Information about Query
$Q_KEY = $_POST['query_key'];
$search_value = $_POST['user_search'];

//Construct Query
$query = "";

//Query Switch
switch($Q_KEY) {
    case "query1":
        $query = "SELECT DISTINCT h.AddressNumber, h.Street FROM Neighborhood n, House h 
                  WHERE n.Name = \"" . $search_value . "\"
                  AND n.Name = h.NeighborhoodName;";
        echo("Showing<br>+Address Number<br>+Street<br>");
        break;
    case "query2":
        $query = "SELECT r.FirstName, r.LastName FROM Neighborhood n, House h, Resident r
                  WHERE n.Name = \"" . $search_value . "\" 
                  AND n.Name = h.NeighborhoodName
                  AND h.AddressNumber = r.AddressNumber;";
        echo("Showing<br>+First Name<br>+Last Name<br>");
        break;
    case "query3":
        $query = "SELECT c.CrimeType, c.CrimeTime, c.Status, h.AddressNumber, h.Street, o.InsideOutside
                  FROM Neighborhood n, House h, Resident r, Occurs o, Crime c
                  WHERE n.Name = \"" . $search_value . "\" 
                  AND n.Name = h.NeighborhoodName
                  AND h.AddressNumber = o.AddressNumber
                  AND o.CrimeTime = c.CrimeTime
                  AND c.ResidentSSN = r.SSN;";
        echo("Showing<br>+Crime Type<br>+Crime Time<br>+Crime Status<br>+Affected Address Number<br>+Street<br>+Location<br>");
        break;
    case "query4":
        $query = "SELECT n.Name, n.ZipCode FROM Neighborhood n, House h
                  WHERE h.AddressNumber = \"" . $search_value . "\" 
                  AND h.ZipCode = n.ZipCode
                  AND h.NeighborhoodName = n.Name;";
        echo("Showing<br>+Neighborhood Name<br>+Zip Code<br>");
        break;
    case "query5":
        $query = "SELECT r.FirstName, r.LastName, r.DateOfBirth FROM House h, Resident r
                  WHERE h.AddressNumber = \"" . $search_value . "\" 
                  AND h.AddressNumber = r.AddressNumber;";
        echo("Showing<br>+First Name<br>+Last Name<br>+Date of Birth<br>");
        break;
    case "query6":
        $query = "SELECT DISTINCT r.LastName, h.Street, h.LotSize, h.NumBedrooms FROM House h, Resident r
                  WHERE h.AddressNumber = \"" . $search_value . "\" 
                  AND h.AddressNumber = r.AddressNumber;";
        echo("Showing<br>+Owner's Last Name<br>+Street<br>+Lot Size<br>+Number of Bedrooms<br>");
        break;
    case "query7":
        $query = "SELECT * FROM Neighborhood";
        echo("Showing<br>+Name<br>Zip Code<br>");
        break;
}

//Search for Query Results
// echo("$query"); //Troubleshoot Echo
$result = $CONNECTION -> query($query);


/* ===[ SECTION 05 ]=================================== *
 * PHP SQL Result                                       *
 * ==================================================== */

//Check if Query Results Exist
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    
    //Output data of each row
    while($line = $result->fetch_assoc()) {
        echo "<\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }       
        echo "\t</tr>\n";
    }
    echo "</table>\n";
} else {
    echo "<br>0 results";
}

//Return to HTML
echo "<br><a href='447_project_index.html'>Back to Main Page</a>";

//Close Connection
$CONNECTION->close();

?>
<!-- 
/* ===[ SECTION 06 ]=================================== *
 * HTML Closing                                         *
 * ==================================================== */ 
-->
</div>

</body>
</html>