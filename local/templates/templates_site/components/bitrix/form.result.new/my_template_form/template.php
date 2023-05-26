<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if ($arResult["isFormErrors"] == "Y") : ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>
<?= $arResult["FORM_NOTE"] ?>
<? if ($arResult["isFormNote"] != "Y") {
	if ($arResult["isUseCaptcha"] == "Y") {
?>
		<b><?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?></b>
		<input type="hidden" name="captcha_sid" value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" width="180" height="40" />
		<?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?><?= $arResult["REQUIRED_SIGN"]; ?>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
	<?
	} // isUseCaptcha
	?>
	<div class="contact-form">
		<div class="contact-form__head">
			<div class="contact-form__head-title"><?= $arResult['FORM_TITLE'] ?></div>
			<div class="contact-form__head-text"><?= $arResult['FORM_DESCRIPTION'] ?>
			</div>
		</div>
		<?= str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"]) ?>

		<div class="contact-form__form-inputs">
			<?
			foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
				if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
					echo $arQuestion["HTML_CODE"];
				} else {
					if ($FIELD_SID == "medicine_message") {
						break;
					}
					$warning = null;
					if ($arQuestion['STRUCTURE'][0]['ID'] == 1) {
						$warning = "Поле должно содержать не менее 3-х символов";
						$arQuestion["HTML_CODE"] = '<input class="input__input" type="text" id="medicine_name" name="medicine_name" value=""
						required="">';
					}
					if ($arQuestion['STRUCTURE'][0]['ID'] == 2) {
						$warning = "Поле должно содержать не менее 3-х символов";
						$arQuestion["HTML_CODE"] = '<input class="input__input" type="text" id="medicine_company" name="medicine_company" value=""
						required="">';
					}
					if ($arQuestion['STRUCTURE'][0]['ID'] == 3) {
						$warning = "Неверный формат почты";
						$arQuestion["HTML_CODE"] = '<input class="input__input" type="email" id="medicine_email" name="medicine_email" value=""
						required="">';
					}
					if ($arQuestion['STRUCTURE'][0]['ID'] == 4) {
						$arQuestion["HTML_CODE"] = '<input class="input__input" type="tel" id="medicine_phone" data-inputmask="\'mask\': \'+79999999999\', \'clearIncomplete\': \'true\'" maxlength="12" x-autocompletetype="phone-full" name="medicine_phone" value="" required="">';
					}
			?>
					<?= $arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />" . $arQuestion["IMAGE"]["HTML_CODE"] : "" ?>
					<? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])) : ?>
						<span class="error-fld" title="<?= htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?>"></span>
					<? endif; ?>
					<div class="input contact-form__input"><label class="input__label" for="<?= $FIELD_SID ?>">
							<div class="input__label-text"><?= $arQuestion["CAPTION"] ?><? if ($arQuestion["REQUIRED"] == "Y") : ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
							<?= $arQuestion["HTML_CODE"] ?>
							<div class="input__notification"><?= $warning ?? '' ?></div>
						</label></div>
			<?
				}
			} //endwhile
			?>
			<!-- Форма сообщения -->
			<div class="contact-form__form-message">
				<div class="input"><label class="input__label" for="medicine_message">
						<div class="input__label-text"><?= $arResult["QUESTIONS"]['medicine_message']['CAPTION'] ?></div>
						<?= $arResult["QUESTIONS"]['medicine_message']['CAPTION'] = '<textarea class="input__input" type="text" id="medicine_message" name="medicine_message" value=""></textarea>' ?>
						<!-- <textarea class="input__input" type="text" id="medicine_message" name="medicine_message" value=""></textarea> -->
						<div class="input__notification"></div>
					</label></div>
			</div>

			<!-- <div class="input contact-form__input"><label class="input__label" for="medicine_name">
					<div class="input__label-text">Ваше имя*</div>
					<input class="input__input" type="text" id="medicine_name" name="medicine_name" value="" required="">
					<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
				</label></div>
			<div class="input contact-form__input"><label class="input__label" for="medicine_company">
					<div class="input__label-text">Компания/Должность*</div>
					<input class="input__input" type="text" id="medicine_company" name="medicine_company" value="" required="">
					<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
				</label></div>
			<div class="input contact-form__input"><label class="input__label" for="medicine_email">
					<div class="input__label-text">Email*</div>
					<input class="input__input" type="email" id="medicine_email" name="medicine_email" value="" required="">
					<div class="input__notification">Неверный формат почты</div>
				</label></div>
			<div class="input contact-form__input"><label class="input__label" for="medicine_phone">
					<div class="input__label-text">Номер телефона*</div>
					<input class="input__input" type="tel" id="medicine_phone" data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12" x-autocompletetype="phone-full" name="medicine_phone" value="" required="">
				</label></div>
		</div>
		 -->
			<div class="contact-form__bottom">
				<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
					ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
					данных&raquo;.
				</div>
				<button class="form-button contact-form__bottom-button" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?> type="submit" name="web_form_submit" data-success="Отправлено" data-error="Ошибка отправки">
					<div class="form-button__title">Оставить заявку</div>
				</button>
			</div>
			</form>
		</div>
		<p>
			<?= $arResult["REQUIRED_SIGN"]; ?> - <?= GetMessage("FORM_REQUIRED_FIELDS") ?>
		</p>
		<?= $arResult["FORM_FOOTER"] ?>
	<?
} //endif (isFormNote)