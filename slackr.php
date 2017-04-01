<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,600,800" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressive Hacknight: A intersection of activism and technology</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="wrapper">
        <div class="centered">
            <img src="assets/img/logo.png" class="logo">

            <div id="name">
                <p>Progressive</p>
                <p>Hack Night</p>
            </div>
            <div id="btn">
                <form method="post">
				<input type="text" name="first"  <?php echo strlen($_POST['first']) > 0 ? 'value="'.$_POST['first'].'"' : ''; ?> />

				<input type="text" name="last"  <?php echo strlen($_POST['last']) > 0 ? 'value="'.$_POST['last'].'"' : ''; ?> />

				<input type="text" name="mail" <?php echo strlen($_POST['mail']) > 0 ? 'value="'.$_POST['mail'].'"' : ''; ?> />
				<p>
					<input type="submit" value="Sign me up!" />
				</p>
			</form>
                <a class="btn" href="#">Get Tickets</a>
                <a class="btn slack" href="#">Slack Invite</a>
            </div>
            <div id="host">Hosted by <a href="http://progcode.org">ProgCode</a></div>
            

        </div>
    
    </div>
</body>

</html>