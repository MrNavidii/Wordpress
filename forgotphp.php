<?php
class Start {
    private $connection;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $datadb = 'wordpress';

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->datadb);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function authenticate($name, $role, $inputPassword) {
        $stmt = $this->connection->prepare("SELECT password FROM wp_login WHERE name = ? AND pish = ?");
        $stmt->bind_param("ss", $name, $role);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            // Verify the password
            if (password_verify($inputPassword, $hashedPassword)) {
                return $hashedPassword; 
            } else {
                return false; 
            }
        }

        $stmt->close();
        return false; 
    }

    public function updatePassword($name, $role, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->connection->prepare("UPDATE wp_login SET password = ? WHERE name = ? AND pish = ?");
        $stmt->bind_param("sss", $hashedPassword, $name, $role);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false; 
        }
    }
    public function checkUserExists($name, $role) {
        $stmt = $this->connection->prepare("SELECT * FROM wp_login WHERE name = ? AND pish = ?");
        $stmt->bind_param("ss", $name, $role);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    public function getConnect() {
        return $this->connection;
    }
}

if (isset($_GET['pish']) && isset($_GET['name']) && isset($_GET['action'])) {
    $roles = ["manager", "deputy", "Moderator", "secretary", "janitor", "student"];
    $connection = new Start();

    if ($_GET['action'] == 'update_password') {
        $name = $_GET['name'];
        $role = $_GET['pish'];
        $newPassword = $_GET['password'];

        // Check if user exists before updating the password
        if ($connection->checkUserExists($name, $role)) {
            $result = $connection->updatePassword($name, $role, $newPassword);
            if ($result) {
                header("Location: loginhtml.php");
            } else {
                echo "Failed to update password.";
            }
        } else {
            echo "User not found.";
        }
    }
}
$roles = ["manager", "deputy", "Moderator", "secretary", "janitor", "student"];
?>
