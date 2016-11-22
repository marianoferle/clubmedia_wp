


    <!-- ...............template Handlebars..................... -->
       <script id="template_Post_Script" type="text/x-handlebars-template">

             <div id="cont_post_head" class="col s12 m12 l12 center">
               <div id="cont_post_head_catSubcat" class="col s12 m12 l12 center">
                   <h2 style="color:#84ab1a;"> {{#each this.categoria}} #{{this}} {{/each}}   </h2>
                   <h2 style="color:#6e3ac3;"> {{#each this.subCat}}    #{{this}} {{/each}}  </h2>
               </div>
               <div id="cont_post_head_titu" class="col s12 m12 l12 center">
                   <h1 id="tituloPost" class="center">{{titulo}}</h1>
                   <h1 id="categoriaPost" class="center">
                       {{#each this.subcat}}
                          #{{nombre}}
                       {{/each}}
                   </h1>
               </div>
               <div  id="cont_post_head_titRedsocial" class="col s12 m12 l12" style="margin-bottom:10px;">Compartime</div>
               <div id="cont_post_head_redsocial" class="col s12 m12 l12">
                  <div class="col s1 m1 l1"></div>
                  <div class="col s2 m2 l2">
                    <a class='fb-xfbml-parse-ignore' target='_blank' href='http://www.facebook.com/share.php?u='+dir_URL_Code+'&amp;src=sdkpreparse'>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <!--div class="fb-share-button" data-href="http://marianoferle.com.ar/post.php?id={{id}}&amp;hora={{hora}}" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                    </div-->
                  </div>
                  <div class="col s2 m2 l2">
                    <a href='https://twitter.com/share' data-url='dir_URL_Code' target='_blank'>
                          <i class='fa fa-twitter' aria-hidden='true'></i>
                    </a>
                  </div>
                  <div class="col s2 m2 l2"><a href="" alt=""> <i class="fa fa-pinterest" aria-hidden="true"></i> </a></div>
                  <div class="col s2 m2 l2"><a href="" alt=""> <i class="fa fa-paperclip" aria-hidden="true"></i> </a></div>
                  <div class="col s2 m2 l2">
                    <a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href="dir_URL_Code" class="wa_btn wa_btn_s" style="display:none">
                          <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div class="col s1 m1 l1"></div>
               </div>
            </div>

            <div id="cont_post_section_video" class="col s12 m12 l12">

                 <div id="cont_post_section_video_cont" class="col s12 m12 l12">
                   <iframe src="https://player.vimeo.com/video/{{urlVideo}}" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                 </div>

                 <div id="cont_post_section_video_info" class="col s12 m12 l12">

                       <div id="cont_post_section_video_info_youtuber" class="col s12 m12 l12">
                         {{#each this.autores}}
                           <div class="infoLink_youtuber_section"><i class="fa fa-link" aria-hidden="true"></i> <h1>{{this}}</h1> </div>

                           {{/each}}
                       </div>

                       <div id="cont_post_section_video_info_youtuber_texto" class="col s12 m12 l12">
                             <p>
                               {{info}}
                             </p>
                             <p>
                               {{masInfo}}
                             </p>
                       </div>


                       <div id="cont_post_section_video_info_youtuber_redSocial" class="col s12 m10 l8">
                           <div  id="cont_post_section_video_info_youtuber_redSocial_tit" class="col s12 m4 l6" style="margin-bottom:10px;">Compartime:</div>
                           <div id="cont_post_section_video_info_youtuber_redSocial_icon" class="col s12 m8 l6">
                              <div class="col s1 m1 l1"><a href="#!" alt="">   </a></div>
                              <div class="col s2 m2 l2"><a href="#!" alt=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a></div>
                              <div class="col s2 m2 l2"><a href="#!" alt=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a></div>
                              <div class="col s2 m2 l2"><a href="#!" alt=""> <i class="fa fa-pinterest" aria-hidden="true"></i> </a></div>
                              <div class="col s2 m2 l2"><a href="#!" alt=""> <i class="fa fa-paperclip" aria-hidden="true"></i> </a></div>
                              <div class="col s2 m2 l2"><a href="#!" alt=""> <i class="fa fa-whatsapp" aria-hidden="true"></i> </a></div>
                              <div class="col s1 m1 l1"><a href="#!" alt="">  </a></div>

                            </div>
                      </div>
                      <div class="col s12 m10 l4">

                      </div>

                  </div>
              </div>
       </script>


       <div id="cont_post"  class="col s12 m12 l12">
          <div class="row">
            <div id="cont_post_result_template"></div>



    <!-- .................end................... -->






    <!-- ...............................modulo dinamico de destacados.............................................-->
    <script id="template_destacado_post" type="text/x-handlebars-template">
          {{#each this}}
          {{#ifCond @index '<=' 2}}
                 <div class="cont_destacado_post_moduloFooter col s12 m12 l4">
                   <a href="{{ moduloDestacado_index_linkPost this.categorias }}" target='_self' title=''>
                     <div class="contDestFooter_Img col s12 m6 l12   {{#ifCond @index '==' 1}} right{{/ifCond}}">
                         <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{urlImgVid}}" alt=""/>
                         <div class="cont_destacado_footer_moduloCont_fondo_opacity"></div>
                     </div>
                     <div class="cont_info_destacado_header col s12 m6 l12">
                         {{#each this.categorias}}
                              {{moduloDestacado_index this.categorias}}
                         {{/each}}
                         <p>{{titulo}}</p>
                     </div>
                  </a>
               </div>
             {{/ifCond}}
          {{/each}}
    </script>



     <div id="cont_post_section_destacado" class="col s12 m12 l12">

     </div>







      <div id="cont_post_section_footer_redSocial" class="col s12 m12 l12">
        <div id="cont_post_section_footer_redSocial_tit" class="col s12 m12 l12 center">Conectate a tus artistas favoritos</div>
        <div class="col s2 m2 l2"></div>
        <div class="col s2 m2 l2 center"><a href="#!" alt=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a></div>
        <div class="col s2 m2 l2 center"><a href="#!" alt=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a></div>
        <div class="col s2 m2 l2 center"><a href="#!" alt=""> <i class="fa fa-pinterest" aria-hidden="true"></i> </a></div>
        <div class="col s2 m2 l2 center"><a href="#!" alt=""> <i class="fa fa-instagram" aria-hidden="true"></i> </a></div>
        <div class="col s2 m2 l2"></div>
      </div>







      </div>
      </div>
      <!-- .............................fin cont section index............................. -->
