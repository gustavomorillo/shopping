$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $(".parallax100").parallax100();

    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next(".dropDownSelect2")
        });
    });

    $(".gallery-lb").each(function() {
        // the containers for all your galleries
        $(this).magnificPopup({
            delegate: "a", // the selector for gallery item
            type: "image",
            gallery: {
                enabled: true
            },
            mainClass: "mfp-fade"
        });
    });

    $(".js-addwish-b2").on("click", function(e) {
        e.preventDefault();
    });

    $(".js-addwish-b2").each(function() {
        var nameProduct = $(this)
            .parent()
            .parent()
            .find(".js-name-b2")
            .html();
        $(this).on("click", function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass("js-addedwish-b2");
            $(this).off("click");
        });
    });



    $(".js-pscroll").each(function() {
        $(this).css("position", "relative");
        $(this).css("overflow", "hidden");
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false
        });

        $(window).on("resize", function() {
            ps.update();
        });
    });


    $(".js-addcart-detail").each(function() {
        var nameProduct = $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".js-name-detail")
            .html();
        $(this).on("click", function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            var datos = $("#" + id).serialize();
            axios
                .get("/cart/" + id + "/edit?" + datos)
                .then(function(response) {
                    swal(nameProduct, "fue agregado a tu carrito de compras !", "success");
                    $.ajax({
                        url: "http://shopping.test/products/",
                        data: { 
                        },
                        type: "GET",
                        dataType: "html",
                        success: function (data) {
                            var result = $('<div />').append(data).find('#cartWish').html();
                            $('#cartWish').html(result);
                        }});
                    // function refresh() {
                    //     myVar = setTimeout(function() {
                    //         location.reload();
                    //     }, 2000);
                    // }

                    // refresh();
                })
                .catch(function(error) {
                    var errors = error.response.data.errors;
                    var firstItem = Object.keys(errors)[0];
                    var firstItemDom = $("#" + firstItem);
                    var firstErrorMessage = errors[firstItem][0];
                    var errorMessages = document.querySelectorAll(
                        ".text-validate"
                    );
                    // errorMessages.forEach(function (element) {
                    // 	return element.textContent = '';
                    // });
                    firstItemDom.after(
                        '<div class="text-validate">' +
                            firstErrorMessage +
                            "</div>"
                    );
                    console.log(firstItem);
                });
        });
    });


    $(".js-addwish-detail").each(function() {
        var nameProduct = $(this)
                .parent()
                .parent()
                .parent()
                .find(".js-name-detail")
                .html();

        $(this).on("click", function() {
                let id = $(this).data("id");
                var datos = $("#" + id).serialize();
                axios.get("/wishlist/" + id + "/edit?" + datos)
            .then(function(response) {
                
                                    swal(nameProduct, "fue agregado a tu lista de deseos !", "success");
                                    $(".js-addwish-detail").addClass("js-addedwish-detail");
                                    $(".js-addwish-detail").off("click");
                                    $.ajax({
                                        url: "http://shopping.test/products/",
                                        data: { 
                                        },
                                        type: "GET",
                                        dataType: "html",
                                        success: function (data) {
                                            var result = $('<div />').append(data).find('#cartWish').html();
                                            $('#cartWish').html(result);
                                        }});

                                    

            })
            .catch(function(error) {
                var errors = error.response.data.errors;
                var firstItem = Object.keys(errors)[0];
                var firstErrorMessage = errors[firstItem][0];
                alert(firstErrorMessage);
                            });
                            

        });
});

// $('#selectAddress').on('change', function () {
//     $('#pru').submit(function(e) {
//     var id = $('#selectAddress').find(':selected').data('id');
//     e.preventDefault();
//     var data = $('#pru').serialize();
//     console.log(data);
//     // // $('#name').val('hola');
//     // $.ajax({
        
//     //     type: 'POST',
//     //     url: 'http://shopping.test/address',
//     //     data: {data}
//     //   }).done(function(item){
//     //     console.log(item);
//     //   });
//     });
//     $('#pru').submit();
// });

$('#selectAddress').on('change', function () {
    $('#pru').submit(function(e) {
        e.preventDefault();
        var id = $('#selectAddress').find(':selected').data('id');
        //var data = $('#pru').serialize();
        $.ajax({
        type: 'POST',
        url: 'http://shopping.test/address',
        data: {id}
      }).done(function(item){
        $('#name').val(item.name);
        $('#lastname').val(item.lastname);
        $('#address').val(item.address);
        $('#city').val(item.city);
        $('#state').val(item.state);
        $('#phone').val(item.phone);
        $('#email').val(item.email);
      });
      






    });
    $('#pru').submit();
});

    










    console.log("Welcome to gusclick.com");
});

