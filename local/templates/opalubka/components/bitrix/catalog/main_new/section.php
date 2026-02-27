<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<?

use Bitrix\Main\Loader,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\ModuleManager;

Loader::includeModule("iblock");

global $arTheme, $NextSectionID, $arRegion;
$arPageParams = $arSection = $section = array();
$_SESSION['SMART_FILTER_VAR'] = $arParams['FILTER_NAME'];

$bUseModuleProps = \Bitrix\Main\Config\Option::get("iblock", "property_features_enabled", "N") === "Y";

$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", (($arTheme["LEFT_BLOCK_CATALOG_SECTIONS"]["VALUE"] == "Y" && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29)  ? "N" : "Y")));
?>
<?$APPLICATION->AddViewContent('right_block_class', 'catalog_page ');?>
<?if(CMax::checkAjaxRequest2()):?>
	<div>
<?endif;?>
<div class="top-content-block"><?$APPLICATION->ShowViewContent('top_content');?><?$APPLICATION->ShowViewContent('top_content2');?></div>
<?if(CMax::checkAjaxRequest2()):?>
	</div>
<?endif;?>


<?// get current section ID
if($arResult["VARIABLES"]["SECTION_ID"] > 0){
	$arSectionFilter = array('GLOBAL_ACTIVE' => 'Y', "ID" => $arResult["VARIABLES"]["SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
}
elseif(strlen(trim($arResult["VARIABLES"]["SECTION_CODE"])) > 0){
	$arSectionFilter = array('GLOBAL_ACTIVE' => 'Y', "=CODE" => $arResult["VARIABLES"]["SECTION_CODE"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
}
$section = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeSectionFilterInRegion($arSectionFilter), false, array('TIMESTAMP_X', "ID", "IBLOCK_ID", 'UF_FAQ', "NAME", "DESCRIPTION", "PICTURE", "DETAIL_PICTURE", "UF_SHOW_CALC", "UF_SECTION_DESCR", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', 'UF_LINE_ELEMENT_CNT', 'UF_TABLE_PROPS', 'UF_SECTION_BG_DARK', 'UF_LINKED_BLOG', 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_BANNERS_WIDE','UF_ADDESC','UF_PANEL', 'UF_TOPPIC' ,'UF_TECH','UF_ICO','UF_NOICO','UF_TABS','UF_ADV','UF_AFT','UF_TOPCAT','UF_DOST','UF_ANONS','UF_BANNERS_MOBILE', $arParams["SECTION_DISPLAY_PROPERTY"], $arParams["SECTION_BG"], "IBLOCK_SECTION_ID", "DEPTH_LEVEL", "LEFT_MARGIN", "RIGHT_MARGIN"));
CMax::AddMeta([
	'og:image' => ($section['PICTURE'] || $section['DETAIL_PICTURE'] ? CFile::GetPath($section['PICTURE'] ?: $section['DETAIL_PICTURE']) : false),
]);

$typeSKU = '';
$bSetElementsLineRow = false;

if ($section) {
	$arSection["ID"] = $section["ID"];
	$arSection["NAME"] = $section["NAME"];
	$arSection["IBLOCK_SECTION_ID"] = $section["IBLOCK_SECTION_ID"];
	$arSection["DEPTH_LEVEL"] = $section["DEPTH_LEVEL"];
	if ($section[$arParams["SECTION_DISPLAY_PROPERTY"]]) {
		$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $section[$arParams["SECTION_DISPLAY_PROPERTY"]]));
		if ($arDisplay = $arDisplayRes->GetNext()) {
			$arSection["DISPLAY"] = $arDisplay["XML_ID"];
		}
	}
	if ($section["UF_LINE_ELEMENT_CNT"]) {
		$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $section["UF_LINE_ELEMENT_CNT"]));
		if ($arLineCnt = $arCntRes->GetNext()) {
			$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
			$bSetElementsLineRow = true;
		}
	}
	$viewTableProps = 0;
    if ($section['UF_TABLE_PROPS']) {
        $viewTableProps = $section['UF_TABLE_PROPS'];
    }

	$posSectionDescr = COption::GetOptionString("aspro.max", "SHOW_SECTION_DESCRIPTION", "BOTTOM", SITE_ID);
	if(strlen($section["DESCRIPTION"])){
		$arSection["DESCRIPTION"] = $section["DESCRIPTION"];
	}
	if(strlen($section["UF_SECTION_DESCR"])){
		$arSection["UF_SECTION_DESCR"] = $section["UF_SECTION_DESCR"];
	}

	global $arSubSectionFilter;
	$arSubSectionFilter = array(
		"SECTION_ID" => $arSection["ID"],
		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	$iSectionsCount = CMaxCache::CIBlockSection_GetCount(array('CACHE' => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeSectionFilterInRegion($arSubSectionFilter));

	$catalog_available = $arParams['HIDE_NOT_AVAILABLE'];
	if (!isset($arParams['HIDE_NOT_AVAILABLE'])) {
		$catalog_available = 'N';
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] != 'Y' && $arParams['HIDE_NOT_AVAILABLE'] != 'L') {
		$catalog_available = 'N';
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] == 'Y') {
		$catalog_available = 'Y';
	}
	$arElementFilter = array("SECTION_ID" => $arSection["ID"], "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
	if ($arParams["INCLUDE_SUBSECTIONS"] == "A") {
		$arElementFilter["INCLUDE_SUBSECTIONS"] = "Y";
		$arElementFilter["SECTION_GLOBAL_ACTIVE"] = "Y";
		$arElementFilter["SECTION_ACTIVE "] = "Y";
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] == 'Y') {
		$arElementFilter["CATALOG_AVAILABLE"] = $catalog_available;
	}

	$itemsCnt = CMaxCache::CIBlockElement_GetList(array("CACHE" => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeElementFilterInRegion($arElementFilter), array());

	// set offer type & smartfilter view
	$typeTmpSKU = $viewTmpFilter = 0;
	if ($section['UF_OFFERS_TYPE']) {
		$typeTmpSKU = $section['UF_OFFERS_TYPE'];
	}
	if ($section['UF_FILTER_VIEW']) {
		$viewTmpFilter = $section['UF_FILTER_VIEW'];
	}
	if ($section['UF_LINKED_BLOG']) {
		$linkedArticles = $section['UF_LINKED_BLOG'];
	}
	if ($section['UF_BLOG_BOTTOM']) {
		$linkedArticlesPos = 'bottom';
	}
	if ($section['UF_BLOG_WIDE']) {
		$linkedArticlesRows = $section['UF_BLOG_WIDE'];
	}
	if ($section['UF_BLOG_MOBILE']) {
		$linkedArticlesRowsMobile = $section['UF_BLOG_MOBILE'];
	}
	if ($section['UF_LINKED_BANNERS']) {
		$linkedBanners = $section['UF_LINKED_BANNERS'];
	}
	if ($section['UF_BANNERS_BOTTOM']) {
		$linkedBannersPos = 'bottom';
	}
	if ($section['UF_BANNERS_WIDE']) {
		$linkedBannersRows = $section['UF_BANNERS_WIDE'];
	}
	if ($section['UF_BANNERS_MOBILE']) {
		$linkedBannersRowsMobile = $section['UF_BANNERS_MOBILE'];
	}

	if (!$typeTmpSKU || !$viewTmpFilter || !$arSection["DISPLAY"] || !$bSetElementsLineRow 
		|| !$linkedArticles	|| !$linkedArticlesPos || $linkedArticlesRows || $linkedArticlesRowsMobile
		|| !$linkedBanners	|| !$linkedBannersPos || $linkedBannersRows || $linkedBannersRowsMobile || !$viewTableProps
		) {
		if ($section['DEPTH_LEVEL'] > 1) {
			$sectionParent = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "ID" => $section["IBLOCK_SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', $arParams["SECTION_DISPLAY_PROPERTY"], "UF_LINE_ELEMENT_CNT", "UF_TABLE_PROPS", "UF_LINKED_BLOG", 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_BANNERS_WIDE', 'UF_BANNERS_MOBILE',));
			if ($sectionParent['UF_OFFERS_TYPE'] && !$typeTmpSKU) {
				$typeTmpSKU = $sectionParent['UF_OFFERS_TYPE'];
			}
			if ($sectionParent['UF_FILTER_VIEW'] && !$viewTmpFilter) {
				$viewTmpFilter = $sectionParent['UF_FILTER_VIEW'];
			}
			if ($sectionParent['UF_LINKED_BLOG'] && !$linkedArticles) {
				$linkedArticles = $sectionParent['UF_LINKED_BLOG'];
			}
			if ($sectionParent['UF_BLOG_BOTTOM'] && !$linkedArticlesPos) {
				$linkedArticlesPos = 'bottom';
			}
			if ($sectionParent['UF_BLOG_WIDE'] && !$linkedArticlesRows) {
				$linkedArticlesRows = $sectionParent['UF_BLOG_WIDE'];
			}
			if ($sectionParent['UF_BLOG_MOBILE'] && !$linkedArticlesRowsMobile) {
				$linkedArticlesRowsMobile = $sectionParent['UF_BLOG_MOBILE'];
			}
			if ($sectionParent['UF_LINKED_BANNERS'] && !$linkedBanners) {
				$linkedBanners = $sectionParent['UF_LINKED_BANNERS'];
			}
			if ($sectionParent['UF_BANNERS_BOTTOM'] && !$linkedBannersPos) {
				$linkedBannersPos = 'bottom';
			}
			if ($sectionParent['UF_BANNERS_WIDE'] && !$linkedBannersRows) {
				$linkedBannersRows = $sectionParent['UF_BANNERS_WIDE'];
			}
			if ($sectionParent['UF_BANNERS_MOBILE'] && !$linkedBannersRowsMobile) {
				$linkedBannersRowsMobile = $sectionParent['UF_BANNERS_MOBILE'];
			}
			if ($sectionParent[$arParams["SECTION_DISPLAY_PROPERTY"]] && !$arSection["DISPLAY"]) {
				$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionParent[$arParams["SECTION_DISPLAY_PROPERTY"]]));
				if ($arDisplay = $arDisplayRes->GetNext()) {
					$arSection["DISPLAY"] = $arDisplay["XML_ID"];
				}
			}
			if ($sectionParent["UF_LINE_ELEMENT_CNT"] && !$bSetElementsLineRow) {
				$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionParent["UF_LINE_ELEMENT_CNT"]));
				if ($arLineCnt = $arCntRes->GetNext()) {
					$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
					$bSetElementsLineRow = true;
				}
			}
			if ($sectionParent['UF_TABLE_PROPS'] && !$viewTableProps) {
                $viewTableProps = $sectionParent['UF_TABLE_PROPS'];
            }
			

			if ($section['DEPTH_LEVEL'] > 2) {
				if (!$typeTmpSKU || !$viewTmpFilter || !$arSection["DISPLAY"] || !$bSetElementsLineRow  || !$viewTableProps) {
					$sectionRoot = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "<=LEFT_BORDER" => $section["LEFT_MARGIN"], ">=RIGHT_BORDER" => $section["RIGHT_MARGIN"], "DEPTH_LEVEL" => 1, "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', $arParams["SECTION_DISPLAY_PROPERTY"], "UF_LINE_ELEMENT_CNT", "UF_TABLE_PROPS", "UF_LINKED_BLOG", 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_BANNERS_WIDE', 'UF_BANNERS_MOBILE',));
					if ($sectionRoot['UF_OFFERS_TYPE'] && !$typeTmpSKU) {
						$typeTmpSKU = $sectionRoot['UF_OFFERS_TYPE'];
					}
					if ($sectionRoot['UF_FILTER_VIEW'] && !$viewTmpFilter) {
						$viewTmpFilter = $sectionRoot['UF_FILTER_VIEW'];
					}
					if ($sectionRoot['UF_LINKED_BLOG'] && !$linkedArticles) {
						$linkedArticles = $sectionRoot['UF_LINKED_BLOG'];
					}
					if ($sectionRoot['UF_BLOG_BOTTOM'] && !$linkedArticlesPos) {
						$linkedArticlesPos = 'bottom';
					}
					if ($sectionRoot['UF_BLOG_WIDE'] && !$linkedArticlesRows) {
						$linkedArticlesRows = $sectionRoot['UF_BLOG_WIDE'];
					}
					if ($sectionRoot['UF_BLOG_MOBILE'] && !$linkedArticlesRowsMobile) {
						$linkedArticlesRowsMobile = $sectionRoot['UF_BLOG_MOBILE'];
					}
					if ($sectionRoot['UF_LINKED_BANNERS'] && !$linkedBanners) {
						$linkedBanners = $sectionRoot['UF_LINKED_BANNERS'];
					}
					if ($sectionRoot['UF_BANNERS_BOTTOM'] && !$linkedBannersPos) {
						$linkedBannersPos = 'bottom';
					}
					if ($sectionRoot['UF_BANNERS_WIDE'] && !$linkedBannersRows) {
						$linkedBannersRows = $sectionRoot['UF_BANNERS_WIDE'];
					}
					if ($sectionRoot['UF_BANNERS_MOBILE'] && !$linkedBannersRowsMobile) {
						$linkedBannersRowsMobile = $sectionRoot['UF_BANNERS_MOBILE'];
					}
					if ($sectionRoot[$arParams["SECTION_DISPLAY_PROPERTY"]] && !$arSection["DISPLAY"]) {
						$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionRoot[$arParams["SECTION_DISPLAY_PROPERTY"]]));
						if ($arDisplay = $arDisplayRes->GetNext()) {
							$arSection["DISPLAY"] = $arDisplay["XML_ID"];
						}
					}
					if ($sectionRoot["UF_LINE_ELEMENT_CNT"] && !$bSetElementsLineRow) {
						$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionRoot["UF_LINE_ELEMENT_CNT"]));
						if ($arLineCnt = $arCntRes->GetNext()) {
							$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
							$bSetElementsLineRow = true;
						}
					}
					if ($sectionRoot['UF_TABLE_PROPS'] && !$viewTableProps) {
                        $viewTableProps = $sectionRoot['UF_TABLE_PROPS'];
                    }
				}
			}
		}
	}
	if($typeTmpSKU){
		$rsTypes = CUserFieldEnum::GetList(array(), array("ID" => $typeTmpSKU));
		if($arType = $rsTypes->Fetch()){
			$typeSKU = $arType['XML_ID'];
			$arTheme['TYPE_SKU']['VALUE'] = $typeSKU;
		}
	}
	if($viewTmpFilter){
		$rsViews = CUserFieldEnum::GetList(array(), array('ID' => $viewTmpFilter));
		if($arView = $rsViews->Fetch()){
			$viewFilter = $arView['XML_ID'];
			$arTheme['FILTER_VIEW']['VALUE'] = strtoupper($viewFilter);
		}
	}
	if ($viewTableProps) {
        $rsViews = CUserFieldEnum::GetList(array(), array('ID' => $viewTableProps));
        if ($arView = $rsViews->Fetch()) {
            $typeTableProps = strtolower($arView['XML_ID']);
        }
    }
}



$linerow = $arParams["LINE_ELEMENT_COUNT"];

if (!isset($linkedArticlesPos) || !$linkedArticlesPos) {
	$linkedArticlesPos = 'content';
}
if (!isset($linkedArticlesRows) || !$linkedArticlesRows) {
	$linkedArticlesRows = 1;
}
if (!isset($linkedArticlesRowsMobile) || !$linkedArticlesRowsMobile) {
	$linkedArticlesRowsMobile = 1;
}

if (!isset($linkedBannersPos) || !$linkedBannersPos) {
	$linkedBannersPos = 'content';
}
if (!isset($linkedBannersRows) || !$linkedBannersRows) {
	$linkedBannersRows = 1;
}
if (!isset($linkedBannersRowsMobile) || !$linkedBannersRowsMobile) {
	$linkedBannersRowsMobile = 1;
}

$bSimpleSectionTemplate = (isset($arSection["DISPLAY"]) && $arSection["DISPLAY"] == "simple");

if ($bSimpleSectionTemplate) {
	$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", "Y");
	$APPLICATION->AddViewContent('right_block_class', 'simple_page ');
	unset($arParams['LANDING_POSITION']);

	$template = 'catalog_'.$arSection["DISPLAY"];

	$arParams["USE_PRICE_COUNT"] = "N";
	$bSetElementsLineRow = true;

	$arTheme['MOBILE_CATALOG_LIST_ELEMENTS_COMPACT']['VALUE'] = 'Y';
	$arTheme['TYPE_SKU']['VALUE'] = 'TYPE_2';
}?>

<?$bHideSideSectionBlock = ($arParams["SHOW_SIDE_BLOCK_LAST_LEVEL"] == "Y" && $iSectionsCount && $arParams["INCLUDE_SUBSECTIONS"] == "N");
if ($bHideSideSectionBlock) {
	$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", "Y");
}?>

<?$bShowLeftBlock = (!$bSimpleSectionTemplate && ($APPLICATION->GetProperty("HIDE_LEFT_BLOCK") != "Y" && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29)));?>

<div class="main-catalog-wrapper clearfix">
	<div class="section-content-wrapper <?=($bShowLeftBlock ? 'with-leftblock' : '');?> section-content-container">
                
            <? @include_once('included_files/section.php'); ?>
	</div>
	<?if($bShowLeftBlock):?>
		<?CMax::ShowPageType('left_block');?>
	<?endif;?>
    
        
</div>
<?$tablePropsView = $typeTableProps ?? strtolower(CMax::GetFrontParametrValue('SHOW_TABLE_PROPS'));?>
<?if ( $tablePropsView === "cols" ):?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/tableScroller.js');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/blocks/scroller.css');?>
<?endif;?>
<?
$bTopHeaderOpacity = false;

if( isset($arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS'])  && isset($arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS']['TOP_HEADER_OPACITY']) ) {
	$bTopHeaderOpacity = $arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS']['TOP_HEADER_OPACITY']['VALUE'] == 'Y';
}

if ($bTopHeaderOpacity && $section[$arParams['SECTION_BG']]) {
	global $dopBodyClass;
	$dopBodyClass .= ' top_header_opacity';
}

CMax::setCatalogSectionDescription(
	array(
		'FILTER_NAME' => $arParams['FILTER_NAME'],
		'CACHE_TYPE' => $arParams['CACHE_TYPE'],
		'CACHE_TIME' => $arParams['CACHE_TIME'],
		'SECTION_ID' => $arSection['ID'],
		'SHOW_SECTION_DESC' => $arParams['SHOW_SECTION_DESC'],
		'SEO_ITEM' => $arSeoItem,
	)
);
?>

