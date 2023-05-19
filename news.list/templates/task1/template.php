<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>


<div id="barba-wrapper">
        <?php foreach ($arResult['ITEMS'] as $property) :
        ?>
            <div class="article-list"><a class="article-item article-list__item" href="<?= $property['DETAIL_PAGE_URL'] ?>" data-anim="anim-3">
                    <div class="article-item__background"><img src="images/article-item-bg-6.jpg" data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx" alt="" /></div>
                    <div class="article-item__wrapper">
                        <div class="article-item__title"><?= $property['NAME'] ?></div>
                        <div class="article-item__content"><?= $property['PREVIEW_TEXT'] ?>
                        </div>
                    </div>
                </a></div>

        <?php endforeach; ?>
    </div>

