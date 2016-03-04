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



    }
?>
