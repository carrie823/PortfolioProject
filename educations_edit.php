<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: educations.php' );
  die();
  
}

if( isset( $_POST['institution'] ) )
{
  
  if( $_POST['institution'] and $_POST['certification'] )
  {
    
    $query = 'UPDATE educations SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['institution'] ).'",
      content = "'.mysqli_real_escape_string( $connect, $_POST['certification'] ).'",
      year = "'.mysqli_real_escape_string( $connect, $_POST['year'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Educations has been updated' );
    
  }

  header( 'Location: educations.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM educations
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: educations.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Educations</h2>

<form method="post">
  
  <label for="institution">Institution:</label>
  <input type="text" name="institution" id="institution" value="<?php echo htmlentities( $record['institution'] ); ?>">
    
  <br>

  <label for="certification">Certification:</label>
  <input type="text" name="certification" id="certification" value="<?php echo htmlentities( $record['certification'] ); ?>">

  <br>

  <label for="description">description:</label>
  <input type="text" name="description" id="description" value="<?php echo htmlentities( $record['description'] ); ?>">

  <br>
  
  <label for="year">Year:</label>
  <input type="date" name="year" id="year" value="<?php echo htmlentities( $record['year'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit educations">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Educations List</a></p>


<?php

include( 'includes/footer.php' );

?>