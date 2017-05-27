<?php


Class Products
    {
        private $db;


        public function __construct()
        {
            $this->db = new Database();
        }

        public function getProducts()
        {
            $query = "SELECT * FROM products";
            $books = $this->db->select($query);
            return $books;
        }


        public function getSingleProducts($products_id)
        {
            $query = "SELECT * FROM products WHERE products_id = '$products_id'";
            $Singlebook = $this->db->select($query);
            return $Singlebook;

        }


        public function getUserIp()
        {
            $userIp = $_SERVER['REMOTE_ADDR'];
            return $userIp;
        }


        public function getLikes($products_id, $user_ip)
        {

            $query = "SELECT COUNT(*) FROM products_likes WHERE products_id = $products_id";
            $likes = $this->db->select($query);
            return list($check) = $likes->fetch_row();
        }


        public function liked($products_id, $user_ip)
        {

            $query = "SELECT COUNT(*) AS total FROM products_likes WHERE products_id = $products_id AND user_ip = '$user_ip'";
            $likes = $this->db->select($query);
            $obj = $likes->fetch_object();

            if($obj->total != 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }


        public function like($products_id, $user_ip)

        {


            $query = "INSERT INTO products_likes (products_id, user_ip) VALUES ('$products_id','$user_ip') ";
            $insert = $this->db->insert($query);

            if($insert){
                return TRUE;
            }else{
                return FALSE;
            }

        }


    public function unlike($products_id, $user_ip)
    {
        $query = "DELETE FROM products_likes WHERE products_id = $products_id AND user_ip = '$user_ip'";
        $delete = $this->db->delete($query);

        if($delete){
            return TRUE;
        }else{
            return FALSE;
        }

    }





}