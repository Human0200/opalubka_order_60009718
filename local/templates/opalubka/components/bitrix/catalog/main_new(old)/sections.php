<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?global $arTheme, $APPLICATION, $arSectionFilter;?>
<?$APPLICATION->AddViewContent('right_block_class', 'catalog_page ');?>

<?$arSectionFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
CMax::makeSectionFilterInRegion($arSectionFilter);?>

<?// region filter for to count elements
if(
	$GLOBALS['arRegion'] &&
	$GLOBALS['arTheme']['USE_REGIONALITY']['VALUE'] === 'Y' &&
	$GLOBALS['arTheme']['USE_REGIONALITY']['DEPENDENT_PARAMS']['REGIONALITY_FILTER_ITEM']['VALUE'] === 'Y'
){
	// unrem this for hide empty sections without region`s products
	//$arSectionFilter['PROPERTY'] = array('LINK_REGION' => $GLOBALS['arRegion']['ID']);

	$arSectionFilter['PROPERTY_LINK_REGION'] = $GLOBALS['arRegion']['ID'];
}?>

<?$sViewElementTemplate = ($arParams["SECTIONS_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["CATALOG_PAGE_SECTIONS"]["VALUE"] : $arParams["SECTIONS_TYPE_VIEW"]);?>
<?$bShowLeftBlock = ($arTheme["LEFT_BLOCK_CATALOG_ROOT"]["VALUE"] == "Y" && !defined("ERROR_404") && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29));?>
<?$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", ( $bShowLeftBlock ? 'N' : 'Y' ) );?>


<?global $arMainPageOrder; //global array for order blocks?>
<?global $arTheme, $dopBodyClass;?>



<div class="main-catalog-wrapper with_left_block  drag-block ">
	<div class="section-content-wrapper <?=($bShowLeftBlock ? 'with-leftblock' : '');?>">
			<!--Блок 1 начало-->
			<div class="newblock1">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.detail",
					"front_company",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_ELEMENT_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "Y",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"BROWSER_TITLE" => "-",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"COMPONENT_TEMPLATE" => "front_company",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"ELEMENT_CODE" => "front_company_item3",
						"ELEMENT_ID" => "",
						"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"",),
						"IBLOCK_ID" => "13",
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_URL" => "",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"MESSAGE_404" => "",
						"META_DESCRIPTION" => "-",
						"META_KEYWORDS" => "-",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "Страница",
						"PROPERTY_CODE" => array(0=>"VIDEO_SOURCE",1=>"COMPANY_NAME",2=>"URL",3=>"VIDEO_SRC",4=>"IMG2",5=>"SHOW_BUTTON",6=>"VIDEO",7=>"COMPANY_TEXT",8=>"",),
						"REGION" => $arRegion,
						"REVERCE_IMG_BLOCK" => "N",
						"SET_BROWSER_TITLE" => "N",
						"SET_CANONICAL_URL" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"STRICT_SECTION_CHECK" => "N",
						"TYPE_BLOCK" => "type1",
						"TYPE_IMG" => "lg",
						"USE_PERMISSIONS" => "N",
						"USE_SHARE" => "N"
					)
				);?>
			</div>
			<!--Блок 1 конец-->
			
			
			<!--Блок 2 начало-->
			<div class="newblock2">
				<h2> Почему наша опалубка? </h2>
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<div class="promo">
						<div class="left">
							<div class="promo1 lprblock">
								<div class="h3">
									Качество сварки
								</div>
								<br>
								<p>
									Выполняем сварочный процесс по нормативам сварочный карты. Сварка в двух сторон позволяет избежать перегрева металла и деформации
								</p>
							</div>
							<div class="promo2 lprblock">
								<div class="h3">
									Толщина профиля
								</div>
								<br>
								<p>
									Используем профиль, который соответствует ГОСТ. Это значит, что профиль всегда равен заявленной толщине либо превосходит ее
								</p>
							</div>
							<div class="promo3 lprblock">
								<div class="h3">
									Прочные швы
								</div>
								<br>
								<p>
									Резка лентопильными станками. Сварка проволокой без разрыва сварочного шва. Герметизацию швов производим только качественным европейским силиконом, устойчивым к агрессивным средам
								</p>
							</div>
						</div>
						<img alt="2img.png" src="/upload/iblock/e7e/g1s41iv3vf6q3eih8b7iahs32fdozl46.png" title="2img.png">
						<div class="right">
							<div class="promo4 prblock">
								<div class="h3">
									Качество фанеры
								</div>
								<br>
								<p>
									Используем фанеру только Димидовского фанерного комбината (ДФК) Она производится с соблюдением всех технологических процессов и отвечает европейским стандартам качества
								</p>
							</div>
							<div class="promo5 prblock">
								<div class="h3">
									Размерный ряд
								</div>
								<br>
								<p>
									Наши мощности позволяют произвести опалубку по индивидуальному требованию заказчика. Размерный ряд, кратный сантиметру: ширина от 20 см до 120 см; высота от 50 см до 330 см
								</p>
							</div>
							<div class="promo6 prblock">
								<div class="h3">
									Сжатые сроки
								</div>
								<br>
								<p>
									Производство позволяет увеличить количество смен для ускорения сроков поставки
								</p>
							</div>
						</div>
					</div>
					
				</div>
			<div style="clear: both;"></div>
			
			
			</div>
			<!--Блок 2 конец-->
			
			
			<!--Блок 3 начало-->
			<div class="newblock3">
				У нас можно не только арендовать, но и купить опалубку, а также заказать услугу ее расчета в соответствии с проектом, что позволит вам не брать в аренду и не приобретать лишние элементы. Кроме того, мы предлагаем услугу шеф-монтажа, благодаря которой арендованная у нас опалубка будет установлена в полном соответствии со всеми нормами и правилами. К преимуществам сотрудничества с нами также относится то, что вам не придется решать проблему хранения, продажи или утилизации опалубки после окончания строительных работ.<br><br>
				    <div class="why">
                        <div class="minus">
                            <div class="h3">
                                ДРУГИЕ КОМПАНИИ
                            </div>
                            <ul>
                                <li>В сезон завышают цены</li>
                                <li>Неправильно рассчитывают заказ или делают это очень долго</li>
                                <li>Не вся опалубка в аренду в наличии, а лишь ходовые позиции</li>
                                <li>Срывают сроки доставки</li>
                                <li>Сдают опалубку в аренду не менее, чем на месяц, а вам это много</li>
                                <li>Не могут ответить на технические вопросы и предложить конкретное решение вашей задачи</li>
                            </ul>
                        </div>
                        <div class="plus">
                            <div class="h3">
                                НАША КОМПАНИЯ
                            </div>
                            <ul>
                                <li>Мы – производители, мы работаем без посредников, естественно, наши цены ниже</li>
                                <li>Рассчитываем полный объем опалубки, включая все комплектующие, рассчитываем заказ в течение 1 часа</li>
                                <li>Самый большой парк арендной опалубки в Москве</li>
                                <li>Доставка происходит строго в срок собственным автопарком</li>
                                <li>У нас минимальный срок аренды 10 дней</li>
                                <li>Мы бесплатно предложим инженерный расчет, варианты решения опалубки нестандартных конструкций</li>
                            </ul>
                        </div>
                    </div>
			
			</div>
			<!--Блок 3 конец-->
			
			<!--Блок 4 начало-->
			<div class="newblock4">
				<? $APPLICATION->IncludeFile(SITE_DIR . "include/newblock/block4.php", Array(), Array("MODE" => "html", "NAME" => "Текст блока 4",)); ?>
			</div>
			<!--Блок 4 конец-->
			
			<!--Блок 5 начало-->
			<div class="newblock5">
				<? $APPLICATION->IncludeFile(SITE_DIR . "include/newblock/block5.php", Array(), Array("MODE" => "html", "NAME" => "Текст блока 5",)); ?>
			</div>
			<!--Блок 5 конец-->
			
			
			<!--Блок 6 начало-->
			<div class="newblock6">
				<? $APPLICATION->IncludeFile(SITE_DIR . "include/newblock/block6.php", Array(), Array("MODE" => "html", "NAME" => "Текст блока 6",)); ?>
			</div>
			<!--Блок 6 конец-->
			
			
			<!--Блок 7 начало-->
			<div class="newblock7">
				<? $APPLICATION->IncludeFile(SITE_DIR . "include/custom/objects_block1.php", Array(), Array("MODE" => "html", "NAME" => "Текст блока 7",)); ?>
			</div>
			<!--Блок 7 конец-->
			
			
			<!--Блок 8 начало-->
			<div class="newblock8">
				<h2>Наши услуги</h2>
				
				
					
				
			</div>
			<!--Блок 8 конец-->
			
			
			<!--Блок 9 начало-->
			<div class="newblock9">
				<a href="https://opalubka.market/services/raschet-opalubki/"><b>Расчет опалубки</b></a><a>
				<br><br>
				<p style="color:#000000">Если вы не знаете, какие комплектующие и в каких количествах вам нужны, просто отправьте нам техническую документацию на объект. Наш инженер изучит ее, сделает расчет опалубки и отправит вам исчерпывающий список необходимых для заливки стен комплектующих с указанием стоимости аренды. Вам останется только принять решение.
				</p>
				</a><a href="https://opalubka.market/services/shef-montazh-opalubki/"><b>Шеф-монтаж</b></a><a>
				<br><br>
				<p style="color:#000000">Не всегда у строительной компании есть свой специалист по монтажу опалубочного оборудования, а обычные строители со средней квалификацией и мотивацией не могут работать без квалифицированного надзора.  Шеф-монтаж  от «Астория-СЛК» полностью решает эту проблему. По вашей заявке мы предоставим вам прораба, который будет руководить установкой опалубочного оборудования и проконтролирует правильность монтажа.  Вам останется просто включить бетононасосы и  залить конструкцию.
				</p>
						 </a>
			</div>
			<!--Блок 9 конец-->
			
			<!--Блок 10 начало-->
			<div class="newblock10">
				<? $APPLICATION->IncludeFile(SITE_DIR . "include/newblock/block10.php", Array(), Array("MODE" => "html", "NAME" => "Текст блока 6",)); ?>
			</div>
			<!--Блок 10 конец-->
			
			
			
			<!--Блок 11 начало-->
			<div class="newblock11">
				<div align="center">
				<div class="cta1">
					<img src="/cta1.png" class="cta1img"> <a href="#" data-event="jqm" data-param-id="19" data-name="callback" class="link1"></a> <a href="https://wa.me/74951910920" class="link2"></a> <a href="https://t.me/+74951910920" class="link3"></a>
					</div>
				</div>
			</div>
			<!--Блок 11 конец-->
			
			
			
			
			
			<div class="row" style="margin-top: 50px;margin-bottom: 50px">
                        <div class="col-md-12">
                            <div class="toogle">
                                <section class="toggle active" style="padding-top:40px">
                                    <h2 data-test="2">FAQ по опалубке</h2>
                                    <label>Каковы сроки установки опалубки?</label>
                                    <div class="toggle-content">
                                        <p>
                                            Трудно точно ответить на данный вопрос. Многое зависит от умения специалистов, погодных условий и готовности элементов. Если в бригаде трудится 6 человек, за один день можно собрать (в среднем) примерно 200 м2 опалубки.
                                        </p>
                                    </div>
                                </section> 
                                <section class="toggle"> <label>В монолитном строительстве имеется термин "захватка". Что он означает?</label>
                                    <div class="toggle-content">
                                        <p>
                                            Под этим термином подразумевается часть монолитных конструкций сооружения. Она единовременно бетонируется и на неё выставляется опалубка. От площади захватки зависят сроки сооружения монолитных конструкций. Чем больше она, тем быстрее возводится здание. Если этаж одного дома разделить на две захватки, а другого - на три, то бетонирование первого произойдет быстрее, чем второго здания. Однако с увеличением размеров захватки потребуется больше опалубки.
                                        </p>
                                    </div>
                                </section> <section class="toggle"> <label>Какова средняя цена за м2 опалубки?</label>
                                    <div class="toggle-content">
                                        <p>
                                            Такой цены не существует. Это довольно грубая и приблизительная величина. Стоимость кв. метра опалубки зависит от способа расчета. Но она не будет учитывать особенностей строящегося объекта (стоимость комплектующих элементов может учитываться). Если вам сообщается средняя цена, на неё не ориентируйтесь. Это рекламная уловка. Цена опалубки в реальности будет отличаться от заявленной вам средней стоимости.
                                        </p>
                                    </div>
                                </section>
                            </div>
                        </div>
            </div>
			
			
			
			<h2>Наши клиенты</h2>
                    <?
                    $APPLICATION->IncludeFile(SITE_DIR . "cust_incs/catalog-partners.php", array(), array(
                        "MODE" => "html",
                        "NAME" => "Title",
                        "TEMPLATE" => "include_area.php",
                            )
                    );
                    ?>
					
			
			<h2>Полезные статьи</h2>
			<?
                    $APPLICATION->IncludeFile(SITE_DIR . "include/custom/blog_block.php", array("slider_cnt"=>4), array(
                        "MODE" => "html",
                        "NAME" => "Title",
                        "TEMPLATE" => "include_area.php",
                            )
                    );
                    ?>		
			
			
			
	</div>
	
</div>








