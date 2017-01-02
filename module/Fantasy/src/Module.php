<?php

namespace Fantasy;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\FantasyController::class => function($container)
                {
                    return new Controller\FantasyController($container->get(Model\FantasyTable::class)
                    );
                },
            ],
        ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\FantasyTable::class => function($container)
                {
                    $tableGateway = $container->get(Model\FantasyTableGateway::class);
                    return new Model\FantasyTable($tableGateway);
                },
                Model\FantasyTableGateway::class => function ($container)
                {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Fantasy());
                    //'players' je naziv tabele
                    return new TableGateway('players', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

}
