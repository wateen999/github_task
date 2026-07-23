<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];

    $stmt = $conn->prepare(
        "INSERT INTO users (name, age, status) VALUES (?, ?, 0)"
    );

    $stmt->bind_param("si", $name, $age);

    $stmt->execute();

    $stmt->close();

    header("Location: index.php");

    exit();
}

?>