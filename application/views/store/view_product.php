    <section class="banner-sec" style="background:url(<?php echo base_url(); ?>assets/images/banner-img.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            <!-- Muestro los datos del producto -->
            <div class="row">
                <div class="col-md-7">
                    <h1><?php echo $product->name_product; ?></h1>
                    <h4><?php echo $product->description; ?></h4>
                    <div class="button-sec">
                        <a href="<?php echo base_url(); ?>store/checkout/<?php echo $product->id_product; ?>" class="btn buy-btn">Comprar Ahora</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-img">
                        <img src="<?php echo base_url(); ?>assets/images/<?php echo $product->image; ?>">
                        <div class="price">
                            <span>$</span><?php echo number_format($product->price,0); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>