<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 class="text-dark">Contacto</h1>
                <nav class="d-flex align-items-center">
                    <a href="#" class="text-dark">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#" class="text-light">Contacto</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
<section class="contact_area section_gap_bottom">
	<div class="container my-5">
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6>Bogota D.C, Colombia</h6>
						<p>Keneddy - Patio Bonito</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6>55 555 555</h6>
						<p>Lunes a Sabado 8:00am a 8:00 pm</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6>rppsquimicos@gmail.com</h6>
						<p>Envíanos tu consulta en cualquier momento!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form needs-validation" action="#" method="post" id="contactForm" novalidate>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Escribe tu nombre*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu nombre'" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu correo*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu correo'" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Escribe tu asunto*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu asunto'" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="cel" name="celphone" placeholder="Escribe tu número de contacto*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu número de contacto'" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control" name="message" id="message" rows="1" placeholder="Escribe tu duda o queja*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu duda o queja'" required></textarea>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" value="submit" class="primary-btn">Enviar mensaje</button>
					</div>
					<?php
					   if (isset($_POST['name'])) {
					   	  ControladorUsuarios::sendHagging($_POST);
					   	  echo '<script>
			                    if(window.history.replaceState){

			                        window.history.replaceState(null,null,window.location.href);
			                    }
			                    </script>';
					   	  echo '<div class="alert alert-primary">Tu correo se envio de manera satisfactoria</div>';
					   }
					?>
				</form>
			</div>
		</div>
	</div>
</section>
<!--================Contact Area =================-->