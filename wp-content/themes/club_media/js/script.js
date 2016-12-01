  //-----------------evento para el menu slider-------------------------
  $(".button-collapse").sideNav();
  $('.carousel.carousel-slider').carousel({full_width: true});

  $('.modal-trigger').leanModal();
  $('#aside').pushpin({ top:0, bottom:500 });





/*  function fbShare(url, title, descr, image, winWidth, winHeight) {
      var winTop = (screen.height / 2) - (winHeight / 2);
      var winLeft = (screen.width / 2) - (winWidth / 2);
      window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
  }*/








function fbShare(url, title, descr, image, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);

    title = encodeURIComponent(title);
    url = encodeURIComponent(url);
    descr = encodeURIComponent(descr);
    image = encodeURIComponent(image);

    console.log(title,url,descr,image);

    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

function linkedinShare(url, title, descr, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);

    title = encodeURIComponent(title);
    url = encodeURIComponent(url);
    descr = encodeURIComponent(descr);

    window.open('http://www.linkedin.com/shareArticle?mini=true&title=' + title + '&summary=' + descr + '&url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}



function twitterShare(url, title, descr, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);

    title = encodeURIComponent(title);
    url = encodeURIComponent(url);
    descr = encodeURIComponent(descr);

    window.open('https://twitter.com/share?title=' + title + '&text=' + descr + '&url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}


function googleShare(url, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);

    url = encodeURIComponent(url);

    window.open('https://plus.google.com/share?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

  /*var ajaxURL = 'index.php';
  $.getJSON(ajaxURL+"/wp-json/wp/v2/posts/", {}, function(data){
    	$.each(data, function(key,value){
         console.log(data[key].title.rendered);
         console.log(data[key].content.rendered);
         console.log(data[key].acf);
     });
   });*/
