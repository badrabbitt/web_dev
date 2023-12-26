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
// Lấy dữ liệu từ form
$passport_no = $_POST["passport_no"];

// Kiểm tra xem dữ liệu có tồn tại trong cột passport của bảng user hay không
$sql = "SELECT * FROM user WHERE passport = '$passport_no'";
$result = mysqli_query($conn, $sql);

// Nếu tồn tại
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Lấy dữ liệu cần thiết
    $userID = $row["userID"];
    $name = $row["name"];

    // Chuyển đến trang marathon_entry.php với tham số truyền đi
    header("Location: marathon_entry.php?userID=$userID&name=$name");
} else {
    // Chuyển đến trang user_entry.html
    header("Location: user_entry.html");
}

?>