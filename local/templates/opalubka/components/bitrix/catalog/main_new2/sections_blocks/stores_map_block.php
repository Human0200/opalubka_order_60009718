<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	define("STATISTIC_SKIP_ACTIVITY_CHECK", "true");
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
}?>

<div class="drag-block container maps-container MAPS js-load-block loader_circle" data-class="maps_drag" data-order="1" data-file="<?=SITE_DIR;?>include/mainpage/components/maps/front_only_markers.php">
    <?$APPLICATION->IncludeComponent(
	"aspro:wrapper.block.max", 
	"front_map", 
	array(
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DISPLAY_COMPARE" => "Y",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"ELEMENT_COUNT" => "30",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arRegionality",
		"FILTER_PROP_CODE" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "12",
		"INCLUDE_SUBSECTIONS" => "Y",
		"TITLE_BLOCK" => "Адреса складов",
		"TITLE_BLOCK_DETAIL_NAME" => "Контакты",
		"TITLE_BLOCK_ALL" => "Перейти в раздел",
		"ALL_URL" => "contacts/stores/",
		"COMPONENT_TEMPLATE" => "front_map",
		"SECTION_ID" => "",
		"SECTION_CODE" => ""
	),
	false
);?>
</div>
<?
$text='<div class="seopodmena">
Наша компания имеет несколько складов опалубки, расположенных в Москве, которые обеспечивают быструю и эффективную доставку продукции до объекта клиента. Наши склады находятся в крупных городах и региональных центрах, что позволяет оптимизировать логистику и сократить время доставки до минимума. Каждый склад оборудован современными средствами хранения и обеспечен квалифицированным персоналом, гарантирующим сохранность и качество продукции. Наши клиенты могут легко выбрать наиболее удобный для них склад для самовывоза или организации доставки {{text_tip_roditpadej}}, что значительно упрощает логистику и снижает общие затраты на строительство.
</div>';
zamena_arenda(21,$arResult['VARIABLES']['SECTION_ID'],$text);
?>
