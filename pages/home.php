<!DOCTYPE HTML>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="sidebar">
<div class="wrapper">
<?php include('../components/sidebar_afterLogin.php'); ?>
</div>
</div>
<?php include('../components/navbar.php'); ?>

<?php 
// include pages depending on menu var
if(isset($_GET['menu'])) {
  $menu = $_GET['menu'];
switch($menu) {
  case 'Einnahmen':
    include("earnings.php");
    break;
  case 'Ausgaben':
    include("spendings.php");
    break;
  case 'Fixkosten':
    include("fixed.php");
    break;
  case 'Sparziele':
    include("goals.php");
    break;
  case 'Kalender':
    include("calendar.php");
    break;
}
}
else {
  $menu = "home";
}
?>

</body>
</html>
