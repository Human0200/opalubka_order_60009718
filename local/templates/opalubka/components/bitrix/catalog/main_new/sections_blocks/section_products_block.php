<?
if ($section) {

} else {
    \Bitrix\Iblock\Component\Tools::process404(
        ""
        , ($arParams["SET_STATUS_404"] === "Y")
        , ($arParams["SET_STATUS_404"] === "Y")
        , ($arParams["SHOW_404"] === "Y")
        , $arParams["FILE_404"]
    );
}

if ($arRegion) {
    if ($arRegion['LIST_PRICES']) {
        if (reset($arRegion['LIST_PRICES']) != 'component')
            $arParams['PRICE_CODE'] = array_keys($arRegion['LIST_PRICES']);
    }
    if ($arRegion['LIST_STORES']) {
        if (reset($arRegion['LIST_STORES']) != 'component')
            $arParams['STORES'] = $arRegion['LIST_STORES'];
    }
}

if ($arParams['LIST_PRICES']) {
    foreach ($arParams['LIST_PRICES'] as $key => $price) {
        if (!$price)
            unset($arParams['LIST_PRICES'][$key]);
    }
}

if ($arParams['STORES']) {
    foreach ($arParams['STORES'] as $key => $store) {
        if (!$store)
            unset($arParams['STORES'][$key]);
    }
}

$NextSectionID = $arSection["ID"];
?>

<?
//seo
$catalogInfoIblockId = CMaxCache::$arIBlocks[SITE_ID]["aspro_max_catalog"]["aspro_max_catalog_info"][0];
if ($catalogInfoIblockId && !$bSimpleSectionTemplate) {
    /* fix */
    $current_url = $APPLICATION->GetCurDir();
    $real_url = $current_url;
    $current_url = str_replace(array('%25', '&quot;', '&#039;'), array('%', '"', "'"), $current_url); // for utf-8 fix some problem
    $encode_current_url = urlencode($current_url);
    $gaps_encode_current_url = str_replace(' ', '%20', $current_url);
    $encode_current_url_slash = str_replace(array('%2F', '+'), array('/', '%20'), $encode_current_url);
    $urldecodedCP = iconv("windows-1251", "utf-8//IGNORE", $current_url);
    $urldecodedCP_slash = str_replace(array('%2F'), array('/'), rawurlencode($urldecodedCP));
    $replacements = array('"', '%27', '%20', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%3F', '%23', '%5B', '%5D'); // for fix some problem  with spec chars in prop
    $entities = array("&quot;", '&#039;', ' ', '!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "?", "#", "[", "]");
    $replacedSpecChar = str_replace($entities, $replacements, $current_url);
    /**/

    $arSeoItems = CMaxCache::CIBLockElement_GetList(array('SORT' => 'ASC', 'CACHE' => array("MULTI" => "Y", "TAG" => CMaxCache::GetIBlockCacheTag($catalogInfoIblockId))), array("IBLOCK_ID" => $catalogInfoIblockId, "ACTIVE" => "Y", "PROPERTY_FILTER_URL" => array($real_url, $current_url, $gaps_encode_current_url, $urldecodedCP_slash, $encode_current_url_slash, $replacedSpecChar)), false, false, array("ID", "IBLOCK_ID", "PROPERTY_FILTER_URL", "PROPERTY_LINK_REGION"));
    $arSeoItem = $arTmpRegionsLanding = array();
    if ($arSeoItems) {
        $iLandingItemID = 0;
        //$current_url =  $APPLICATION->GetCurDir();
        //$url = urldecode(str_replace(' ', '+', $current_url));
        foreach ($arSeoItems as $arItem) {
            if (!is_array($arItem['PROPERTY_LINK_REGION_VALUE']))
                $arItem['PROPERTY_LINK_REGION_VALUE'] = (array)$arItem['PROPERTY_LINK_REGION_VALUE'];

            if (!$arSeoItem) {
                //$urldecoded = urldecode($arItem["PROPERTY_FILTER_URL_VALUE"]);
                //$urldecodedCP = iconv("utf-8", "windows-1251//IGNORE", $urldecoded);
                //if($urldecoded == $url || $urldecoded == $current_url || $urldecodedCP == $current_url)
                //{
                if ($arItem['PROPERTY_LINK_REGION_VALUE']) {
                    if ($arRegion && in_array($arRegion['ID'], $arItem['PROPERTY_LINK_REGION_VALUE']))
                        $arSeoItem = $arItem;
                } else {
                    $arSeoItem = $arItem;
                }

                if ($arSeoItem) {
                    $iLandingItemID = $arSeoItem['ID'];
                    $arSeoItem = CMaxCache::CIBLockElement_GetList(array('SORT' => 'ASC', 'CACHE' => array("MULTI" => "N", "TAG" => CMaxCache::GetIBlockCacheTag($catalogInfoIblockId))), array("IBLOCK_ID" => $catalogInfoIblockId, "ID" => $iLandingItemID), false, false, array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_PICTURE", "PROPERTY_FILTER_URL", "PROPERTY_LINK_REGION", "PROPERTY_FORM_QUESTION", "PROPERTY_SECTION_SERVICES", "PROPERTY_TIZERS", "PROPERTY_SECTION", "DETAIL_TEXT", "PROPERTY_I_ELEMENT_PAGE_TITLE", "PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_ALT", "PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_TITLE", "PROPERTY_I_SKU_PAGE_TITLE", "PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_ALT", "PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_TITLE", "ElementValues"));

                    $arIBInheritTemplates = array(
                        "ELEMENT_PAGE_TITLE" => $arSeoItem["PROPERTY_I_ELEMENT_PAGE_TITLE_VALUE"],
                        "ELEMENT_PREVIEW_PICTURE_FILE_ALT" => $arSeoItem["PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_ALT_VALUE"],
                        "ELEMENT_PREVIEW_PICTURE_FILE_TITLE" => $arSeoItem["PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_TITLE_VALUE"],
                        "SKU_PAGE_TITLE" => $arSeoItem["PROPERTY_I_SKU_PAGE_TITLE_VALUE"],
                        "SKU_PREVIEW_PICTURE_FILE_ALT" => $arSeoItem["PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_ALT_VALUE"],
                        "SKU_PREVIEW_PICTURE_FILE_TITLE" => $arSeoItem["PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_TITLE_VALUE"],
                    );

                    \Aspro\Max\Smartseo\General\Smartseo::disallowNoindexRule(true);
                }
                //}
            }

            if ($arItem['PROPERTY_LINK_REGION_VALUE']) {
                if (!$arRegion || !in_array($arRegion['ID'], $arItem['PROPERTY_LINK_REGION_VALUE']))
                    $arTmpRegionsLanding[] = $arItem['ID'];
            }
        }
    }

    if ($arSeoItems && $bHideSideSectionBlock) {
        $arSeoItems = [];
    }
}

if ($arRegion) {
    if ($arRegion["LIST_STORES"] && $arParams["HIDE_NOT_AVAILABLE"] == "Y") {
        if ($arParams['STORES']) {
            if (CMax::checkVersionModule('18.6.200', 'iblock')) {
                $arStoresFilter = array(
                    'STORE_NUMBER' => $arParams['STORES'],
                    '>STORE_AMOUNT' => 0,
                );
            } else {
                if (count($arParams['STORES']) > 1) {
                    $arStoresFilter = array('LOGIC' => 'OR');
                    foreach ($arParams['STORES'] as $storeID) {
                        $arStoresFilter[] = array(">CATALOG_STORE_AMOUNT_" . $storeID => 0);
                    }
                } else {
                    foreach ($arParams['STORES'] as $storeID) {
                        $arStoresFilter = array(">CATALOG_STORE_AMOUNT_" . $storeID => 0);
                    }
                }
            }

            $arTmpFilter = array('!TYPE' => array('2', '3'));
            if ($arStoresFilter) {
                if (!CMax::checkVersionModule('18.6.200', 'iblock') && count($arStoresFilter) > 1) {
                    $arTmpFilter[] = $arStoresFilter;
                } else {
                    $arTmpFilter = array_merge($arTmpFilter, $arStoresFilter);
                }

                $GLOBALS[$arParams["FILTER_NAME"]][] = array(
                    'LOGIC' => 'OR',
                    array('TYPE' => array('2', '3')),
                    $arTmpFilter,
                );
            }
        }
    }
    $arParams["USE_REGION"] = "Y";

    $GLOBALS[$arParams['FILTER_NAME']]['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
    if (CMax::GetFrontParametrValue('REGIONALITY_FILTER_ITEM') == 'Y' && CMax::GetFrontParametrValue('REGIONALITY_FILTER_CATALOG') == 'Y') {
        $GLOBALS[$arParams['FILTER_NAME']]['PROPERTY_LINK_REGION'] = $arRegion['ID'];
    }
    CMax::makeElementFilterInRegion($GLOBALS[$arParams['FILTER_NAME']]);
}

/* hide compare link from module options */
if (CMax::GetFrontParametrValue('CATALOG_COMPARE') == 'N')
    $arParams["USE_COMPARE"] = 'N';
/**/

$arParams['DISPLAY_WISH_BUTTONS'] = CMax::GetFrontParametrValue('CATALOG_DELAY');
?>
<?
if (!in_array("DETAIL_PAGE_URL", (array)$arParams["LIST_OFFERS_FIELD_CODE"]))
    $arParams["LIST_OFFERS_FIELD_CODE"][] = "DETAIL_PAGE_URL";

if ($bUseModuleProps) {
    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
    $arParams['OFFERS_CART_PROPERTIES'] = \Bitrix\Catalog\Product\PropertyCatalogFeature::getBasketPropertyCodes($arSKU['IBLOCK_ID'], ['CODE' => 'Y']);
}
?>

<?
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
?>

<? $bContolAjax = (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest" && isset($_GET["control_ajax"]) && $_GET["control_ajax"] == "Y"); ?>
<? // section elements?>

<div class="1 js_wrapper_items<?= ($arTheme["LAZYLOAD_BLOCK_CATALOG"]["VALUE"] == "Y" ? ' with-load-block' : '') ?>"
     data-params='<?= str_replace('\'', '"', CUtil::PhpToJSObject($arTransferParams, false)) ?>'>
    <div class="js-load-wrapper">

        <? global $arTheme; ?>
        <? $isAjax = "N"; ?>
        <?
        if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest" && isset($_GET["ajax_get"]) && $_GET["ajax_get"] == "Y" || (isset($_GET["ajax_basket"]) && $_GET["ajax_basket"] == "Y")) {
            $isAjax = "Y";
        }
        ?>
        <?
        if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest" && isset($_GET["ajax_get_filter"]) && $_GET["ajax_get_filter"] == "Y") {
            $isAjaxFilter = "Y";
        }
        if (isset($isAjaxFilter) && $isAjaxFilter == "Y") {
            $isAjax = "N";
        }
        ?>
        <? $section_pos_top = \Bitrix\Main\Config\Option::get("aspro.max", "TOP_SECTION_DESCRIPTION_POSITION", "UF_SECTION_DESCR", SITE_ID); ?>
        <? $section_pos_bottom = \Bitrix\Main\Config\Option::get("aspro.max", "BOTTOM_SECTION_DESCRIPTION_POSITION", "DESCRIPTION", SITE_ID); ?>
        <? $sViewElementTemplate = ($arParams["LANDING_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["CATALOG_PAGE_LANDINGS"]["VALUE"] : $arParams["LANDING_TYPE_VIEW"]); ?>

        <style type="text/css">
            .sketchfab-embed-wrapper {
                height: 1000px;
            }
        </style>
        <script type="text/javascript" src="/lazyload.js"></script>
        <script type="text/javascript">

            $('#recentPosts').lazyload({
                threshold: 0,
                load: function (element) {
                    element.wrap("<div class='tab-pane active' id='recentPosts'></div>");

                },
                trigger: "appear"
            });

            $('#tab7').lazyload({
                threshold: 0,
                load: function (element) {
                    element.wrap("<div class='tab-pane active' id='tab7'></div>");
                },
                trigger: "appear"
            });
            $('.linkscroll').click(function () {

                var y = $(window).scrollTop();  //your current y position on the page
                $(window).scrollTop(y + 10);
            })


        </script>

        <? if ($itemsCnt): ?>
    <? if ($arParams['AJAX_MODE'] == 'Y' && strpos($_SERVER['REQUEST_URI'], 'bxajaxid') !== false): ?>
        <script type="text/javascript">
            /*setTimeout(function(){
             $('.ajax_load .catalog_block .catalog_item_wrapp .catalog_item .item-title').sliceHeight({resize: false});
             $('.ajax_load .catalog_block .catalog_item_wrapp .catalog_item .cost').sliceHeight({resize: false});
             $('.ajax_load .catalog_block .catalog_item_wrapp .item_info .sa_block').sliceHeight({resize: false});
             $('.ajax_load .catalog_block .catalog_item_wrapp').sliceHeight({classNull: '.footer_button', resize: false});
             }, 100);*/
            setStatusButton();
            InitLazyLoad();
            CheckTopMenuFullCatalogSubmenu();
        </script>
    <? endif; ?>
    <? if ($arTheme["FILTER_VIEW"]["VALUE"] == "VERTICAL" && $arTheme['LEFT_BLOCK_CATALOG_SECTIONS']['VALUE'] == 'Y') { ?>
    <? //add filter with ajax ?>
    <? if ($arParams['AJAX_MODE'] == 'Y' && strpos($_SERVER['REQUEST_URI'], 'bxajaxid') !== false): ?>
        <div class="filter_tmp swipeignore">
            <? include_once(__DIR__ . "/../filter.php") ?>
        </div>
        <script type="text/javascript">

            if (typeof window['trackBarOptions'] !== 'undefined' && window['trackBarOptions']) {
                window['trackBarValues'] = {}
                for (key in window['trackBarOptions']) {
                    window['trackBarValues'][key] = {
                        'leftPercent': window['trackBar' + key].leftPercent,
                        'leftValue': window['trackBar' + key].minInput.value,
                        'rightPercent': window['trackBar' + key].rightPercent,
                        'rightValue': window['trackBar' + key].maxInput.value,
                    }
                }
            }

            if ($('.filter_wrapper_ajax').length)
                $('.filter_wrapper_ajax').remove();
            var filter_node = $('.left_block .bx_filter.bx_filter_vertical'),
                new_filter_node = $('<div class="filter_wrapper_ajax"></div>'),
                left_block_node = $('#content .left_block');
            if (!filter_node.length) {
                if (left_block_node.find('.menu_top_block').length)
                    new_filter_node.insertAfter(left_block_node.find('.menu_top_block'));
            } else {
                new_filter_node.insertBefore(filter_node);
                filter_node.remove();
            }
            $('.filter_tmp').appendTo($('.filter_wrapper_ajax'));

            if (typeof window['trackBarOptions'] !== 'undefined' && window['trackBarOptions']) {
                for (key in window['trackBarOptions']) {
                    window['trackBarOptions'][key].leftPercent = window['trackBarValues'][key].leftPercent;
                    window['trackBarOptions'][key].rightPercent = window['trackBarValues'][key].rightPercent;
                    window['trackBarOptions'][key].curMinPrice = window['trackBarValues'][key].leftValue;
                    window['trackBarOptions'][key].curMaxPrice = window['trackBarValues'][key].rightValue;
                    window['trackBar' + key] = new BX.Iblock.SmartFilter(window['trackBarOptions'][key]);
                    if ('leftValue' in window['trackBarValues'][key] && window['trackBar' + key].minInput) {
                        window['trackBar' + key].minInput.value = window['trackBarValues'][key].leftValue;
                    }
                    if ('rightValue' in window['trackBarValues'][key] && window['trackBar' + key].maxInput) {
                        window['trackBar' + key].maxInput.value = window['trackBarValues'][key].rightValue;
                    }
                }
            }

        </script>
    <? endif; ?>
    <? ob_start(); ?>
    <? include_once(__DIR__ . "/../filter.php") ?>
        <script>
            $('#content > .wrapper_inner > .left_block').addClass('filter_ajax filter_visible');
        </script>
    <? $html = ob_get_clean(); ?>
    <? $APPLICATION->AddViewContent('left_menu', $html); ?>
    <? } ?>
        <div class="right_block1 clearfix catalog1 <?= strtolower($arTheme["FILTER_VIEW"]["VALUE"]); ?>"
             id="right_block_ajax">
            <div class="filter-panel-wrapper <? CMax::getVariable('filter_exists'); ?>">
                <?
                if ($isAjax == "N") {
                    $frame = new \Bitrix\Main\Page\FrameHelper("viewtype-block-top");
                    $frame->begin();
                    ?>
                <? } ?>
                <? if (!$bSimpleSectionTemplate): ?>
                    <? include_once(__DIR__ . "/../sort.php"); ?>
                    <? if ($arTheme["FILTER_VIEW"]["VALUE"] == "COMPACT" || $arTheme['LEFT_BLOCK_CATALOG_SECTIONS']['VALUE'] == 'N'): ?>
                        <div class="filter-compact-block swipeignore">
                            <? include(__DIR__ . "/../filter.php") ?>
                        </div>
                    <? endif; ?>
                <? endif; ?>
                <? if ($isAjax == "N"): ?>
                    <? $frame->end(); ?>
                <? endif; ?>
            </div>
            <? if ($arTheme["FILTER_VIEW"]["VALUE"] == 'VERTICAL'): ?>
                <div id="filter-helper-wrapper">
                    <div id="filter-helper" class="top">
                    </div>
                </div>
            <? endif; ?>
            <div class="bx_filter_section_text visible-xs visible-sm">
                <? $APPLICATION->IncludeFile(SITE_DIR . 'include/area_01.php', [], ['NAME' => 'area', 'MODE' => 'php']) ?>
            </div>
            <div class="inner_wrapper">
                <? endif; ?>
                <? if (!$arSeoItem): ?>
                    <?
                    if (
                        $arParams["SHOW_SECTION_DESC"] != 'N' &&
                        strpos($_SERVER['REQUEST_URI'], 'PAGEN') === false
                    ):
                        ?>
                        <? ob_start(); ?>
                        <? if ($posSectionDescr == "BOTH"): ?>
                        <? if ($arSection[$section_pos_top]): ?>
                            <div class="group_description_block top muted777">
                                <div>
                                    <?= $arSection[$section_pos_top] ?>
                                </div>
                            </div>
                        <? endif; ?>
                    <? elseif ($posSectionDescr == "TOP"): ?>
                        <? if ($arSection[$arParams["SECTION_PREVIEW_PROPERTY"]]): ?>
                            <div class="group_description_block top muted777">
                                <div>
                                    <?= $arSection[$arParams["SECTION_PREVIEW_PROPERTY"]] ?>
                                </div>
                            </div>
                        <? elseif ($arSection["DESCRIPTION"]): ?>
                            <div class="group_description_block top muted777">
                                <div>
                                    <?= $arSection["DESCRIPTION"] ?>
                                </div>
                            </div>
                        <? elseif ($arSection["UF_SECTION_DESCR"]): ?>
                            <div class="group_description_block top muted777">
                                <div>
                                    <?= $arSection["UF_SECTION_DESCR"] ?>
                                </div>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
                        <?
                        $html = ob_get_clean();
                        $APPLICATION->AddViewContent('top_desc', $html);
                        $APPLICATION->AddViewContent('top_content', $html);
                        ?>
                    <? endif; ?>
                <? endif; ?>
                <div class="item-cnt" data-count="<?= $itemsCnt; ?>">
                </div>
                <? if ($itemsCnt): ?>
                    <?
                    if ($isAjax == "N") {
                        $frame = new \Bitrix\Main\Page\FrameHelper("viewtype-block");
                        $frame->begin();
                        ?>
                    <? } ?>
                    <?
                    if ($isAjax == "Y") {
                        $APPLICATION->RestartBuffer();
                    }
                    ?>
                    <? $show = $arParams["PAGE_ELEMENT_COUNT"]; ?>
                    <? if ($isAjax == "N") { ?>
                        <div class="ajax_load cur <?= $display; ?>" data-code="<?= $display; ?>">
                    <? } ?>
                    <?
                    if ($_SESSION['SMART_FILTER_VAR']) {
                        $SMART_FILTER_FILTER = $GLOBALS[$_SESSION['SMART_FILTER_VAR']];
                    }

                    if ($arResult["VARIABLES"]['SECTION_ID']) {
                        $SMART_FILTER_FILTER['SECTION_ID'] = $arResult["VARIABLES"]['SECTION_ID'];
                    } else if ($arResult["VARIABLES"]['SECTION_CODE']) {
                        $SMART_FILTER_FILTER['SECTION_CODE'] = $arResult["VARIABLES"]['SECTION_CODE'];
                    }

                    $arSort = array(
                        $sort => $sort_order,
                        $arParams['ELEMENT_SORT_FIELD2'] => $arParams['ELEMENT_SORT_ORDER2'],
                    );
                    $SMART_FILTER_SORT = $arSort;
                    ?>

                    <!--newfilter start-->
                    <?
                    if ($_SERVER['HTTP_HOST'] == 'opalubka.market') {
                        //Город Москва
                        $id_goroda = 1404;
                    } else {
                        //Остальные города
                        $poddomen = explode('.', $_SERVER['HTTP_HOST']);
                        $poddomen = $poddomen[0];
                        //echo $poddomen;
                        $arSelect1 = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRIV");
                        $arFilter1 = array("IBLOCK_ID" => 40, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_WF_SUBDOMAIN" => $poddomen);
                        $res = CIBlockElement::GetList(array(), $arFilter1, false, array("nPageSize" => 50), $arSelect1);
                        while ($ob = $res->GetNextElement()) {
                            $arFields = $ob->GetFields();
                            $id_goroda = $arFields['ID'];
                        }
                    }
                    $nowarray = array();
                    ?>

                    <?

                    global $MAX_SMART_FILTER;


                    $arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRIV");
                    $arFilter = array("IBLOCK_ID" => 21, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "!PROPERTY_PRIV" => false);
                    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
                    while ($ob = $res->GetNextElement()) {
                        $arFields = $ob->GetFields();
                        $arProps = $ob->GetProperties();
                        if (in_array($id_goroda, $arProps['PRIV']['VALUE'])) {
                            $nowarray[] = $arFields['ID'];
                        }
                    }
                    if (is_array($nowarray)) {


                        $MAX_SMART_FILTER[] = array("!ID" => $nowarray);
                    }

//$MAX_SMART_FILTER[]=array("SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"]);
//print_r($MAX_SMART_FILTER);

                    ?>
                    <!--newfilter end-->


                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section",
                        $template,
                        array(
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
                            "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                            "AJAX_REQUEST" => $isAjax,
                            "ELEMENT_SORT_FIELD" => $sort,
                            "ELEMENT_SORT_ORDER" => $sort_order,
                            "SHOW_DISCOUNT_TIME_EACH_SKU" => $arParams["SHOW_DISCOUNT_TIME_EACH_SKU"],
                            "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                            "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                            "FILTER_NAME" => $arParams["FILTER_NAME"],
                            "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                            "PAGE_ELEMENT_COUNT" => $show,
                            "LINE_ELEMENT_COUNT" => $linerow,
                            "SET_LINE_ELEMENT_COUNT" => $bSetElementsLineRow,
                            "DISPLAY_TYPE" => $display,
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
                            "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                            'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
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
                            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
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
                            "IBINHERIT_TEMPLATES" => $arSeoItem ? $arIBInheritTemplates : array(),
                            "FIELDS" => $arParams['FIELDS'],
                            "USER_FIELDS" => $arParams['USER_FIELDS'],
                            "SECTION_COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                            "SHOW_PROPS_TABLE" => $typeTableProps ?? strtolower(CMax::GetFrontParametrValue('SHOW_TABLE_PROPS')),
                            "SHOW_OFFER_TREE_IN_TABLE" => CMax::GetFrontParametrValue('SHOW_OFFER_TREE_IN_TABLE'),
                            "LOAD_ON_SCROLL" => "N",
                        ), $component, array("HIDE_ICONS" => $isAjax)
                    );
                    ?>

                    <!--noindex-->
                    <script class="smart-filter-filter" data-skip-moving="true">
                        <? if ($SMART_FILTER_FILTER) { ?>
                        var filter = <?= \Bitrix\Main\Web\Json::encode($SMART_FILTER_FILTER); ?>
                        <? } ?>
                    </script>
                    <? if ($SMART_FILTER_SORT): ?>
                        <script class="smart-filter-sort" data-skip-moving="true">
                            var filter = <?= \Bitrix\Main\Web\Json::encode($SMART_FILTER_SORT) ?>
                        </script>
                    <? endif; ?>
                    <!--/noindex-->

                    <? if ($isAjax != "Y") { ?>
                        </div>
                        <? $frame->end(); ?>
                    <? } ?>
                <? else: ?>
                    <? if (!$iSectionsCount): ?>
                        <div class="no_goods">
                            <div class="no_products">
                                <div class="wrap_text_empty">
                                    <? if ($_REQUEST["set_filter"]) { ?>
                                        <? $APPLICATION->IncludeFile(SITE_DIR . "include/section_no_products_filter.php", array(), array("MODE" => "html", "NAME" => GetMessage('EMPTY_CATALOG_DESCR'))); ?>
                                    <? } else { ?>
                                        <? $APPLICATION->IncludeFile(SITE_DIR . "include/section_no_products.php", array(), array("MODE" => "html", "NAME" => GetMessage('EMPTY_CATALOG_DESCR'))); ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                <? endif; ?>

                <?
                global $arSite, $arTheme;
                $postfix = "";

                $bBitrixAjax = (strpos($_SERVER["QUERY_STRING"], "bxajaxid") !== false);
                if ($arTheme["HIDE_SITE_NAME_TITLE"]["VALUE"] == "N" && ($bBitrixAjax || $isAjaxFilter)) {
                    $postfix = " - " . $arSite["NAME"];
                }
                ?>
                <? if ($itemsCnt): ?>
                    <?
                    if ($isAjax == "Y") {
                        die();
                    }
                    ?>
                    <? /*
                          </div>
                          </div>
                         */ ?>
                    <?
                    if ($bBitrixAjax) {
                        $page_title = $arValues['SECTION_META_TITLE'] ? $arValues['SECTION_META_TITLE'] : $arSection["NAME"];
                        if ($page_title) {
                            $APPLICATION->SetPageProperty("title", $page_title . $postfix);
                        }
                    }
                    ?>
                <? else: ?>
                    <? if (!$section): ?>
                        <?
                        \Bitrix\Iblock\Component\Tools::process404(
                            trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_NEWS_NA")
                            , true
                            , $arParams["SET_STATUS_404"] === "Y"
                            , $arParams["SHOW_404"] === "Y"
                            , $arParams["FILE_404"]
                        );
                        ?>
                    <? else: ?>
                        <?
                        $ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues($arParams["IBLOCK_ID"], IntVal($arSection["ID"]));
                        $arValues = $ipropValues->getValues();
                        if ($arParams["SET_TITLE"] !== 'N') {
                            $page_h1 = $arValues['SECTION_PAGE_TITLE'] ? $arValues['SECTION_PAGE_TITLE'] : $arSection["NAME"];
                            if ($page_h1) {
                                $APPLICATION->SetTitle($page_h1);
                            } else {
                                $APPLICATION->SetTitle($arSection["NAME"]);
                            }
                        }
                        $page_title = $arValues['SECTION_META_TITLE'] ? $arValues['SECTION_META_TITLE'] : $arSection["NAME"];
                        if ($page_title) {
                            $APPLICATION->SetPageProperty("title", $page_title . $postfix);
                        }
                        if ($arValues['SECTION_META_DESCRIPTION']) {
                            $APPLICATION->SetPageProperty("description", $arValues['SECTION_META_DESCRIPTION']);
                        }
                        if ($arValues['SECTION_META_KEYWORDS']) {
                            $APPLICATION->SetPageProperty("keywords", $arValues['SECTION_META_KEYWORDS']);
                        }
                        ?>
                    <? endif; ?>
                <? endif; ?>
                <?
                if ($arSeoItem) {
                    $langing_seo_h1 = ($arSeoItem["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] != "" ? $arSeoItem["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] : $arSeoItem["NAME"]);

                    $APPLICATION->SetTitle($langing_seo_h1);

                    if ($arSeoItem["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"])
                        $APPLICATION->SetPageProperty("title", $arSeoItem["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
                    else
                        $APPLICATION->SetPageProperty("title", $arSeoItem["NAME"] . $postfix);

                    if ($arSeoItem["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"])
                        $APPLICATION->SetPageProperty("description", $arSeoItem["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);

                    if ($arSeoItem["IPROPERTY_VALUES"]['ELEMENT_META_KEYWORDS'])
                        $APPLICATION->SetPageProperty("keywords", $arSeoItem["IPROPERTY_VALUES"]['ELEMENT_META_KEYWORDS']);
                    ?>
                <? } ?>
                <?
                if ($arParams["AJAX_MODE"] !== "Y" && isset($isAjaxFilter) && $isAjaxFilter) {
                    Aspro\Max\Smartseo\General\SmartseoEngine::replaceSeoPropertyOnPage();
                }
                ?>
                <? if ($arParams["AJAX_MODE"] !== "Y" && isset($isAjaxFilter) && $isAjaxFilter): ?>
                    <div class="hidden ajax_breadcrumb">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => SITE_ID,
                            "SHOW_SUBSECTIONS" => "N"
                        ),
                            false
                        );
                        ?>
                    </div>
                <? endif; ?>
                <? if (isset($isAjaxFilter) && $isAjaxFilter): ?>
                    <? global $APPLICATION; ?>
                    <?
                    $arAdditionalData['TITLE'] = htmlspecialcharsback($APPLICATION->GetTitle());
                    if ($arSeoItem) {
                        $postfix = '';
                    }
                    $arAdditionalData['WINDOW_TITLE'] = htmlspecialcharsback($APPLICATION->GetTitle('title') . $postfix);
                    ?>
                    <script type="text/javascript">
                        BX.removeCustomEvent("onAjaxSuccessFilter", function tt(e) {
                        });
                        BX.addCustomEvent("onAjaxSuccessFilter", function tt(e) {
                            var arAjaxPageData = <?= CUtil::PhpToJSObject($arAdditionalData); ?>;
                            if ($('.element-count-wrapper .element-count').length) {
                                //$('.element-count-wrapper .element-count').text($('.js_append').closest('.ajax_load.cur').find('.bottom_nav').attr('data-all_count'));
                                var cntFromNav = $('.js_append').closest('.ajax_load.cur').find('.bottom_nav').attr('data-all_count');
                                if (cntFromNav) {
                                    $('.element-count-wrapper .element-count').text(cntFromNav);
                                } else {
                                    $('.element-count-wrapper .element-count').text($('.js_append > div.item:not(.flexbox)').length)
                                }
                            }
                            <? if ($arParams["AJAX_MODE"] !== "Y"): ?>
                            if (arAjaxPageData.TITLE)
                                BX.ajax.UpdatePageTitle(arAjaxPageData.TITLE);
                            if (arAjaxPageData.WINDOW_TITLE || arAjaxPageData.TITLE)
                                BX.ajax.UpdateWindowTitle(arAjaxPageData.WINDOW_TITLE || arAjaxPageData.TITLE);

                            var ajaxBreadCrumb = $('.ajax_breadcrumb .breadcrumbs');
                            if (ajaxBreadCrumb.length) {
                                $('#navigation').html(ajaxBreadCrumb);
                                $('.ajax_breadcrumb').remove();
                            }

                            <? endif; ?>

                        });
                    </script>
                <? endif; ?>
                <? if ($itemsCnt): ?>
            </div>
        </div>
    <? endif; ?>

        <? /* --------------------------------------------------------------- */ ?>

        <? if ($bContolAjax): ?>
            <? die(); ?>
        <? endif; ?>

    </div>
</div>


<?
CMax::get_banners_position('CONTENT_BOTTOM');
global $bannerContentBottom;
$bannerContentBottom = true;
?>
<? CMax::checkBreadcrumbsChain($arParams, $arSection); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.history.js'); ?>
