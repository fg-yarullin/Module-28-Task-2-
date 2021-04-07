<?php

class Controller_Cart extends Controller {

    function action_index() {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        
        if (isset($_SESSION['cart'])) {
            $delivery = include(__DIR__ . '/../../data/deliveryData.php');
            $delivery = Model_Delivery::Load($delivery);
            $product = Product::Load(include(__DIR__ . '/../../data/productsList.php'));
            $data = [
                "title" => "My Cart",
                "delivery" => $delivery->get_data(),
                "cart" => $this->model->getCartContent()["cart"],
                "productData" => $product->getProductsData($_SESSION['cart'])
            ];
            $this->view->generate('/../store/cart_view.php',
                'template_view.php', $data);
        } else {
            $this->view->generate('/../store/cart_view.php',
                'template_view.php', ["title" => "My Cart"]);
        }
    }

    function action_add() {
        // $this->view->generate('/../store/store_view.php', 'template_view.php', $this->model->get_data());
        if (isset($_POST['cart'])) {
            $productList = $_POST['cart'];
            $this->model->addToCart($productList);
            $product = Product::Load(include(__DIR__ . '/../../data/productsList.php'));

            // $productsData = $product->getProductsData($productList);
            
            unset($_POST['cart']);
            // $this->view->generate('/../store/cart_view.php',
            //     'template_view.php', $this->model->getCartContent());
            $delivery = include(__DIR__ . '/../../data/deliveryData.php');
            $delivery = Model_Delivery::Load($delivery);
            $data = [
                "title" => "My Cart",
                "delivery" => $delivery->get_data(),
                "cart" => $this->model->getCartContent()["cart"],
                "productData" => $product->getProductsData($productList)
            ];
            $this->view->generate('/../store/cart_view.php',
                'template_view.php', $data);
        } else {
            $this->view->generate('/../store/cart_view.php',
                'template_view.php', ["title" => "My Cart"]);
        }
    }
}