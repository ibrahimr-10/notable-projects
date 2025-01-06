<?php
require '../../include/db_conn.php';

class User {
    private $con;
    private $loginKey;
    private $password;
    private $loginId;
    private $passwordConfirm;

    public function __construct($con, $loginKey, $password, $loginId, $passwordConfirm) {
        $this->con = $con;
        $this->loginKey = $loginKey;
        $this->password = $password;
        $this->loginId = $loginId;
        $this->passwordConfirm = $passwordConfirm;
    }

    public function updateProfile() {
        if ($this->password != $this->passwordConfirm) {
            throw new Exception('Confirm Password does not match. Change Unsuccessful.');
        }

        if (empty($this->loginId) || empty($this->password) || empty($this->loginKey)) {
            throw new Exception('All fields are required. Change Unsuccessful.');
        }

        $sql = "SELECT * FROM admin WHERE username='$this->loginId'";
        $result = mysqli_query($this->con, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            mysqli_query($this->con, "UPDATE admin SET password='$this->password', securekey='$this->loginKey' WHERE username='$this->loginId'");
        } else {
            throw new Exception('User not found. Change Unsuccessful.');
        }
    }
}

try {
    $user = new User($con, $_POST['login_key'], $_POST['pwfield'], $_POST['login_id'], $_POST['confirmfield']);
    $user->updateProfile();
    echo "<html><head><script>alert('Profile Updated successfully. Please login again.');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
} catch (Exception $e) {
    echo "<html><head><script>alert('".$e->getMessage()."');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=change_pwd.php'>";
}
?>




