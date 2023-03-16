<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['institution'] ) )
{
  
  if( $_POST['institution'] and $_POST['certification'] )
  {
    
    $query = 'INSERT INTO educations (
        institution,
        certification,
        description,
        year
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['institution'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['certification'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['year'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: educations.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="institution">Institution:</label>
  <input type="text" name="institution" id="institution"></input>
    
  <br>
  
  <label for="certification">Certification:</label>
  <input type="text" name="certification" id="certification"></input>
  
  <br>
  
 <label for="content">Description:</label>
 <textarea type="text" name="description" id="description" rows="10"></textarea>
  
  <br>
  
  <label for="year">Year:</label>
  <input type="year" name="year" id="year">
  
  <br>

  <input type="submit" value="Add educations">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Educations List</a></p>


<?php

include( 'includes/footer.php' );

?>