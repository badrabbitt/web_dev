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

// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $userID = $_POST["userID"];
    // $passport_no = $_POST["passport_no"];
    $marathon_id = $_POST["marathon_id"];
    $hotel = $_POST["hotel"];

    // Kiểm tra và thêm dữ liệu vào bảng participate
    $sql_insert_participate = "INSERT INTO participate (userID, MarathonID, hotel) VALUES (
        (SELECT userID FROM user WHERE userID = '$userID'),
        '$marathon_id',
        '$hotel'
    )";

    if ($conn->query($sql_insert_participate) === TRUE) {
        echo "Dữ liệu đã được thêm thành công!";
        // Thực hiện các hành động khác sau khi thêm dữ liệu
        header("Location: index.html");
    } else {
        echo "Error: " . $sql_insert_participate . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

