<?php 
    //
    $msg = "";
    $msgClass = "";

// Check for submit
if(filter_has_var(INPUT_POST, 'submit')){
   // Get form data
   $name = htmlspecialchars($_POST['name']);
   $email = htmlspecialchars($_POST['email']);
   $number = htmlspecialchars($_POST['number']);
   $message = htmlspecialchars($_POST['message']);


   // Check Required Fields

   if(!empty($email) && !empty($name) && !empty($number) && !empty($message)) {
        // Passed

        // Check Email

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            // Failed
            $msg = 'Please fill in a valid email';
            $msgClass = 'alert-danger';
        } else {
            // Passed

            $toEmail = 'tajma0992@gmail.com';
            $subject = 'Contact Request From ' .$name;
            $body = '<h2>Contact Request</h2>
                     <h4>Name</h4> <p>' .$name. '</p>
                     <h4>Email</h4> <p>' .$email. '</p> 
                     <h4>Email</h4> <p>' .$number. '</p> 
                     <h4>Message</h4> <p>' .$message. '</p>
                     ';    

            // Email Headers

            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "
            \r\n";

            // Additional Headers
            $headers .= "From: " .$name. "<".$email. ">". "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
                // Email Sent
                $msg = 'Your Email has been sent';
                $msgClass = 'alert-success';

            } else {
                //Email Failed
                $msg = 'Your Email was not sent';
                $msgClass = 'alert-danger';
            }
        }
     
   } else {
       // Failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
   }
}



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>kodeWorld</title>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">

</head>

<body>
    <!-- inner page header -->
    <div class="inner-banner">
        <div class="w3l-header inner-w3l-header" id="home">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark pl-0 pr-0">
                    <a class="navbar-brand m-0 text-primary" href="index.html"><span class="fa fa-gamepad"></span>
                       kodeWorld
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link pl-0 pr-0 font-weight-bold" href="index.html">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link pl-0 pr-0 font-weight-bold" href="about.html">About</a>
                            </li>
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link pl-0 pr-0 font-weight-bold" href="services.html">Services</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link pl-0 pr-0 font-weight-bold" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- //inner page header -->

    <!-- contact form -->
    <section class="w3l-contacts-12 py-5">
        <div class="container py-md-3">
            <div class="contacts12-main">
            <div class="container">
    <?php  if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>">
        <?php echo $msg; ?>
        
        </div>
                <div class="title-section">
                    <h3 class="main-title-w3 mb-md-5 mb-4">Want to get in touch? <br>Find me on
                        <a href="tel:+2347031143594" class="text-primary">phone</a>,
                        <a href="mailto:tajma0992@gmail.com" class="text-primary">email</a>,
                        <a href="https://twitter.com/xzicob" class="text-primary">twitter</a> or <a href="https://linkedin.com/in/ahmed-taiwo-16407b145" class="text-primary">linkedin</a>.</h3>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="">
                    <div class="main-input">
                        <input type="text" name="name" placeholder="Enter your name" class="contact-input" required="" 
                value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                <input type="text" name="email" placeholder="Enter your mail" class="contact-input" required="" 
                value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                       
                        <input type="number" name="number" placeholder="Your phone number" class="contact-input" required="" 
                        value="<?php echo isset($_POST['number']) ? $number : ''; ?>">
                        <textarea name="message" placeholder="Enter your message" required="" class="contact-textarea contact-input">
                <?php echo isset($_POST['message']) ? $message : ''; ?>
                </textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="submit" class="btn-primary btn primary-btn-style">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- //contact form -->

    <!-- Footer -->
    <section class="w3l-footers-1">
        <div class="footer bg-secondary">
            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-lg-8 footer-left">
                            <p class="m-0 text-center">&copy; Copyright 2020 kodeWorld.</p>
                        </div>
                        <div class="col-lg-4 footer-right text-lg-right text-center mt-lg-0 mt-3">
                            <ul class="social m-0 p-0">
                                <li><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="https://linkedin.com/in/ahmed-taiwo-16407b145"><span class="fa fa-linkedin"></span></a></li>
                                <li><a href="#instagram"><span class="fa fa-instagram"></span></a></li>
                                <li><a href="https://twitter.com/xzicob"><span class="fa fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Footer -->

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->

    <!-- common jquery -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--  bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--  //bootstrap js -->

</body>

</html>