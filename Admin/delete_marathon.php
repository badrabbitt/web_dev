<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marathon_hanoi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem có MarathonID được gửi từ yêu cầu POST hay không
if (isset($_POST['marathonID'])) {
    $marathonID = $_POST['marathonID'];

    // Thực hiện truy vấn xóa
    $deleteQuery = "DELETE FROM marathon WHERE MarathonID = $marathonID";
    if ($conn->query($deleteQuery) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
