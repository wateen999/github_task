<?php

include "db.php";

$result = $conn->query("SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>User Management</h1>

    <!-- Add User Form -->
    <form action="add.php" method="POST">

        <input
            type="text"
            name="name"
            placeholder="Enter Name"
            required
        >

        <input
            type="number"
            name="age"
            placeholder="Enter Age"
            required
        >

        <button type="submit">
            Submit
        </button>

    </form>


    <!-- Users Table -->

    <table>

        <thead>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Age</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

        </thead>


        <tbody>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <tr id="row-<?php echo $row['id']; ?>">

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['name']); ?>
                </td>

                <td>
                    <?php echo $row['age']; ?>
                </td>

                <td class="status">
                    <?php echo $row['status']; ?>
                </td>

                <td>

                    <button
                        class="toggle-btn"
                        onclick="toggleStatus(<?php echo $row['id']; ?>)"
                    >
                        Toggle
                    </button>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>


<script src="script.js"></script>

</body>

</html>