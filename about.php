<?php
$page_title = "About Us | FutureTech Solutions";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="about2.css">
</head>

<body>

<?php include "nav.inc"; ?>
<?php include "header.inc"; ?>

<h1>About Our Group</h1>

<section>
    <h2>Group Name & Members</h2>
    <p><strong>Group Name:</strong> Code Warriors</p>

    <ul class="group-members">
        <li>Nguyen Van Minh <span class="student-id">SWH02820</span></li>
        <li>Do Dinh Phu <span class="student-id">SWH02347</span></li>
    </ul>
</section>

<section>
    <h2>Skills</h2>
    <ul class="skills-list">
        <li>Technical Skills
            <ul>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
            </ul>
        </li>
        <li>Soft Skills
            <ul>
                <li>Teamwork</li>
                <li>Communication</li>
                <li>Creativity</li>
            </ul>
        </li>
    </ul>
</section>

<section>
    <h2>Tutor</h2>
    <p><strong>Tutor Name:</strong> Nguyen Thuy Linh</p>
</section>

<section>
    <h2>Members Contribution</h2>
    <dl>
        <dt>Nguyen Van Minh</dt>
        <dd>Home Page and Position Description</dd>

        <dt>Do Dinh Phu</dt>
        <dd>Application Page and About Page</dd>
    </dl>
</section>

<section>
    <h2>Group Photo</h2>
    <figure>
        <img src="images/index1.jpg" width="300" alt="Group Photo">
        <figcaption>Our Group Photo</figcaption>
    </figure>
</section>

<section>
    <h2>Members Interests</h2>

    <table>
        <caption>Group Interests</caption>
        <tr>
            <th>Name</th>
            <th colspan="2">Interests</th>
        </tr>

        <tr>
            <td>Nguyen Van Minh</td>
            <td>Music</td>
            <td>Gaming</td>
        </tr>

        <tr>
            <td>Do Dinh Phu</td>
            <td colspan="2">Reading & Coding</td>
        </tr>
    </table>
</section>

<?php include "footer.inc"; ?>

</body>
</html>
