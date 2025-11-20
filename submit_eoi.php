<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

require_once("settings.php"); 

$conn = @mysqli_connect($host, $user, $pass, $sql_db);


if (!$conn) {
    die("<h2>Database connection failed</h2>");
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

$job        = clean($_POST["job"] ?? "");
$givenname  = clean($_POST["givenname"] ?? "");
$familyname = clean($_POST["familyname"] ?? "");
$dob        = clean($_POST["date"] ?? "");
$gender     = clean($_POST["Gender"] ?? "");
$street     = clean($_POST["Street"] ?? "");
$suburb     = clean($_POST["Sub/Town"] ?? "");
$state      = clean($_POST["state"] ?? "");
$postcode   = clean($_POST["Post"] ?? "");
$email      = clean($_POST["email"] ?? "");
$phone      = clean($_POST["phone"] ?? "");
$other      = clean($_POST["other"] ?? "");

// ===== Skills logic =====
$skill1 = $skill2 = $skill3 = $skill4 = $skill5 = 0;

if (!empty($_POST["category"])) {
    foreach ($_POST["category"] as $s) {
        if ($s == "code") $skill1 = 1;      
        if ($s == "hs")   $skill2 = 1;      
        if ($s == "3h")   $skill3 = 1;     
        if ($s == "crm")  $skill4 = 1;      
        if ($s == "mth")  $skill5 = 1;      
    }
}

$errors = [];

if ($job == "")        $errors[] = "Job reference is required";
if ($givenname == "" || !preg_match("/^[a-zA-Z]{1,20}$/", $givenname))
    $errors[] = "First name must be alphabetic and ≤ 20 characters";

if ($familyname == "" || !preg_match("/^[a-zA-Z]{1,20}$/", $familyname))
    $errors[] = "Last name must be alphabetic and ≤ 20 characters";

if ($dob == "")        $errors[] = "Date of birth required";

if ($gender == "")     $errors[] = "Gender required";

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = "Invalid email format";

if (!preg_match("/^[0-9 ]{8,12}$/", $phone))
    $errors[] = "Phone must be 8–12 digits";

if (!preg_match("/^[0-9]{4}$/", $postcode))
    $errors[] = "Postcode must be exactly 4 digits";

$state_ranges = [
    "VIC" => ["3"],
    "NSW" => ["1","2"],
    "QLD" => ["4","9"],
    "NT"  => ["0"],
    "WA"  => ["6"],
    "SA"  => ["5"],
    "TAS" => ["7"],
    "ACT" => ["0"]
];

$pc_first = substr($postcode, 0, 1);
if (!in_array($pc_first, $state_ranges[$state])) {
    $errors[] = "Postcode does not match the selected state";
}
if (count($errors) > 0) {
    echo "<h2>Invalid Submission</h2><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul>";
    exit();
}
$create_sql = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference VARCHAR(5),
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    dob VARCHAR(20),
    gender VARCHAR(10),
    street VARCHAR(40),
    suburb VARCHAR(40),
    state VARCHAR(5),
    postcode VARCHAR(4),
    email VARCHAR(40),
    phone VARCHAR(20),
    skill1 TINYINT,
    skill2 TINYINT,
    skill3 TINYINT,
    skill4 TINYINT,
    skill5 TINYINT,
    other_skills TEXT,
    status VARCHAR(10)
);
";

mysqli_query($conn, $create_sql);

$insert_sql = "
INSERT INTO eoi
(job_reference, first_name, last_name, dob, gender, street, suburb, state, postcode, email, phone,
 skill1, skill2, skill3, skill4, skill5, other_skills, status)
VALUES 
(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 'New')
";

$stmt = mysqli_prepare($conn, $insert_sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssiiiiiis",
    $job, $givenname, $familyname, $dob, $gender,
    $street, $suburb, $state, $postcode, $email, $phone,
    $skill1, $skill2, $skill3, $skill4, $skill5,
    $other
);

mysqli_stmt_execute($stmt);

$eoi_number = mysqli_insert_id($conn);

echo "<h2>EOI Submitted Successfully!</h2>";
echo "<p>Your EOI number is: <strong>$eoi_number</strong></p>";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
