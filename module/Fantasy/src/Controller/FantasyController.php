<?php

namespace Fantasy\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Fantasy\Model\FantasyTable;
use Zend\View\Model\ViewModel;

class FantasyController extends AbstractActionController
{

    private $table;

    public function __construct(FantasyTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'fantasy' => $this->table->fetchAll(),
        ]);
    }

}
