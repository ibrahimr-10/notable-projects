<?php
require '../../include/db_conn.php';
page_protect();

class Routine {
    private $con;
    private $routineName;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;

    public function __construct($con, $routineName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday) {
        $this->con = $con;
        $this->routineName = $routineName;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;
    }

    public function addRoutine() {
        $sql = "INSERT INTO timetable(tname, day1, day2, day3, day4, day5, day6, day7) VALUES ('$this->routineName', '$this->monday', '$this->tuesday', '$this->wednesday', '$this->thursday', '$this->friday', '$this->saturday', '$this->sunday')";

        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            throw new Exception('Routine Added Failed: ' . mysqli_error($this->con));
        }
    }
}

try {
    $routine = new Routine($con, $_POST["rname"], $_POST["day1"], $_POST["day2"], $_POST["day3"], $_POST["day4"], $_POST["day5"], $_POST["day6"], $_POST["day7"]);
    $routine->addRoutine();
    echo "<head><script>alert('Routine Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=addroutine.php'>";
} catch (Exception $e) {
    echo "<head><script>alert('".$e->getMessage()."');</script></head></html>";
}
?>
