
/**
 * Класс для работы с объявлениями в различных режимх
 */
var Ad = {
	
	name: 'Ad',
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

var Site = {
		
	name: 'Site',
	webroot: '/',
	page404: '404.html',	
	page500: '500.html',
	
	/**
	 * Возвращаем ссылку на 500-ю ошибку
	 */	
	get500page: function(){
		return this.webroot + this.page500;
	}
};

/**
 * Javascript для формы редактирвоания.
 */
var AdEdit = {
	
	name: 'Ad',
	// Edit Category block
	categoryInputId: '#AdCategoryId',
	categoryLabelId: '#category-placeholder',
	categoryHiddenBlockId: '#hiddenCategoryBlock',  
	
	setup: function(){		
		if (!this.initialize()) {
			document.location = Site.get500page();
		} 
		
		this.initEditForm();
	},

	/**
	 * Проверить что все правильно и скрипт сработает
	 */
	initialize: function(){
		
		if (document.location.pathname != Site.webroot + 'ads/add') {
			//alert(document.location);
			console.log('Wrong page for edit Ads');
			return false;
		}
		
		if (typeof(window.winManager) !== 'object') {
			console.log('winManager object not found');
			return false;
		}
		
		return true;
	},
	
	/**
	 * Функции редактирования формы
	 */
	initEditForm: function() {
		this.initEditCategory();
	},
	
	/**
	 * Редактирование категорий. Мы выбираем их из большого попапа.
	 */
	initEditCategory: function(){
		$(this.categoryLabelId).click(function(){
			
			var categoryPopupHtml = $(AdEdit.categoryHiddenBlockId).html(); 
			
			//winManager.showContentInPopup(categoryPopupHtml);
			winManager.showPopupById(AdEdit.categoryHiddenBlockId, function(){
				$(AdEdit.categoryHiddenBlockId).html('');
				$(".b_category-block input").change(function(){
					var category_id = $(this).val();
					var category_label = $(this).next('label').html();  
					
					$(AdEdit.categoryInputId).val(category_id);
					$(AdEdit.categoryLabelId).html(category_label);
					
					winManager.unfreezePage();
				});
			});
			
			// Подписываемся на событие закрытия попа окна
			$(document).bind('winManagerClosePopup', function(event) {
				$(AdEdit.categoryHiddenBlockId).html(categoryPopupHtml);
			});
		});
	}
	
};

/**
 * Window magager - show diferent popups
 */
