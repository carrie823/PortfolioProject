<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: works.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['company'] )
  {
    
    $query = 'UPDATE works SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      content = "'.mysqli_real_escape_string( $connect, $_POST['company'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      type = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'works has been updated' );
    
  }

  header( 'Location: works.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM works
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: works.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Works</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>

  <label for="title">Company:</label>
  <input type="text" name="company" id="company" value="<?php echo htmlentities( $record['company'] ); ?>">

   <br>
  
  <label for="content">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Works">
  
</form>

<p><a href="works.php"><i class="fas fa-arrow-circle-left"></i> Return to Works List</a></p>


<?php

include( 'includes/footer.php' );

?>