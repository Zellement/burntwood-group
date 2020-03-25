<?php

// *********** CONFIG OPTIONS ***********

//****Set session variables for posting config to the mailer****//
$_SESSION['companyName'] 	 = get_field('company_name', 'option');
$_SESSION['emailTo'] 		 = get_field('company_email_address', 'option');
$_SESSION['successMsg'] 	 = get_field('success_message', 'option');


//Set up attachments from WP options
$attachments = get_field('tf_attachments', 'option');

if($attachments == true) {
	if(get_field('number_of_attachments', 'option')) {
		$attachmentCount = get_field('number_of_attachments', 'option');			
	}
}

//Set up Data Capture from WP options

$dataCapture = get_field('tf_data_capture', 'option');

if($dataCapture == true) {
	$_SESSION['mailchimpApi'] = get_field('mailchimp_api', 'option');
	$_SESSION['mailchimpListId'] = get_field('mailchimp_list_id', 'option');
}

$services = array();
while( has_sub_field('services_list', 'options') ) {
	// print_r(get_sub_field('services', 'options'));
	$services[] = get_sub_field('services', 'options');
}

// *********** END OF CONFIG *********** //

?>

<form class="contact-form" name="Contact_Form" method="post" action="#" enctype="multipart/form-data">

	<label for="Name">Name *
		<input type="text" name="Name" class="name validate focus" id="Name" data-validate="letters" />
		<span class="message" data-default="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-issue="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-success="<i class='fa fa-check' aria-hidden='true'></i>"></span>
	</label>

	<label for="Telephone">Phone Number *
		<input type="tel" name="Telephone" class="phone validate focus" id="Telephone" data-validate="phone" />
		<span class="message" data-default="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-issue="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-success="<i class='fa fa-check' aria-hidden='true'></i>"></span>
	</label>

	<label for="Postcode">Postcode
		<input type="text" name="Postcode" class="postcode focus" id="Postcode"/>
	</label>

	<label for="Email">E-mail *
		<input type="email" name="Email" class="email validate focus" id="Email" data-validate="email" />
		<span class="message" data-default="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-issue="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-success="<i class='fa fa-check' aria-hidden='true'></i>"></span>
	</label>

	<?php if(isset($services)): ?>
		<p><strong>What are you looking for?</strong></p>
		<?php foreach($services as $service): ?>
			<label for="<?php echo str_replace(" ", "_", $service); ?>">
				<input type="checkbox" value="<?php echo $service; ?>" name="Looking For" id="<?php echo str_replace(" ", "_", $service); ?>" />
				<?php echo $service; ?>
			</label>
		<?php endforeach; ?>
	<?php endif; ?>

	<label for="Further_Details" class="further-details">Further details &#42; :
	    <textarea id="Further_Details" name="Enquiry" class="email validate" rows="6" data-validate="text"></textarea>
	    <span class="message" data-default="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-issue="<i class='fa fa-exclamation-circle' aria-hidden='true'></i>" data-success="<i class='fa fa-check' aria-hidden='true'></i>"></span>
	</label>

	<?php if($attachments == true) : ?>
		<p>Attachments: (must be .gif, .jpg, .png, .pdf or .doc &amp; no larger than 2 MB)</p>
		<?php
			$count = 0;
			while($count < $attachmentCount) : ?>
			<label for="Attachment_<?php echo $count; ?>">
				<input id="Attachment_<?php echo $count; ?>" class="fileInput focus" type="file" name="upload[]" />
			</label>
			<?php $count++; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if($dataCapture == true) : ?>
		
		<p><strong>Subscribe for our special offers?</strong></p>
		
		<label class="label-radio" for="No_Email_Marketing">
			<input class="radio" id="No_Email_Marketing" type="radio" value="No_Thanks" name="subscription" />
			No Thanks!
		</label>

		<label class="label-radio" for="Subscribe_To_Email_Marketing">
			<input class="radio" id="Subscribe_To_Email_Marketing" type="radio" value="Email_Updates" name="subscription" />Subscribe to Special Offers
		</label>
		
	<?php endif; ?>

	<input name="submit_contact_form" class="submit" type="submit" value="Contact Us" <?php /* Check if Kenshoo is enabled */ if (get_field('kenshoo','options' )): ?>onclick="javascript:kenshoo_conv('Conv','','','','GBP')"<?php endif; ?> />

	<!-- Loading spinner. Add class of "white" to .loading element to make it white -->
	<p class="loading">Sending <span class="loader"></span></p>

</form>