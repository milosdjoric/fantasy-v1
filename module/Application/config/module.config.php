<?php

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    
//    služi za zend/navigation
    
    
//    'menu' => [
//        'default' => [
//            [
//                'label' => 'Home',
//                'id' => 'home',
//                'route' => 'home',
//                'pages' => [
//                    'label' => 'Dashboard',
//                    'route' => 'fantasy',
//                    'id' => 'dashboard',
//                    'action' => 'dashboard',
//                ]
//            ],
//            [
//                'label' => 'Fantasy',
//                'id' => 'fantasy',
//                'route' => 'fantasy',
//                'pages' => [
//                    [
//                        'label' => 'Dashboard',
//                        'route' => 'fantasy',
//                        'id' => 'dashboard',
//                        'action' => 'dashboard',
//                    ],
//                ],
//            ],
//        ],
//    ],
    'service_manager' => [
        'factories' => [
            'navigation' => Zend\Navigation\Service\DefaultNavigationFactory::class,
        ],
    ],
];
