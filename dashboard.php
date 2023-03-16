<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>
<h1 id="welcomedash">Welcome to your Portfolio Admin!</h1>

<ul id="dashboard">
  <li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>
   <li>
    <a href="skills.php">
      Manage Skills
    </a>
  </li>
  <li>
    <a href="works.php">
      Manage Works
    </a>
  </li> 
  <li>
    <a href="socials.php">
      Manage Socials
    </a>
  </li> 
  <li>
    <a href="educations.php">
      Manage Educations
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?>
