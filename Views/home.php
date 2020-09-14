<?php $productos = ControladorInventario::ctrSleccionarUltimos6Prod(null,null);
$UltimosProd=ControladorInventario::ctrSleccionarUltimos3Prod(null,null);?>
<!-- start banner Area -->
    <section class="banner-area m-3 ">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>RPPS QUÍMICOS</h1>
                                    <p>Aquí puedes comprar y pedir por encargo algunos químicos que necesites en tu hogar como utensilios de aseo y demás. ¡Adéntrate! Se que te va a encantar.</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="Assets/img/banner-img">
                                    <img class="img-fluid" src="Assets/img/Logo1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start category Area -->
    <!--<section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="Assets/img/category/c1.jpg" alt="">
                                <a href="img/category/c1.jpg" class="Assets/img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="Assets/img/category/c2.jpg" alt="">
                                <a href="img/category/c2.jpg" class="Assets/img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="Assets/img/category/c3.jpg" alt="">
                                <a href="img/category/c3.jpg" class="Assets/img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Product for Couple</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="Assets/img/category/c4.jpg" alt="">
                                <a href="img/category/c4.jpg" class="Assets/img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="Assets/img/category/c5.jpg" alt="">
                        <a href="img/category/c5.jpg" class="Assets/img-pop-up" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">Sneaker for Sports</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- End category Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Ultimos productos añadidos</h1>
                            <p>Aqui podras encontrar nuestros ultimos productos para la venta al publico</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($UltimosProd as $product){?>
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <a  href="?paginasCliente=DetalleProducto&id=<?php echo $product["idPRODUCTO"]?>"><img  height="10%" class="img-fluid" src="/RPPSQUIMICOS/Assets/img/productos/<?php echo $product["imgPRODUCTO"] ?>" alt=""></a>
                                <div class="product-details">
                                    <h6><?php echo $product['nombrePRODUCTO']?></h6>
                                    <div class="price">
                                        <h6>$<?php echo $product["valoruPRODUCTO"]; ?></h6>
                                        
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="?paginasCliente=DetalleProducto&id=<?php echo $product["idPRODUCTO"]?>" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Ver detalles</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <?php }?>
                </div>
            </div>
        </div>
    <!-- end product Area -->    

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Mejores Productos</h1>
                        <p>Echale un vistazo a los mejores productos que tenemos para ti. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php foreach ($productos as $producto): ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="?paginasCliente=DetalleProducto&id=<?php echo $producto["idPRODUCTO"]?>"><img width="100" src="/RPPSQUIMICOS/Assets/img/productos/<?php echo $producto['imgPRODUCTO'] ?>" alt=""></a>
                                    <div class="desc">
                                        <a href="?paginasCliente=DetalleProducto&id=<?php echo $producto["idPRODUCTO"]?>" class="title"><?php echo $producto['nombrePRODUCTO']?></a>
                                        <div class="price">
                                            <h6>$<?php echo $producto['valoruPRODUCTO']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                           </div>
                       <?php endforeach?>
                    </div>   
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="Assets/img/Botella.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->