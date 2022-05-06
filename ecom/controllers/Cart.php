<?php

    class Cart extends Controller{
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand = $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
            $this->cart = $this->model('CartModel');

            
        }

        function index(){
            $datactg   = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $datacart  = $this->cart->getcart();
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand
            ]);
            $this->view('cart/cart',[
                'datacart' => $datacart
            ]);

            $this->view('inc/footer');
        }

        function addtocart($id){
            $data = [
                'p_id'      => $id,
                'user_id'   => $_SESSION['user_id'],
                'ip_add'    => $_SERVER['REMOTE_ADDR'],
                'qty'       => '1',
            ];

            $save = $this->cart->savecart($data);
            
            if($save){
                header("Location: http://localhost/ecom1/cart/");
            }else{
                echo "Thêm thất bại";
            }
        }
        function delete($id){
            $delete = $this->cart->deletecartbyId($id);
            if($delete){
                header('Location: http://localhost/ecom1/cart/cart');
            }else{
                echo 'Xóa thất bại';
            }
        }
    }