<!DOCTYPE html>
<html>
<body>

<?php
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




/*
Name: <input type="text" name="name" value="<?php echo $name;?>">

E-mail: <input type="text" name="email" value="<?php echo $email;?>">

Website: <input type="text" name="website" value="<?php echo $website;?>">

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
*/
/*
// sql query
$sql = "SELECT * FROM memberInfo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	foreach($row as $value)
        	echo "<td> ".$value." </td>";
    }
} else {
    echo "0 results";
}
*/

mysqli_close($conn);
?>


First: <input type="text" name="name" value="<?php echo $name;?>">

E-mail: <input type="text" name="email" value="<?php echo $email;?>">

Website: <input type="text" name="website" value="<?php echo $website;?>">

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male

</body>
</html>