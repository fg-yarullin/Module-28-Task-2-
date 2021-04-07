<?php

function getRoutes():array {
    return [
        '' => [
            'GET' => [
                'controller' => 'Controller_Main',
                'action' => 'action_index'
            ],
            'model' => 'Model_Main'
        ],
        
        'store' => [
            'GET' => [
                'controller' => 'Controller_Store',
                'action' => 'action_index'
            ],
            'model' => 'Model_Store'
        ],

        'cart' => [
            'GET' => [
                'controller' => 'Controller_Cart',
                'action' => 'action_index'
            ],
            'POST' => [
                'controller' => 'Controller_Cart',
                'action' => 'action_add'
            ],
            'model' => 'Model_Cart'
        ],

        'order' => [
            'POST' => [
                'controller' => 'Controller_Order',
                'action' => 'action_index'
            ],
            'model' => 'Model_Order'
        ],

    ];
}