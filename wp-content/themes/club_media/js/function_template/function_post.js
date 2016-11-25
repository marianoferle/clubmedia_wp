(function($_,urlLink){
   $_(document).ready(function(id_dia,id_hora){

           var AF_post = new todosArt(urlLink);
           AF_post.verPOST(v_id);
           AF_post.listar_Dest_Post();
           AF_post.verNav();


             var urlP_="http://pinterest.com/pin/create/button/?url="+dir_URL_Code;
             //console.log(urlP_);
             $("#bot_pinteres_share").attr("href", urlP_);


   });
 })(jQuery,url_link_);
