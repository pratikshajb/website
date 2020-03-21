<!DOCTYPE html>
<html>
    <head> 
    	<meta charset="utf-8">
    	<title>Contact form</title>
    	<link
    	href = "https://fonts.googleapis.com/css?family=Open+Sans"
    	rel = "stylesheet">
    	<link rel="stylesheet" href="style.css">
    </head>
    <body>
    	<main>
    		<p>SEND AN E-MAIL</p>
    		<form class="contact-form" action="contact-form.php" method="post">
    			<input type="text" name="name" placeholder="First Name">
    			<input type="text" name="name" placeholder="Last Name">
    			<input type="text" name="mail" placeholder="E-MAIL">
    			<input type="text" name="subject" placeholder="Subject">
    			<textarea name="message" placeholder="Enter your message"></textarea>
    			<button type="submit" name="submit">Send</button>
    		</form>
    	</main>
    </body>
</html>    