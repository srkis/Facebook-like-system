<?php
include_once "inc/header.php";
?>

          <div class="row">


              <?php

              $getProducts = $products->getProducts();

                while($books = $getProducts->fetch_object() ){

                $product_id = $books->products_id;

              ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="single.php?single=<?php echo $product_id ?>">
                            <img style="width: 250px; height: 250px;" src="images/<?php echo $books->products_image; ?>" alt=""></a>

                            <div class="caption">
                                <h4 class="pull-right"><?php echo $books->products_price; ?> DIN</h4>
                                <h4><a href="#"><?php echo $books->products_title; ?></a>
                                </h4>
                                <p><?php echo $books->products_description; ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>

                                </p>
                            </div>
                        </div>
                    </div>

              <?php } ?>




                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
