<?php

    Class Product extends Controller{
        
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
            $this->order = $this->model('OrderModel');
        }
        function index(){
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproduct();
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd
            ]);

            $this->view('inc/footer');
        }

        function info_product($id){
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproductbyId($id);
            foreach ($dataprd as $key => $value) {
                $idcat = $value['product_cat'];
                $tag = $value['product_keywords'];
            }
            $datatop3 = $this->prd->gettop3productbyCatid($idcat);
            $topsell = $this->order->gettoporder();
            $dataprdid= [];
            foreach ($topsell as $key => $value) {
                array_push($dataprdid,$value['product_id']);
            }
            $datatopsell = [
                '0' => $this->prd->getproductbyId($dataprdid[0]),
                '1' => $this->prd->getproductbyId($dataprdid[1]),
                '2' => $this->prd->getproductbyId($dataprdid[2]),
            ];
            // echo '<pre>';
            // var_dump($datatopsell);
            // die();
            $datatag = explode(',',$tag);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand
            ]);

            $this->view('cart/info_product',[
                'data' => $dataprd,
                'datatop3' => $datatop3,
                'datatag' => $datatag,
                'datatopsell' => $datatopsell,
            ]);

            $this->view('inc/footer');
        }
    }
?>