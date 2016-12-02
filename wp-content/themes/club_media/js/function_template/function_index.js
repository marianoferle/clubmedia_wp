var pos_pag=1;

(function($_, post_page_,urlLink){

    $_(document).ready(function(){
            var AF_index = new todosArt(urlLink);
            AF_index.listarCategoria_index();
            AF_index.listarDest_index();
            AF_index.listarDest_indexCat_sideBar('index_');
            AF_index.modulo_buscador_form();


            //-----------------------cantidad de resultados por pagina de 10 en 10-----------------------------------
            AF_index.listarPost_index(post_page_);


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
