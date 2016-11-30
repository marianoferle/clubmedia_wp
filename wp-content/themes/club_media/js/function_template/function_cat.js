var pos_pag=1;

(function($_,urlLink,post_page_){



    $_(document).ready(function(){
            var AF_cat = new todosArt(urlLink);


            AF_cat.listarCategoria_navLik();
            AF_cat.verNav();
            AF_cat.listarDest_indexCat_sideBar('categoria_');

            AF_cat.listarResult_totalSubcat(v1,v2);
            AF_cat.listarResult_Categoria(v1,v2,post_page_);


            $("#next_pos").click(function(){
                if(localStorage.cantidadPost=='true'){
                    if(post_page_<100){
                          post_page_+=1;
                          var nn_=post_page_+1;
                          AF_cat.listarResult_Categoria(v1,v2,post_page_);
                          $("#numResult_pos").html('/');
                    }
                }
            });

    });

})(jQuery,url_link_,pos_pag);
