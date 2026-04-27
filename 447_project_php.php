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
echo('success');


/* ===[ SECTION 04 ]=================================== *
 * PHP SQL Query                                        *
 * ==================================================== */

//Receive Information about Query
$Q_KEY = $_POST['query_key'];
$search_value = $_POST['user_search'];

//Construct Query
$query = "";

//Query Switch
switch($KEY) {
    case "query1":
        $query = "";
        break;
    case "query2":
        $query = "";
        break;
    case "query3":
        $query = "";
        break;
    case "query4":
        $query = "";
        break;
    case "query5":
        $query = "";
        break;
}

//Search for Query Results
$result = $CONNECTION -> query($query);


/* ===[ SECTION 05 ]=================================== *
 * PHP SQL Result                                       *
 * ==================================================== */

// Print results in HTML
echo "<table>\n";
while ($line = $result->fetch_assoc()) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
         echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

echo "Number of fields: " . $result->field_count ."<br>";
echo "Number of records: " . $result->num_rows ."<br>";

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

</body>
</html>