<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? $this->setFrameMode(true); ?>
<? global $arTheme, $APPLICATION, $arSectionFilter; ?>
<? $APPLICATION->AddViewContent('right_block_class', 'catalog_page '); ?>

<?$APPLICATION->AddHeadString('<link rel="stylesheet" href="/local/templates/opalubka/vendor/css/carousel/owl/owl.carousel.min.css">');?>
<?$APPLICATION->AddHeadString('<link rel="stylesheet" href="/local/templates/opalubka/vendor/css/carousel/owl/owl.theme.default.min.css">');?>
<?$APPLICATION->AddHeadString('<script src="/local/templates/opalubka/vendor/js/carousel/owl/owl.carousel.min.js"></script>');?>

<? $arSectionFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
CMax::makeSectionFilterInRegion($arSectionFilter);
?>

<?
if (
    $GLOBALS['arRegion'] &&
    $GLOBALS['arTheme']['USE_REGIONALITY']['VALUE'] === 'Y' &&
    $GLOBALS['arTheme']['USE_REGIONALITY']['DEPENDENT_PARAMS']['REGIONALITY_FILTER_ITEM']['VALUE'] === 'Y'
) {
    $arSectionFilter['PROPERTY_LINK_REGION'] = $GLOBALS['arRegion']['ID'];
}
?>

<? $sViewElementTemplate = ($arParams["SECTIONS_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["CATALOG_PAGE_SECTIONS"]["VALUE"] : $arParams["SECTIONS_TYPE_VIEW"]); ?>
<? $bShowLeftBlock = ($arTheme["LEFT_BLOCK_CATALOG_ROOT"]["VALUE"] == "Y" && !defined("ERROR_404") && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29)); ?>
<? $APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", ( $bShowLeftBlock ? 'N' : 'Y')); ?>



<div class="main-catalog-wrapper 1">
    <div class="section-content-wrapper <?= ($bShowLeftBlock ? 'with-leftblock' : ''); ?>">
        
        <? @include_once('included_files/sections.php'); ?>
        
        

    </div>
<? if ($bShowLeftBlock): ?>
    <? CMax::ShowPageType('left_block'); ?>
<? endif; ?>
</div>
