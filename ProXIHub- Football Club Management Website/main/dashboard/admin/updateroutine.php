<?php
require '../../include/db_conn.php';
page_protect();

class Routine {
    private $con;
    private $timetableId;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;

    public function __construct($con, $timetableId, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday) {
        $this->con = $con;
        $this->timetableId = $timetableId;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;
    }

    public function updateRoutine() {
        $sql = "UPDATE timetable SET day1='$this->monday', day2='$this->tuesday', day3='$this->wednesday', day4='$this->thursday', day5='$this->friday', day6='$this->saturday', day7='$this->sunday' WHERE tid='$this->timetableId'";

        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            throw new Exception('Routine Update Failed: ' . mysqli_error($this->con));
        }
    }
}

try {
    $routine = new Routine($con, $_POST['tid'], $_POST['day1'], $_POST['day2'], $_POST['day3'], $_POST['day4'], $_POST['day5'], $_POST['day6'], $_POST['day7']);
    $routine->updateRoutine();
    echo "<head><script>alert('Routine Updated Successfully');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=viewroutine.php'>";
} catch (Exception $e) {
    echo "<head><script>alert('".$e->getMessage()."');</script></head></html>";
}
?>

