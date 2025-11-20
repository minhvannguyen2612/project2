<?php
$page_title = "Job Application | FutureTech Solutions";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="apply2.css">
</head>

<body>

<?php include "nav.inc"; ?>
<?php include "header.inc"; ?>

<h1>Job Application Form</h1>

<form action="submit_eoi.php" method="post">

    <p>
        <label for="job">Job Reference Number:</label>
        <input type="text" id="job" name="job" maxlength="5" required>
    </p>

    <p>
        <label for="givenname">First Name:</label>
        <input type="text" id="givenname" name="givenname" maxlength="20" required>
    </p>

    <p>
        <label for="familyname">Last Name:</label>
        <input type="text" id="familyname" name="familyname" maxlength="20" required>
    </p>

    <p>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="date" required>
    </p>

    <fieldset>
        <legend>Gender</legend>
        <input type="radio" id="male" name="Gender" value="Male" required>
        <label for="male">Male</label>

        <input type="radio" id="female" name="Gender" value="Female">
        <label for="female">Female</label>

        <input type="radio" id="other" name="Gender" value="Other">
        <label for="other">Other</label>
    </fieldset>

    <p>
        <label for="street">Street Address:</label>
        <input type="text" id="street" name="Street" maxlength="40" required>
    </p>

    <p>
        <label for="suburb">Suburb/Town:</label>
        <input type="text" id="suburb" name="Sub/Town" maxlength="40" required>
    </p>

    <p>
        <label for="state">State:</label>
        <select id="state" name="state" required>
            <option value="">-- Select --</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="NT">NT</option>
        </select>
    </p>

    <p>
        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="Post" maxlength="4" required>
    </p>

    <p>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
    </p>

    <p>
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
    </p>

    <fieldset>
        <legend>Skills</legend>

        <label><input type="checkbox" name="category[]" value="code"> HTML</label>
        <label><input type="checkbox" name="category[]" value="hs"> PHP</label>
        <label><input type="checkbox" name="category[]" value="3h"> JavaScript</label>
        <label><input type="checkbox" name="category[]" value="crm"> SQL</label>
        <label><input type="checkbox" name="category[]" value="mth"> Muay Thai</label>
    </fieldset>

    <p>
        <label for="other">Other Skills:</label>
        <textarea id="other" name="other" maxlength="200"></textarea>
    </p>

    <p>
        <input type="submit" value="Apply">
        <input type="reset" value="Reset">
    </p>

</form>

<?php include "footer.inc"; ?>

</body>
</html>
