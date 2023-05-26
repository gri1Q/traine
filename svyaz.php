<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Связь");
?><?$APPLICATION->IncludeComponent("bitrix:form.result.new","my_template_form",Array(
	"SEF_MODE" => "Y", 
	"WEB_FORM_ID" => 1, 
	"LIST_URL" => "", 
	"EDIT_URL" => "", 
	"SUCCESS_URL" => "", 
	"CHAIN_ITEM_TEXT" => "", 
	"CHAIN_ITEM_LINK" => "", 
	"IGNORE_CUSTOM_TEMPLATE" => "Y", 
	"USE_EXTENDED_ERRORS" => "Y", 
	"CACHE_TYPE" => "A", 
	"CACHE_TIME" => "3600", 
	"SEF_FOLDER" => "/", 
	"VARIABLE_ALIASES" => Array(
	)
)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>