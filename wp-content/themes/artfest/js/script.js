



  function scrollBody(cont_){
        var cc_=cont_;
        var y =  cc_.scrollTop;
        if(y>100){
            $("#nav_header_1").addClass("nav_fixed_top");
            $("#nav_header_1").removeClass("nav_off_top");
        }else{
            $("#nav_header_1").removeClass("nav_fixed_top");
            $("#nav_header_1").addClass("nav_off_top");
        }
  }


    document.onscroll=function(){  scrollBody(body_);}


  //-----------------evento para el menu slider-------------------------
  $(".button-collapse").sideNav();
  $('.carousel.carousel-slider').carousel({full_width: true});

  $('.modal-trigger').leanModal();
  $('#aside').pushpin({ top:0, bottom:500 });
