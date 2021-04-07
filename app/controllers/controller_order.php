<?php

class Controller_Order extends Controller {

    function action_index() {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        $users = Model_User::Load(include(__DIR__ . '/../../data/usersList.php'));
        $user = $users->getUserByEmail($_POST['email']);
        
        if (isset($_SESSION['cart'])) {
            // $delivery = include(__DIR__ . '/../../data/deliveryData.php');
            // $delivery = Model_Delivery::Load($delivery);
            $product = Product::Load(include(__DIR__ . '/../../data/productsList.php'));
            
            $data = [
                "title" => "My Order",
                "address" => $user['address'] ?? false,
                "delivery" => $_POST['delivery'],//$delivery->get_data(),
                "cart" => $this->model->getCartContent()["cart"],
                "productData" => $product->getProductsData($_SESSION['cart']),
                "parts" => $_POST['parts']
            ];
            // $this->view->generate('/../store/order_view.php',
            //     'template_view.php', $this->model->getCartContent());
            $this->view->generate('/../store/order_view.php',
                'template_view.php', $data);
        } else {
            $this->view->generate('/../store/order_view.php',
                'template_view.php', ["title" => "My Order",]);
        }
    }
}