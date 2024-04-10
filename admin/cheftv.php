<?php
// Include your PDO database connection file
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $video_url = $_POST['video_url'];
    $chef_name = $_POST['chef_name'];
    $dish_name = $_POST['dish_name'];
    $description = $_POST['description'];

    try {
        // Prepare SQL statement to insert Chef's Special TV video
        $sql = "INSERT INTO chef_special_tv (video_url, chef_name, dish_name, description, created_at) VALUES (:video_url, :chef_name, :dish_name, :description, NOW())";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':video_url', $video_url);
        $stmt->bindParam(':chef_name', $chef_name);
        $stmt->bindParam(':dish_name', $dish_name);
        $stmt->bindParam(':description', $description);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Chef's Special TV video added successfully.";
        } else {
            echo "Error: Unable to add Chef's Special TV video.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

<!-- new -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
    <h3>add todays show</h3>

    <input placeholder="Video URL" type="text" name="video_url" required class="box"><br>
    <input placeholder="Chef Name" type="text" name="chef_name" required class="box"><br>
    <input placeholder="Dish Name" type="text" name="dish_name" required class="box"><br>
    <textarea placeholder="Description" name="description" required class="box"></textarea><br>
    <button type="submit" class="btn">Add Chef's Special TV Video</button>
      <!-- t -->
      <!-- <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box">
      <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
      <select name="category" class="box" required>
         <option value="" disabled selected>select category --</option>
         <option value="main dish">main dish</option>
         <option value="fast food">fast food</option>
         <option value="drinks">drinks</option>
         <option value="desserts">desserts</option>
      </select>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form> -->

</section>

<!-- add products section ends -->



<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>