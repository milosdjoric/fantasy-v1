<?php

namespace Fantasy\Model;

use Zend\Db\Adapter\Adapter;

class Import
{
    public function importCSV()
    {

//        echo '<pre>';
//        print_r($_FILES);
//        echo '</pre>';

        $csv_file = 'C:/wamp64/www/fantasy-v1/module/Fantasy/files/' . 'upload' . $_FILES['myfile']['name']; // Name of your CSV file

//        echo '<pre>';
//        print_r($csv_file);
//        echo '</pre>';

        $rows = array_map('str_getcsv', file($csv_file));
        $header = array_shift($rows);
        $csv = array();
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }

//        echo '<pre>';
//        print_r($csv[0]['player']);
//        echo '</pre>';
//
//        echo '<pre>';
//        print_r($csv);
//        echo '</pre>';


        $adapterConfig = [
            'driver' => 'Pdo_Mysql',
            'database' => 'fantasy',
            'username' => 'root',
            'password' => '',
        ];

        $adapter = new Adapter($adapterConfig);

//        $sql = "SELECT * FROM PLAYERS";
//        $statement = $adapter->query($sql);
//        $result = $statement->execute();
//        $row = $result->current();
//        $name = $row['player'];

        foreach ($csv as $r) {
            $i = 0;

//            echo '<pre>';
//            print_r($csv[$i]['team']);
//            echo '</pre>';

            $sql = "INSERT INTO PLAYERS (PLAYER, TEAM, RECORD, SCORE, PRICE, UP, KEEPS_VALUE, DOWN, OPPONENT) VALUES (:P, :T, :R, :S, :P, :U, :K, :D, :O)";
            $statement = $adapter->query($sql);
            $result = $statement->execute(array(':P' => $csv[$i]['player'], ':T' => $csv[$i]['team'], ':R' => $csv[$i]['record'], ':S' => $csv[$i]['score'], ':P' => $csv[$i]['price'], ':U' => $csv[$i]['up'], ':K' => $csv[$i]['keeps_value'], ':D' => $csv[$i]['down'], ':O' => $csv[$i]['opponent']));
            $i++;
        }


    }
}
