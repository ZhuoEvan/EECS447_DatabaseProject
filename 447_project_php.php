<?php
/* ===[ SECTION 01 ]=================================== *
 * File Name: 447_project_php.php                       *
 * Description: PHP of EECS 447 Project                 *
 * Creation Date: 04/09/2026                            *
 * Last Modification Date: 04/25/2026                   *
 * ==================================================== */

/* ===[ SECTION 02 ]=================================== *
 * PHP Connection                                       *
 * ==================================================== */

//Connection Variables
$WEB_ADDRESS = 'mysql.eecs.ku.edu';
$DB_USERNAME = '447s26_e982z299';
$DB_PASSWORD = 'YSenCQwu2iTc';
$DB_NAME     = '447s26_e982z299';

// Establish Connection to the Database
$CONNECTION = new mysqli($WEB_ADDRESS, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

//
if ($CONNECTION ->connect_error)
    die('Could not connect: ' . $CONNECTION->connect_error);
echo('success');


/* ===[ SECTION 03 ]=================================== *
 * PHP SQL Query                                        *
 * ==================================================== */

//Send SQL Query
$query = 'SELECT * FROM CRUISE'; //change this to be dynamic
$result = $CONNECTION -> query($query);


/* ===[ SECTION 04 ]=================================== *
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

     echo "Number of fields: ".mysql_num_fields($result)."<br>";
     echo "Number of records: ".mysql_num_rows($result)."<br>";


//Close Connection
$CONNECTION->close();

?>