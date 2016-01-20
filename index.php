<?php 
	if ($_POST["submit"]) {
			
	 	if (!$_POST['name']) {
			$error = "<br />Please enter your name";
	 	 }		
	 	if (!$_POST['email']) {
			$error.= "<br />Please enter your email address";
	 	 }			
	 	if (!$_POST['message']) {
			$error.= "<br />Please enter a message";
	 	 }
		if ($_POST['email'] !== "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {	 	 	
 	 	 $error.= "<br />Please enter a valid email address";
	 	 }			
	 	 if ($error) {
			 $result = '<div class="alert alert-danger"><strong>There were error(s)
			in your form:</strong>'.$error.'</div>';
			} else {
				if (mail("test@greenhost.org.uk", "Message from the website!", "Name: ".$_POST['name']."
			 Email: ".$_POST['email']."

			 Comment: ".$_POST['message'])) {
				$result = '<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch.</div>';
			} else {
				$result = '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
			}
 		}
	}
?>

<!doctype html>
<html>
	<head>
		<title>Webpage</title>

		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 email">
				<h1>Email Form</h1>
				<?php echo $result; ?>
				<p class="lead">I'll get back to you.</p>
					<form method="post">
						<div class="form-group">
							<label for="name">Name</label>
							<input name="name" type="text" class="form-control" placeholder= 'Name here...' value="<?php echo $_POST['name']; ?>" />

							<label for="email">Email</label>
							<input name="email" type="email" class="form-control" placeholder= 'Email here...' value="<?php echo $_POST['email']; ?>"/>

							<label for="message">Message</label>
							<textarea name="message" class="form-control" placeholder= 'Write message here...' value="<?php echo $_POST['message']; ?>"></textarea>
						</div>

						<input type="submit" name="submit" class="btn btn-success" value="Submit Form" />
					</form>
				</div>
			</div>
		</div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"</script>
	</body>
</html>