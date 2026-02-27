<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme;
$bPrintButton = isset($arTheme['PRINT_BUTTON']) ? ($arTheme['PRINT_BUTTON']['VALUE'] == 'Y' ? true : false) : false;
?>
<style>
	@media (max-width: 991px) {
		.footer-bottom__items-wrapper {
			text-align: center;
			display: block !important;
		}
	}
</style>
<div class="footer-v1">
	<div class="footer-inner">
		<div class="footer_top">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="col-md-2 col-sm-2">
						<div class="third_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/menu/menu_bottom6.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
					<!--  -->
					<div class="col-md-2 col-sm-2">
						<div class="third_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/menu/menu_bottom7.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
					<div class="col-md-1 col-sm-3">
						<div class="first_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/menu/menu_bottom2.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="second_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/menu/menu_bottom3.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
					<div class="col-md-2 col-sm-2">
						<div class="third_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/menu/menu_bottom4.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 contact-block">
						<div class="info">
							<div class="row">
								<?if(\Bitrix\Main\Loader::includeModule('subscribe') && $arTheme['HIDE_SUBSCRIBE']['VALUE'] != 'Y'):?>
									<div class="col-md-12 col-sm-12">
										<div class="subscribe_button">
											<span class="btn" data-event="jqm" data-param-id="subscribe" data-param-type="subscribe" data-name="subscribe"><?=GetMessage('SUBSCRIBE_TITLE')?><?=CMax::showIconSvg('subscribe', SITE_TEMPLATE_PATH.'/images/svg/subscribe_small_footer.svg')?></span>
										</div>
									</div>
								<?endif;?>
								<div class="col-md-12 col-sm-12">
									<div class="phone blocks">
										<div class="inline-block">
											<?if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_')!==false && false):?>
												<div class="phone with_dropdown white sm">
										<div class="wrap">
											<div>
										<i class="svg inline  svg-inline-phone" aria-hidden="true"><svg xmlns="https://www.w3.org/2000/svg" width="5" height="11" viewBox="0 0 5 11"><path data-name="Shape 51 copy 13" class="cls-1" d="M402.738,141a18.086,18.086,0,0,0,1.136,1.727,0.474,0.474,0,0,1-.144.735l-0.3.257a1,1,0,0,1-.805.279,4.641,4.641,0,0,1-1.491-.232,4.228,4.228,0,0,1-1.9-3.1,9.614,9.614,0,0,1,.025-4.3,4.335,4.335,0,0,1,1.934-3.118,4.707,4.707,0,0,1,1.493-.244,0.974,0.974,0,0,1,.8.272l0.3,0.255a0.481,0.481,0,0,1,.113.739c-0.454.677-.788,1.159-1.132,1.731a0.43,0.43,0,0,1-.557.181l-0.468-.061a0.553,0.553,0,0,0-.7.309,6.205,6.205,0,0,0-.395,2.079,6.128,6.128,0,0,0,.372,2.076,0.541,0.541,0,0,0,.7.3l0.468-.063a0.432,0.432,0,0,1,.555.175h0Z" transform="translate(-399 -133)"></path></svg></i><a data-test11="<?=NewGetPhone()?>" rel="nofollow" href="tel:<?=NewGetPhone()?>"><?=NewGetPhone()?></a>
											</div>
												</div>
												</div>
											<?else:?>
												<?CMax::ShowHeaderPhones('white sm', true);?>
											<?endif;?>
										</div>
										<?$callbackExploded = explode(',', $arTheme['SHOW_CALLBACK']['VALUE']);
										if( in_array('FOOTER', $callbackExploded) ):?>
											<div class="inline-block callback_wrap">
												<span class="callback-block animate-load colored" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
											</div>
										<?endif;?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<?=CMax::showEmail('email blocks')?>
								</div>
								<div class="col-md-12 col-sm-12">
									<?if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_' )!==false && false):?>
										<div class="address blocks">
					<i class="svg inline  svg-inline-addr" aria-hidden="true"><svg xmlns="https://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12"><path class="cls-1" d="M959.135,82.315l0.015,0.028L955.5,87l-3.679-4.717,0.008-.013a4.658,4.658,0,0,1-.83-2.655,4.5,4.5,0,1,1,9,0A4.658,4.658,0,0,1,959.135,82.315ZM955.5,77a2.5,2.5,0,0,0-2.5,2.5,2.467,2.467,0,0,0,.326,1.212l-0.014.022,2.181,3.336,2.034-3.117c0.033-.046.063-0.094,0.093-0.142l0.066-.1-0.007-.009a2.468,2.468,0,0,0,.32-1.2A2.5,2.5,0,0,0,955.5,77Z" transform="translate(-951 -75)"></path></svg></i><?=NewGetAdr()?></div>
									<?else:?>
										<?=CMax::showAddress('address blocks')?>
									<?endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_middle">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="social-block">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"PATH" => SITE_DIR."include/footer/social.info.php",
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => "include_area.php"
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bottom">
			<div class="maxwidth-theme">
				<div class="footer-bottom__items-wrapper">
					<div class="footer-bottom__items-wrapper" style="justify-content: unset; gap: 5rem;">
						<div class="footer-bottom__item copy font_xs">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/copyright.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "Copyright",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
						<div class="footer-bottom__item copy font_xs">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/privacy_policy.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "privacy_policy",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
						<div class="footer-bottom__item copy font_xs">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/site_map.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "site_map",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
						<div id="bx-composite-banner"></div>
					</div>
					<div class="footer-bottom__items-wrapper">
						<div class="footer-bottom__item pays">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/pay_system_icons.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "onfidentiality",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
						<?//=\Aspro\Functions\CAsproMax::showDeveloperBlock();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>