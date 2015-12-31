<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
  $titleErr = $deptErr = $fnameErr = $mnameErr = $lnameErr = $nnameErr = $genderErr 
    = $addressErr = $cityErr = $stateErr = $phoneNumErr = $emailErr = $bdayErr = "";
  $title = $dept = $fname = $mname = $lname = $nname = $gender 
    = $address = $city = $state = $phoneNum = $email = $bday = "";
  $servername = "127.0.0.1:3306";
  $username = "root";
  $password = "";
  $dbname = "church";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Create database
  $sql = "CREATE DATABASE " . $dbname;
  if (mysqli_query($conn, $sql)) { // create new database
      echo "Database " . $dbname . " created/connected successfully<br>";
      

      // sql to create table
      $sql = "CREATE TABLE " . $dbname . " . memberInfo (
        `id` INT NOT NULL,
        `title` VARCHAR(45) NULL,
        `department` VARCHAR(45) NULL,
        `firstName` VARCHAR(45) NULL,
        `middleName` VARCHAR(45) NULL,
        `lastName` VARCHAR(45) NULL,
        `nickName` VARCHAR(45) NULL,
        `gender` VARCHAR(45) NULL,
        `address` VARCHAR(45) NULL,
        `city` VARCHAR(45) NULL,
        `state` VARCHAR(45) NULL,
        `phoneNum` VARCHAR(45) NULL,
        `email` VARCHAR(45) NULL,
        `birthday` DATE NULL,
        PRIMARY KEY (`id`)
      )";

      if (mysqli_query($conn, $sql)) {
          echo "Table memberInfo created/connected successfully<br>";
      } else {
          echo "Error creating table: " . mysqli_error($conn) . "<br>";
      }


      // sql to create table
      $sql = "CREATE TABLE " . $dbname . " . memberValue (
      `id` INT NOT NULL,
        `attendance` INT NULL,
        `faith` INT NULL,
        `leadership` INT NULL,
        `hasCar` INT NULL,
        `isPraiseTeam` INT NULL,
        `isWorking` INT NULL,
        PRIMARY KEY (`id`),
        CONSTRAINT `id`
          FOREIGN KEY (`id`)
          REFERENCES `church`.`memberInfo` (`id`)
          ON DELETE RESTRICT
          ON UPDATE CASCADE
      )";

      if (mysqli_query($conn, $sql)) {
          echo "Table memberValue created/connected successfully<br>";
      } else {
          echo "Error creating table: " . mysqli_error($conn) . "<br>";
      }



  } else { // no need to create database
      // echo "Error creating database: " . mysqli_error($conn) . "<br>";
  }

  mysqli_close($conn);
?>




<h2>Church Member Information</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  The ID number will be created for you. <br><br> 

  Title: 
  <input type="radio" name="title" <?php if (isset($title) && $title=="pastor") echo "checked";?>  value="pastor">Pastor
  <input type="radio" name="title" <?php if (isset($title) && $title=="minister") echo "checked";?>  value="minister">Minister
  <input type="radio" name="title" <?php if (isset($title) && $title=="elder") echo "checked";?>  value="elder">Elder
  <input type="radio" name="title" <?php if (isset($title) && $title=="deaconess") echo "checked";?>  value="deaconess">Deaconess
  <input type="radio" name="title" <?php if (isset($title) && $title=="deacon") echo "checked";?>  value="deacon">Deacon
  <input type="radio" name="title" <?php if (isset($title) && $title=="other") echo "checked";?>  value="other">Other
  <span class="error">* <?php echo $titleErr;?></span>
  <br><br>

  Department: 
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="adult") echo "checked";?>  value="adult">Adult
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="young adult") echo "checked";?>  value="young adult">Young Adult
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="youth") echo "checked";?>  value="youth">Youth
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="kindergarten") echo "checked";?>  value="kindergarten">Kindergarten
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="sunday school") echo "checked";?>  value="sunday school">Sunday School
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="korean school") echo "checked";?>  value="korean school">Korean School
  <input type="radio" name="dept" <?php if (isset($dept) && $dept=="other") echo "checked";?>  value="other">other
  <span class="error">* <?php echo $deptErr;?></span>
  <br><br>

  First Name: 
  <input type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>

  Middle Name: 
  <input type="text" name="mname" value="<?php echo $mname;?>">
  <!-- <span class="error">* <?php echo $mnameErr;?></span> -->
  <br><br>

  Last Name: 
  <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>

  Nick Name: 
  <input type="text" name="nname" value="<?php echo $nname;?>">
  <!-- <span class="error">* <?php echo $nnameErr;?></span> -->
  <br><br>

  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Address: 
  <input type="text" name="address" value="<?php echo $address;?>">
  <!-- <span class="error">* <?php echo $addressErr;?></span> -->
  <br><br>

  City: 
  <input type="text" name="city" value="<?php echo $city;?>">
  <!-- <span class="error">* <?php echo $cityErr;?></span> -->
  <br><br>  

  State:
  <input type="text" name="state" value="<?php echo $state;?>">
  <!-- <span class="error">* <?php echo $stateErr;?></span> -->
  <br><br>

  Phone Number:
  <input type="text" name="phoneNum" value="<?php echo $phoneNum;?>">
  <span class="error">* <?php echo $phoneNumErr;?></span>
  <br><br>

  Email:
  <input type="text" name="email" value="<?php echo $email;?>">
  <!-- <span class="error">* <?php echo $emailErr;?></span> -->
  <br><br>

  Birthday:
  <input type="text" name="bday" value="<?php echo $bday;?>">
  <span class="error">* <?php echo $bdayErr;?></span>
  <br><br>
   
  <input type="submit" name="submit" value="Submit"> 

</form>

<?php
$conn = mysqli_connect($servername, $username, $password);
  // sql to create table
  $sql = "INSERT INTO memberInfo values(" .
    "0000001" . $title . ", " . $dept . ", " . $fname . ", " . $mname . ", " . $lname . ", " . $nname . ", " . $gender
    . ", " . $address . ", " . $city . ", " . $state . ", " . $phoneNum . ", " . $email . ", " . $bday . 
    ")";
echo $sql;

    if (mysqli_query($conn, $sql)) {
        echo "Inserted info correctly<br>";
    } else {
        echo "Error creating table: " . mysqli_error($conn) . "<br>";
    }
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>