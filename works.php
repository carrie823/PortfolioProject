<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM works
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Work has been deleted' );
  
  header( 'Location: works.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM works
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Works</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Company</th>
    <th align="center">Description</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
      </td>
      <td align="center"><?php echo $record['company']; ?></td>
      <td align="center"><?php echo $record['description']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><a href="works_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="works.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this works?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="works_add.php"><i class="fas fa-plus-square"></i> Add work</a></p>


<?php

include( 'includes/footer.php' );

?>