<?php
// Kết nối đến cơ sở dữ liệu (sử dụng MySQLi hoặc PDO)
$servername = "localhost";
$username = "root";
$password = "";
$database = "marathon_hanoi";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$date_start_race = $_POST['date_start_race'];

// Chuẩn bị câu truy vấn SQL để chèn dữ liệu
$query = "INSERT INTO marathon (race, date) VALUES ('$name', '$date_start_race')";

if ($conn->query($query) === TRUE) {
    echo "Thêm dữ liệu thành công";
    header("Location: list_marathon.php");
} else {
    echo "Lỗi: " . $query . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
