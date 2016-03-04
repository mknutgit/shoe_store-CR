<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    Class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
        {
            // Store::deleteAll();
        }

        function testgetId()
        {
            $store_name = "Shoe Palace";
            $id = 1;

            $test_store = new Store($store_name, $id);

            $result = $test_store->getId();

            $this->assertEquals(1, $result);
        }

    }
?>
