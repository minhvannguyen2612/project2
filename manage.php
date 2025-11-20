<?php
require_once("settings.php"); 


$conn = mysqli_connect($host, $user, $pass, $sql_db);

if (!$conn) {
    die("<h2>Database connection failed.</h2>");
}

if (isset($_POST["delete_jobref"])) {
    $jr = mysqli_real_escape_string($conn, $_POST["delete_jobref"]);
    $delete_sql = "DELETE FROM eoi WHERE job_reference='$jr'";
    $result = mysqli_query($conn, $delete_sql);
    $msg = "Deleted all EOIs with Job Reference: $jr";
}

if (isset($_POST["update_id"]) && isset($_POST["update_status"])) {
    $id = intval($_POST["update_id"]);
    $status = mysqli_real_escape_string($conn, $_POST["update_status"]);
    $update_sql = "UPDATE eoi SET status='$status' WHERE EOInumber=$id";
    mysqli_query($conn, $update_sql);
    $msg = "Updated Status for EOI #$id";
}

$where = "1"; 
$order = "EOInumber ASC";

if (isset($_GET["sort"])) {
    $allowed = ["EOInumber","job_reference","first_name","last_name","status"];
    if (in_array($_GET["sort"], $allowed)) {
        $order = $_GET["sort"] . " ASC";
    }
}

if (!empty($_GET["search_jobref"])) {
    $jr = mysqli_real_escape_string($conn, $_GET["search_jobref"]);
    $where = "job_reference LIKE '%$jr%'";
}

if (!empty($_GET["search_first"]) || !empty($_GET["search_last"])) {
    $fn = mysqli_real_escape_string($conn, $_GET["search_first"]);
    $ln = mysqli_real_escape_string($conn, $_GET["search_last"]);

    $conditions = [];
    if ($fn != "") $conditions[] = "first_name LIKE '%$fn%'";
    if ($ln != "") $conditions[] = "last_name LIKE '%$ln%'";

    $where = implode(" AND ", $conditions);
}

$sql = "SELECT * FROM eoi WHERE $where ORDER BY $order";
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<?php include "nav.inc"; ?>
<?php include "header.inc"; ?>

<h1>EOI Management</h1>

<?php if (!empty($msg)) echo "<p><strong>$msg</strong></p>"; ?>

<section>
    <h2>Search by Job Reference</h2>
    <form method="get">
        <input type="text" name="search_jobref" placeholder="e.g. DEV01">
        <button type="submit">Search</button>
    </form>
</section>

<section>
    <h2>Search by Applicant Name</h2>
    <form method="get">
        <input type="text" name="search_first" placeholder="First Name">
        <input type="text" name="search_last" placeholder="Last Name">
        <button type="submit">Search</button>
    </form>
</section>

<section>
    <h2>Delete EOIs for a Job</h2>
    <form method="post">
        <input type="text" name="delete_jobref" placeholder="Job Ref" required>
        <button type="submit">Delete</button>
    </form>
</section>

<section>
<h2>EOI Records</h2>

<p>Sort by:
    <a href="?sort=EOInumber">ID</a> |
    <a href="?sort=job_reference">Job Ref</a> |
    <a href="?sort=first_name">First Name</a> |
    <a href="?sort=last_name">Last Name</a> |
    <a href="?sort=status">Status</a>
</p>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Job Ref</th>
        <th>Name</th>
        <th>Email</th>
        <th>State</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Update</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
        <td><?= $row["EOInumber"] ?></td>
        <td><?= $row["job_reference"] ?></td>
        <td><?= $row["first_name"] . " " . $row["last_name"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["state"] ?></td>
        <td><?= $row["phone"] ?></td>
        <td><?= $row["status"] ?></td>

        <td>
            <form method="post" style="display:flex; gap:5px;">
                <input type="hidden" name="update_id" value="<?= $row["EOInumber"] ?>">

                <select name="update_status">
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>
                </select>

                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
<?php endwhile; ?>

</table>
</section>

<?php include "footer.inc"; ?>

</body>
</html>
