<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "log system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get data
$sql = "SELECT * FROM school_qr";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD']=="POST")
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log Table</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="todaystables.css">
<link rel="stylesheet" href="logo.css">
<script src="ind.js" defer></script>
</head>
<body>
<input type="checkbox" id="menu-toggle">
<label for="menu-toggle" class="toggle">
    <span class="top_line"></span>
    <span class="middle_line"></span>
    <span class="bottom_line"></span>
</label>
<nav>
        <div class="slide">
            <h1>Menu</h1>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                <li class="menu-item-has-children">
                    <a href="#" class="toggle-submenu">
                        <i class="fas fa-table"></i>Tables <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="tables.php"><i class="fas fa-list"></i>Today's Logins</a></li>
                        <li><a href="recent tables.php"><i class="fas fa-th"></i>Recent Tables</a></li>
                    </ul>
                    </li>
                <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
            </ul>
        </div>
    </nav>

<div class="Logo">
    <img src="logo.png" alt="Profile Picture">
</div>

<div class="table-container">
    <h1>TODAY'S LOGIN</h1>

    <div class="table-body-scroll">
        <table>
            <thead>
                <tr>
                    <th>USN</th>
                    <th>FIRST NAME</th>
                    <th>MIDDLE NAME</th>
                    <th>LAST NAME</th>
                    <th>GRADE</th>
                    <th>STRAND</th>
                    <th>DATE</th>
                    <th>IN</th>
                    <th>OUT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Usn_id']}</td>
                            <td>{$row['First Name']}</td>
                            <td>{$row['Middle Name']}</td>
                            <td>{$row['Last Name']}</td>
                            <td>{$row['Grade']}</td>
                            <td>{$row['Strand']}</td>
                            <td>{$row['Date']}</td>
                            <td>{$row['Student_In']}</td>
                            <td>{$row['Student_Out']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
