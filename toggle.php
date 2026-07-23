<?php

include "db.php";

if (isset($_POST["id"])) {

    $id = $_POST["id"];

    $stmt = $conn->prepare(
        "UPDATE users
         SET status = IF(status = 0, 1, 0)
         WHERE id = ?"
    );

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $conn->query(
        "SELECT status FROM users WHERE id = $id"
    );

    $row = $result->fetch_assoc();

    echo $row["status"];
}

?>