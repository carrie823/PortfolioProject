<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();



if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['url'] )
  {
    
    $query = 'INSERT INTO socials (
        name,
        photo,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['photo'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'social media has been added' );
    
  }
  
  header( 'Location: socials.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Skill</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  
  <!-- <label for="photo">Photo:</label>
  <input type="text" name="photo" id="photo"> 
  
  <br> -->
  
  <input type="submit" value="Add Social Media">
  
</form>

<p><a href="socials.php"><i class="fas fa-arrow-circle-left"></i> Return to Social Media List</a></p>


<?php

include( 'includes/footer.php' );

?>