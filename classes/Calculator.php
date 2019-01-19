<?php

class Calculator {
    
    /**
    * @param array $data Row to insert, associative array
    * @return type
    */
    function insertOne(array $data) {
        
        $connection = DB::getInstance();

        $data['operation_date'] = date('Y-m-d H:i:s');

        $columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";

        $values = array();

        foreach ($data as $value) {
                $values[] = "'" . $value . "'";
        }

        $valuesPart = "(" . implode(', ', $values) . ")";

        $query = "INSERT INTO `multiplication_table` " . $columnsPart . " VALUES " . $valuesPart;

        $stmt = $connection->prepare($query);
        
        foreach ($data as $key => $v) {
    
        $stmt->bindParam(":$key", $v);
        }
        
        $stmt->execute();

        $connection = null;
        
        $successMessage = "Trazeni rezultat je: ".$data['result'].", uspesno ste uneli podatke u bazu!";

        echo json_encode($successMessage);
   }
   
}

