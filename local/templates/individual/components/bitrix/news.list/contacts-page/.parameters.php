<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"SET_TITLE" => array("HIDDEN" => "Y"),
	"PARENT_SECTION" => array("HIDDEN" => "Y"),
	"PARENT_SECTION_CODE" => array("HIDDEN" => "Y"),
	"INCLUDE_SUBSECTIONS" => array("HIDDEN" => "Y"),
	"STRICT_SECTION_CHECK" => array("HIDDEN" => "Y"),
	"NEWS_COUNT" => array(
		"NAME" => GetMessage("FILIALS_COUNT"),
		"TYPE" => "STRING",
        "PARENT" => "BASE"
    ),
	"ADD_SECTIONS_CHAIN" => array("HIDDEN" => "Y"),
	"HIDE_LINK_WHEN_NO_DETAIL" => array("HIDDEN" => "Y"),
	"CHECK_DATES" => array(
		"NAME" => GetMessage("CHECK_DATES"),
		"TYPE" => "CHECKBOX"
	),
	"SORT_BY1" => array("HIDDEN" => "Y"),
	"SORT_ORDER1" => array("HIDDEN" => "Y"),
	"SORT_BY2"  => array("HIDDEN" => "Y"),
	"SORT_ORDER2" => array("HIDDEN" => "Y"),
	"FILTER_NAME" => array("HIDDEN" => "Y"),
	"DETAIL_URL" => array("HIDDEN" => "Y"),
	"AJAX_MODE" => array("HIDDEN" => "Y"),
	"AJAX_OPTION_JUMP" => array("HIDDEN" => "Y"),
	"AJAX_OPTION_STYLE" => array("HIDDEN" => "Y"),
	"AJAX_OPTION_HISTORY" => array("HIDDEN" => "Y"),
	"PREVIEW_TRUNCATE_LEN" => array("HIDDEN" => "Y"),
	"ACTIVE_DATE_FORMAT" => array("HIDDEN" => "Y"),
	"SET_TITLE" => array("HIDDEN" => "Y"),
	"SET_BROWSER_TITLE" => array("HIDDEN" => "Y"),
	"SET_META_KEYWORDS" => array("HIDDEN" => "Y"),
	"SET_META_DESCRIPTION" => array("HIDDEN" => "Y"),
	"SET_LAST_MODIFIED" => array("HIDDEN" => "Y"),
	"INCLUDE_IBLOCK_INTO_CHAIN" => array("HIDDEN" => "Y"),
);
?>
