<?php

class Model_Delivery extends Model {

    private $delivery = [];

    public function __construct(array $delivery) {
        $this->delivery = $delivery;
    }

    public static function Load(array $delivery) {
        return new Model_Delivery($delivery);
    }

    public function get_data() {
        return $this->delivery;
    }
}