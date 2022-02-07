<?php includeTpl('/partial/'.$this->_user_language.'/_banner_simple', $this->variables) ?>

<div class="contact">
	<div class="container my-md-5">
		<div class="contact-wrapper">
			<div class="row text-center pb-2 pb-md-4 mb-4">
				<div class="col-12 col-md-4 mb-3">
					<h3><i class="bi bi-geo-alt-fill"></i></h3>
					<h4 class="text-uppercase tex-center">Dirección</h4>
					<div class="text-muted">
						1003 Falling Leaf St
						Kissimmee, FL 34747
					</div>
				</div>
				<div class="col-12 col-md-4 mb-3">
					<h3><i class="bi bi-phone"></i></h3>
					<h4 class="text-uppercase tex-center">Teléfono</h4>
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
						<h4>Si tiene alguna pregunta...</h4>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre" required>
									<label for="first_name">Nombre</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" required>
									<label for="last_name">Apellido</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="email" class="form-control" autocapitalize="off" autocorrect="off" name="email" id="email" placeholder="name@example.com" required>
									<label for="email">Email</label>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-floating mb-3 flex-fill mx-2">
									<input type="tel" class="form-control" name="phone" id="phone" placeholder="Telefono" required maxlength="12">
									<label for="phone">Teléfono</label>
								</div>	
							</div>
						</div>

						<div class="row">
							<div class="col-12 px-3 pb-3">
								<label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
								<textarea class="form-control" name="message" id="message" rows="3"></textarea>
							</div>
						</div>
						<!-- <div class="checkbox mb-3">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
						</div> -->
						<button class="btn btn-lg btn-secondary" type="submit">Enviar</button>
						<hr class="my-4">
						<small class="text-muted">
							Al enviar esta solicitud, autoriza a <b><?php echo Application::getConfig('company.name') ?></b> a llamarlo o enviarle mensajes de texto al número de teléfono que proporcionó y a llamadas o mensajes pregrabados, incluso si su número está en una lista federal, estatal o local de no llamar. No se requiere su consentimiento a este acuerdo para comprar productos o servicios. Respetamos tu privacidad.
						</small>
					</form>
				</div>
			</div>
		</div>
		<div class="contact-thankyou d-none py-5">
			<h2 class="pb-3">Gracias!</h2>
			<p>
				Revisaremos su mensaje y nos pondremos en contacto con usted pronto.
				Mientras tanto, puede consultar la sección de preguntas frecuentes o navegar a través de <a href="/blog">las últimas
				publicaciones de nuestro blog</a>.
			</p>
		</div>
	</div>
</div>