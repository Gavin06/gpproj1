
<?php
/**
 * Created by PhpStorm.
 * User: GP
 * Date: 2019-02-18
 * Time: 21:13
 */
main::start("myfile.csv");

class main {

    static public function start($filename) {

    $records = csv::getRecords($filename);

    print_r($records);
    }
    }

    class csv {

    static public function getrecords($filename){

            $file = fopen($filename, "r");

        while(! feof($file))
        {

        $record = fgetcsv($file);

        $records[] = $record;
    }

    fclose($file);
        return $records;
    }
}