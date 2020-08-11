    <section class="banner-sec" style="background:url(<?php echo base_url(); ?>assets/images/banner-img.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            
            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                      Por favor, revisa los datos de tu orden y procede con el pago.
                    </div>
                </div>
                <!-- Detalles de la compra -->
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        Confirmación de datos
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Datos del Comprador</h5>
                        <p class="card-text">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Nombre Completo</span>
                              </div>
                              <input type="text" class="form-control" aria-describedby="basic-addon3" disabled="" value="<?php echo $order->customer_name; ?>">
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Correo Electrónico</span>
                              </div>
                              <input type="text" class="form-control" aria-describedby="basic-addon3" disabled="" value="<?php echo $order->customer_email; ?>">
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Número de Celular</span>
                              </div>
                              <input type="text" class="form-control" aria-describedby="basic-addon3" disabled="" value="<?php echo $order->customer_mobile; ?>">
                            </div>
                        </p>
                        <h5 class="card-title">Datos de la Compra</h5>
                        <table class="table">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Producto</th>
                              <th scope="col">Precio</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; $total=0; foreach ($details as $product) {
                                $total = $product->price + $total;
                             ?>
                                <tr>
                                  <th scope="row"><?php echo $i; ?></th>
                                  <td><?php echo $product->name_product; ?></td>
                                  <td>$ <?php echo $product->price; ?></td>
                                </tr>
                            <?php $i++; } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th colspan="2">Total</th>
                                  <th>$ <?php echo $total; ?></th>
                              </tr>
                          </tfoot>
                        </table>
                        <a onclick="buy('<?php echo $order->id; ?>')" class="btn buy-btn">Ir a Pagar</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>