<?php

namespace Fantasy\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class FantasyTable
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getFantasy($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row)
        {
            throw new RuntimeException(sprintf('Could not find row with identifier %d', $id)
            );
        }

        return $row;
    }

}