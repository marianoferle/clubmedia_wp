var pos_pag=1;

(function($_,urlLink,post_page_,bus__,pag_){

$_(document).ready(function(){

            var AF_sear = new todosArt(urlLink);

            //-----funcionalidades para cada seccion de la web.
            AF_sear.listarCategoria_navLik();
            AF_sear.verNav();
            AF_sear.listarDest_indexCat_sideBar('categoria_');
            AF_sear.listarResult_Search(bus__,pag_);

           //AF_cat.listarResult_totalSubcat(bus_);

            AF_sear.modulo_buscador_form();
            AF_sear.modulo_buscador_form_nav();

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

})(jQuery,url_link_,pos_pag,bus_,page_);
