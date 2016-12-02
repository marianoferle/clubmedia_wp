var pos_pag=1;

(function($_,urlLink,post_page_,bus__){

$_(document).ready(function(){

            var AF_sear = new todosArt(urlLink);


            AF_sear.listarCategoria_navLik();
            AF_sear.verNav();
            AF_sear.listarDest_indexCat_sideBar('categoria_');
            AF_sear.listarResult_Search(bus__);
            AF_sear.modulo_buscador_form();


            $_("#next_pos").click(function(){
                if(localStorage.cantidadPost=='true'){
                    if(post_page_<100){
                          post_page_+=1;
                          var nn_=post_page_+1;
                          AF_sear.listarResult_Search(bus__);
                          $_("#numResult_pos").html('/');
                    }
                }
            });











    });

})(jQuery,url_link_,pos_pag,bus_);
