<?php
// === Database Settings ===
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "futuretech";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// === Helper function ===
function get_post($key, $default = '') {
    return isset($_POST[$key]) && $_POST[$key] !== '' ? trim($_POST[$key]) : $default;
}

// === Collect Form Inputs ===
$job        = get_post('job');
$givenname  = get_post('givenname');
$familyname = get_post('familyname');
$dob        = get_post('date');
$gender     = get_post('Gender');
$street     = get_post('Street');
$suburb     = get_post('Sub/Town');
$state      = get_post('state');
$postcode   = get_post('Post');
$email      = get_post('email');
$phone      = get_post('phone');
$other      = get_post('other');

// === Skill Fields (default No = 0) ===
$php        = 0;
$javascript = 0;
$sql_skill  = 0;
$html       = 0;
$muay_thai  = 0;

if (!empty($_POST['category']) && is_array($_POST['category'])) {
    foreach ($_POST['category'] as $skill) {
        if ($skill === "hs")   $php        = 1;        // PHP
        if ($skill === "3h")   $javascript = 1;        // JavaScript
        if ($skill === "crm")  $sql_skill  = 1;        // SQL
        if ($skill === "code") $html       = 1;        // HTML
        if ($skill === "mth")  $muay_thai  = 1;        // Muay Thai
    }
}


// === Validation ===
$errors = [];
if ($job === '')        $errors[] = "Job reference is required.";
if ($givenname === '')  $errors[] = "First name is required.";
if ($familyname === '') $errors[] = "Last name is required.";
if ($dob === '')        $errors[] = "Date of birth is required.";
if ($gender === '')     $errors[] = "Gender is required.";
if ($email === '')      $errors[] = "Email is required.";
if ($phone === '')      $errors[] = "Phone is required.";

if (!empty($errors)) {
    echo "<h2>Form submission errors:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    exit;
}

// === Prepare INSERT SQL ===
$sql = "INSERT INTO eoi 
    (job_reference, first_name, last_name, dob, gender, street, suburb, state, postcode, email, phone,
     php, javascript, sql_skill, html, muay_thai, other_skills, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// === Bind Parameters ===
// 11 strings + 5 integers + 1 string = 17 params
$stmt->bind_param(
    "sssssssssssiiiiis",
    $job, $givenname, $familyname, $dob, $gender,
    $street, $suburb, $state, $postcode, $email, $phone,
    $php, $javascript, $sql_skill, $html, $muay_thai,
    $other
);


// === Execute ===
if ($stmt->execute()) {
    echo "<h2>EOI Submitted Successfully!</h2>";
    echo "<p>Your reference number is: " . $stmt->insert_id . "</p>";
} else {
    echo "<h2>Error submitting EOI</h2>";
    echo htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>


