<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<? $this->setFrameMode(true); ?>

<?
use \Bitrix\Main\Localization\Loc; 

$maxCnt = $arParams["SLIDER_CNT"] ?: 4;

shuffle($arResult['ITEMS']);
?>
<? if ($arResult['ITEMS']): ?>
    <div class="content_wrapper_block <?= $templateName; ?> <?= $arParams['SIZE_IN_ROW'] > 1 ? 'with-border' : '' ?>">
        <div class="maxwidth-theme only-on-front">
            
            <?
            global $arTheme;
            $slideshowSpeed = abs(intval($arTheme['PARTNERSBANNER_SLIDESSHOWSPEED']['VALUE']));
            $animationSpeed = abs(intval($arTheme['PARTNERSBANNER_ANIMATIONSPEED']['VALUE']));
            $bAnimation = (bool) $slideshowSpeed;
            $col = ($arParams['SIZE_IN_ROW'] ? $arParams['SIZE_IN_ROW'] : 1);
            $bCompact = ($arParams['COMPACT'] == 'Y');
            $bOneItem = ($col == 1);
            $bMoreItem = ($col > 2 || $arParams['INCLUDE_FILE']);
            ?>
            <div class="item-views reviews compact more-item">
                <div class="owl-carousel owl-theme owl-bg-nav short-nav hidden-dots visible-nav swipeignore wsmooth1 appear-block loading_state" data-plugin-options='{"nav": true, "autoHeight": true, "dots": false, "loop": true, "marginMove": false, "autoplay": false, <?= ($animationSpeed >= 0 ? '"smartSpeed": ' . $animationSpeed . ',' : '') ?> "useCSS": false, "responsive": {"0":{"items": 1, "autoWidth": false, "lightDrag": false, "margin":10, "autoplay": false, "dots": true, "dotsEach": true}, "601":{"items": 2, "autoWidth": false, "lightDrag": false, "margin":10, "autoplay": false, "dots": false, "dotsEach": false}, "1124":{"items": 3, "margin":20, "nav": true}, "1200":{"items": <?=$maxCnt?>, "margin":20, "nav": true}}}'>
                    <? foreach ($arResult['ITEMS'] as $i => $arItem): ?>
                        <?
                        // edit/add/delete buttons for edit mode
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        // use detail link?
                        $bDetailLink = $arParams['SHOW_DETAIL_LINK'] != 'N' && (!strlen($arItem['DETAIL_TEXT']) ? ($arParams['HIDE_LINK_WHEN_NO_DETAIL'] !== 'Y' && $arParams['HIDE_LINK_WHEN_NO_DETAIL'] != 1) : true);

                        
                        ?>
                        <div class="item-wrapper col-md-12 col-sm-12  col-12 bg-fill-white bordered1">
                            <div class="item otz jj clearfix bordered" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                                <? if (isset($arItem['PREVIEW_TEXT']) && $arItem['PREVIEW_TEXT']): ?>
                                    <div class="body-info">
                                        <?
                                        $imgId = $arItem['PREVIEW_PICTURE']['ID'] ?: $arItem['DETAIL_PICTURE']['ID'];
                                        $imgPath = CFile::ResizeImageGet($imgId, array('width'=>500, 'height'=>300), BX_RESIZE_IMAGE_EXACT)['src'];
                                        ?>

                                        <div class="clearfix"></div>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                            <img src="<?= $imgPath ?>" >
                                        </a>
                                        <a class="item-title" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME']; ?></a>
                                        <div>
                                            <?=$arItem['PREVIEW_TEXT']?>
                                        </div>
                                        <div class="link-block-more">
                                            <span><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn-transparent-border-color btn-xs animate-load">Подробнее</a></span>
                                        </div>
                                        
                                    </div>
                                <? endif; ?>
                            </div>
                            
                        </div>
                    <? endforeach; ?>
                </div>

            </div>

        </div>
        <? if(isset($arParams["ALL_URL"]) && !empty($arParams["ALL_URL"])) { ?>
        <div class="show-all-btn-container">
            <div class="link-block-more">
                <span><a href="<?= $arParams["ALL_URL"] ?>" class="btn btn-transparent-border-color btn-xs animate-load">Смотреть еще</a></span>
            </div>
        </div>
        <? } ?>
    </div>
<? endif; ?>