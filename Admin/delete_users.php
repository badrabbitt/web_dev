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

// Xóa user dựa vào ID
if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];

    $sql = "DELETE FROM user WHERE userID = $userID";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
