<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek's Bakery</title>
    <link rel="stylesheet" href="<?= URL_CSS ?>base.css">
    <link rel="stylesheet" href="<?= URL_CSS ?>header.css">
    <link rel="stylesheet" href="<?= URL_CSS ?>reset.css">
    <link rel="stylesheet" href="<?= URL_CSS ?>home.css">
    <link rel="stylesheet" href="<?= URL_CSS ?>footer.css">
</head>
<body>
    <!-- Header -->
    <?php require_once VIEW."/shared/header.php" ?>

    <!-- Banner -->
    <div class="banner">
        <img src="<?= URL_ICON ?>Banner.svg" alt="Banner">
    </div>
    
    <!-- Categories -->
    <div class="wraper">
        <div class="container">
            <div class="category">
                <div class="category__title">
                    <h2>Experience Flavours</h2>
                </div>
                <ul class="category__list">
                    <?php foreach($data["caketype"] as $index => $caketypes) : ?>
                        <a href="#">
                            <li class="category__item">
                                <img src="<?= URL_CATEGORY ?><?= $caketypes["image"]?>" alt="<?= $caketypes["name"]?>">
                                <p class="category__item-name"><?= $caketypes["name"] ?></p>
                                <p class="category__item-desc">For Choco Addicts</p>
                            </li>
                        </a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Best Seller -->
    <div class="sell">
        <div class="sell__button-left">
            <img src="<?= URL_ICON ?>Arrow_1.svg" alt="Previous">
        </div>
        <div class="container container__sell">
            <div class="sell__title">
                <h2>Best Seller</h2>
            </div>
            <div class="sell__content">
                <div class="sell__content-img">
                    <img src="<?= URL_CAKE ?>12.1.jpg" alt="Chocolate Cake">
                </div>
                <div class="sell__content-content">
                    <p class="sell__content-title">Snicker Fuse Chocolate Cake</p>
                    <p class="sell__content-desc">Award yourself with this rich chocolate cake wonderfully crammed with Cadbury Fuse and white chocolate chunks and draped lusciously with molten chocolate. This perfect work of art hides in every bite of chocolate that is a little nutty and a lot of tasty!</p>
                    <p class="sell__content-new-price">350.000đ</p>
                    <p class="sell__content-old-price">400.000đ</p>
                    <button class="sell__content-add" type="submit">Add to cart +</button>
                </div>
            </div>
        </div>
        <div class="sell__button-right">
            <img src="<?= URL_ICON ?>Arrow_2.svg" alt="Next">
        </div>
    </div>

    <!-- Sweeties -->
    <div class="wraper">
        <div class="container">
            <div class="sweeties">
                <div class="sweeties__title">
                    <h2>Sweeties</h2>
                </div>
                <ul class="sweeties__list">
                    <?php foreach($data["cake"] as $index => $cakes) :?>
                        <a href="#">
                            <li class="sweeties__item">
                                <img src="<?= URL_CAKE ?><?= $cakes["image"] ?>" alt="<?= $cakes["name"] ?>">
                                <p class="sweeties__item-name"><?= $cakes["name"] ?></p>
                                <div class="sweeties__item-price">
                                    <p class="sweeties__item-new-price"><?= $cakes["price"] ?></p>
                                    <p class="sweeties__item-old-price">300.000</p>
                                </div>
                                <button class="sweeties__item-button" type="submit">Add to cart+</button>
                            </li>
                        </a>
                    <?php endforeach; ?>
                </ul>
                <ul class="sweeties__menu">
                    <li>
                        <img src="<?= URL_ICON ?>Arrow_1.svg" alt="Previous">
                    </li>
                    <li class="sweeties__menu-number">1</li>
                    <li class="sweeties__menu-number">2</li>
                    <li class="sweeties__menu-number">3</li>
                    <li class="sweeties__menu-number">4</li>
                    <li class="sweeties__menu-number">5</li>
                    <li>
                        <img src="<?= URL_ICON ?>Arrow_2.svg" alt="Previous">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once VIEW."/shared/footer.php" ?>
</body>
</html>