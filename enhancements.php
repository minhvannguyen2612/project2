<?php 
$page_title = "Enhancements";
include_once("header.inc");
include_once("nav.inc");
?>

<main class="container">

    <h1>Enhancements</h1>
    <p>
        This page lists the enhancements I implemented beyond the minimum assignment requirements.
        These improvements increase usability, readability, and the overall professionalism of the site.
    </p>

    <section class="enhancement-box">
        <h2>1. Responsive Navigation Bar</h2>
        <ul>
            <li>Implemented a fully responsive navigation bar using CSS Flexbox.</li>
            <li>The menu automatically adjusts layout on tablets and mobile screens.</li>
            <li>Hamburger icon appears on smaller screens for easy access.</li>
        </ul>
        <p><strong>Applied to:</strong> All pages (header.inc)</p>
    </section>

    <section class="enhancement-box">
        <h2>2. Real-Time Form Validation (JavaScript)</h2>
        <ul>
            <li>Added real-time validation for required fields in apply.php.</li>
            <li>Users are alerted instantly if fields such as email, phone, or job reference are incorrect.</li>
            <li>Enhances user experience and helps prevent invalid submissions.</li>
        </ul>
        <p><strong>Applied to:</strong> apply.php</p>
    </section>

    <section class="enhancement-box">
        <h2>3. Sortable and Filterable EOI Table</h2>
        <ul>
            <li>Manager can sort EOI entries by name, job reference, or status.</li>
            <li>Added filtering options: search by job reference or applicant name.</li>
            <li>This significantly improves data management efficiency.</li>
        </ul>
        <p><strong>Applied to:</strong> manage.php</p>
    </section>

    <section class="enhancement-box">
        <h2>4. Automatic Table Creation in MySQL</h2>
        <ul>
            <li>The EOI table is automatically created if it does not exist.</li>
            <li>Ensures the system works even on a fresh server installation.</li>
            <li>Makes the project more user-friendly and reduces setup time.</li>
        </ul>
        <p><strong>Applied to:</strong> process_eoi.php</p>
    </section>

    <section class="enhancement-box">
        <h2>5. Highlighting Active Menu Item</h2>
        <ul>
            <li>The current page is highlighted in the navigation bar.</li>
            <li>This makes it easier for users to know where they are on the website.</li>
        </ul>
        <p><strong>Applied to:</strong> nav.inc</p>
    </section>

</main>

<?php 
include_once("footer.inc");
?>
