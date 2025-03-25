<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
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
    $filename = 'users.txt';
    
    if (!file_exists($filename)) {
        echo '<p class="error">Error: The file ' . htmlspecialchars($filename) . ' does not exist.</p>';
    } else {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if (empty($lines)) {
            echo '<p>No data found in the file.</p>';
        } else {
            echo '<table>';
            echo '<thead><tr><th>Name</th><th>Password</th><th>Email</th></tr></thead>';
            echo '<tbody>';
           
            foreach ($lines as $line) {
                $parts = explode(':', $line);
                
                if (count($parts) >= 3) {
                    $name = trim($parts[0]);
                    $password = trim($parts[1]);
                    $email = trim($parts[2]);
                   
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
