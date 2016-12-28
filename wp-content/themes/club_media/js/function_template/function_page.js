(function($_,urlLink){
   $_(document).ready(function(id_dia,id_hora){
          // console.log(v_id,"---");

           var AF_page = new todosArt(urlLink);

           //-----funcionalidades para cada seccion de la web.
           AF_page.verPAGE(v_id);

           AF_page.listar_Dest_Post();
           AF_page.verNav();
           AF_page.modulo_buscador_form_nav();


   });
 })(jQuery,url_link_);
