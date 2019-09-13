<?
CHTTP::SetStatus("404 Not Found");
defined("ERROR_404") || define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - Страница не найдена");
$APPLICATION->SetPageProperty("PAGE_LAYOUT", "column1");
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>