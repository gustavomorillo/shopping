$( document ).ready(function() {


	$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});


	$('.parallax100').parallax100();


	$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})



		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});

		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});



		
		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(e){
				e.preventDefault();
				let id = $(this).data('id');
				alert(id);
				var datos = $('#'+id).serialize();
				alert(datos);

				axios.get('/cart/'+ id + '/edit?'+datos)
				
							.then((response) => {
							console.log(response);
							swal(nameProduct, "is added to cart !", "success");
											function refresh() {
											myVar = setTimeout(function(){
												location.reload();
											}, 2000);
										}
										refresh();

							})
							.catch((error) => {
							
							const errors = error.response.data.errors
							const firstItem = Object.keys(errors)[0]
							const firstItemDom = $("#" + firstItem)
							const firstErrorMessage = errors[firstItem][0]
							const errorMessages = document.querySelectorAll('.text-validate')
							errorMessages.forEach((element) => element.textContent = '')
							firstItemDom.after('<div class="text-validate">'+ firstErrorMessage + '</div>' )
							console.log(firstItem);
							});
		});
		});



		$('.js-addcart-detail1').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(e){
				e.preventDefault();
				let id = $(this).data('id');			
				var datos = $('#1').serialize();
				axios.get('/cart/'+ id + '/edit?'+datos)
				
							.then((response) => {
							console.log(response);
							swal(nameProduct, "is added to cart !", "success");
											function refresh() {
											myVar = setTimeout(function(){
												location.reload();
											}, 2000);
										}
										refresh();

							})
							.catch((error) => {
							
							const errors = error.response.data.errors
							const firstItem = Object.keys(errors)[0]
							const firstItemDom = $("#" + firstItem)
							const firstErrorMessage = errors[firstItem][0]
							const errorMessages = document.querySelectorAll('.text-validate')
							errorMessages.forEach((element) => element.textContent = '')
							alert(firstErrorMessage)
							});

				// $.ajax({
				// 		url: 'cart/'+ id + '/edit',
				// 		data: datos,
				// }).done(function(item){
				// 	console.log('Item added');
					
				// });
			});
		});

		$('.js-addcart-detail2').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(e){
				e.preventDefault();
				
				let id = $(this).data('id');

				var datos = $('#2').serialize();
			
			
				axios.get('/cart/'+ id + '/edit?'+datos)
				
				.then((response) => {
				console.log(response);
				swal(nameProduct, "is added to cart !", "success");
								function refresh() {
								myVar = setTimeout(function(){
									location.reload();
								}, 2000);
							}
							refresh();

				})
				.catch((error) => {
				
				const errors = error.response.data.errors
				const firstItem = Object.keys(errors)[0]
				const firstItemDom = $("#" + firstItem)
				const firstErrorMessage = errors[firstItem][0]
				const errorMessages = document.querySelectorAll('.text-validate')
				errorMessages.forEach((element) => element.textContent = '')
				alert(firstErrorMessage)
				});
				
			});
		});


		$('.js-addcart-detail3').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(e){
				e.preventDefault();
				swal(nameProduct, "is added to cart !", "success");
				let id = $(this).data('id');
				var datos = $('#3').serialize();
		
				axios.get('/cart/'+ id + '/edit?'+datos)
				
				.then((response) => {
				console.log(response);
				swal(nameProduct, "is added to cart !", "success");
								function refresh() {
								myVar = setTimeout(function(){
									location.reload();
								}, 2000);
							}
							refresh();

				})
				.catch((error) => {
				
				const errors = error.response.data.errors
				const firstItem = Object.keys(errors)[0]
				const firstItemDom = $("#" + firstItem)
				const firstErrorMessage = errors[firstItem][0]
				const errorMessages = document.querySelectorAll('.text-validate')
				errorMessages.forEach((element) => element.textContent = '')
				firstItemDom.after('<div class="text-validate">'+ firstErrorMessage + '</div>' )
				alert(firstErrorMessage)
				});

			


			});
    });
    

    $('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});


    console.log( "are you ready?!" );
});

