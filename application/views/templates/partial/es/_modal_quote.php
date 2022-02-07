<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Powering Homes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="quote-form">
            <div class="modal-body px-3 px-md-5">
                <div id="quote-form-fields">
                    <h4>Felicidades, se encuentra en una zona privilegiada para el ahorro solar.</h4>
                    <h6>Complete su información a continuación para continuar.</h6>
                    <div class="row pb-4 pb-md-3">
                        <div class="col-12 m-auto">
                            <div class="text-center rounded-circle m-auto bg-secondary d-flex align-items-center justify-content-center mb-2" style="width:50px !important; height:50px !important;"><span class="fs-4 text-white">1</span></div>
                            <div class="text-center">
                                <span class="fs-6">¿Cuánto es su factura de electricidad TÍPICA?</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 col-md-4 m-auto">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="quote-bill-amount" id="quote-bill-amount" title="Ingrese el monto de su factura" placeholder="$" required autofocus>
                                <label for="floatingName">$</label>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3 pb-md-4">
                        <div class="col-12 m-auto">
                        <div class="text-center rounded-circle m-auto bg-secondary d-flex align-items-center justify-content-center mb-2" style="width:50px !important; height:50px !important;"><span class="fs-4 text-white">2</span></div>
                            <div class="text-center">
                                <span class="fs-6">Cuéntenos más sobre usted</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="name" id="name" title="Nombre" placeholder="Nombre" required maxlength="45">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="lastname" id="lastname" title="Apellido" placeholder="Apellido" required maxlength="45">
                                <label for="lastname">Apellido</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="address" id="address" title="Dirección" placeholder="Direcci&oacute;n" required>
                                <label for="dirección" maxlength="255">Dirección</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="unit" id="unit" title="Unidad" placeholder="Unidad" maxlength="10">
                                <label for="unit">Unidad/Apartamento</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="city" id="city" title="Ciudad" placeholder="Ciudad" required maxlength="45" readonly>
                                <label for="city" maxlength="45">Ciudad</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="state" id="state" title="Estado" placeholder="Estado" readonly>
                                <label for="state" maxlength="2">Estado</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="zipcode" id="zipcode" title="Codigo Postal" placeholder="Codigo Postal" maxlength="5" readonly>
                                <label for="zipcode">Codigo Postal</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" type="text" name="phone" id="phone" title="Telefono" placeholder="Telefono" required maxlength="12">
                                <label for="phone">Telefono</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" type="text" name="email" id="email" title="Email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>
                                <small class="text-muted">
                                    Al enviar esta solicitud, autoriza a <b><?php echo Application::getConfig('company.name') ?></b> a llamarlo o enviarle mensajes de texto al número de teléfono que proporcionó y a llamadas o mensajes pregrabados, incluso si su número está en una lista federal, estatal o local de no llamar. No se requiere su consentimiento a este acuerdo para comprar productos o servicios. Respetamos tu privacidad.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="quote-thankyou" class="d-none text-center py-5">
                    <h4>¡Gracias por llenar nuestro formulario!</h4>
                    
                    <div class="pt-3 pt-md-4">Revisaremos su mensaje y nos pondremos en contacto con usted pronto.
                         Mientras tanto, puede consultar la sección de preguntas frecuentes o navegar a través de nuestras últimas
                         publicaciones de blogs. Por favor, haga click en Cerrar para continuar.
                    </div>
                    <div class="pt-4">Sus amigos de <?php echo Application::getConfig('company.name') ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-cancel-btn">Cancelar</button>
                <button type="button" class="btn btn-secondary d-none" data-bs-dismiss="modal" id="modal-close-btn">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="btn-quote-form">Aplicar</button>
            </div>
        </form> 
    </div>
  </div>
</div>