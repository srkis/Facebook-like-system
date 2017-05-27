<?php

require_once($_SERVER['DOCUMENT_ROOT'] ."/likes/config/config.php");

$products = new Products();

$user_ip = $_GET['user_ip'];
$type = $_GET['type'];
$products_id = $_GET['id'];



    if($type == 'like') {

        if (!$liked = $products->liked($products_id, $user_ip)) {

            if ($like = $products->like($products_id, $user_ip)) {

                $arr = $products->getLikes($products_id, $user_ip);

                foreach ($arr as $item) {

                    echo $item;

                }


            } else {

                echo "voted";
            }
        }


        } else {

            if ($unlike = $products->unlike($products_id, $user_ip)) {
                $arr = $products->getLikes($products_id, $user_ip);

                foreach ($arr as $item) {
                    echo $item;

                }
            }
        }

