<!--- [ SECTION 01 ] ---
 - ==================================================== -
 - File Name: 447_project.php                           -
 - Description: HTML & PHP of EECS 447 Project          -
 - Creation Date: 04/09/2026                            -
 - Last Modification Date: 04/22/2026                   -
 - ==================================================== -->

<!--- [ SECTION 02 ] ---
 - ==================================================== -
 - HTML Header                                          -
 - ==================================================== -->

<!doctype html>
<html>
    <header>

    </header>


<!--- [ SECTION 03 ] ---
 - ==================================================== -
 - HTML Body                                            -
 - ==================================================== -->
    <body>
        <p> HTML CHECK 2 </p>


<!--- [ SECTION 04 ] ---
 - ==================================================== -
 - HTML PHP Connection                                  -
 - ==================================================== -->
<?php

// Establish Connection to the Database
$conn = new mysqli('mysql.eecs.ku.edu', '447s26_e982z299', 'YSenCQwu2iTc', '447s26_e982z299');
//  $conn = new mysqli('mysql.eecs.ku.edu', '**your db username**', '**your db password***', '**your database name**');
if ($conn ->connect_error)
    die('Could not connect: ' . $conn->connect_error);
echo('success');


/* ===[ SECTION 05 ]=================================== *
 * php SQL Query                                        *
 * ==================================================== */

//Send SQL Query
$query = 'SELECT * FROM CRUISE'; //change this to be dynamic
$result = $conn -> query($query);


/* ===[ SECTION 06 ]=================================== *
 * php SQL Result                                       *
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
$conn->close();

?>

<!--- [ SECTION XX ] ---
 - ==================================================== -
 - HTML Closing                                         -
 - ==================================================== -->
    </body>
</html>