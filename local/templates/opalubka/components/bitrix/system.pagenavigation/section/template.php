<?$this->setFrameMode(true);?>
<?if($arResult["NavPageCount"] > 1):?>
	<?
	if($arResult["NavQueryString"])
	{
		$arUrl = explode('&', htmlspecialchars_decode($arResult["NavQueryString"]));
		if($arUrl)
		{
			foreach($arUrl as $key => $url)
			{
				if(strpos($url, 'ajax_get') !== false || strpos($url, 'AJAX_REQUEST') !== false)
					unset($arUrl[$key]);
			}
		}
		$arResult["NavQueryString"] = implode('&amp;', $arUrl);
	}
	$count_item_between_cur_page = 2; // count numbers left and right from cur page
	$count_item_dotted = 2; // count numbers to end or start pages
	
	$arResult["nStartPage"] = $arResult["NavPageNomer"] - $count_item_between_cur_page;
	$arResult["nStartPage"] = $arResult["nStartPage"] <= 0 ? 1 : $arResult["nStartPage"];
	$arResult["nEndPage"] = $arResult["NavPageNomer"] + $count_item_between_cur_page;
	$arResult["nEndPage"] = $arResult["nEndPage"] > $arResult["NavPageCount"] ? $arResult["NavPageCount"] : $arResult["nEndPage"];
	$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
	$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
	if($arResult["NavPageNomer"] == 1){
		$bPrevDisabled = true;
	}
	elseif($arResult["NavPageNomer"] < $arResult["NavPageCount"]){
		$bPrevDisabled = false;
	}
	if($arResult["NavPageNomer"] == $arResult["NavPageCount"]){
		$bNextDisabled = true;
	}
	else{
		$bNextDisabled = false;
	}
	?>
	<?if(!$bNextDisabled){?>
		<div class="ajax_load_btn rounded3 colored_theme_hover_bg">
			<span class="more_text_ajax font_upper_md"><?=GetMessage('PAGER_SHOW_MORE')?></span>
		</div>
	<?}?>
	<?global $APPLICATION;?>
	<?
	$bHasPage = (isset($_GET['PAGEN_'.$arResult["NavNum"]]) && $_GET['PAGEN_'.$arResult["NavNum"]]);
	if($bHasPage)
	{
		if($_GET['PAGEN_'.$arResult["NavNum"]] == 1 && !isset($_GET['q']))
		{
			LocalRedirect($arResult["sUrlPath"], false, "301 Moved permanently");
		}
		elseif($_GET['PAGEN_'.$arResult["NavNum"]] > $arResult["nEndPage"])
		{
			if (!defined("ERROR_404"))
			{
				define("ERROR_404", "Y");
				\CHTTP::setStatus("404 Not Found");
			}
		}

	}?>



<?
$newinc=array(
'/arenda_opalubki/',
'/arenda_opalubki_arzamas/',
'/arenda_opalubki_belgorod/',
'/arenda_opalubki_bryanks/',
'/arenda_opalubki_cherepovec/',
'/arenda_opalubki_dubna/',
'/arenda_opalubki_dzerzhinsk/',
'/arenda_opalubki_elec/',
'/arenda_opalubki_ivanovo/',
'/arenda_opalubki_kaluga/',
'/arenda_opalubki_kazan/',
'/arenda_opalubki_kolomna/',
'/arenda_opalubki_kostroma/',
'/arenda_opalubki_kursk/',
'/arenda_opalubki_lipeck/',
'/arenda_opalubki_magnitogorsk/',
'/arenda_opalubki_murom/',
'/arenda_opalubki_nn/',
'/arenda_opalubki_novosibirsk/',
'/arenda_opalubki_orel/',
'/arenda_opalubki_penza/',
'/arenda_opalubki_pereslavl-zalesskiy/',
'/arenda_opalubki_podolsk/',
'/arenda_opalubki_roslavl/',
'/arenda_opalubki_rostov-velikiy/',
'/arenda_opalubki_ryazan/',
'/arenda_opalubki_rybinsk/',
'/arenda_opalubki_rzhev/',
'/arenda_opalubki_saransk/',
'/arenda_opalubki_sarov/',
'/arenda_opalubki_sergiev-posad/',
'/arenda_opalubki_smolensk/',
'/arenda_opalubki_spb/',
'/arenda_opalubki_tambov/',
'/arenda_opalubki_torzhok/',
'/arenda_opalubki_tula/',
'/arenda_opalubki_tver/',
'/arenda_opalubki_uglich/',
'/arenda_opalubki_velikie-luki/',
'/arenda_opalubki_velikiy-novgorod/',
'/arenda_opalubki_vladimir/',
'/arenda_opalubki_vologda/',
'/arenda_opalubki_voronezh/',
'/arenda_opalubki_vyazma/',
'/arenda_opalubki_yaroslavl/');

?>


	
<? 
if(in_array($_SERVER['REQUEST_URI'],$newinc)) 
	{
		$arResult["NavNum"]=3;
		$arResult['sUrlPath']='/arenda_opalubki/';
	}
?>	
	
<div class="module-pagination <?=$arResult["NavNum"]?>" style="display: none">
		<div class="nums">
			<ul class="flex-direction-nav">
				<?if(!$bPrevDisabled):?>
					<?$page = ( $bHasPage ? ($arResult["NavPageNomer"]-1 == 1 ? '' : $arResult["NavPageNomer"]-1) : '' );
					$url = ($page ? '?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.$page : $strNavQueryStringFull);?>
					<li class="flex-nav-prev colored_theme_hover_text">
						<a href="<?=$arResult["sUrlPath"]?><?=$url?>" class="flex-prev">
							<?=CMax::showIconSvg("down", SITE_TEMPLATE_PATH.'/images/svg/catalog/arrow_pagination.svg', '', '', true, false);?>
						</a>
					</li>
					<link rel="prev" href="<?=$arResult["sUrlPath"].$url?>" />
					<link rel="canonical" href="<?=$arResult["sUrlPath"]?>" />
				<?endif;?>
				<?if(!$bNextDisabled):?>
					<?$APPLICATION->AddHeadString('<link rel="next" href="'.$arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1).'"  />', true);?>
					<li class="flex-nav-next colored_theme_hover_text">
						<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="flex-next">
							<?=CMax::showIconSvg("down", SITE_TEMPLATE_PATH.'/images/svg/catalog/arrow_pagination.svg', '', '', true, false);?>
						</a>
					</li>
				<?endif;?>
			</ul>
			<?if($arResult["nStartPage"] > 1):?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1" class="dark_link 1">1</a>
				<?if(($arResult["nStartPage"] - $count_item_dotted) > 1):?>
					<span class='point_sep'>...</span>
				<?elseif(($firstPage = $arResult["nStartPage"]-1) > 1 && $arResult["nStartPage"] !=2):?>
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$firstPage?>"><?=$firstPage?></a>
				<?endif;?>
			<?endif;?>
			<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
				<?if($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<span class="cur"><?=$arResult["nStartPage"]?></span>
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="dark_link 2"><?=$arResult["nStartPage"]?></a>
				<?else:?>
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="dark_link 3"><?=$arResult["nStartPage"]?></a>
				<?endif;?>
				<?$arResult["nStartPage"]++;?>
			<?endwhile;?>
			<?if($arResult["nEndPage"] < $arResult["NavPageCount"]):?>
				<?if(($arResult["nEndPage"] + $count_item_dotted) < $arResult["NavPageCount"]):?>
					<span class='point_sep'>...</span>
				<?elseif(($lastPage = $arResult["nEndPage"]+1) < $arResult["NavPageCount"]):?>
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$lastPage?>"><?=$lastPage?></a>
				<?endif;?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>" class="dark_link 4"><?=$arResult["NavPageCount"]?></a>
			<?endif;?>
			<?if ($arResult["bShowAll"]):?>			
				<div class="all_block_nav">
					<!--noindex-->
						<?if ($arResult["NavShowAll"]):?>
							<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" class="link" rel="nofollow"><?=GetMessage("nav_paged")?></a>
						<?else:?>
							<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" class="link" rel="nofollow"><?=GetMessage("nav_all")?></a>
						<?endif?>
					<!--/noindex-->
				</div>			
			<?endif?>
		</div>
	</div>
<?endif;?>