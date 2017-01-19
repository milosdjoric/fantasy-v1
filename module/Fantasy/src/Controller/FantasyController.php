<?php

namespace Fantasy\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Fantasy\Model\FantasyTable;
use Zend\View\Model\ViewModel;
use Fantasy\Model\Dashboard;

class FantasyController extends AbstractActionController
{

    private $table;

    public function __construct(FantasyTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        // Grab the paginator from the AlbumTable:
        $paginator = $this->table->fetchAll(true);

        // Set the current page to what has been passed in query string,
        // or to 1 if none is set, or the page is invalid:
        $page = (int) $this->params()->fromQuery('page', 1);
        $page = ($page < 1) ? 1 : $page;
        $paginator->setCurrentPageNumber($page);

        // Set the number of items per page to 10:
        $paginator->setItemCountPerPage(4);

        return new ViewModel(['paginator' => $paginator]);
    }

    public function dashboardAction()
    {

        $objekat = new Dashboard();
//        ini_set('error_reporting', E_STRICT);
//        echo $objekat->tekst();
        $objekat_dva->view->objekat = $objekat;

        return new ViewModel();
    }

    public function statsAction()
    {
        return new ViewModel();
    }

}
