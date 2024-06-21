<!-- SENDING EMAIL -->
<?php
if (isset($_POST['submit'])) {
    $to = $_POST['email']; // this is your Email address
    // $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $to_pay = 100;

//    var_dump($_POST);
    // if option is selected, add its value to final price, else add 0
    isset($_POST['cotisation']) ? $to_pay += (int)$_POST['cotisation'] : $cotisation = 0;
    isset($_POST['hotel']) ? $to_pay += (int)$_POST['hotel'] : $hotel = 0;
    isset($_POST['translator']) ? $to_pay += (int)$_POST['translator'] : $translator = 0;
    isset($_POST['feature4']) ? $to_pay += (int)$_POST['feature4'] : $feature4 = 0;
    isset($_POST['feature5']) ? $to_pay += (int)$_POST['feature4'] : $feature5 = 0;

    $message = "Thank you" . $first_name . "your price to pay is: " . $to_pay . "$";
    $headers = "From:" . "me@example.com";
    $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "<h3>Mail sent to: " . $to . "<br><br> Thank you " . $first_name . ". <br> your total ammount for payment is: " . $to_pay . "$</h3>";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>