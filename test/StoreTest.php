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
            Brand::deleteAll();
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

        function testdeleteAll()
        {
            $store_name = "Shoe Palace";
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = "Shoe Town";
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            Store::deleteAll();

            $result = Store::getAll();

            $this->assertEquals([], $result);
        }

        function testfind()
        {
            $store_name = "Shoe Palace";
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = "Shoe Town";
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            $result = Store::find($test_store->getId());

            $this->assertEquals($test_store, $result);
        }

        function testUpdate()
        {
            $store_name = "Shoe Palace";
            $test_store = new Store($store_name);
            $test_store->save();

            $new_store_name = "Shoe Tower";

            $test_store->update($new_store_name);
            //Assert
            $this->assertEquals("Shoe Tower", $test_store->getStoreName());
        }

        function testdelete()
        {
            $store_name = "Shoe Palace";
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = "Shoe Town";
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            $test_store->delete();
            $result = Store::getAll();

            $this->assertEquals([$test_store2], $result);
        }

        function testaddBrand()
        {
            $store_name = "Shoe Palace";
            $id = null;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $brand_name = "Asics";
            $id = null;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $test_store->addBrand($test_brand);

            $this->assertEquals($test_store->getBrands(), [$test_brand]);
        }

        function testgetBrands()
        {
            $store_name = "Shoe Palace";
            $id = null;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $brand_name = "Asics";
            $id = null;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "Nike";
            $test_brand2 = new Brand($brand_name2, $id);
            $test_brand2->save();

            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);

            $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
        }


    }
?>
