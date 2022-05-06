<?php

    Class Category extends Controller{
        
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
        }
        function index($id){
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproductbyCatid($id);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd
            ]);

            $this->view('inc/footer');
        }

    }
?>