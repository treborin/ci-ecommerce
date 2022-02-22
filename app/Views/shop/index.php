<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <div class="row">
                <div class="col-12">
                    <h1>Hello, <?= session()->get('firstname')  ?></h1>
                </div>
            </div>
            <p class="lead fw-normal text-white-50 mb-0">Shop in CodeIgniter the latest products from our store.</p>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if ($products) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?= $product['img'] ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder"><?= $product['title'] ?></h6>
                                    <!-- Product name-->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="row">
                                            <div class="col mt-2" style="font-size: 12px;">
                                                <span class="text-secondary">
                                                    <i class="fa fa-palette mx-2 text-success"></i>
                                                    <?= $product['color'] ?>
                                                </span>
                                                <span class="text-secondary">
                                                    <i class="fa fa-tag mx-2 text-success"></i>
                                                    <?= $product['size'] ?>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <!-- Product price-->
                                                <span class="text-secondary fw-bold fs-3 text-right">
                                                    $ <?= $product['price'] ?>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= site_url('/cart/buy/'.$product['id']) ?>">Add to Cart</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>