<?php

// interface IDelivery {
//     public function delivery();
// }

// interface ICart {
//     public function putToCart($name, $count);
//     public function removeFromCart();
// }

interface IOrder {
    public function formAnOrder();
}

Class Model_Store /*implements IDelivery, ICart*/ {
    
    public function getProductsList(Product $products) {
        return $products->getProductsList();
    }
    
    // public function putToCart($id, $count=1) {
    //     $_SESSION['cart'][$id] = $count;
    // }
    
    // public function removeFromCart() {}
    // public function formAnOrder() {}
    // public function delivery() {}
}