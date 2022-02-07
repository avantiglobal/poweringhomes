<?php includeTpl('/partial/'.$this->_user_language.'/_banner_simple', $this->variables) ?>

<div class="contact">
	<div class="container my-md-5">
		<div class="contact-wrapper">
			<div class="row text-center pb-2 pb-md-4 mb-4">
				<div class="col-12 col-md-4 mb-3">
					<h3><i class="bi bi-geo-alt-fill"></i></h3>
					<h4 class="text-uppercase tex-center">Address</h4>
					<div class="text-muted">
						1003 Falling Leaf St
						Kissimmee, FL 34747
					</div>
				</div>
				<div class="col-12 col-md-4 mb-3">
					<h3><i class="bi bi-phone"></i></h3>
					<h4 class="text-uppercase tex-center">Phone</h4>
					<div class="text-muted">
						<a href="tel:<?php echo Application::getConfig("company.phone") ?>"><?php echo Application::getConfig("company.phone") ?></a>
					</div>
				</div>
				<div class="col-12 col-md-4 mb-3">
					<h3><i class="bi bi-envelope"></i></h3>
					<h4 class="text-uppercase tex-center">
						Email
					</h4>
					<div class="text-muted">
						<a href="mailto:<?php echo Application::getConfig("company.email") ?>"><?php echo Application::getConfig("company.email") ?></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 bg-light">
					<form id="form-contact"  method="POST" class="p-4 p-md-5 rounded-3 text-dark">
						<h4>If you have questions...</h4>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Name" required>
									<label for="first_name">Name</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
									<label for="last_name">Last Name</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="email" class="form-control" autocapitalize="off" autocorrect="off" name="email" id="email" placeholder="name@example.com" required>
									<label for="email">Email address</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required maxlength="12">
									<label for="phone">Phone</label>
								</div>	
							</div>
						</div>

						<div class="row">
							<div class="col-12 px-3 pb-3">
								<label for="exampleFormControlTextarea1" class="form-label">Message</label>
								<textarea class="form-control" name="message" id="message" rows="3"></textarea>
							</div>
						</div>
						<!-- <div class="checkbox mb-3">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
						</div> -->
						<button class="btn btn-lg btn-secondary" type="submit">Submit</button>
						<hr class="my-4">
						<small class="text-muted">By submitting this request, you authorize <b><?php echo Application::getConfig('company.name') ?></b> to call you or text you on the phone number you provided and prerecorded calls or messages even if your number is on any federal, state, or local do not call list. Your consent to this agreement is not required to purchase products or services. We respect your privacy.</small>
					</form>
				</div>
			</div>
		</div>
		<div class="contact-thankyou d-none py-5">
			<h2 class="pb-3">Thank you!</h2>
			<p>
				We will look over your message and get back to you soon. 
                In the meantime, you can check the FAQ section or browse through our latest 
                <a href="/blog">blog posts</a>.
			</p>
		</div>
	</div>
</div>