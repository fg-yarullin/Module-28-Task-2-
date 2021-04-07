<?php

class Model_Order {


    public function addToCart($productList) {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        $_SESSION['cart'] = $productList;
    }

    public function getCartContent() {
        if (isset($_SESSION['cart']) ) {
            return [
                "cart" => $_SESSION['cart']
            ];
        }
        return;
    }

    public function removeFromCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public function emptyCart() {
        if (isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $key => $product) {
                $this->removeFromCart($key);
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $quantity) {
            $total += $quantity;
        }
        return [
            "items" => count($_SESSION['cart']),
            "totalCount" => $total,
            "totalPrice" => 0
        ];
    }
}