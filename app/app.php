<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    ////*render home page*////
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

    ///*render stores home page*///
    $app->get("/stores", function() use ($app) {
       return $app['twig']->render('stores_home.html.twig', array('stores' => Store::getAll(), 'all_brands' => Brand::getAll()));
    });

    ///*add stores to the stores home page*///
    $app->post("/stores", function() use ($app) {
        $store_name = $_POST['store_name'];
        $new_store = new Store($store_name);
        $new_store->save();
        return $app['twig']->render('stores_home.html.twig', array('stores' => Store::getAll()));
    });

    ///*render individual store page with brands*///
    $app->get("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $store->getBrands(), 'all_brands' => Brand::getAll()));
    });

    ///*render edit store page*///
    $app->get("/store/{id}/edit", function($id) use($app){
       $store = Store::find($id);
       return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });

    ///*update individual store name*///
    $app->patch("store_update/{id}", function($id) use ($app) {
        $store_name = $_POST['store_name'];
        $store = Store::find($id);
        $store->update($store_name);
        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $store->getBrands(), 'all_brands' => Brand::getAll()));
    });

    ///*add brands to individual store*///
    $app->post("/add_brands", function () use($app) {
        $brand = Brand::find($_POST['brand_id']);
        $store = Store::find($_POST['store_id']);
        $store->addBrand($brand);
        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $store->getBrands(), 'all_brands' => Brand::getAll()));
    });

    ///*delete single store*///
    $app->delete("/delete_store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        $store->delete();
        return $app['twig']->render('stores_home.html.twig', array('stores' => Store::getAll()));
    });

    ///*delete all stores*///
    $app->post("/delete_stores", function() use ($app) {
       Store::deleteAll();
       return $app['twig']->render('stores_home.html.twig', array('stores' => Store::getAll()));
    });

    /////** Brands **////////

    ///*rendor brands home page*///
    $app->get("/brands", function() use ($app) {
         return $app['twig']->render('brands_home.html.twig', array('brands' => Brand::getAll()));
    });

    ///*add brands to the brands home page*///
    $app->post("/brands", function () use ($app){
    $brand_name = $_POST['brand_name'];
    $new_brand = new Brand($brand_name);
    $new_brand->save();
    return $app['twig']->render('brands_home.html.twig', array('brands' => Brand::getAll()));
    });

    ///*renders individual brand page*///
    $app->get("/brand/{id}", function($id) use ($app) {
       $brand = Brand::find($id);
       return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores' => $brand->getStores(), 'all_stores' => Store::getAll()));
    });


    ///*add stores to individual brands*///
    $app->post("/add_stores", function () use($app) {
        $brand = Brand::find($_POST['brand_id']);
        $store = Store::find($_POST['store_id']);
        $brand->addStore($store);
        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores' => $brand->getStores(), 'all_stores' => Store::getAll()));
    });

    ///*delete single brand*///
    $app->delete("/delete_brand/{id}", function($id) use ($app) {
        $brand = Brand::find($id);
        $brand->delete();
        return $app['twig']->render('brands_home.html.twig', array('brands' => Brand::getAll()));
    });

    ///*delete all stores*///
    $app->post("/delete_brands", function() use ($app) {
       Brand::deleteAll();
       return $app['twig']->render('brands_home.html.twig', array('brands' => Brand::getAll()));
    });

    return $app;

?>
