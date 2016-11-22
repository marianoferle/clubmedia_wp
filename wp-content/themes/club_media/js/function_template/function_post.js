(function($_,urlLink){
   $_(document).ready(function(id_dia,id_hora){
           var AF_post = new todosArt(urlLink);
           AF_post.verPOST(v_id,v_hora);
           AF_post.listar_Dest_Post();
           AF_post.verNav();
   });
 })(jQuery,url_link_);
