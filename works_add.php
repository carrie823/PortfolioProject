<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['company'] )
  {
    
    $query = 'INSERT INTO works (
        title,
        company,
        description,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['company'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been added' );
    
  }
  
  header( 'Location: works.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Work</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title"></input>
    
  <br>
  
  <label for="content">Company:</label>
  <input type="text" name="company" id="company"></input>
  
  <br>
  
 <label for="content">Description:</label>
 <textarea type="text" name="description" id="description" rows="10"></textarea>
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>

  <input type="submit" value="Add works">
  
</form>

<p><a href="works.php"><i class="fas fa-arrow-circle-left"></i> Return to Works List</a></p>


<?php

include( 'includes/footer.php' );

?>