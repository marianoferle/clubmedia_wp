(function($_,urlLink){
   $_(document).ready(function(id_dia,id_hora){

           var AF_post = new todosArt(urlLink);

           //-----funcionalidades para cada seccion de la web.
           AF_post.verPOST(v_id); //imprime la info del post
           AF_post.listar_Dest_Post(); //imprime los destacados del footer
           AF_post.verNav();      //renderiza el menu Nav
           AF_post.modulo_buscador_form_nav();  //funciones para el buscador del nav y footer


             var urlP_="http://pinterest.com/pin/create/button/?url="+dir_URL_Code;
             //console.log(urlP_);
             $_("#bot_pinteres_share").attr("href", urlP_);

   });
})(jQuery,url_link_);
