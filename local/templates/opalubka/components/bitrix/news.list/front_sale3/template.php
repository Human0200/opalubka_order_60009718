<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<?use \Bitrix\Main\Localization\Loc;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "cust_incs/test_2.inc"
	)
);?>
<?if($arResult['ITEMS']):?>

	<?$sTemplateMobile = (isset($arParams['MOBILE_TEMPLATE']) ? $arParams['MOBILE_TEMPLATE'] : '')?>
	<?$bSlider = ($sTemplateMobile === 'normal')?>
	<?$bHasBottomPager = $arParams["DISPLAY_BOTTOM_PAGER"] == "Y" && $arResult["NAV_STRING"];?>

	<?if(!$arParams['IS_AJAX']):?>
		<div class="content_wrapper_block <?=$templateName;?> <?=$arParams['TYPE_IMG'] == 'bg' ? 'text-inside' : ''?> <?=$arParams['TYPE_IMG'] == 'sm' ? 'with-border' : ''?> <?=$arResult['NAV_STRING'] ? '' : 'without-border'?>">
		<div class="maxwidth-theme only-on-front">
		<?if($arParams['TITLE_BLOCK'] || $arParams['TITLE_BLOCK_ALL']):?>
			<?if($arParams['INCLUDE_FILE']):?>
				<div class="with-text-block-wrapper">
					<div class="row">
						<div class="col-md-3">
							<?if($arParams['TITLE_BLOCK'] || $arParams['TITLE_BLOCK_ALL']):?>
								<div class="h3"><?=$arParams['TITLE_BLOCK'];?></div>
								<?// intro text?>
								<?if($arParams['INCLUDE_FILE']):?>
									<div class="text_before_items font_xs">
										<?$APPLICATION->IncludeComponent(
											"bitrix:main.include",
											"",
											Array(
												"AREA_FILE_SHOW" => "file",
												"PATH" => SITE_DIR."include/mainpage/inc_files/".$arParams['INCLUDE_FILE'],
												"EDIT_TEMPLATE" => ""
											)
										);?>
									</div>
								<?endif;?>
								<a href="<?=SITE_DIR.$arParams['ALL_URL'];?>" class="btn btn-transparent-border-color btn-sm"><?=$arParams['TITLE_BLOCK_ALL'] ;?></a>
							<?endif;?>
						</div>
						<div class="col-md-9">
			<?else:?>
				<div class="top_block">
					<div class="h3"><?=$arParams['TITLE_BLOCK'];?></div>
					<a href="<?=SITE_DIR.$arParams['ALL_URL'];?>" class="pull-right font_upper muted"><?=$arParams['TITLE_BLOCK_ALL'] ;?></a>
				</div>
			<?endif;?>
		<?endif;?>
		<div class="item-views sales2 <?=$arParams['TYPE_IMG'];?> <?=$sTemplateMobile;?>">
			<div class="items<?=(!$arParams['INCLUDE_FILE'] ? '' : ' list');?> s_<?=$arParams['SIZE_IN_ROW'];?>">
				<div class="row flexbox<?=($arParams['NO_MARGIN'] == 'Y' ? ' margin0' : '');?> <?=$sTemplateMobile;?><?=($bSlider ? ' swipeignore mobile-overflow mobile-margin-16 mobile-compact' : '');?><?=$bHasBottomPager ? ' has-bottom-nav' : ''?>">
	<?endif;?>
		<?$bFonImg = ($arParams['TYPE_IMG'] == 'bg');
		$col_lg = (12/$arParams['SIZE_IN_ROW']);
		//$col_md = ((int)$arParams['SIZE_IN_ROW']-1>0) ? (12/( $arParams['SIZE_IN_ROW']-1)) : 1 ;
		$col_md = (12/( $arParams['SIZE_IN_ROW']-1));
		$isLeftBlock = (isset($arParams['WITH_LEFT_BLOCK']) && $arParams['WITH_LEFT_BLOCK']=='Y') ? true: false;
		
		
		$position = ($arParams['BG_POSITION'] ? ' set-position '.$arParams['BG_POSITION'] : '');
		?>
			<?foreach($arResult['ITEMS'] as $i => $arItem):?>
				<?
				// edit/add/delete buttons for edit mode
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				// use detail link?
				$bDetailLink = $arParams['SHOW_DETAIL_LINK'] != 'N' && (!strlen($arItem['DETAIL_TEXT']) ? ($arParams['HIDE_LINK_WHEN_NO_DETAIL'] !== 'Y' && $arParams['HIDE_LINK_WHEN_NO_DETAIL'] != 1) : true);
				// preview image
				$bImage = true;
		$imageSrc = ($arItem['FIELDS']['DETAIL_PICTURE'] ? $arItem['FIELDS']['DETAIL_PICTURE']['SRC'] : SITE_TEMPLATE_PATH.'/images/svg/noimage_content.svg');
				// show active date period
				$bActiveDate = strlen($arItem['DISPLAY_PROPERTIES']['PERIOD']['VALUE']) || ($arItem['DISPLAY_ACTIVE_FROM'] && in_array('DATE_ACTIVE_FROM', $arParams['FIELD_CODE']));
				$bDiscountCounter = ($arItem['ACTIVE_TO'] && in_array('ACTIVE_TO', $arParams['FIELD_CODE']));
				?>
				<div class="item-wrapper col-lg-<?=$col_lg;?> col-md-<?=$col_md;?> col-sm-6 col-xs-6 col-xxs-12 clearfix <?=($bSlider ? ' item-width-261' : '');?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<?if($bFonImg):?>
					<div class="item box-shadow rounded3 darken-bg-animate lazy<?=$position;?>" <?=($bImage ? 'data-src="'.$imageSrc.'"' : '');?> style="background-image:url(<?=\Aspro\Functions\CAsproMax::showBlankImg($imageSrc);?>)">
						<?if (!$bSlider):?>
							<div class="hidden compact-img lazy" <?=($bImage ? 'data-src="'.$imageSrc.'"' : 'data-src="'.$noImageSrc.'"');?>   style="background-image:url('<?=\Aspro\Functions\CAsproMax::showBlankImg($imageSrc);?>')"></div>
						<?endif;?>
						<?if($bDetailLink):?><a href="<?=$arItem['DETAIL_PAGE_URL']?>"></a><?endif;?>
					<?else:?>
					<div class="item<?=($arParams['FILLED'] == 'Y' ? ' bg-fill-grey' : ($arParams['TRANSPARENT'] == 'Y' ? '' : ' bg-fill-white'));?><?=($arParams['TRANSPARENT'] == 'Y' ? '' : ' box-shadow');?><?=($arParams['TYPE_IMG'] == 'sm' ? ' bordered text-center' : '');?>">
						<?if($bImage):?>
							<div class="image shine">
								<?if($bDetailLink):?>
									<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
								<?endif;?>
									<span class="rounded<?=($arParams['TYPE_IMG'] != 'sm' ? 3 : '');?> bg-fon-img lazy<?=$position;?>" data-src="<?=$imageSrc?>" style="background-image:url(<?=\Aspro\Functions\CAsproMax::showBlankImg($imageSrc);?>)"></span>
								<?if($bDetailLink):?>
									</a>
								<?endif;?>
							</div>
						<?endif;?>
					<?endif;?>
						<div class="inner-text">
							<?// date active period?>
							<?if($bActiveDate):?>
								<div class="period-block<?=(!$bFonImg ? ' muted ncolor' : '');?> font_xs <?=($arItem['ACTIVE_TO'] ? 'red' : '');?>">
									<?=CMax::showIconSvg("sale", SITE_TEMPLATE_PATH.'/images/svg/icon_discount.svg', '', '', true, false);?>
									<?if(strlen($arItem['DISPLAY_PROPERTIES']['PERIOD']['VALUE'])):?>
										<span class="date"><?=$arItem['DISPLAY_PROPERTIES']['PERIOD']['VALUE']?></span>
									<?else:?>
										<span class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></span>
									<?endif;?>
								</div>
							<?endif;?>

							<div class="title <?=($bFonImg ? 'font_mlg' : '');//'font_md'?>">
								<?if($bDetailLink):?>
									<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
								<?endif;?>
								<?=$arItem['NAME'];?>
								<?if($bDetailLink):?>
									</a>
								<?endif;?>
							</div>

						</div>
						<?if($arItem['DISPLAY_PROPERTIES']['SALE_NUMBER']['VALUE'] || $bDiscountCounter):?>
							<div class="info-sticker-block top">
								<?if($arItem['DISPLAY_PROPERTIES']['SALE_NUMBER']['VALUE']):?>
									<div class="sale-text font_sxs rounded2"><?=$arItem['DISPLAY_PROPERTIES']['SALE_NUMBER']['VALUE'];?></div>
								<?endif;?>
								<?if($bDiscountCounter): ?>
									<?\Aspro\Functions\CAsproMax::showDiscountCounter(0, $arItem, array(), array(), '', 'compact');?>
								<?endif;?>
							</div>
						<?endif;?>
					</div>
				</div>
			<?endforeach;?>

			<?if ($bSlider && $bHasBottomPager):?>
				<?if($arParams['IS_AJAX']):?>
					<div class="wrap_nav bottom_nav_wrapper">
				<?endif;?>
					<?$bHasNav = (strpos($arResult["NAV_STRING"], 'more_text_ajax') !== false);?>
						<div class="bottom_nav mobile_slider animate-load-state block-type<?=($bHasNav ? '' : ' hidden-nav');?> round-ignore" data-parent=".item-views"  data-append=".items > .row" <?=($arParams["IS_AJAX"] ? "style='display: none; '" : "");?>>
						<?if ($bHasNav):?>
							<?=CMax::showIconSvg('bottom_nav-icon colored_theme_svg', SITE_TEMPLATE_PATH.'/images/svg/mobileBottomNavLoader.svg');?>
							<?=$arResult["NAV_STRING"]?>
						<?endif;?>
						</div>

				<?if($arParams['IS_AJAX']):?>
					</div>
				<?endif;?>
			<?endif;?>

	<?if(!$arParams['IS_AJAX']):?>
			</div>
		</div>
	<?endif;?>
		
		<?// bottom pagination?>
		<div class="bottom_nav_wrapper <?=($bSlider ? ' hidden-slider-nav' : '');?>">
			<div class="bottom_nav animate-load-state has-nav" <?=($arParams['IS_AJAX'] ? "style='display: none; '" : "");?> data-parent=".item-views" data-append=".items > .row">
				<?if($arParams['DISPLAY_BOTTOM_PAGER']):?>
					<?=$arResult['NAV_STRING']?>
				<?endif;?>
			</div>
		</div>

	<?if(!$arParams['IS_AJAX']):?>
		</div>
		<?if($arParams['INCLUDE_FILE']):?>
			</div></div></div>
		<?endif;?>
	</div></div>
	<?endif;?>
<?endif;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "cust_incs/test2.inc"
	)
);?>




<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "cust_incs/opalfront.inc"
	)
);?>
<h2>Наши клиенты</h2>

<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"partners_cust", 
	array(
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "19",
		"NEWS_COUNT" => "18",
		"USE_SEARCH" => "N",
		"USE_RSS" => "Y",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/company/partners/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "PHONE",
			1 => "SITE",
			2 => "EMAIL",
			3 => "POST",
			4 => "SEND_MESSAGE_BUTTON",
			5 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"DISPLAY_NAME" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "PHONE",
			1 => "SITE",
			2 => "LINK_PROJECTS",
			3 => "LINK_SERVICES",
			4 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"VIEW_TYPE" => "table",
		"SHOW_TABS" => "N",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"COUNT_IN_LINE" => "6",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_REVIEW" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"IMAGE_POSITION" => "left",
		"COMPONENT_TEMPLATE" => "partners_cust",
		"SET_LAST_MODIFIED" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"STRICT_SECTION_CHECK" => "N",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_3",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILE_404" => "",
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "30",
		"YANDEX" => "N",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"T_DOCS" => "",
		"T_VIDEO" => "",
		"IBLOCK_LINK_NEWS_ID" => "23",
		"IBLOCK_LINK_SERVICES_ID" => "24",
		"IBLOCK_LINK_TIZERS_ID" => "11",
		"IBLOCK_LINK_REVIEWS_ID" => "10",
		"IBLOCK_LINK_STAFF_ID" => "30",
		"IBLOCK_LINK_VACANCY_ID" => "2",
		"IBLOCK_LINK_BLOG_ID" => "28",
		"IBLOCK_LINK_PROJECTS_ID" => "26",
		"IBLOCK_LINK_BRANDS_ID" => "29",
		"IBLOCK_LINK_LANDINGS_ID" => "28",
		"BLOCK_SERVICES_NAME" => "Услуги",
		"BLOCK_NEWS_NAME" => "Новости",
		"BLOCK_TIZERS_NAME" => "Тизеры",
		"BLOCK_REVIEWS_NAME" => "Отзывы",
		"BLOCK_STAFF_NAME" => "Сотрудники",
		"BLOCK_VACANCY_NAME" => "Вакансии",
		"BLOCK_PROJECTS_NAME" => "Проекты",
		"BLOCK_BRANDS_NAME" => "",
		"BLOCK_BLOG_NAME" => "Статьи",
		"BLOCK_LANDINGS_NAME" => "Коллекции",
		"IBLOCK_LINK_PARTNERS_ID" => "19",
		"BLOCK_PARTNERS_NAME" => "Партнеры",
		"USE_SHARE" => "Y",
		"GALLERY_TYPE" => "small",
		"STAFF_TYPE_DETAIL" => "list",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,desc,char,docs,services,news,vacancy,blog,reviews,projects,staff,comments",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"USE_SUBSCRIBE_IN_TOP" => "Y",
		"T_GOODS" => "",
		"T_GOODS_SECTION" => "",
		"T_GALLERY" => "",
		"MAX_GALLERY_GOODS_ITEMS" => "5",
		"SHOW_SORT_IN_FILTER" => "Y",
		"LINKED_PRODUCTS_PROPERTY" => "BRAND",
		"SHOW_LINKED_PRODUCTS" => "N",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"SHOW_MEASURE" => "N",
		"AJAX_FILTER_CATALOG" => "Y",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"SHOW_UNABLE_SKU_PROPS" => "Y",
		"SHOW_ARTICLE_SKU" => "N",
		"SHOW_MEASURE_WITH_RATIO" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"ALT_TITLE_GET" => "NORMAL",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "N",
		"SHOW_RATING" => "Y",
		"DISPLAY_COMPARE" => "Y",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => "",
		"LIST_PROPERTY_CATALOG_CODE" => array(
			0 => "",
			1 => "",
		),
		"SORT_BUTTONS" => array(
			0 => "POPULARITY",
			1 => "NAME",
			2 => "PRICE",
		),
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"SHOW_COUNT_ELEMENTS" => "Y",
		"SHOW_GALLERY_GOODS" => "Y",
		"ADD_DETAIL_TO_SLIDER" => "Y",
		"TAGS_SECTION_COUNT" => "",
		"DISPLAY_LINKED_PAGER" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"SHOW_ONE_CLICK_BUY" => "Y",
		"SHOW_SECTIONS_FILTER" => "Y",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "sort",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "id",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "desc",
		"IBLOCK_CATALOG_TYPE" => "-",
		"IBLOCK_CATALOG_ID" => "1",
		"ADD_PICT_PROP" => "",
		"GALLERY_PRODUCTS_PROPERTY" => "PHOTOS",
		"DEPTH_LEVEL_BRAND" => "2",
		"PRICE_CODE" => array(
			0 => "",
			1 => "",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"USE_PRICE_COUNT" => "N",
		"CONVERT_CURRENCY" => "N",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
		)
	),
	false
);?>