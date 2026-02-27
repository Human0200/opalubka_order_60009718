<?
global $arTheme, $arRegion;
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
?>
<div class="mobileheader-v1 ">
	<div class="burger pull-left">
		<?=CMax::showIconSvg("burger dark", SITE_TEMPLATE_PATH."/images/svg/burger.svg");?>
		<?=CMax::showIconSvg("close dark", SITE_TEMPLATE_PATH."/images/svg/Close.svg");?>
	</div>
	<div class="logo-block pull-left">
		<div class="logo<?=$logoClass?>">
			<?=CMax::ShowLogo();?>
		</div>
	</div>
	<div class="right-icons pull-right">

		<div class="pull-left social-icons">
			<ul>
                <li class="max">
					<a href="https://max.ru/id5047195442_bot" target="_blank" rel="nofollow" title="Max">
						Max			
					</a>
				</li>
				<li class="vk">
					<a href="https://vk.com/astory_slk?roistat_visit=375374" target="_blank" rel="nofollow" title="Вконтакте">
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

		<div class="pull-right">
			<div class="wrap_icon wrap_basket">
				<?=CMax::ShowBasketWithCompareLink('', 'big', false, false, true);?>
			</div>
		</div>
		<div class="pull-right">
			<div class="wrap_icon wrap_cabinet">
				<?=CMax::showCabinetLink(true, false, 'big');?>
			</div>
		</div>
		<div class="pull-right">
			<div class="wrap_icon">
				<button class="top-btn inline-search-show twosmallfont">
					<?=CMax::showIconSvg("search", SITE_TEMPLATE_PATH."/images/svg/Search.svg");?>
				</button>
			</div>
		</div>
		<div class="pull-right">
			<div class="wrap_icon wrap_phones">
				<?CMax::ShowHeaderMobilePhones("big");?>
			</div>
		</div>
	</div>

	<?=\Aspro\Functions\CAsproMax::showProgressBarBlock();?>
</div>