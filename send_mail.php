<!-- SENDING EMAIL -->
<?php 
if(isset($_POST['submit'])){
    $to = $_POST['email']; // this is your Email address
    // $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";

    // get html element, extract int price for innerHTML
    $dochtml = new DOMDocument();
    $dochtml->loadHTMLFile("form.html");
    $div = $dochtml->getElementById('totalAmmount')->nodeValue;
    $price_to_pay = (int)filter_var($div, FILTER_SANITIZE_NUMBER_INT);
    die($price_to_pay);



    // TODO: create a message template for the email

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    // mail($to,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>