<?php
//require_once("db.php");
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

// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $entryNO = $_POST["entryNO"];
    $time_record = $_POST["time_record"];
    $standings = $_POST["Standings"];

    // Cập nhật dữ liệu trong cơ sở dữ liệu
    $sql = "UPDATE participate SET Time = '$time_record', Standings = '$standings' WHERE EntryNO = $entryNO";

    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được cập nhật thành công.";
        header("Location: list_participate.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
