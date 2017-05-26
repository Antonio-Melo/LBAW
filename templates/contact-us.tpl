{include file='header.tpl'}

<div class="container-fluid" id="contact-us-body">
	<!-- Contact us -->
	<h1>Contact us</h1>
	<hr>
	<div class="contact-us-content">
		<div>
			<h2>Phone</h2>
			<p><span class="contact">+351 265 130 093</span> (Available Monday to Friday 8am-11pm GMT and Saturday to Sunday 9am-9pm GMT).</p>
		</div>
		<div>
			<h2>Email</h2>
			<p><span class="contact">batech@gmail.com</span> (Replies in 24 hours).
		</div>
		<div>
			<h2>FAQs</h2>
			<p>Find the answer to your need in our <a class="contact" href="faqs.php">FAQs</a> section.</p>
		</div>
		
		{if isset($smarty.session.id) && !isset($smarty.session.admin)}
			<div>
				<h2>Submit a ticket</h2>
				<form id="ticket" method="post" action="../actions/submitticket.php">
					<label for="subject">Subject:</label>
					<input type="text" name="subject" id="subject" required>
				
					<label for="description">Description:</label>
					<textarea name="description" rows="5" id="description"></textarea>
					
					<button class="btn btn-default" id="submit" type="submit">Submit</button>
				</form>
			</div>
		{/if}
	</div>
</div>

{include file='footer.tpl'}