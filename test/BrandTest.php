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

    Class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function testgetId()
        {
            $brand_name = "Asics";
            $id = 1;

            $test_brand = new Store($brand_name, $id);

            $result = $test_brand->getId();

            $this->assertEquals(1, $result);
        }

        function testSave()
        {
          $brand_name = "Asics";

          $test_brand = new Brand($brand_name);

          $test_brand->save();

          $result = Brand::getAll();

          $this->assertEquals($test_brand, $result[0]);
        }

        function testgetAll()
        {
            $brand_name = "Asics";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "Ecco";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            $result = Brand::getAll();

            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testdeleteAll()
        {
            $brand_name = "Asics";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "Ecco";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            Brand::deleteAll();

            $result = Brand::getAll();

            $this->assertEquals([], $result);
        }

        function testfind()
        {
            $brand_name = "Asics";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "Ecco";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            $result = Brand::find($test_brand->getId());

            $this->assertEquals($test_brand, $result);
        }

        function testaddStore()
        {
            $brand_name = "Asics";
            $id = null;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $store_name = "Shoe Palace";
            $id = null;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $test_brand->addStore($test_store);

            $this->assertEquals($test_brand->getStores(), [$test_store]);
        }

        function testgetStores()
        {
            $brand_name = "Asics";
            $id = null;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $store_name = "Shoe Palace";
            $id = null;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $store_name2 = "Shoe Tower";
            $test_store2 = new Store($store_name2, $id);
            $test_store2->save();

            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
        }




    }
?>
