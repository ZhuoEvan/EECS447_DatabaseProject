<?php
/* ===[ SECTION 01 ]=================================== *
 * File Name: database_connect.php                      *
 * 
 * Creation Date: 04/09/2026                            *
 * Last Modification Date: 04/09/2026                   *
 * ==================================================== */

/* ===[ SECTION 02 ]=================================== *
 * php SQL Connection                                   *
 * ==================================================== */

if ($_SERVER["REQUEST_METHOD"] =- "POST") {
    $name = $_POST['ok'];
    echo "Hello, " . htmlspecialchars($name);
};

// //Establish Connection to the Database
// $connection = new mysqli('mysql.eecs.ku.edu', '**your db username**', '**your db password***', '**your database name**');
// if ($connection -> connect_error) //Error Check: Cannot Connect to Database
//     die('Could not connect: ' . $conn->connect_error); 
// echo('success')


// /* ===[ SECTION 03 ]=================================== *
//  * php SQL Query                                        *
//  * ==================================================== */

// //Send SQL Query
// $query = 'SELECT * FROM CRUISE'; //change this to be dynamic
// $result = $connection -> query($query);


// /* ===[ SECTION 04 ]=================================== *
//  * php SQL Result                                       *
//  * ==================================================== */

// // Print results in HTML
// echo "<table>\n";
// while ($line = $result->fetch_assoc()) {
//     echo "\t<tr>\n";
//     foreach ($line as $col_value) {
//          echo "\t\t<td>$col_value</td>\n";
//     }
//     echo "\t</tr>\n";
//     }
// echo "</table>\n";

// //      echo "Number of fields: ".mysql_num_fields($result)."<br>";
// //      echo "Number of records: ".mysql_num_rows($result)."<br>";


// //Close Connection
// $connection->close();

?>