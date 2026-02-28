<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Онлайн-калькулятор расчета цены на необходимое количество опалубки: площадь, толщина опалубки, длина, ширина, цена за м2, итоговая стоимость.");
$APPLICATION->SetPageProperty("title", "Калькулятор расчета опалубки стен и перекрытий");
$APPLICATION->SetTitle("Калькулятор опалубки");
?>

<style type="text/css">
	/* -----------------------------------------------
   Переопределяем rangeslider.js под стиль лесов
   ----------------------------------------------- */

	/* Трек */
	.rangeslider {
		display: block !important;
		width: 100% !important;
		height: 8px !important;
		margin: 0 !important;
		background: white !important;
		border: 1px solid #e6002d !important;
		border-radius: 4px !important;
		box-shadow: none !important;
		position: relative;
	}

	/* Заполненная часть */
	.rangeslider__fill {
		background: #e6002d !important;
		height: 8px !important;
		border-radius: 4px !important;
		box-shadow: none !important;
	}

	/* Ползунок */
	.rangeslider__handle {
		width: 24px !important;
		height: 24px !important;
		background: #e6002d !important;
		background-image: none !important;
		border-radius: 50% !important;
		border: 2px solid white !important;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2) !important;
		top: -9px !important;
		cursor: pointer;
		position: absolute;
	}

	.rangeslider__handle:after {
		content: '' !important;
		position: absolute !important;
		width: 8px !important;
		height: 8px !important;
		background: white !important;
		border-radius: 50% !important;
		top: 50% !important;
		left: 50% !important;
		transform: translate(-50%, -50%) !important;
		box-shadow: none !important;
		display: block !important;
	}

	.rangeslider--horizontal {
		height: 8px !important;
		width: 100% !important;
		position: relative;
	}

	/* -----------------------------------------------
   Бейдж значения со стрелкой вверх
   ----------------------------------------------- */
	.opalubka-slider-value-container {
		position: relative;
		margin-top: 10px;
		text-align: center;
		height: 0;
	}

	.opalubka-slider-value-display {
		display: inline-block;
		background: #e6002d;
		color: white;
		padding: 4px 10px;
		border-radius: 4px;
		font-size: 13px;
		font-weight: 600;
		white-space: nowrap;
		position: relative;
		font-family: 'Open Sans', sans-serif;
	}

	.opalubka-slider-value-display:after {
		content: '';
		position: absolute;
		top: -5px;
		left: 50%;
		transform: translateX(-50%);
		width: 0;
		height: 0;
		border-left: 5px solid transparent;
		border-right: 5px solid transparent;
		border-bottom: 5px solid #e6002d;
	}

	/* -----------------------------------------------
   Подписи мин/макс под слайдером
   ----------------------------------------------- */
	.opalubka-slider-label {
		display: flex;
		justify-content: space-between;
		margin-top: 40px;
		color: #6c757d;
		font-size: 12px;
		font-family: 'Open Sans', sans-serif;
	}

	/* -----------------------------------------------
   Контейнер слайдера
   ----------------------------------------------- */
	.opalubka-slider-box {
		margin: 15px 0 15px;
		position: relative;
	}

	.opalubka-slider-container {
		background: white;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
		min-width: 260px;
	}

	.opalubka-slider-title {
		font-weight: 600;
		margin-bottom: 5px;
		color: #2c3e50;
		white-space: nowrap;
		font-size: 15px;
		font-family: 'Open Sans', sans-serif;
	}

	/* -----------------------------------------------
   Карточка калькулятора
   ----------------------------------------------- */
	.opalubka-calc-card {
		box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
		border: none;
		border-radius: 10px;
		overflow: hidden;
		margin-bottom: 40px;
		font-family: 'Open Sans', sans-serif;
	}

	.opalubka-calc-header {
		background: linear-gradient(135deg, #e6002d, #c40a33);
		color: white;
		padding: 20px;
		text-align: center;
	}

	.opalubka-calc-header h2 {
		font-weight: 700 !important;
		margin: 0 !important;
		padding: 0 !important;
		font-size: 24px !important;
		color: #fff !important;
		background: none !important;
		border-radius: 0 !important;
		text-align: center !important;
		font-family: 'Open Sans', sans-serif !important;
	}

	.opalubka-calc-body {
		padding: 25px;
		background: #fff;
	}

	.opalubka-sliders-row {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		margin-bottom: 25px;
	}

	/* -----------------------------------------------
   Блок результатов
   ----------------------------------------------- */
	.opalubka-results-container {
		background: white;
		padding: 25px;
		border-radius: 10px;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
		margin-bottom: 25px;
	}

	.main-calculator__result-subtitle {
		margin-bottom: 10px;
		font-size: 17px;
		font-weight: 600;
		color: #222222;
		font-family: 'Open Sans', sans-serif;
	}

	.main-calculator__result-list {
		display: flex;
		flex-wrap: wrap;
		gap: 50px;
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.main-calculator__result-item {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.main-calculator__result-item::before {
		display: none !important;
	}

	.main-calculator__result-description {
		font-weight: 600;
		margin-bottom: 5px;
		color: #a5a5a5;
		white-space: nowrap;
		font-size: 15px;
		font-family: 'Open Sans', sans-serif;
	}

	.main-calculator__result-value {
		font-size: 44px;
		font-weight: 700;
		line-height: 51px;
		color: #222222;
		font-family: 'Open Sans', sans-serif;
	}

	/* -----------------------------------------------
   Поля ввода и select (калькулятор перекрытий)
   ----------------------------------------------- */
	.main-calculator__form-list {
		display: flex;
		align-items: flex-end;
		flex-wrap: wrap;
		gap: 20px;
		margin: 0 0 25px 0;
		padding: 0;
		list-style: none;
	}

	.main-calculator__form-item {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.main-calculator__form-item::before {
		display: none !important;
	}

	.main-calculator__form-description {
		font-weight: 600;
		margin-bottom: 5px;
		color: #2c3e50;
		white-space: nowrap;
		font-size: 15px;
		font-family: 'Open Sans', sans-serif;
	}

	.main-calculator__form-input {
		border: 1px solid #e8e8e8;
		border-radius: 2px;
		padding: 16px 13px;
		width: 200px;
		height: 49px;
		background: #fff;
		font-size: 15px;
		font-family: 'Open Sans', sans-serif;
		color: #222;
		outline: none;
		transition: border-color 0.2s;
		display: block;
	}

	.main-calculator__form-input:focus {
		border-color: #e6002d;
	}

	.main-calculator__select-wrap {
		position: relative;
	}

	.main-calculator__select-wrap::before {
		content: '';
		position: absolute;
		top: 19px;
		right: 14px;
		display: block;
		width: 12px;
		height: 12px;
		background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOCIgaGVpZ2h0PSI1IiB2aWV3Qm94PSIwIDAgOCA1IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMSAxTDQgNEw3IDEiIHN0cm9rZT0iIzdBN0E3QSIgc3Ryb2tlLXdpZHRoPSIxLjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgo8L3N2Zz4K');
		background-repeat: no-repeat;
		background-size: 12px;
		pointer-events: none;
	}

	.main-calculator__select-wrap select {
		-webkit-appearance: none;
		appearance: none;
		cursor: pointer;
		padding-right: 36px;
	}

	/* -----------------------------------------------
   Таблица — точь-в-точь как у лесов
   ----------------------------------------------- */
	.opalubka-materials-table {
		width: 100%;
		border-collapse: separate;
		border-spacing: 0;
		background: white;
		border-radius: 10px;
		overflow: hidden;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
	}

	.opalubka-materials-table th {
		background: linear-gradient(135deg, #e6002d, #c40a33);
		color: white;
		padding: 16px;
		text-align: left;
		font-weight: 600;
		font-size: 16px;
		border: none !important;
		font-family: 'Open Sans', sans-serif;
	}

	.opalubka-materials-table td {
		padding: 16px;
		border-bottom: 1px solid #eaeaea;
		font-size: 15px;
		font-weight: 700;
		color: #2c3e50;
		border: none !important;
		font-family: 'Open Sans', sans-serif;
	}

	.opalubka-materials-table tr:last-child td {
		border-bottom: none !important;
	}

	/* Шахматная раскраска */
	.opalubka-materials-table tbody tr:nth-child(odd) td {
		background-color: #ffffff;
	}

	.opalubka-materials-table tbody tr:nth-child(even) td {
		background-color: #f9f9f9;
	}

	.opalubka-materials-table tbody tr:hover td {
		background-color: #fde8eb;
	}

	/* Итоговая строка */
	.opalubka-materials-table tbody tr.row-total td {
		background: #f5f5f5 !important;
		border-top: 2px solid #e8e8e8 !important;
		color: #222;
		font-size: 15px;
		font-weight: 700;
	}

	.opalubka-materials-table tbody tr.row-total td.sum-val {
		color: #e6002d;
		font-size: 16px;
	}

	.opalubka-value-display {
		font-weight: 700;
		color: #2c3e50;
		font-size: 16px;
	}

	/* -----------------------------------------------
   Адаптив
   ----------------------------------------------- */
	@media screen and (max-width: 768px) {
		.opalubka-sliders-row {
			flex-direction: column;
		}

		.opalubka-slider-container {
			width: 100%;
		}

		.main-calculator__result-value {
			font-size: 32px;
			line-height: 38px;
		}

		.main-calculator__result-list {
			gap: 24px;
		}
	}

	@media screen and (max-width: 480px) {
		.opalubka-calc-body {
			padding: 16px;
		}

		.main-calculator__form-input {
			width: 100%;
		}

		.main-calculator__form-list {
			flex-direction: column;
		}

		.opalubka-materials-table th,
		.opalubka-materials-table td {
			padding: 10px 12px;
			font-size: 13px;
		}
	}
</style>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/include/calc_lesa.php'); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/calculator_new_block.php' ?>


<!-- =============================================
     КАЛЬКУЛЯТОР СТЕНОВОЙ ОПАЛУБКИ
     ============================================= -->
<div class="opalubka-calc-card">

	<div class="opalubka-calc-header">
		<h2>Калькулятор стеновой опалубки</h2>
	</div>

	<div class="opalubka-calc-body">

		<div class="opalubka-sliders-row">

			<!-- Длина стены -->
			<div class="opalubka-slider-container">
				<div class="opalubka-slider-title">Длина стены, м</div>
				<div class="opalubka-slider-box">
					<input class="r1" type="range" min="10" max="200" id="r1">
					<div class="opalubka-slider-value-container">
						<div class="opalubka-slider-value-display" id="badge-r1">10 м</div>
					</div>
					<div class="opalubka-slider-label">
						<span>10 м</span>
						<span>200 м</span>
					</div>
				</div>
			</div>

			<!-- Высота стены -->
			<div class="opalubka-slider-container">
				<div class="opalubka-slider-title">Высота стены, м</div>
				<div class="opalubka-slider-box">
					<input class="r2" type="range" min="10" max="30" id="r2">
					<div class="opalubka-slider-value-container">
						<div class="opalubka-slider-value-display" id="badge-r2">1.0 м</div>
					</div>
					<div class="opalubka-slider-label">
						<span>1 м</span>
						<span>3 м</span>
					</div>
				</div>
			</div>

		</div>

		<!-- Результаты -->
		<div class="opalubka-results-container">
			<div class="main-calculator__result-subtitle">Результат расчета</div>
			<ul class="main-calculator__result-list">
				<li class="main-calculator__result-item">
					<div class="main-calculator__result-description">Площадь опалубки, м²</div>
					<div class="main-calculator__result-value" id="res">100</div>
				</li>
				<li class="main-calculator__result-item">
					<div class="main-calculator__result-description">Цена за м²</div>
					<div class="main-calculator__result-value">4 000 р.</div>
				</li>
				<li class="main-calculator__result-item">
					<div class="main-calculator__result-description">Итоговая стоимость, руб.</div>
					<div class="main-calculator__result-value" id="res2" style="color:#e6002d;">400 000</div>
				</li>
			</ul>
		</div>

	</div>
</div>


<!-- =============================================
     КАЛЬКУЛЯТОР ОПАЛУБКИ ПЕРЕКРЫТИЙ
     ============================================= -->
<div class="opalubka-calc-card" style="margin-top:40px;">

	<div class="opalubka-calc-header">
		<h2>Калькулятор опалубки перекрытий</h2>
	</div>

	<div class="opalubka-calc-body">

		<ul class="main-calculator__form-list">
			<li class="main-calculator__form-item">
				<div class="main-calculator__form-description">Площадь перекрытий, м²</div>
				<input type="text" id="pl" value="1" class="main-calculator__form-input">
			</li>
			<li class="main-calculator__form-item">
				<div class="main-calculator__form-description">Толщина перекрытия, мм</div>
				<div class="main-calculator__select-wrap">
					<select name="ceiling" id="ceiling" class="main-calculator__form-input">
						<option value="160">160 мм</option>
						<option value="180">180 мм</option>
						<option value="200">200 мм</option>
						<option value="220">220 мм</option>
						<option value="250">250 мм</option>
						<option value="280">280 мм</option>
						<option value="300">300 мм</option>
						<option value="350">350 мм</option>
					</select>
				</div>
			</li>
		</ul>

		<table class="opalubka-materials-table" id="details">
			<thead>
				<tr>
					<th>№</th>
					<th>Наименование элемента</th>
					<th>Ед. изм.</th>
					<th>Кол-во</th>
					<th>Цена, руб.</th>
					<th>Сумма, руб.</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>

	</div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.js"></script>
<script type="text/javascript">
	var $x = jQuery.noConflict();

	/* === Стеновой калькулятор === */
	$x('input[type="range"].r1').rangeslider({
		polyfill: false,
		onSlide: function(position, value) {
			$x('#badge-r1').html(value + ' м');
			var area = parseInt(value) * parseInt($x('#r2').val()) / 10;
			var total = area * 4000;
			$x('#res').html(area);
			$x('#res2').html(total.toLocaleString('ru-RU'));
		}
	});

	$x('input[type="range"].r2').rangeslider({
		polyfill: false,
		onSlide: function(position, value) {
			$x('#badge-r2').html((parseInt(value) / 10).toFixed(1) + ' м');
			var area = parseInt($x('#r1').val()) * parseInt(value) / 10;
			var total = area * 4000;
			$x('#res').html(area);
			$x('#res2').html(total.toLocaleString('ru-RU'));
		}
	});

	// Инициализация при загрузке
	(function() {
		var len = parseInt($x('#r1').val());
		var hRaw = parseInt($x('#r2').val());
		var area = len * hRaw / 10;
		var total = area * 4000;
		$x('#badge-r1').html(len + ' м');
		$x('#badge-r2').html((hRaw / 10).toFixed(1) + ' м');
		$x('#res').html(area);
		$x('#res2').html(total.toLocaleString('ru-RU'));
	})();

	/* === Калькулятор перекрытий === */
	function calc3() {
		$x('#details tbody tr').remove();
		var details = [
			['Стойка', 0.7, 595, 'шт'],
			['Унивилка', 0.7, 95, 'шт'],
			['Тренога', 0.5, 250, 'шт'],
			['Балка клееная', 3.8, 195, 'мп'],
			['Фанера', 1.0, 1000, 'м²'],
		];
		var k = 1;
		var w = parseInt($x('#ceiling').val());
		var sq = parseInt($x('#pl').val());
		if (w === 160) k = 0.8;
		if (w >= 250) k = 1.2;
		var sum = 0;
		for (var i = 0; i < details.length; i++) {
			var qty = Math.ceil(details[i][1] * k * sq);
			var rowSum = qty * details[i][2];
			sum += rowSum;
			if (qty > 0) {
				$x('#details tbody').append(
					'<tr>' +
					'<td style="text-align:center;">' + (i + 1) + '</td>' +
					'<td>' + details[i][0] + '</td>' +
					'<td style="text-align:center;">' + details[i][3] + '</td>' +
					'<td style="text-align:right;">' + qty + '</td>' +
					'<td style="text-align:right;">' + details[i][2].toLocaleString('ru-RU') + '</td>' +
					'<td style="text-align:right;" class="opalubka-value-display">' + rowSum.toLocaleString('ru-RU') + '</td>' +
					'</tr>'
				);
			}
		}
		$x('#details tbody').append(
			'<tr class="row-total">' +
			'<td colspan="5">Итого</td>' +
			'<td class="sum-val" style="text-align:right;">' + sum.toLocaleString('ru-RU') + ' руб.</td>' +
			'</tr>'
		);
	}

	$x('#pl').on('input keyup', calc3);
	$x('#ceiling').on('change', calc3);
	calc3();
</script>


<br><br>

<p style="text-align: left;">
	<span class="callback-block" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback">
		<img src="/cta2.png" class="cta2img">
	</span>
</p>
<style type="text/css">
	@media screen and (max-width: 990px) {
		.cta2img {
			display: none;
		}
	}
</style>

<p><br>
	Калькулятор опалубки предоставляет удобный и эффективный инструмент для расчета необходимого количества опалубки перекрытий и стеновой для вашего строительного проекта. Благодаря этому инструменту, вы сможете точно определить объем материала, который вам потребуется, и избежать излишних затрат.
</p>
<h3>Преимущества использования калькулятора опалубки:</h3>
<ul>
	<li>Точность расчетов: наш калькулятор предоставляет точные и надежные расчеты, учитывая размеры и параметры вашего строительного объекта. Это позволяет избежать перерасхода или недостатка материала.</li>
	<li>Экономия времени и средств: благодаря автоматизированному процессу расчета, вы экономите время и силы, которые можно использовать для других важных задач.</li>
	<li>Удобство использования: благодаря простому и понятному интерфейсу калькулятор доступен для всех пользователей, независимо от опыта в строительстве.</li>
	<li>Адаптивность к разным проектам: наш калькулятор подходит для различных типов строительства, будь то многоэтажное здание, жилой дом или коммерческий объект.</li>
</ul>
<h3>Как использовать калькулятор опалубки:</h3>
<ol>
	<li>Введите необходимые параметры: укажите размеры стен и перекрытий, а также тип используемой опалубки.</li>
	<li>Получите результат: мгновенно произведенный расчет предоставит вам точные данные о необходимом количестве материалов.</li>
	<li>Сэкономьте на материалах: с полученными результатами вы сможете заранее спланировать закупку опалубки, избежав переплат и минимизируя издержки.</li>
</ol>
<p>
	Необходимость правильного и точного расчета несомненна при строительстве. Используйте калькулятор расчета опалубки на нашем сайте, чтобы сделать этот процесс более эффективным и удобным!
</p>

<?
if (false && $USER->IsAdmin()) {
	$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/calculator/calc_lesa.php');
}
?>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>