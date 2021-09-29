<?php

namespace Models;

use Core\DBAdapter;

class DocumentModel extends DBModel
{
    public const SAVEPATH = "./data/documents/";

    protected $tableName = "documents";
    protected $idName = "document_id";

    public function create($data)
    {
        $query = "
            INSERT INTO ".$this->tableName."
            (
                organisation,
                counteragent,
                signer,
                dateofcontract_start,
                dateofcontract_finish,
                objectofcontract,
                currency,
                costofcontract,
                req_address,
                req_inn,
                req_chacc
            )
            VALUES(
                \"".$data["organisation"]."\",
                \"".$data["counteragent"]."\",
                \"".$data["signer"]."\",
                '".$data["dateofcontract"]["start"]."',
                '".$data["dateofcontract"]["finish"]."',
                \"".$data["objectofcontract"]."\",
                \"".$data["currency"]."\",
                ".$data["costofcontract"].",
                \"".$data["requisites"]["address"]."\",
                ".$data["requisites"]["inn"].",
                \"".$data["requisites"]["chacc"]."\"
            )
        ";
       
        DBAdapter::execSQL($query);

        // $inst = DBAdapter::getInstance();
        // $conn = $inst->getConnection();
        // var_dump(mysqli_error($conn));
    }

    public function update($id, $data)
    {
        $query = "
            UPDATE ".$this->tableName."
            SET
            organisation = \"".$data["organisation"]."\",
            counteragent = \"".$data["counteragent"]."\",
            signer = \"".$data["signer"]."\",
            dateofcontract_start = '".$data["dateofcontract"]["start"]."',
            dateofcontract_finish = '".$data["dateofcontract"]["finish"]."',
            objectofcontract = \"".$data["objectofcontract"]."\",
            currency = \"".$data["currency"]."\",
            costofcontract = ".$data["costofcontract"].",
            req_address = \"".$data["requisites"]["address"]."\",
            req_inn = ".$data["requisites"]["inn"].",
            req_chacc = \"".$data["requisites"]["chacc"]."\"
            WHERE document_id = ".$id.";
        ";

        DBAdapter::execSQL($query);

        var_dump($query);

        // $inst = DBAdapter::getInstance();
        // $conn = $inst->getConnection();
        // var_dump(mysqli_error($conn));
    }

    public function delete($id)
    {
        $query = "
            DELETE FROM ".$this->tableName."
            WHERE document_id=".$id.";
        ";
        DBAdapter::execSQL($query);
    }
}