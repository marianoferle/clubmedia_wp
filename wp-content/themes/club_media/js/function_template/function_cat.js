var pos_pag=1;

(function($_,urlLink,pag_,post_page_){

    $_(document).ready(function(){

            //-----------------defino objeto con funciones de carga de template------------------------
            var AF_cat = new todosArt(urlLink);

            //-----funcionalidades para cada seccion de la web.

            AF_cat.listarCategoria_navLik();    //renderiza categorias con cantidad de post en el SIDEBAR
            AF_cat.verNav();        //menu NAV - HEADER
            AF_cat.listarDest_indexCat_sideBar('categoria_');   //POST destacado  (5to) quinto, los primeros 4 aparecen en el index del SIDEBAR

            AF_cat.listarResult_totalSubcat(v1,v2);        //renderiza las subcategorias por categoria
            AF_cat.listarResult_Categoria(v1,v2,pag_,post_page_);   //renderiza los resultados de post por categoria

            AF_cat.modulo_buscador_form();
            AF_cat.modulo_buscador_form_nav();

           //--------------------------------carga nuevos POST-----------------------------
            $_("#next_pos").click(function(){
                if(localStorage.cantidadPost=='true'){
                    if(post_page_<100){
                          post_page_+=1;
                          var nn_=post_page_+1;
                          AF_cat.listarResult_Categoria(v1,v2,pag_,post_page_); //funcion que busca en la API wordpress los post por pagina y cantidad
                          $_("#numResult_pos").html('/');
                    }
                }
            });

    });

})(jQuery,url_link_,page_, pos_pag);
