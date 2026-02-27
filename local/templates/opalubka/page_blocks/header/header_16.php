<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme, $arRegion, $bLongHeader, $dopClass;
$arRegions = CMaxRegionality::getRegions();
if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
$bLongHeader = true;
$dopClass .= ' high_one_row_header';
?>
<div class="top-block top-block-v1 header-v16">
	<div class="maxwidth-theme">		
		<div class="wrapp_block">
			<div class="row">
				<div class="items-wrapper flexbox flexbox--row justify-content-between">
					<?if($arRegions):?>
						<div class="top-block-item">
							<div class="top-description no-title">
								<?\Aspro\Functions\CAsproMax::showRegionList();?>
							</div>
						</div>
					<?endif;?>
					<div class="top-block-item">
						<div class="phone-block">
							<?if($bPhone):?>
								
								<?if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_')!==false && false):?>
									<div class="inline-block"><?=NewGetAdr()?></div>
								<?else:?>
									<div class="inline-block">#WF_CONTACTS#
									<? //CMax::showAddress('address tables inline-block no-icons');?></div>
								<?endif;?>	
							<?endif?>

							<div class="inline-block">
								<a href="/calc/" class="btn btn-default btn-sm has-ripple" style="margin-left: 15px;">Калькулятор опалубки</a>
								</div>
						</div>
					</div>
					
					<div class="top-block-item addr-block">
						
						<?if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_')!==false && false):?>
						<div class="slogan">Продажа и аренда опалубки в Москве</div>
						
						<?else:?>
						
						<div class="slogan">Продажа и аренда опалубки в #WF_CITY_PRED#</div>

						<?endif;?>

					<div class="email blocks">
						<a href="mailto:info@opalubka.market">info@opalubka.market </a></div>

						<?if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_')!==false && false):?>
								<div><div class="phone with_dropdown no-icons">
									<i class="svg inline  svg-inline-phone" aria-hidden="true"><svg class="" width="5" height="13" viewBox="0 0 5 13"><path class="cls-phone" d="M785.738,193.457a22.174,22.174,0,0,0,1.136,2.041,0.62,0.62,0,0,1-.144.869l-0.3.3a0.908,0.908,0,0,1-.805.33,4.014,4.014,0,0,1-1.491-.274c-1.2-.679-1.657-2.35-1.9-3.664a13.4,13.4,0,0,1,.024-5.081c0.255-1.316.73-2.991,1.935-3.685a4.025,4.025,0,0,1,1.493-.288,0.888,0.888,0,0,1,.8.322l0.3,0.3a0.634,0.634,0,0,1,.113.875c-0.454.8-.788,1.37-1.132,2.045-0.143.28-.266,0.258-0.557,0.214l-0.468-.072a0.532,0.532,0,0,0-.7.366,8.047,8.047,0,0,0-.023,4.909,0.521,0.521,0,0,0,.7.358l0.468-.075c0.291-.048.4-0.066,0.555,0.207h0Z" transform="translate(-782 -184)"></path></svg></i><a data-test11="+7 495 1910920" rel="nofollow" href="tel:<?=NewGetPhone()?>"><?=NewGetPhone()?></a>
											</div></div>
						<?else:?>
							<div><?CMax::ShowHeaderPhones('no-icons');?></div>
						<?endif;?>

							<?$callbackExploded = explode(',', $arTheme['SHOW_CALLBACK']['VALUE']);
							if( in_array('HEADER', $callbackExploded) ):?>
								<div class="inline-block">
									<span class="callback-block animate-load font_upper_xs colored" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
								</div>
							<?endif;?>

					</div>

					<div class="right-icons top-block-item logo_and_menu-row showed">

						<?/*<div class="pull-right">
							<div class="wrap_icon inner-table-block1 person">
								<?=CMax::showCabinetLink(true, false, 'big');?>
							</div>
						</div>*/?>

						<div class="pull-right">
							<div class="wrap_icon top-search">
								<button class="top-btn inline-search-show">
									<?=CMax::showIconSvg("search", SITE_TEMPLATE_PATH."/images/svg/Search.svg");?>
									<?php /*?><span class="title"><?=GetMessage("CT_BST_SEARCH_BUTTON")?></span><?php */?>
								</button>
							</div>
						</div>

						<div class="pull-right">
                            <div class="social-icons">
                                <ul>
                                    <li class="max">
                                        <a href="https://max.ru/id5047195442_bot" target="_blank" rel="nofollow" title="Max">
                                                Max				
                                        </a>
                                    </li>
                                    <li class="vk">
                                        <a href="tel:+79660055691" target="_blank" rel="nofollow" title="Вконтакте">
                                                Вконтакте				
                                        </a>
                                    </li>
                                    <li class="telegram">
                                        <a href="https://t.me/astoriya_all_bot?roistat_visit=375374" target="_blank" rel="nofollow" title="Telegram">
                                                Telegram				
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-wrapper header-v16">
	<div class="logo_and_menu-row longs">
		<div class="logo-row paddings">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="col-md-12">
						<div class="logo-block pull-left floated">
							<div class="logo<?=$logoClass?>">
								<?=CMax::ShowLogo();?>
							</div>
						</div>

						<div class="right-icons1 pull-right wb">
							<div class="pull-right">
								<?=CMax::ShowBasketWithCompareLink('', 'big', '', 'wrap_icon wrap_basket baskets');?>
							</div>
						</div>

						<div class="menu-row">
							<div class="menu-only">
								<nav class="mega-menu sliced">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
										array(
											"COMPONENT_TEMPLATE" => ".default",
											"PATH" => SITE_DIR."include/menu/menu.".($arTheme["HEADER_TYPE"]["LIST"][$arTheme["HEADER_TYPE"]["VALUE"]]["ADDITIONAL_OPTIONS"]["MENU_HEADER_TYPE"]["VALUE"] == "Y" ? "top_catalog_wide" : "top").".php",
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "",
											"AREA_FILE_RECURSIVE" => "Y",
											"EDIT_TEMPLATE" => "include_area.php"
										),
										false, array("HIDE_ICONS" => "Y")
									);?>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="lines-row"></div>
			</div>
		</div><?// class=logo-row?>
	</div>
</div>