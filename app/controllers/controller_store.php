<?php

class Controller_Store extends Controller {

    function action_index() {

        $productsList = include(__DIR__ . '/../../data/productsList.php');
        $this->view->generate('/../store/store_view.php', 'template_view.php',
            $this->model->getProductsList(Product::Load($productsList)));
        
        // $this->view->generate('/../store/store_view.php', 'template_view.php',
            // $this->model->getProductsList(new Product($productsList)));
    }
}