
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
    $table = html::generateTable($records);


        }
    }


class html {
    public static function tableRow ($row){
        $html = "<tr> $row </tr>";
        return $html;

    }
    public static function generateTable($records) {

        echo "<html><body><table>\n\n";
        $f = fopen("myfile.csv", "r");
        while (($line = fgetcsv($f)) !== false) {
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        fclose($f);
        echo "\n</table></body></html>";

 }

  }



 class csv {

    static public function getRecords($filename){

            $file = fopen($filename, "r");

            $fieldNames = array();

            $count = 0;


        while(! feof($file))
        {

        $record = fgetcsv($file);
        if($count == 0){
            $fieldNames = $record;
        }else {
            $records[] = recordFactory::create($fieldNames, $record);
        }
        $count++;
    }

    fclose($file);
        return $records;

    }

}

class record {

    public function __construct(Array $fieldNames = null, $values = null )
    {
        $record = array_combine($fieldNames, $values);

        foreach ($record as $property => $value) {

            $this->createProperty($property, $value);

        }
    }

    public function returnArray(){
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'first', $value = 'Gavin'){

        $this->{$name} = $value;

    }
}

class recordFactory {

    public static function create(Array $fileNames = null, Array $values = null) {


   $record = new record($fileNames, $values);

    return $record;

    }
 }





