<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h4>Shopping cart</h4>
                <div class="d-flex flex-row align-items-center pull-right">
                    <span class="text-secondary">
                        <a class="text-decoration-none" href="<?= site_url('shop') ?>">
                            <i class="fa fa-angle-left mx-1"></i>
                            Continue Shopping
                        </a>

                    </span>
                </div>
            </div>
            <form method=post action="<?= site_url('cart/update') ?>">
                <?php if (is_array($items)) : ?>
                    <?php foreach ($items as $item) : ?>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                            <div class="mx-1">
                                <img class="rounded" src="<?= $item['img'] ?>" width="70">
                            </div>
                            <div class="d-flex flex-column align-items-center product-details">
                                <span class="font-weight-bold"><?= $item['title'] ?></span>
                                <div class="d-flex flex-row product-desc">
                                    <div class="size mx-1"><span class="text-secondary">Size:</span><span class="font-weight-bold">&nbsp;<?= $item['size'] ?></span></div>
                                    <div class="color"><span class="text-secondary">Color:</span><span class="font-weight-bold">&nbsp;<?= $item['color'] ?></span></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <input type="number" style="width: 60px;" class=" mx-1 form-control" min="1" name="quantity[]" value="<?= $item['quantity'] ?>">
                                <input type="submit" value="Update" class="btn btn-sm btn-outline-dark">
                            </div>
                            <div>
                                <h5 class="text-secondary">$<?= $item['quantity'] * $item['price'] ?></h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="<?= site_url('cart/remove/'. $item['id']) ?>">
                                    <i class="fa fa-trash mb-1 text-danger"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
            </form>
            <div class="d-flex flex-row align-items-center justify-content-center mt-3 p-2 bg-white rounded">
               <h3 class="text-black">Total: $<?= $total ?> </h3>
            </div>
            <div class="d-grid gap-2 align-items-center my-3 p-2 bg-white rounded">
                <button class="btn btn-warning btn-lg ml-2 pay-button" type="button">
                    Proceed to Pay
                </button>
            </div>
            <?php else: ?>
                <div class="display-3">
                    No product in cart
                </div>
            <?php endif ?>
        </div>
    </div>
</div>