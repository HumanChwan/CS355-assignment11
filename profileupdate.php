<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Profile Update</title>
    <link rel="stylesheet" href="./static/css/style.css" />
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "dbconnect.php";

    $stdID = $_POST["studID"];
    $password = $_POST["password"];

    $authenticated = $_POST["authenticated"];

    $mobileNumber = $_POST["mobno"];
    $email = $_POST["email"];

    if ($authenticated) {
        if (!$mobileNumber && !$email) {
            die("Nothing to be updated");
        }
        $authenticated = FALSE;

        $sql = "UPDATE Student SET "
            . ($mobileNumber ? "mobileNo = \"$mobileNumber\"," : '')
            . ($email ? "email = \"$email\"," : '');
        $sql = substr($sql, 0, -1);
        $sql = $sql . " WHERE stdID=\"$stdID\" AND passwd=\"$password\";";

        if (mysqli_query($conn, $sql)) {
            $updated = TRUE;
        } else {
            echo "<script>alert(`ERROR: " . mysqli_error($conn) . "`);</script>";
        }
    } else {
        $sql = "SELECT * FROM Student WHERE stdID=\"$stdID\" AND passwd=\"$password\"";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $authenticated = TRUE;
            while ($row = $result->fetch_assoc()) {
                $mobileNumber = $row["mobileNo"];
                $email = $row["email"];
            }
        }
    }

    mysqli_close($conn);
}
?>

<body>
    <?php include "nav.php" ?>
    <script>
        document.querySelector('#update').classList.add('highlighted_link');
    </script>
    <main>
        <?php if (!$updated) { ?>
            <form action="<?php $_PHP_SELF ?>" method="POST" class="form">
            <?php } ?>
            <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
                <div class="field-block">
                    <label for="studID">Student ID: </label>
                    <input type="text" placeholder="student ID" name="studID" id="studID" />
                </div>
                <div class="field-block">
                    <label for="password">Password: </label>
                    <input type="password" placeholder="password" name="password" id="password" />
                </div>
            <?php } ?>
            <?php if ($authenticated) { ?>
                <input type="text" hidden name="studID" value="<?php echo $stdID; ?>" />
                <input type="password" hidden name="password" value="<?php echo $password; ?>" />
                <input type="checkbox" checked hidden name="authenticated" />
                <div class="field-block">
                    <label for="mobile number">Mobile No.: </label>
                    <input type="text" placeholder="mobile number" name="mobno" id="mobile number" value="<?php echo $mobileNumber; ?>" />
                </div>
                <div class=" field-block">
                    <label for="Email">Email: </label>
                    <input type="email" placeholder="email" name="email" id="Email" value="<?php echo $email; ?>" />
                </div>
            <?php } ?>

            <?php if (!$updated) { ?>
                <input type="submit" value="Submit" class="btn" />
            </form>
        <?php } else { ?>
            <p class="message success">UPDATED User!</p>
        <?php } ?>
    </main>
</body>

</html>