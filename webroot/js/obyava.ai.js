
/**
 * Класс для работы с объявлениями в различных режимх
 */
var Ad = {
	
	oneAdClass: '.b_one-ads',
		
	setup: function() {
		this.initSelectAd();
	},
	
	// Выделение одного объявления
	initSelectAd: function (){
		$(this.oneAdClass).click(function(){
			$(this).toggleClass('selected');
			
			return false;
		});
	}
};


/**
 * Window magager - show diferent popups
 */
