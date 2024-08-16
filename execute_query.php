<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$dbname = "live_code"; // Ganti dengan nama database Anda

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the SQL query from the POST request
$sql_query = $_POST['query'];

// Execute the query
$result = $conn->query($sql_query);

if ($result) {
    // Jika hasilnya berupa tabel (SELECT)
    if ($result instanceof mysqli_result) {
        $output = "<table border='1'><tr>";
        while ($fieldinfo = $result->fetch_field()) {
            $output .= "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
        }
        $output .= "</tr>";

        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            foreach ($row as $col) {
                $output .= "<td>" . htmlspecialchars($col) . "</td>";
            }
            $output .= "</tr>";
        }
        $output .= "</table>";
    } else {
        // Jika kueri tidak menghasilkan tabel (INSERT, UPDATE, DELETE)
        $output = "Query executed successfully. Affected rows: " . $conn->affected_rows;
    }
} else {
    // Menampilkan pesan error jika kueri gagal
    $output = "Error: " . $conn->error;
}

// Mengembalikan hasil eksekusi atau error
echo $output;

// Menutup koneksi
$conn->close();
?>
