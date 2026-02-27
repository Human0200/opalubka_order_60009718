<?
global $arTheme, $NextSectionID, $arRegion;

$bUseModuleProps = \Bitrix\Main\Config\Option::get("iblock", "property_features_enabled", "N") === "Y";

if ($bUseModuleProps) {
    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
    $arParams['OFFERS_CART_PROPERTIES'] = \Bitrix\Catalog\Product\PropertyCatalogFeature::getBasketPropertyCodes($arSKU['IBLOCK_ID'], ['CODE' => 'Y']);
}

if($arRegion) {
    if($arRegion['LIST_PRICES'])
    {
        if(reset($arRegion['LIST_PRICES']) != 'component')
            $arParams['PRICE_CODE'] = array_keys($arRegion['LIST_PRICES']);
    }
    if($arRegion['LIST_STORES'])
    {
        if(reset($arRegion['LIST_STORES']) != 'component')
            $arParams['STORES'] = $arRegion['LIST_STORES'];
    }
}

if($arParams['LIST_PRICES']) {
    foreach($arParams['LIST_PRICES'] as $key => $price)
    {
        if(!$price)
            unset($arParams['LIST_PRICES'][$key]);
    }
}

if($arParams['STORES']) {
    foreach($arParams['STORES'] as $key => $store)
    {
        if(!$store)
            unset($arParams['STORES'][$key]);
    }
}

if($arRegion) {
    if($arRegion["LIST_STORES"] && $arParams["HIDE_NOT_AVAILABLE"] == "Y")
    {
        if($arParams['STORES']){
            if(CMax::checkVersionModule('18.6.200', 'iblock')){
                $arStoresFilter = array(
                    'STORE_NUMBER' => $arParams['STORES'],
                    '>STORE_AMOUNT' => 0,
                );
            }
            else{
                if(count($arParams['STORES']) > 1){
                    $arStoresFilter = array('LOGIC' => 'OR');
                    foreach($arParams['STORES'] as $storeID)
                    {
                        $arStoresFilter[] = array(">CATALOG_STORE_AMOUNT_".$storeID => 0);
                    }
                }
                else{
                    foreach($arParams['STORES'] as $storeID)
                    {
                        $arStoresFilter = array(">CATALOG_STORE_AMOUNT_".$storeID => 0);
                    }
                }
            }

            $arTmpFilter = array('!TYPE' => array('2', '3'));
            if($arStoresFilter){
                if(!CMax::checkVersionModule('18.6.200', 'iblock') && count($arStoresFilter) > 1){
                        $arTmpFilter[] = $arStoresFilter;
                }
                else{
                        $arTmpFilter = array_merge($arTmpFilter, $arStoresFilter);
                }

                $GLOBALS[$arParams["FILTER_NAME"]][] = array(
                        'LOGIC' => 'OR',
                        array('TYPE' => array('2','3')),
                        $arTmpFilter,
                );

            }
        }
    }
    $arParams["USE_REGION"] = "Y";

    $GLOBALS[$arParams['FILTER_NAME']]['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
    if(CMax::GetFrontParametrValue('REGIONALITY_FILTER_ITEM') == 'Y' && CMax::GetFrontParametrValue('REGIONALITY_FILTER_CATALOG') == 'Y'){
        $GLOBALS[$arParams['FILTER_NAME']]['PROPERTY_LINK_REGION'] = $arRegion['ID'];
    }
    CMax::makeElementFilterInRegion($GLOBALS[$arParams['FILTER_NAME']]);
}

if(CMax::GetFrontParametrValue('CATALOG_COMPARE') == 'N')
    $arParams["USE_COMPARE"] = 'N';

if(!in_array("DETAIL_PAGE_URL", (array)$arParams["LIST_OFFERS_FIELD_CODE"]))
    $arParams["LIST_OFFERS_FIELD_CODE"][] = "DETAIL_PAGE_URL";

if ($bUseModuleProps){
    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
    $arParams['OFFERS_CART_PROPERTIES'] = \Bitrix\Catalog\Product\PropertyCatalogFeature::getBasketPropertyCodes($arSKU['IBLOCK_ID'], ['CODE' => 'Y']);
}

$typeSKU = '';
$bSetElementsLineRow = false;
$typeTmpSKU = 0;

if($typeTmpSKU){
    $rsTypes = CUserFieldEnum::GetList(array(), array("ID" => $typeTmpSKU));
    if($arType = $rsTypes->Fetch()){
        $typeSKU = $arType['XML_ID'];
        $arTheme['TYPE_SKU']['VALUE'] = $typeSKU;
    }
}

global $arRootSectFilter;

$dbList = CIBlockSection::GetList([], ["IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE" => "Y", 'UF_HIDE_MAIN' => NULL], false, ["ID"], false);
while ($sect = $dbList->Fetch()) {
    $arRootSectFilter['SECTION_ID'][] = $sect['ID'];
}

$arTransferParams = array(
    "SHOW_ABSENT" => $arParams["SHOW_ABSENT"],
    "HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
    "PRICE_CODE" => $arParams["PRICE_CODE"],
    "OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
    "OFFER_SHOW_PREVIEW_PICTURE_PROPS" => $arParams["OFFER_SHOW_PREVIEW_PICTURE_PROPS"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
    "CURRENCY_ID" => $arParams["CURRENCY_ID"],
    "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
    "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
    "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
    "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
    "LIST_OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "LIST_OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
    "SHOW_DISCOUNT_TIME" => $arParams["SHOW_DISCOUNT_TIME"],
    "SHOW_COUNTER_LIST" => $arParams["SHOW_COUNTER_LIST"],
    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
    "SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
    "SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
    "SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
    "SHOW_DISCOUNT_PERCENT_NUMBER" => $arParams["SHOW_DISCOUNT_PERCENT_NUMBER"],
    "USE_REGION" => $arParams["USE_REGION"],
    "STORES" => $arParams["STORES"],
    "DEFAULT_COUNT" => $arParams["DEFAULT_COUNT"],
    "BASKET_URL" => $arParams["BASKET_URL"],
    "SHOW_GALLERY" => $arParams["SHOW_GALLERY"],
    "MAX_GALLERY_ITEMS" => $arParams["MAX_GALLERY_ITEMS"],
    "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
    "PARTIAL_PRODUCT_PROPERTIES" => $arParams["PARTIAL_PRODUCT_PROPERTIES"],
    "ADD_PROPERTIES_TO_BASKET" => $arParams["ADD_PROPERTIES_TO_BASKET"],
    "SHOW_ONE_CLICK_BUY" => $arParams["SHOW_ONE_CLICK_BUY"],
    "SHOW_DISCOUNT_TIME_EACH_SKU" => $arParams["SHOW_DISCOUNT_TIME_EACH_SKU"],
    "SHOW_ARTICLE_SKU" => $arParams["SHOW_ARTICLE_SKU"],
    "SHOW_POPUP_PRICE" => CMax::GetFrontParametrValue('SHOW_POPUP_PRICE'),
    "ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
    "ADD_DETAIL_TO_SLIDER" => $arParams["DETAIL_ADD_DETAIL_TO_SLIDER"],
    "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
    "IBINHERIT_TEMPLATES" => $arSeoItem ? $arIBInheritTemplates : array(),
    "DISPLAY_COMPARE" => CMax::GetFrontParametrValue('CATALOG_COMPARE'),
    "DISPLAY_WISH_BUTTONS" => $arParams["DISPLAY_WISH_BUTTONS"],
);

$bContolAjax = (isset($_REQUEST["AJAX_REQUEST"]) && $_REQUEST["AJAX_REQUEST"] == "Y" );

if ($bContolAjax) {
    $isAjax = "Y";
} else {
    $isAjax = "N";
}
?>

        <div class="2 js_wrapper_items<?= ($arTheme["LAZYLOAD_BLOCK_CATALOG"]["VALUE"] == "Y" ? ' with-load-block' : '') ?>" data-params='<?= str_replace('\'', '"', CUtil::PhpToJSObject($arTransferParams, false)) ?>'>
            <div class="js-load-wrapper">

<? // section elements ?>
<div class="inner_wrapper">
   <div class="ajax_load cur table" data-code="table">

    <? if ($bContolAjax): ?>
    <? $APPLICATION->RestartBuffer(); ?>
<? endif; ?>



<?
if ($_SERVER['HTTP_HOST']=='opalubka.market')
{
	//Город Москва
	$id_goroda=1404;
}
else {
	//Остальные города
	$poddomen=explode('.',$_SERVER['HTTP_HOST']);
	$poddomen=$poddomen[0];
	//echo $poddomen;
	$arSelect1 = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRIV");
	$arFilter1 = Array("IBLOCK_ID"=>40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","PROPERTY_WF_SUBDOMAIN"=>$poddomen);
	$res = CIBlockElement::GetList(Array(), $arFilter1, false, Array("nPageSize"=>50), $arSelect1);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$id_goroda=$arFields['ID'];
	}
}
$nowarray=array();
?>

<?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRIV");
$arFilter = Array("IBLOCK_ID"=>21, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","!PROPERTY_PRIV"=>false);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	if (in_array($id_goroda,$arProps['PRIV']['VALUE']))
	{
		$nowarray[]=$arFields['ID'];
	}
}
if (is_array($nowarray))
{
	$arRootSectFilter[]=array("!ID"=>$nowarray);
}

?>


<?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section",
        "catalog_table",
        Array(
            "USE_REGION" => ($arRegion ? "Y" : "N"),
            "STORES" => $arParams['STORES'],
            "SHOW_BIG_BLOCK" => 'N',
            "IS_CATALOG_PAGE" => 'Y',
            "SHOW_UNABLE_SKU_PROPS" => $arParams["SHOW_UNABLE_SKU_PROPS"],
            "ALT_TITLE_GET" => $arParams["ALT_TITLE_GET"],
            "SEF_URL_TEMPLATES" => $arParams["SEF_URL_TEMPLATES"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SHOW_COUNTER_LIST" => $arParams["SHOW_COUNTER_LIST"],
            "SECTION_ID" => "",
            "SECTION_CODE" => "",
            "AJAX_REQUEST" => $isAjax,
            "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
            "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
            "SHOW_DISCOUNT_TIME_EACH_SKU" => $arParams["SHOW_DISCOUNT_TIME_EACH_SKU"],
            "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
            "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
            "FILTER_NAME" => "arRootSectFilter",
            "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
            "PAGE_ELEMENT_COUNT" => "5",
            "LINE_ELEMENT_COUNT" => "5",
            "SET_LINE_ELEMENT_COUNT" => $bSetElementsLineRow,
            "DISPLAY_TYPE" => 'table',
            "TYPE_SKU" => ($typeSKU ? $typeSKU : $arTheme["TYPE_SKU"]["VALUE"]),
            "SET_SKU_TITLE" => ((($typeSKU == "TYPE_1" || $arTheme["TYPE_SKU"]["VALUE"] == "TYPE_1") && $arTheme["CHANGE_TITLE_ITEM_LIST"]["VALUE"] == "Y") ? "Y" : ""),
            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
            "SHOW_ARTICLE_SKU" => $arParams["SHOW_ARTICLE_SKU"],
            "SHOW_MEASURE_WITH_RATIO" => $arParams["SHOW_MEASURE_WITH_RATIO"],
            "MAX_SCU_COUNT_VIEW" => $arTheme['MAX_SCU_COUNT_VIEW']['VALUE'],
            "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
            "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
            "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
            "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
            "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
            "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
            'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
            'OFFER_SHOW_PREVIEW_PICTURE_PROPS' => $arParams['OFFER_SHOW_PREVIEW_PICTURE_PROPS'],
            "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
            "BASKET_URL" => $arParams["BASKET_URL"],
            "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
            "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "MAX_GALLERY_ITEMS" => $arParams["MAX_GALLERY_ITEMS"],
            "SHOW_GALLERY" => $arParams["SHOW_GALLERY"],
            "SHOW_PROPS" => (CMax::GetFrontParametrValue("SHOW_PROPS_BLOCK") == "Y" ? "Y" : "N"),
            'SHOW_POPUP_PRICE' => (CMax::GetFrontParametrValue('SHOW_POPUP_PRICE') == 'Y' ? "Y" : "N"),
            'TYPE_VIEW_BASKET_BTN' => CMax::GetFrontParametrValue('TYPE_VIEW_BASKET_BTN'),
            'TYPE_VIEW_CATALOG_LIST' => CMax::GetFrontParametrValue('TYPE_VIEW_CATALOG_LIST'),
            'SHOW_STORES_POPUP' => (CMax::GetFrontParametrValue('STORES_SOURCE') == 'STORES' && $arParams['STORES']),
            "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "AJAX_MODE" => $arParams["AJAX_MODE"],
            "AJAX_OPTION_JUMP" => $arParams["AJAX_OPTION_JUMP"],
            "AJAX_OPTION_STYLE" => $arParams["AJAX_OPTION_STYLE"],
            "AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
            "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
            "ADD_SECTIONS_CHAIN" => ($iSectionsCount && $arParams['INCLUDE_SUBSECTIONS'] == "N") ? 'N' : $arParams["ADD_SECTIONS_CHAIN"],
            "HIDE_NOT_AVAILABLE" => "N",
            'HIDE_NOT_AVAILABLE_OFFERS' => "N",
            "DISPLAY_COMPARE" => CMax::GetFrontParametrValue('CATALOG_COMPARE'),
            "USE_FAST_VIEW" => CMax::GetFrontParametrValue('USE_FAST_VIEW_PAGE_DETAIL'),
            "MANY_BUY_CATALOG_SECTIONS" => CMax::GetFrontParametrValue('MANY_BUY_CATALOG_SECTIONS'),
            "SET_TITLE" => $arParams["SET_TITLE"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "FILE_404" => $arParams["FILE_404"],
            "PRICE_CODE" => $arParams['PRICE_CODE'],
            "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
            "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
            "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
            "USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
            "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
            "PAGER_TEMPLATE" => "section",
            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
            "AJAX_OPTION_ADDITIONAL" => "",
            "ADD_CHAIN_ITEM" => "N",
            "SHOW_QUANTITY" => $arParams["SHOW_QUANTITY"],
            "ADD_DETAIL_TO_SLIDER" => $arParams["DETAIL_ADD_DETAIL_TO_SLIDER"],
            "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
            "SHOW_QUANTITY_COUNT" => $arParams["SHOW_QUANTITY_COUNT"],
            "SHOW_DISCOUNT_PERCENT_NUMBER" => $arParams["SHOW_DISCOUNT_PERCENT_NUMBER"],
            "SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
            "SHOW_DISCOUNT_TIME" => $arParams["SHOW_DISCOUNT_TIME"],
            "SHOW_ONE_CLICK_BUY" => $arParams["SHOW_ONE_CLICK_BUY"],
            "SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
            "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
            "CURRENCY_ID" => $arParams["CURRENCY_ID"],
            "USE_STORE" => $arParams["USE_STORE"],
            "MAX_AMOUNT" => $arParams["MAX_AMOUNT"],
            "MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
            "USE_MIN_AMOUNT" => $arParams["USE_MIN_AMOUNT"],
            "USE_ONLY_MAX_AMOUNT" => $arParams["USE_ONLY_MAX_AMOUNT"],
            "DISPLAY_WISH_BUTTONS" => $arParams["DISPLAY_WISH_BUTTONS"],
            "LIST_DISPLAY_POPUP_IMAGE" => $arParams["LIST_DISPLAY_POPUP_IMAGE"],
            "DEFAULT_COUNT" => $arParams["DEFAULT_COUNT"],
            "SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
            "SHOW_HINTS" => $arParams["SHOW_HINTS"],
            "USE_CUSTOM_RESIZE_LIST" => $arTheme['USE_CUSTOM_RESIZE_LIST']['VALUE'],
            "OFFER_HIDE_NAME_PROPS" => $arParams["OFFER_HIDE_NAME_PROPS"],
            "SHOW_SECTIONS_LIST_PREVIEW" => $arParams["SHOW_SECTIONS_LIST_PREVIEW"],
            "SECTIONS_LIST_PREVIEW_PROPERTY" => $arParams["SECTIONS_LIST_PREVIEW_PROPERTY"],
            "SHOW_SECTION_LIST_PICTURES" => $arParams["SHOW_SECTION_LIST_PICTURES"],
            "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
            "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
            "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
            "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
            "SALE_STIKER" => $arParams["SALE_STIKER"],
            "STIKERS_PROP" => $arParams["STIKERS_PROP"],
            "SHOW_RATING" => $arParams["SHOW_RATING"],
            "REVIEWS_VIEW" => (isset($arTheme['REVIEWS_VIEW']['VALUE']) && $arTheme['REVIEWS_VIEW']['VALUE'] == 'EXTENDED') || (!isset($arTheme['REVIEWS_VIEW']['VALUE']) && isset($arTheme['REVIEWS_VIEW']) && $arTheme['REVIEWS_VIEW'] == 'EXTENDED'),
            "ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
            "IBINHERIT_TEMPLATES" => array(),
            "FIELDS" => $arParams['FIELDS'],
            "USER_FIELDS" => $arParams['USER_FIELDS'],
            "SECTION_COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
            "SHOW_PROPS_TABLE" => $typeTableProps ?? strtolower(CMax::GetFrontParametrValue('SHOW_TABLE_PROPS')),
            "SHOW_OFFER_TREE_IN_TABLE" => CMax::GetFrontParametrValue('SHOW_OFFER_TREE_IN_TABLE'),
            "LOAD_ON_SCROLL" => "N",
            "SHOW_ALL_WO_SECTION" => "Y",
        ), $component, array("HIDE_ICONS" => $isAjax)
);
?>
<? if ($bContolAjax): ?>
    <? die(); ?>
<? endif; ?>


       </div>
</div>
                </div>
        </div>
