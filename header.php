<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
  
  <div id="header-name">
    <a href="dashboard.php"><h1>Portfolio Admin</h1></a>
  <div>
  
  <?php if(isset($_SESSION['id'])): ?>

    <p style="padding: 0 1%; text-align: right;">
      <a href="dashboard.php">Dashboard</a> | 
      <a href="logout.php">Logout</a>
    </p>
  
  <?php endif; ?>
  
  <hr>
  
  <?php echo get_message(); ?>
  
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  
