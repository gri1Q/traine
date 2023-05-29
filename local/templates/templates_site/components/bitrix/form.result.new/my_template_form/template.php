<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if ($arResult["isFormErrors"] == "Y") : ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><?php endif; ?>
<?= $arResult["FORM_NOTE"] ?>
<?php if ($arResult["isFormNote"] != "Y") { ?>
	<div class="contact-form">
		<div class="contact-form__head">
			<div class="contact-form__head-title"><?= $arResult['FORM_TITLE'] ?></div>
			<div class="contact-form__head-text"><?= $arResult['FORM_DESCRIPTION'] ?></div>
		</div>
		<?= str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"]) ?>
		<div class="contact-form__form-inputs">
			<?php
			$replace = 'class="input__input"';
			foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
				if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
					echo $arQuestion["HTML_CODE"];
				} else {
					if ($FIELD_SID != "medicine_message") : ?>
						<?php $warning = null;
						if ($FIELD_SID == 'medicine_name') {
							$warning = 'Поле должно содержать не менее 3-х символов';
							$replace = "class=\"input__input\" id=\"$FIELD_SID\" value=\"\" required=\"\"";
						}
						if ($FIELD_SID == 'medicine_company') {
							$warning = 'Поле должно содержать не менее 3-х символов';
							$replace = "class=\"input__input\" id=\"$FIELD_SID\" value=\"\" required=\"\"";
						}
						if ($FIELD_SID == 'medicine_email') {
							$warning = 'Неверный формат почты';
							$replace = "class=\"input__input\" id=\"$FIELD_SID\" value=\"\" required=\"\"";
						}
						if ($FIELD_SID == 'medicine_phone') {
							$replace = "class='input__input' type=\"tel\" id=\"$FIELD_SID\"
							data-inputmask=\"'mask': '+79999999999', 'clearIncomplete': 'true'\" maxlength=\"12\"
							x-autocompletetype=\"phone-full\" value=\"\" required=\"\"";
						} ?>
						<div class="input contact-form__input"><label class="input__label" for="<?= $FIELD_SID ?>">
								<div class="input__label-text"><?= $arQuestion['CAPTION'] ?></div>
								<?= str_replace('class="inputtext"', $replace, $arQuestion['HTML_CODE']) ?>
								<div class="input__notification"><?= $warning ?></div>
								<? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])) : ?>
									<div class="input__notification"><?= $warning ?></div>
								<? endif; ?>
							</label>
						</div>
					<?php endif; ?>
			<?php	}
			} ?>
		</div>
		<div class="contact-form__form-message">
			<div class="input"><label class="input__label" for="medicine_message">
					<div class="input__label-text"><?= $arResult["QUESTIONS"]['medicine_message']['CAPTION'] ?></div>
					<?= str_replace('cols="40" rows="5" class="inputtextarea"', $replace, $arResult["QUESTIONS"]['medicine_message']['HTML_CODE']) ?>
					<div class="input__notification"></div>
				</label></div>
		</div>
		<div class="contact-form__bottom">
			<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
				ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
				данных&raquo;.
			</div>
			<button class="form-button contact-form__bottom-button" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?> type="submit" name="web_form_submit" data-success="Отправлено" data-error="Ошибка отправки">
				<input type="hidden" name="web_form_apply" value="Y" />
				<div class="form-button__title">Оставить заявку</div>
			</button>
		</div>
		<?= $arResult['FORM_FOOTER'] ?>
	</div>
<?php
} ?>