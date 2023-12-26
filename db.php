<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "marathon_hanoi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

//echo "Kết nối thành công";

// Nếu bạn đã xử lý xong công việc với cơ sở dữ liệu, đừng quên đóng kết nối
//$conn->close();
?>