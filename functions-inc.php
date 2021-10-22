<?php

function emptyInputSignup($username, $pwd, $pwdRepeat) {
    $result;
    if (empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
        header("location: ../signup.php?error=usernamecontainsspace");
        exit();
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username) {
    $sql2 = "SELECT * FROM users WHERE usersUid = ?;";
    $connection = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($connection, $sql2)) {
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($connection, "s", $username);
    mysqli_stmt_execute($connection);

    $resultData = mysqli_stmt_get_result($connection);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($connection);
}

function createUser($conn, $username, $pwd) {
    $sql3 = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
    $connection = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($connection, $sql3)) {
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($connection, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($connection);
    mysqli_stmt_close($connection);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=incorrectpassword");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists['usersId'];
        $_SESSION["useruid"] = $uidExists['usersUid'];
        header("location: ../comments.php");
        exit();
    }
}
?>