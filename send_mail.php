<!-- SENDING EMAIL -->
<?php
//ini_set("display_errors", "1");
//error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    die(print_r($_POST));
    $to = $_POST['email']; // this is your Email address
    // $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_nubmer = $_POST['country_code'] . $_POST['phone_number'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $to_pay = 100;

//    var_dump($_POST);
    // if option is selected, add its value to final price, else add 0
    isset($_POST['cotisation']) ? $to_pay += (int)$_POST['cotisation'] : $cotisation = 0;
    isset($_POST['hotel']) ? $to_pay += (int)$_POST['hotel'] : $hotel = 0;
    isset($_POST['translator']) ? $to_pay += (int)$_POST['translator'] : $translator = 0;
    isset($_POST['feature4']) ? $to_pay += (int)$_POST['feature4'] : $feature4 = 0;
    isset($_POST['feature5']) ? $to_pay += (int)$_POST['feature5'] : $feature5 = 0;

    $message = "Thank you" . $first_name . "your price to pay is: " . $to_pay . "$";
    $headers = "From:" . "me@example.com";
    $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    echo "<h3>Mail sent to: " . $to . "<br><br> Thank you " . $first_name . ". <br> your total ammount for payment is: " . $to_pay . "$</h3>";
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
print_r("!!!!!!!!!!!!!!!!!!!" . $_FILES);
// database info
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sugig";

// Connect to databse
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

// check for optional values, set 0 if not selected or set value if selected
isset($_POST['cotisation']) ? $cotisation = (int)$_POST['cotisation'] : $cotisation = 0;
isset($_POST['hotel']) ? $hotel = (int)$_POST['hotel'] : $hotel = 0;
isset($_POST['translator']) ? $translator = (int)$_POST['translator'] : $translator = 0;
isset($_POST['feature4']) ? $feature4 = (int)$_POST['feature4'] : $feature4 = 0;
isset($_POST['feature5']) ? $feature5 = (int)$_POST['feature5'] : $feature5 = 0;

// make sql for insertion to database
$userSQL = "INSERT INTO reservation (first_name, last_name, email, phone_number, cotisation, hotel, translator, feature4, feature5)
 VALUES ('$first_name', '$last_name', '$to', '$phone_nubmer','$cotisation', '$hotel', '$translator', '$feature4', '$feature5' )";

// write user info to database
if ($conn->query($userSQL) == true) {
    echo "Successfully added reservation to database <br> <br>" ;
} else {
    echo "Error: " . $userSQL . "Details: ". $conn->error;
}

// set uploads directory
$targetDir = "uploads/";

// check if file is uploaded
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $filename = basename($_FILES['file']['name']);
    $targetPath = $targetDir . $filename;

    // move file to uploads folder
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
        // moving successful, write to db
        $sql = "INSERT INTO reservation (filename, filepath) VALUES ('$filename', '$targetPath')";
        if ($conn->query($sql) == true) {
            echo "file uploaded and saved successfully";
        } else {
            echo "Error: " . $sql . "Details: " . $conn->error;
        }
    } else {
        echo "Error moving the file";
    }
} else {
    echo "error uploading file.";
}
$conn->close();
?>