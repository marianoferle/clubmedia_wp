  //-----------------evento para el menu slider-------------------------
  $(".button-collapse").sideNav();
  $('.carousel.carousel-slider').carousel({full_width: true});

  $('.modal-trigger').leanModal();
  $('#aside').pushpin({ top:0, bottom:500 });





  /*var ajaxURL = 'index.php';
  $.getJSON(ajaxURL+"/wp-json/wp/v2/posts/", {}, function(data){
    	$.each(data, function(key,value){
         console.log(data[key].title.rendered);
         console.log(data[key].content.rendered);
         console.log(data[key].acf);
     });
   });*/
