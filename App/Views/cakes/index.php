<!-- Cakes -->
    <div class="wraper">
        <div class="container">
            <div class="sweeties">
                <div class="sweeties__title">
                    <h2>Cakes</h2>
                </div>
                <ul class="sweeties__list">
                    <?php foreach($data["cake_to_show"] as $index => $cakes) :?>
                        <a href="#">
                            <li class="sweeties__item">
                                <img src="<?= URL_CAKE ?><?= $cakes["image"] ?>" alt="<?= $cakes["name"] ?>">
                                <p class="sweeties__item-name"><?= $cakes["name"] ?></p>
                                <div class="sweeties__item-price">
                                    <p class="sweeties__item-new-price"><?= number_format($cakes["price"],0, ',','.') ?>đ</p>
                                    <p class="sweeties__item-old-price">300.000đ</p>
                                </div>
                                <button onclick="addToCart(<?= isset($_SESSION['user'])? $_SESSION['user']['id']: 0 ?> , <?= $cakes['id']?>)" class="sweeties__item-button" type="submit">Add to cart+</button>
                            </li>
                        </a>
                    <?php endforeach; ?>
                </ul>
                <ul class="sweeties__menu">
                    <li>
                        <a <?= $data['page']==1 ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT ?>/cakes/index?page=<?= $data['page']-1 ?>"><img src="<?= URL_ICON ?>Arrow_1.svg" alt="Previous"></a>
                    </li>
                    <?php for($i=1; $i<=$data["num_of_page"]; $i++) :?>
                        <a <?= $i==$data['page'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT ?>/cakes/index?page=<?= $i ?>"><li class="sweeties__menu-number <?= $i == $data['page'] ? "sweeties__menu-number--active" : "" ?>"><?= $i ?></li></a>
                    <?php endfor; ?>
                    <li>
                        <a <?= $data['page']==$data["num_of_page"] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT ?>/cakes/index?page=<?= $data['page']+1 ?>"><img src="<?= URL_ICON ?>Arrow_2.svg" alt="Next"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>