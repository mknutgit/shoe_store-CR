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
            Store::deleteAll();
        }

        function testgetId()
        {
            $store_name = "Shoe Palace";
            $id = 1;

            $test_store = new Store($store_name, $id);

            $result = $test_store->getId();

            $this->assertEquals(1, $result);
        }

        function testSave()
        {
          $store_name = "Shoe Palace";

          $test_store = new Store($store_name);

          $test_store->save();

          $result = Store::getAll();

          $this->assertEquals($test_store, $result[0]);
        }

        function testgetAll()
        {
            $store_name = "Shoe Palace";
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = "Shoe Town";
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            $result = Store::getAll();

            $this->assertEquals([$test_store, $test_store2], $result);
        }

    }
?>
