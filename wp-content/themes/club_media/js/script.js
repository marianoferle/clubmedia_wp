  //-----------------evento para el menu slider-------------------------
  $(".button-collapse").sideNav();
  $('.carousel.carousel-slider').carousel({full_width: true});

  $('.modal-trigger').leanModal();
  $('#aside').pushpin({ top:0, bottom:500 });



  function fbShare(url, title, descr, image, winWidth, winHeight) {
      var winTop = (screen.height / 2) - (winHeight / 2);
      var winLeft = (screen.width / 2) - (winWidth / 2);
      window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
  }


  /*var ajaxURL = 'index.php';
  $.getJSON(ajaxURL+"/wp-json/wp/v2/posts/", {}, function(data){
    	$.each(data, function(key,value){
         console.log(data[key].title.rendered);
         console.log(data[key].content.rendered);
         console.log(data[key].acf);
     });
   });*/
