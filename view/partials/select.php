<?php
    require_once "config/config.php";
    $sql = "SELECT * FROM users";
    $query_res = $connection->query($sql);
?>
<div class="container">
    <?php
        if ($query_res->num_rows > 0) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Name</th>";
            echo "<th>Age</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $query_res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>";
                echo "<a href='read.php?id=" . $row['id'] . "' class='btn btn-primary'>Read</a>";
                echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-info'>Update</a>";
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
            $connection->close();
    ?>
</div>