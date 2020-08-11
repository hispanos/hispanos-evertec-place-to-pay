    <section class="banner-sec" style="background:url(<?php echo base_url(); ?>assets/images/banner-img.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            
            <div class="row">

                <div class="col-md-12">

                    <div class="alert alert-primary" role="alert">
                      Por favor, completa los datos para proceder con la compra.
                    </div>
                    <!-- Formulario de captura de datos -->
                    <form id="form_customer_data" method="POST">

                        <div class="form-group"> <!-- Nombre -->
                            <label for="customer_name" class="control-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Ingrese su Nombre y Apellidos">
                        </div>    

                        <div class="form-group"> <!-- Correo -->
                            <label for="customer_email" class="control-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="sucorreo@dominio.com">
                        </div>                    
                                                
                        <div class="form-group"> <!-- Celular -->
                            <label for="customer_mobile" class="control-label">Celular</label>
                            <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" placeholder="Ingrese el número de Celular.">
                        </div>          
                        
                    </form>
                    <div class="form-group"> <!-- Botón enviar -->
                        <button type="submit" class="btn buy-btn" onclick="submitData()">Confirmar!</button>
                    </div>
                </div>
            </div>
        </div>
    </section>