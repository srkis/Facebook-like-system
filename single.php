<?php
include_once "inc/header.php";
?>

<div class="row">


            <?php

            if(isset($_GET['single']))
            {
                $products_id = $_GET['single'];

                $user_ip =  $products->getUserIp();


            }

                $getSingleProducts = $products->getSingleProducts($products_id);

                $singleBook = $getSingleProducts->fetch_object();

                $getLikes = $products->getLikes($products_id, $user_ip);

                foreach ($getLikes as $likes){



            ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">

                    <img style="width: 250px; height: 250px;" src="images/<?php echo $singleBook->products_image; ?>" alt="">

                <div class="caption">
                    <h4 class="pull-right"><?php echo $singleBook->products_price; ?> DIN</h4>
                    <h4><a href="#"><?php echo $singleBook->products_title; ?></a>
                    </h4>
                    <p><?php echo $singleBook->products_description; ?></p>
                </div>

                <div class="ratings">
                    <p>Like / Unlike</p>

                    <input type="hidden" id="user_ip" value="<?php echo $products->getUserIp(); ?>">

                    <?php if( ! $liked = $products->liked($products_id, $user_ip)){ ?>

                    <a id="like" href="#" class="like" data-id="<?php echo $products_id; ?> "> <i class="fa fa-thumbs-o-up" style="font-size: 18px;color:red;" title="like" > </i>    </a>
                    <a id="unlike" href="#" class="unlike hidden" data-id="<?php echo $products_id; ?> "> <i class="fa fa-thumbs-up" style="font-size: 18px;color:red;" title="like" > </i>    </a>

                    <?php } else { ?>

                    <a id="like" href="#" class="like hidden" data-id="<?php echo $products_id; ?> "> <i class="fa fa-thumbs-o-up" style="font-size: 18px;color:red;" title="like" > </i>    </a>
                    <a id="unlike" href="#" class="unlike" data-id="<?php echo $products_id; ?> "> <i class="fa fa-thumbs-up" style="font-size: 18px;color:red;" title="like" > </i>    </a>

                    <?php } ?>



                    <span id="showLikes" class="badge badge-success like-count"><?php echo $likes; ?> </span>
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


<script>
    $(function () {

        $('.like').on('click', function () {

            var $this = $(this);
            var id = $this.data("id");
            var user_ip = $("#user_ip").val();

            Likes(id, 'like', user_ip);
            return false;

        });


        function Likes(id, type, user_ip) {

            $.ajax({

                url: "inc/likes.php",
                type:"GET",
                data:{'id':id,'type':type, 'user_ip':user_ip},
                'success':function (res) {
                    var like = $('span').parent().find('.like-count');
                    like.fadeOut().text(res).fadeIn();
                    $("#unlike").removeClass('hidden');
                    $("#like").addClass('hidden');
                }

            });

        }



        $('.unlike').on('click', function () {

            var $this = $(this);
            var id = $this.data("id");
            var user_ip = $("#user_ip").val();


            $.ajax({

                url: "inc/likes.php",
                type:"GET",
                data:{'id':id,'type':'unlike', 'user_ip':user_ip},
                'success':function (res) {
                    var like = $('span').parent().find('.like-count');
                    like.fadeOut().text(res).fadeIn();
                    $("#like").removeClass('hidden');
                    $("#unlike").addClass('hidden');
                }

            });

            return false;



        });





    });



</script>




