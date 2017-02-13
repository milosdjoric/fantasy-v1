<?php

namespace Fantasy\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Fantasy\Model\FantasyTable;
use Zend\View\Model\ViewModel;
use Fantasy\Model\Dashboard;
use Fantasy\Model\Upload;
use Fantasy\Model\Import;
use Fantasy\Form\UploadForm;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\DriverInterface;

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
        $page = (int)$this->params()->fromQuery('page', 1);
        $page = ($page < 1) ? 1 : $page;
        $paginator->setCurrentPageNumber($page);

// Set the number of items per page to 10:
        $paginator->setItemCountPerPage(4);

        return new ViewModel(['paginator' => $paginator]);
    }

    public function dashboardAction()
    {
        return new ViewModel();
    }

    public function statsAction()
    {

        return new ViewModel();
    }

    public function uploadAction()
    {

        $import = new Import();
        $upload = new Upload();
        $form = new UploadForm();
        return new ViewModel(array('upload' => $upload, 'form' => $form, 'import' => $import));
    }

}
