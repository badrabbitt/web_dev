<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hanoi Marathon 2024 - Marathon Entry</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login-.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/Responsive-Form-Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <nav class="navbar navbar-expand bg-light navigation-clean navbar-light">
        <div class="container"><a class="navbar-brand" href="#">Hanoi Marathon 2024</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="/admin">For the Organizing Committee</a></div>
        </div>
    </nav>
    <div class="container">
        <div>
            <form method="POST" action="entry.php">
                <div class="form-group mb-3">
                    <div class="title-div">
                        <h1 style="text-align: center">Choose a Marathon</h1>
                    </div>
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:24px;"><strong>Name </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
        <input class="form-control" type="text" name="name" placeholder="Name" required value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>" readonly />
    </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:24px;"><strong>User ID</strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
        <input class="form-control" type="text" name="userID" placeholder="" value="<?php echo isset($_GET['userID']) ? htmlspecialchars($_GET['userID']) : ''; ?>" readonly />
    </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:24px;"><strong>Marathon ID</strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1" style="font-family: Roboto, sans-serif;">
    <select id="marathon_id" class="form-select" style="font-family: Roboto, sans-serif;" name="marathon_id" required>
        <optgroup label="Marathon Options">

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

            // Truy vấn để lấy dữ liệu từ bảng "marathon"
            $query = "SELECT MarathonID, Race FROM marathon";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Tạo tùy chọn cho mỗi dòng dữ liệu
                    echo "<option value='" . $row['MarathonID'] . "'>" . $row['Race'] . "</option>";
                }
            }

            // Đóng kết nối
            $conn->close();
            ?>

        </optgroup>
    </select>
</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:24px;"><strong>Hotel</strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input id="hotel" name="hotel" class="form-control" type="hotel" style="margin-left: 0px;font-family: Roboto, sans-serif;" required /></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-12 col-md-4 offset-md-4"><button class="btn btn-light btn-lg" style="font-family:Roboto, sans-serif;" type="reset">Clear </button><button class="btn btn-light btn-lg" style="margin-left:16px;" type="submit">Submit </button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/Bootstrap-DataTables-main.js"></script>
    <script src="assets/js/Table-With-Search-search-table.js"></script>
</body>

</html>