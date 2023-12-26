<?php
//require_once("db.php");

$servername = "localhost";
$username = "root";
$password = "";
$database = "marathon_hanoi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);


// Lấy dữ liệu từ form
$name = $_POST['name'];
$bestRecord = $_POST['best_record'];
$nation = $_POST['nation'];
$passportNo = $_POST['passport_no'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Chuẩn bị truy vấn SQL để thêm dữ liệu mới
$query = "INSERT INTO user (name, bestRecord, nationality, passport, sex, age, email, phone, address) 
          VALUES ('$name', '$bestRecord', '$nation', '$passportNo', '$sex', '$age', '$email', '$phone', '$address')";

if ($conn->query($query) === TRUE) {
      // Lấy UserID cuối cùng
    $userID = $conn->insert_id;

    // Tạm ngừng thực thi trong 3 giây
    // Hiển thị thông báo và chuyển hướng bằng JavaScript
    echo "<script>
    setTimeout(function() {
        window.location.href = 'marathon_entry.php?userID=$userID&name=$name';
    }, 1500);
    </script>";
} else {
    echo "Lỗi: " . $query . "<br>" . $conn->error;
}

?>