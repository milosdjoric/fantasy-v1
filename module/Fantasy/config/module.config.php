<?php

namespace Fantasy;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'fantasy' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/fantasy[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FantasyController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'fantasy' => __DIR__ . '/../view',
        ],
    ],
];
