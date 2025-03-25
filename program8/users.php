<!DOCTYPE html>
<html>
<head>
    <title>User Data from Text File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>User Data from Text File</h1>
    
    <?php
    $filename = 'users.txt'; // Change this to your file path
    
    // Check if file exists
    if (!file_exists($filename)) {
        echo '<p class="error">Error: The file ' . htmlspecialchars($filename) . ' does not exist.</p>';
    } else {
        // Read the file
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if (empty($lines)) {
            echo '<p>No data found in the file.</p>';
        } else {
            // Start the table
            echo '<table>';
            echo '<thead><tr><th>Name</th><th>Password</th><th>Email</th></tr></thead>';
            echo '<tbody>';
            
            // Process each line
            foreach ($lines as $line) {
                // Split the line into parts
                $parts = explode(':', $line);
                
                // Make sure we have exactly 3 parts (Name, Password, Email)
                if (count($parts) >= 3) {
                    $name = trim($parts[0]);
                    $password = trim($parts[1]);
                    $email = trim($parts[2]);
                    
                    // Display the data in a table row
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($name) . '</td>';
                    echo '<td>' . htmlspecialchars($password) . '</td>';
                    echo '<td>' . htmlspecialchars($email) . '</td>';
                    echo '</tr>';
                }
            }
            
            echo '</tbody></table>';
        }
    }
    ?>
</body>
</html>
