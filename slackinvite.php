<?php
	/**
	 * This is a simple script to invite users to your slack
	 * Replace the subdomain and token in the variables below.
	 * Upload a logo called "logo.png" to the same directory for your group
	 * Upload a logo called "slack.png" to the same directory for slack
	 */
	define('SUBDOMAIN','progressivehacknight');
	define('TOKEN','placetokenhere');
?>


			
			<?php
				$showform = false;
				$error = false;
				if (isset($_POST['first'])){
					if (strlen($_POST['first']) > 1 && strlen($_POST['last']) > 1 && strlen($_POST['mail']) > 5){
						sendForm();
					} else {
						$showform = true;
						$error = true;
					}
				} else {
					$showform = true;
				}
			
			if ($showform){
				if ($error){
			?>
			<div class="red">Please fill in all fields</div>

			
			<?php
					}
					
				showForm();
				}
			?>
		</div>



<?php
	
	function sendForm(){
		$email = $_POST['mail'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		
     $slackInviteUrl='https://'.SUBDOMAIN.'.slack.com/api/users.admin.invite?t='.time();

	    $fields = array(
	            'email' => urlencode($email),
	            'first_name' => urlencode($first),
	            'last_name' => urlencode($last),
	            'token' => TOKEN,
	            'set_active' => urlencode('true'),
	            '_attempts' => '1'
	    );
	
	    // url-ify the data for the POST
	            $fields_string='';
	            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	            rtrim($fields_string, '&');
	
	    // open connection
	            $ch = curl_init();
	
	    // set the url, number of POST vars, POST data
	            curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch,CURLOPT_POST, count($fields));
	            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	    // exec
	            $replyRaw = curl_exec($ch);
	            $reply=json_decode($replyRaw,true);
	            if($reply['ok']==false) {
		            	echo '<div class="red">';
	                    echo 'Something went wrong, try again!';
	                    echo '</div>';
	                    showForm();
	            }
	            else {
		            	echo '<div class="message">';
	                    echo 'Check your email. Your invite should arrive within a couple minutes';
	                    echo '</div>';
	            }
	
	    // close connection
	            curl_close($ch);		
	}
	
	function showForm(){
		
		?>
		
			<form id="slackinvite" method="post">
				<input type="text" name="first" placeholder="first name"  <?php echo strlen($_POST['first']) > 0 ? 'value="'.$_POST['first'].'"' : ''; ?> />

				<input type="text" name="last" placeholder="last name"  <?php echo strlen($_POST['last']) > 0 ? 'value="'.$_POST['last'].'"' : ''; ?> />

				<input type="text" name="mail" placeholder="email address" <?php echo strlen($_POST['mail']) > 0 ? 'value="'.$_POST['mail'].'"' : ''; ?> />
				<p class="nospace">
                <a class="btn slack" href="javascript:{}" onclick="document.getElementById('slackinvite').submit(); return false;">Slack Invite</a>
                </p>
			</form>
			
		<?php		
		
	}