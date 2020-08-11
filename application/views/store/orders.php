    <section class="banner-sec" style="background:url(<?php echo base_url(); ?>assets/images/banner-img.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            
            <div class="row">
                <!-- Detalles de las compras -->
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        Litado de órdenes
                      </div>
                      <div class="card-body">
                        <p class="card-text">
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Ver</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; $total=0; foreach ($orders as $order) {
                               ?>
                                  <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $order->customer_name; ?></td>
                                    <td><?php echo $order->customer_email; ?></td>
                                    <td><?php echo $order->customer_mobile; ?></td>
                                    <td><?php echo $order->status; ?></td>
                                    <td><a href="<?php echo base_url()."buy/status/".$order->id; ?>">Ver</a></td>
                                  </tr>
                              <?php $i++; } ?>
                            </tbody>
                          </table>
                        </p>
                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>