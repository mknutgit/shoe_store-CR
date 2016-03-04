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
            // Brand::deleteAll();
        }

        function testgetId()
        {
            $brand_name = "Asics";
            $id = 1;

            $test_brand = new Store($brand_name, $id);

            $result = $test_brand->getId();

            $this->assertEquals(1, $result);
        }
    }
?>
