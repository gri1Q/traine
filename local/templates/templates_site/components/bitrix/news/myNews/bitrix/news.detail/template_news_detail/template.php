<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="article-card">
	<div class="article-card__title"><?= $arResult['NAME'] ?></div>
	<div class="article-card__date"><?= $arResult['DISPLAY_ACTIVE_FROM'] ?></div>
	<div class="article-card__content">
		<div class="article-card__image sticky"><img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt="" data-object-fit="cover" />
		</div>
		<div class="article-card__text">
			<div class="block-content" data-anim="anim-3">
				<p></p>
				<p><?= $arResult['DETAIL_TEXT'] ?></p>
			</div>
			<a class="article-card__button" href="/news/">НАЗАД К НОВОСТЯМ</a>
		</div>
	</div>
</div>
