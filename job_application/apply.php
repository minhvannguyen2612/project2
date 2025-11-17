<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Application | FutureTech Solutions</title>
  <link rel="stylesheet" href="apply2.css" />
  <!-- Font Awesome for icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
</head>
<body>
  <!-- ===== Navigation Bar ===== -->
  <nav class="nav">
    <img src="image/logo.png.jpg" alt="FutureTech Logo" class="nav__logo" />
    <div class="nav__search">
      <input type="text" placeholder="Search jobs..." />
      <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
  </nav>

  <!-- ===== Header Menu ===== -->
  <header class="header">
    <ul class="header__list">
      <li class="header__item"><a href="index.html">Home</a></li>
      <li class="header__item"><a href="about.html">About</a></li>
      <li class="header__item"><a href="job.html">Careers</a></li>
      <li class="header__item"><a href="apply.html">Apply</a></li>
    </ul>
  </header>

  <!-- ===== Application Form ===== -->
  <form action="submit_eoi.php" method="post">
    <h1>Job Application</h1>
    <p>
      You go here to apply for a job. We have various jobs for you to do, the salaries and skillset of each will vary.<br>
      Apply for the one that suits you.
    </p>

    <p>
      <label for="job">Job Reference number</label> 
      <select name="job" id="job" required>
        <option value="">Please Select</option>      
        <option value="Engineer">Engineer (01)</option>
        <option value="SftDv">Software Developer (02)</option>
        <option value="Maintenance">Maintenance (03)</option>
        <option value="Management">Management (04)</option>
        <option value="Janitor">Janitor (05)</option>
        <option value="Security">Security (06)</option>
      </select>
    </p>

    <p>
      <label for="givenname">First Name</label> 
      <input type="text" maxlength="20" name="givenname" id="givenname" required/>
    </p>  

    <p>
      <label for="familyname">Last Name</label> 
      <input type="text" maxlength="20" name="familyname" id="familyname" required/>
    </p>

    <p>
      <label for="date">Date of birth</label> 
      <input type="date" name="date" id="date" required/>
    </p>

    <fieldset>
      <legend>Gender</legend> 
      <p>
        <label for="Male">Male</label> 
        <input type="radio" id="Male" name="Gender" value="male" required/>
        <label for="Female">Female</label> 
        <input type="radio" id="Female" name="Gender" value="female"/>
      </p>
    </fieldset>

    <fieldset>
      <legend>Address</legend>
      <p>
        <label for="Street">Street Address</label> 
        <input type="text" maxlength="40" name="Street" id="Street" required/>
      </p>  

      <p>
        <label for="Sub/Town">Suburb/Town</label> 
        <input type="text" maxlength="40" name="Sub/Town" id="Sub/Town" required/>
      </p>  

      <p>
        <label for="state">State</label> 
        <select name="state" id="state" required>
          <option value="">Please Select</option>      
          <option value="VIC">VIC</option>
          <option value="NSW">NSW</option>
          <option value="QLD">QLD</option>
          <option value="NT">NT</option>
          <option value="WA">WA</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="ACT">ACT</option>
        </select>
      </p>

      <p>
        <label for="Post">Postcode</label> 
        <input type="text" maxlength="4" name="Post" id="Post" required/>
      </p>
    </fieldset>

    <fieldset>
      <legend>Contacts</legend>
      <p>
        <label for="email">Email Address</label> 
        <input type="email" maxlength="50" name="email" id="email" required/>
      </p>

      <p>
        <label for="phone">Phone Number</label> 
        <input type="tel" name="phone" id="phone" required/>
      </p>
    </fieldset>

    <fieldset>
      <legend>Required Technical List</legend>
      <p>
        <label for="hs">PHP</label> 
        <input type="checkbox" id="hs" name="category[]" value="hs"/><br>

        <label for="crm">SQL</label> 
        <input type="checkbox" id="crm" name="category[]" value="crm"/><br>

        <label for="3h">JavaScript</label> 
        <input type="checkbox" id="3h" name="category[]" value="3h"/><br>

        <label for="code">HTML</label> 
        <input type="checkbox" id="code" name="category[]" value="code"/><br>

        <label for="mth">Kru Yai in Muay Thai (very important, we will test you)</label> 
        <input type="checkbox" id="mth" name="category[]" value="mth" required/><br>
      </p>

      <p>
        <label for="other">Other Skills</label><br>
        <textarea id="other" name="other" rows="4" cols="40"></textarea>
      </p>
    </fieldset>

    <input type="submit" value="Apply"/>
    <input type="reset" value="Reset Form"/>
  </form>
</body>
</html>
