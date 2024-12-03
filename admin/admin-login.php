<?php 
session_start();

if (isset($_POST['uname']) && 
    isset($_POST['pass'])) {

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if (empty($uname)) {
        $em = "User name is required";
        header("Location: ../admin-login.php?error=$em&$data");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../admin-login.php?error=$em&$data");
        exit;
    } else {

        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            $username = $user['username'];
            $password = $user['password'];
            $id = $user['id'];

            // Comparamos directamente sin cifrar
            if ($username === $uname && $password === $pass) {
                $_SESSION['admin_id'] = $id;
                $_SESSION['username'] = $username;

                header("Location: users.php");
                exit;
            } else {
                $em = "Incorrect User name or password";
                header("Location: ../admin-login.php?error=$em&$data");
                exit;
            }

        } else {
            $em = "Incorrect User name or password";
            header("Location: ../admin-login.php?error=$em&$data");
            exit;
        }
    }

} else {
    header("Location: ../login.php?error=error");
    exit;
}
