var pos_pag=1;

(function($_, post_page_,urlLink){

    $_(document).ready(function(){

            var AF_index = new todosArt(urlLink);

            //-----funcionalidades para cada seccion de la web.

            AF_index.listarCategoria_index();     //categorias NAV en el index
            AF_index.listarDest_index();        //destacados post - debajo del HEADER banner
            AF_index.listarDest_indexCat_sideBar('index_');   //destacado 5to del SIDEBAR

            AF_index.modulo_buscador_form();
            AF_index.modulo_buscador_form_nav();

            //-----------------------cantidad de resultados por pagina de 10 en 10-----------------------------------
            AF_index.listarPost_index(post_page_);

            //----------------------nuevos post por pagina----------------------------------------
            $_("#next_pos").click(function(){
                if(localStorage.cantidadPost=='true'){
                    if(post_page_<100){
                          post_page_+=1;
                          var nn_=post_page_+1;
                          AF_index.listarPost_index(post_page_);
                          $_("#numResult_pos").html('/');
                    }
                }
            });

            //--------------------nav on onscroll document----------------------------------------------
            document.onscroll=function(){  AF_index.scrollBody_(body_);}
            //---------------------
            //window.addEventListener('resize', function(event){
                 //AF.defineContHead_(event);
            //});
    });
})(jQuery,pos_pag,url_link_);
