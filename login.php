<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link href="./static/css/style.css" rel="stylesheet" />
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "dbconnect.php";

    $stdID = $_POST["studID"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM Student WHERE stdID=\"$stdID\" AND passwd=\"$password\"";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $stdID = $row["stdID"];
            $name = $row["stdName"];
            $age = $row["age"];
            $doj = $row["DoJ"];
            $department = $row["department"];
            $mobileNumber = $row["mobileNo"];
            $email = $row["email"];
        }
    } else {
        $invalid_credentials = TRUE;
    }

    mysqli_close($conn);
}
?>

<body>
    <?php include "nav.php" ?>
    <script>
        document.querySelector('#login').classList.add('highlighted_link');
    </script>
    <main>
        <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
            <form action="<?php $_PHP_SELF ?>" method="POST" class="form">
                <div class="field-block">
                    <label for="studID">Student ID: </label>
                    <input type="text" placeholder="student ID" name="studID" id="studID" />
                </div>
                <div class="field-block">
                    <label for="password">Password: </label>
                    <input type="password" placeholder="password" name="password" id="password" />
                </div>

                <input type="submit" value="Login" class="btn" />
            </form>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !$invalid_credentials) { ?>
            <div class="form">
                <div class="field-block">
                    <span>ID: </span><strong><?php echo $stdID; ?></strong>
                </div>
                <div class="field-block">
                    <span>Name: </span><strong><?php echo $name; ?></strong>
                </div>
                <div class="field-block">
                    <span>Age: </span><strong><?php echo $age; ?></strong>
                </div>
                <div class="field-block">
                    <span>Date of Joining: </span><strong><?php echo $doj; ?></strong>
                </div>
                <div class="field-block">
                    <span>Department: </span><strong><?php echo $department; ?></strong>
                </div>
                <div class="field-block">
                    <span>Mobile Number: </span><strong><?php echo $mobileNumber; ?></strong>
                </div>
                <div class="field-block">
                    <span>Email: </span><strong><?php echo $email; ?></strong>
                </div>
            </div>
        <?php } elseif ($invalid_credentials) { ?>
            <main>
                <p class="message failure">INVALID CREDENTIALS</p>
            </main>
        <?php } ?>
    </main>

</body>

</html>