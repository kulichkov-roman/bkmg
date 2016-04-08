$(document).ready(function () {

$('a[name=modal]').click(function(e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').fadeIn(1000); 
    $('#mask').fadeTo("slow",0.8); 
    var winH = $(window).height();
    var winW = $(window).width();
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    $(id).fadeIn(2000); 
    });
    $('.window .close').click(function (e) { 
    e.preventDefault();
    $('#mask, .window').hide();
    }); 
    $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
    }); 

	 
  $(".del").on("click", function(){
	   
   $.ajax({
		   type: "POST",
		   url: "/basket/del_basket.php",
		   data: $("#frBasket").serialize(),
		   success: function( data ) { 
		         location.reload();	
		    },
		});
	});
	
	 $(function(){

        var field = new Array("rName", "rPhon", "rAddress", "cName", "cPhon", "cMail");//поля обязательные 
                
        $("form").submit(function() {// обрабатываем отправку формы    
		
            var error=0; // индекс ошибки
            $("form").find(":input").each(function() {// проверяем каждое поле в форме
                for(var i=0;i<field.length;i++){ // если поле присутствует в списке обязательных
                    if($(this).attr("name")==field[i]){ //проверяем поле формы на пустоту
                        
                        if(!$(this).val()){// если в поле пустое
                            $(this).css('border', 'red 1px solid');// устанавливаем рамку красного цвета
                            error=1;// определяем индекс ошибки       
                                                        
                        }
                        else{
                            $(this).css('border', '#dadada 1px solid');// устанавливаем рамку обычного цвета
                        }
                        
                    }               
                }
           })
           
            if(error==0){ // если ошибок нет то отправляем данные
                return true;
            }
            else{
            if(error==1) var err_text = "Не все обязательные поля заполнены!";
            $("#messenger").html(err_text); 
            $("#messenger").fadeIn("slow"); 
            return false; //если в форме встретились ошибки , не  позволяем отослать данные на сервер.
            }
            
            
                
        })
    });

	
	$(".bs_clear").on("click", function(){
 
	   	 $.ajax({
		   type: "POST",
		   url: "/basket/clear_basket.php",
		   //data: $(".add").serialize(),
		   data: "",
		   success: function( data ) {
		       
		    },		
		});
		
		
  });
	
  
	$(".add").submit(function() { return false; });

    var kl=0;
    $(".order").on("click", function(){
    
	   kl++;
       $('.ord').append('<div id="txt'+kl+'" class="txt-add">Товар добавлен в корзину</div>');
	   $('#txt'+kl).show();
 	   //setTimeout(function() { $('#txt'+kl).remove(); }, 1000)
        setTimeout(function() { $('.txt-add').remove(); }, 800)
	
	
	
	 var form =  $(this).parent(".add").attr("id");
		 		   
     $.ajax({
		   type: "POST",
		   url: "/basket/add_basket.php",
		   data: $(this).parent(".add").serialize(),
		   success: function( data ) {
		         $.ajax({
		   				type: "GET",
		  				 url: "/basket/reload.php",
		  				 //data: $(".add").serialize(),
		   				data:"",
		   				success: function( data ) {
		       			 $("#basket-cont").html(data);
		    			},
		    			complete: function( xhr ) {
		        		// alert( 'запрос успешно выполнен' );
		    			},
		    			error: function( xhr, status ) {
		       			 alert( 'произошла ошибка при выполнении запроса' );
    					}		
				});
		 
		    },
						
		});
  });
	
	
    jQuery('#slider').lbSlider({
        visible: 1,
        autoPlay: true,
        autoPlayDelay: 6
    });

    $('.catalog-item').hover(
        function () {
            $(this).addClass("hovered");
            $(this).find(".info").show();

        },
        function () {
            $(this).find(".info").hide();
            $(this).removeClass("hovered");
        }
    );

   /* $(".slider_container").mousemove(function (e) {
        var moveX = (e.pageX * -1 / 15);
        var moveY = (e.pageY * -1 / 15);
        $(this).css("background-position", moveX + "px " + moveY + "px");
    });
    */
});



// Custom sorting plugin
(function ($) {
    $.fn.sorted = function (customOptions) {
        var options = {
            reversed: false,
            by: function (a) { return a.text(); }
        };
        $.extend(options, customOptions);
        $data = $(this);
        arr = $data.get();

        arr.sort(function (a, b) {
            var valA = options.by($(a));
            var valB = options.by($(b));
            if (options.reversed) {
                return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
            } else {
                return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;
            }
        });
        return $(arr);
    };

})(jQuery);

// DOMContentLoaded
$(function () {

    // get the first collection
    var $applications = $('#applications');

    // clone applications to get a second collection
    var $data = $applications.clone();
    

    $('#sort li').click(function (e) {

        $('#sort').find("a").removeClass("activ");
        $(this).find("a").addClass("activ");
        
        var $filteredData = $data.find('li');

        switch ($(this).attr("data-id")) {
            case "name":
                var $sortedData = $filteredData.sorted({
                    by: function (v) {
                        return $(v).find('.name').text().toLowerCase();
                    }
                });
                break;
            case "upPrice":
                
                var $sortedData = $filteredData.sorted({
                    by: function (v) {
                        var sort = $(v).find('.price').text();
                        sort = parseFloat(sort.replace(" ", ""));
                        return sort;
                    }
                });
                break;
            case "downPrice":

                var $sortedData = $filteredData.sorted({
                    reversed: true,
                    by: function (v) {
                        var sort = $(v).find('.price').text();
                        sort = parseFloat(sort.replace(" ", ""));
                        return sort;
                    }
                });
                break;
            case "new":
                var $filteredData = $data.find('li[data-type=new]');
                var $sortedData = $filteredData.sorted({
                    reversed: true,
                    by: function (v) {
                        return $(v).find('.name').text().toLowerCase();
                    }
                });
                break;
        }

        $applications.quicksand($sortedData, {
            duration: 800
        }, function(){ 
				   $('.catalog-item').hover(
						function () {
							$(this).addClass("hovered");
							$(this).find(".info").show();
				
						},
						function () {
							$(this).find(".info").hide();
							$(this).removeClass("hovered");
						}
					);
			}
		);
    });
});
   

