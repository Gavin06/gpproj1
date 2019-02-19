<?php
/**
 * Created by PhpStorm.
 * User: GP
 * Date: 2019-02-18
 * Time: 21:13
 */

main::start();

class main {

    static public function start() {

        $file = fopen("myfile.csv", "r");

        while (! feof($file))
        {

            print_r(fgetcsv($file));
        }
        fclose($file);
    }

}