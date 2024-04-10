

<?php
// Include your PDO database connection file
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

// Fetch today's Chef's Special TV videos
$date = date('Y-m-d');
$sql = "SELECT * FROM chef_special_tv WHERE DATE(created_at) = '$date'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>chef_special_tv</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>our show</h3>
   <p><a href="home.php">home</a> <span> / Chef-Tv</span></p>
</div>

<?php
if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
<section class="about" style="margin: 20px auto">
   <div class="row">
      <div class="image" style="margin-right: 20px">
         <iframe width="600" height="450" src="<?= $row['video_url']; ?>" frameborder="0" allowfullscreen style="border-radius: 10px;"></iframe>
      </div>
      <div class="content">
         <h3><?= $row['dish_name']; ?> by <?= $row['chef_name']; ?></h3>
         <p><?= $row['description']; ?></p>
         <a href="menu.php" class="btn">our menu</a>
      </div>
   </div>
</section>
<?php
    }
    include 'components/footer.php';
} else {
    echo "Error fetching data: " . $conn->errorInfo()[2];
}
?>
<script src="js/script.js"></script>
</body>
</html>
