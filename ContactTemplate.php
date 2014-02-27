<?php
/*
Template Name: Contact Us Page
*/
include "header.php";
?>
<div id="pagehead" class="pagehead_contactus"></div>
<div class="pagewidth">
	<div class="twocolumns">
		<div id="leftcol">
			<div class="success" id="success" style="display:none;">
				We have received your message. Thank you!
			</div>
			<div class="bademail" id="bademail" style="display:none;">
				You did not enter a valid email address.
			</div>
			<div class="badserver" id="badserver" style="display:none;">
				Your email failed. Please try again later.
			</div>
			<div id="contact">
				<p><label for="nameinput">Name:</label>
					<input type="text" style="width:300px" id="nameinput" name="name"  /></p>
				<p><label>Email:</label>
					<input type="text" style="width:300px" id="emailinput" name="email" /></p>
				<p><label for="messageinput">Message:</label>
					<textarea name="comment" id="messageinput" rows="7"></textarea>
					<button id="button" type="submit" name="qsubmit" value="Submit">Send Message</button>
				</p>
			</div>
						<script>
							var button = document.getElementById("button");
							var email_in = document.getElementById("emailinput");
							var name_in = document.getElementById("nameinput");
							var msg_in = document.getElementById("messageinput");

							var alert_success = document.getElementById("success");
							var alert_bademail = document.getElementById("bademail");
							var alert_badserver = document.getElementById("badserver");

							var debounce = false;

							function onclick()
							{
								var r = new XMLHttpRequest();
								function onrespond()
								{
									if (r.readyState == 4 && r.status == 200)
									{
										alert_success.style.display = "none";
										alert_badserver.style.display = "none";
										alert_bademail.style.display = "none";
										var t = r.responseText;
										if (t == 1)
										{
											alert_success.style.display = "block";
											button.onclick = null;
										}
										if (t == 2)
										{
											alert_badserver.style.display = "block";
										}
										if (t == 3)
										{
											alert_bademail.style.display = "block";
										}
									}
								}
								if (!debounce) {
									r.onreadystatechange = onrespond;
									r.open("POST","http://www.adambots.com/wp-content/themes/adambots2014/send.php");
									r.setRequestHeader("Content-type","application/x-www-form-urlencoded");
									r.send("name=" + encodeURIComponent(name_in.value) + "&email=" + encodeURIComponent(email_in.value) +"&comment=" + encodeURIComponent(msg_in.value));
									debounce = true;
									setTimeout(function() {debounce = false;},1000);
								}
							}
							button.onclick = onclick;
						</script>
					</div>
					<div id="rightcol">
						<?php dynamic_sidebar('Contact Page Sidebar') ?>
					</div>
					<div class="clear">
					</div>
				</div>
			</div>
			<?php get_footer(); ?>