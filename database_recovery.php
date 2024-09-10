<?php
$conn = mysqli_connect("localhost", "root", "", "qcusis");
$filePath = "C:/xampp/htdocs/QCU SIS/qcusis.sql";
function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($result == TRUE) {
            echo "<script type='text/javascript'>alert('Database Recovery Completed Successfully.'); window.location.href = 'admin/settings.php';</script>";
        }else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    
    }
} // end if file exists
restoreMysqlDB($filePath,$conn);
?>