<?php
include 'header.inc';
include 'nav.inc';
require_once 'settings.php';
$conn = mysqli_connect($host, $user, $pass, $sql_db);
if (!$conn) {
    echo "<main><h1>Available Job Listings</h1>";
    echo "<p style='color:red;'>Database connection failed: " . htmlspecialchars(mysqli_connect_error()) . "</p></main>";
    include 'footer.inc';
    exit;
}

$query = "SELECT job_ref, title, short_description, requirements, location, posted_date FROM jobs ORDER BY posted_date DESC";
$result = mysqli_query($conn, $query);
?>
<main>
  <h1>Available Job Listings</h1>

  <?php
  if ($result === false) {
      echo "<p style='color:red;'>Query error: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
  } else if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         
          $title = htmlspecialchars($row['title']);
          $ref = htmlspecialchars($row['job_ref']);
          $short = htmlspecialchars($row['short_description']);
          $req = htmlspecialchars($row['requirements']);
          $loc = htmlspecialchars($row['location']);
          $posted = htmlspecialchars($row['posted_date']);

          echo "<article class='job-card'>";
          echo "<h2>{$title} ({$ref})</h2>";
          echo "<p><strong>Description:</strong> {$short}</p>";
          echo "<p><strong>Requirements:</strong> {$req}</p>";
          echo "<p><strong>Location:</strong> {$loc}</p>";
          echo "<p><strong>Posted date:</strong> {$posted}</p>";
          // Link to apply page with preselected job_ref
          echo "<p><a class='btn' href='apply.php?job_ref=" . urlencode($row['job_ref']) . "'>Apply Now</a></p>";
          echo "<hr>";
          echo "</article>";
      }
  } else {
      echo "<p>No jobs found.</p>";
  }


  mysqli_free_result($result);
  mysqli_close($conn);
  ?>

</main>

<?php
include 'footer.inc';
?>
