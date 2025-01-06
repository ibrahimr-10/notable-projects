<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];

if (empty($msgid)) {
    echo "<html><head><script>alert('ERROR! Routine was not deleted');</script></head></html>";
    exit;
}

$query = "DELETE FROM timetable WHERE tid='$msgid'";

if(mysqli_query($con, $query)) {
    echo "<html><head><script>alert('Routine Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=editroutine.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Routine was not deleted');</script></head></html>";
    echo "error".mysqli_error($con);
}
?>
