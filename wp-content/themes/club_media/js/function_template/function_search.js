var pos_pag=1;

(function($_,urlLink,post_page_,bus__){
$_(document).ready(function(){

            var AF_sear = new todosArt(urlLink);


            AF_sear.listarCategoria_navLik();
            AF_sear.verNav();
            AF_sear.listarDest_indexCat_sideBar('categoria_');

            AF_sear.listarResult_Search(bus_);


            $_("#next_pos").click(function(){
                if(localStorage.cantidadPost=='true'){
                    if(post_page_<100){
                          post_page_+=1;
                          var nn_=post_page_+1;
                          AF_sear.listarResult_Search(bus_);
                          $_("#numResult_pos").html('/');
                    }
                }
            });


            $_("#bot_search").click(function(event) {
                                event.preventDefault();
                                var info = $_("#search").val();
                                console.log(info);
                                location.href = '?page=search_&bus='+info;
            });

            $_("#cont_sideBar_Buscador_search input").keydown(function(event) {
                    if(event.keyCode == 13) {
                                event.preventDefault();
                                var info = $_("#search").val();
                                console.log(info);
                                location.href = '?page=search_&bus='+info;
                    }
              });










    });

})(jQuery,url_link_,pos_pag,bus_);
