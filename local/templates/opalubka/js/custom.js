/*
You can use this file with your scripts.
It will not be overwritten when you upgrade solution.
*/

$('.shmore').click(function(){
	if ($('.newpotext').hasClass('newpotextactive')) {
		$('.newpotext').removeClass('newpotextactive');
		$('.newpotext').hide(200);
		$(this).html('Показать еще');
	}
	else {
		$('.newpotext').addClass('newpotextactive');
		$('.newpotext').show(200);
		$(this).html('Скрыть');
	}
})

if($('.detail-custom-map').length){
	$.ajax({
		url: '/include/mainpage/components/maps/front_only_markers1.php',
		success: function(html){
			$('.detail-custom-map').html(html)
		}
	})
}

function initSortField() {
	$('.filter-panel-wrapper .js-load-link').off().on('click', function (e){
		e.preventDefault();
		e.stopPropagation();
		$('.ajax_load.cur').addClass('loading-state');
		const params = ($(this).attr('data-url') + '&ajax_get_filter=Y&control_ajax=Y&bitrix_include_areas=N').split('?')[1];
		$(this).parents('.dropdown-select__list').css('display', 'none').css('opacity', '0');
		$(this).parents('.dropdown-select').find('.dropdown-select__title').removeClass('opened');
		const link = window.location.href.split('?')[0];
		const url = link +'?'+ params;
		window.history.pushState(null, null, url);
		$.get(url, function (data ) {
			const html = $(data).find('.js_wrapper_items').html();
			$('.js_wrapper_items').html(html);
			initSortField();
		})
	})
}
initSortField();

$(document).ready(function (){
	$('[data-toggle="tab"]').on('click', function (e){
		e.preventDefault();
		e.stopPropagation();
		const container = $(this).parent().parent().parent();
		container.find('.tab-pane').removeClass('active show');
		container.find('.nav-tabs li').removeClass('active');
		container.find('.nav-tabs li a').removeClass('active').removeClass('show');
		$(this).parent().addClass('active');
		container.find(`.tab-pane:nth-child(${$(this).parent().index()+1})`).addClass('active show ');
	});
	const selectInput = document.querySelectorAll('.main-calculator__select');
	const selectItem = document.querySelectorAll('.main-calculator__select-item');

	if (selectInput) {
		selectInput.forEach(selectInputItem => {
			selectInputItem.addEventListener('click', () => {
				let selectHeight = selectInputItem.nextElementSibling.querySelector('.main-calculator__select-list').offsetHeight;
				selectInputItem.nextElementSibling.style.maxHeight = selectHeight + 'px';
				selectInputItem.nextElementSibling.classList.add('active');
			})
			selectItem.forEach(currentSelectItem => {
				currentSelectItem.addEventListener('click', () => {
					selectInputItem.nextElementSibling.style.maxHeight = 0 + 'px';
					selectInputItem.nextElementSibling.classList.remove('active');
					let selectValue = currentSelectItem.innerText;
					currentSelectItem.closest('.main-calculator__select-wrapper').previousElementSibling.value = selectValue;
				})
			})
			window.addEventListener('click', (e) => {
				if (!selectInputItem.contains(e.target) && !selectInputItem.parentElement.contains(e.target) && selectInputItem.nextElementSibling.style.maxHeight !== 0) {
					selectInputItem.nextElementSibling.style.maxHeight = 0 + 'px';
					selectInputItem.nextElementSibling.classList.remove('active');
				}
			})
		})
	}

	$("#countCost2").click(function(){
		var bIsError = false;
		var priceMultiplicator;
		const wedgeScaffoldCheapestPrice = 200
		const frameScaffoldCheapestPrice = 95
		const wedgeScaffoldFlooring = {"250" : 400, "500" : 350, "1000" : 300, "2000" : 250}
		const frameScaffoldFlooring = {"250" : 150, "500" : 120, "1000" : 105, "2000" : 100}
		var facadePriceFlooring
		switch ($("#scaffoldChoose").attr("data-active")) {
			case "wedgeScaffold":
				priceMultiplicator = wedgeScaffoldCheapestPrice
				facadePriceFlooring = wedgeScaffoldFlooring
				break;
			case "frameScaffold":
				priceMultiplicator = frameScaffoldCheapestPrice
				facadePriceFlooring = frameScaffoldFlooring
				break;
			default:
				break;
		}
		const facadeLength = parseFloat($("#facadeLength").val().split(',').join('.'))
		const facadeHeight = parseFloat($("#facadeHeight").val().split(',').join('.'))
		if(facadeHeight > 0
			&& facadeLength > 0) {
			const facadeFloor = parseInt(facadeHeight * facadeLength)

			var bPriceLevelFound = false;
			for(var key in facadePriceFlooring) {
				if(!bPriceLevelFound) {
					const level = parseInt(key)
					if(facadeFloor <= level) {priceMultiplicator = facadePriceFlooring[key]; bPriceLevelFound = true}
				}
			}

			const finalCost = numberWithSpaces(parseInt(facadeFloor * priceMultiplicator))
			$("#totalSquare2").text(numberWithSpaces(facadeFloor))
			$("#totalPrice2").text(finalCost)
		} else { bIsError = true }
	})

	$(".main-calculator__select-item").click(function(){
		$("#scaffoldChoose").attr("data-active", $(this).attr("id"));
	})

	function numberWithSpaces(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
	}
});


