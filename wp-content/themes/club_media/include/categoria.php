


<div id="cont_categoria"  class="col s12 m12 l12">
  <div class="row">

    <script id="template_categoria_subCatList" type="text/x-handlebars-template">
           <h1 class="center" style="color:#{{colorFondo}};">{{cat_nombre}}</h1>
           <div class="cont_categoria_head_navBar_subCategorias">
              <ul class="col s12 m12 l12">
                      {{#each this.subCat}}
                      <li><a href='{{modulo_categoria_subcat_link ../this }}' class='waves-effect btn' style='background:#{{../colorFondo}}; color:#{{../colorTexto}};'>
                              {{modulo_categoria_subcat this }}
                      </a></li>
                      {{/each}}
              </ul>
           </div>
   </script>

   <div id="cont_categoria_head" class="col s12 m12 l12">   </div>









   <!-- .............................. -->


  <div id="cont_categoria_section"  class="col s12 m12 l12">

        <script id="template_resultCategoria" type="text/x-handlebars-template">
         {{#each this}}
         {{#ifCond @index '<' 7}}
               {{#ifCond @index '%' 2}}
                   <div class="cont_categoria_section_result_post">
                           <a href="{{moduloCategoria_index_linkPost this.categorias}}" target="_self" title="link post">
                                 <div class="result_post_01 col s12 m6 s6">
                                     <div class="result_post_01_contenido">
                                           <div class="result_post_01_contCat">
                                              <div class="result_post_01_contCat_subCont">
                                                      {{#each this.categorias}}
                                                          {{modulo_Categoria_resultado_cat categorias}}
                                                      {{/each}}
                                              </div>
                                              <!--div class="result_post_01_contCat_subCont">
                                                   {{#each subcat}}
                                                        {{modulo_Categoria_resultado_subCat this.subcat}}
                                                   {{/each}}
                                             </div-->
                                           </div>
                                           <h1>{{titulo}}</h1>
                                           <p>{{subTit}}</p>
                                           <div class="result_post_01_contenido_icon"></div>
                                     </div>
                                 </div>

                                 <div class="result_post_02 col s12 m6 s6">
                                     <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{urlImgVid}}" alt=""/>
                                     <div class="result_post_02_contOpacity"></div>
                                 </div>
                           </a>
                   </div>

               {{else}}

                   <div class="cont_categoria_section_result_post">
                           <a href="{{moduloCategoria_index_linkPost this.categorias}}" target="_self" title="link post">

                                 <div class="result_post_02 col s12 m6 s6">
                                     <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{urlImgVid}}" alt=""/>
                                     <div class="result_post_02_contOpacity"></div>
                                 </div>

                                 <div class="result_post_01 col s12 m6 s6">
                                   <div class="result_post_01_contenido">
                                         <div class="result_post_01_contCat">
                                               <div class="result_post_01_contCat_subCont">
                                                 {{#each this.categorias}}
                                                     {{modulo_Categoria_resultado_cat categorias}}
                                                 {{/each}}
                                                </div>
                                                <!--div class="result_post_01_contCat_subCont">
                                                     {{#each subcat}}
                                                          {{modulo_Categoria_resultado_subCat this.subcat}}
                                                     {{/each}}
                                               </div-->
                                         </div>

                                         <h1>{{titulo}}</h1>
                                         <p>{{subTit}}</p>
                                         <div class="result_post_01_contenido_icon"></div>
                                   </div>
                                 </div>
                           </a>
                   </div>

             {{/ifCond}}
          {{/ifCond}}

         {{/each}}
       </script>

    <!-- ...........resultados.............. -->
    <div class="cont_categoria_section_result col s12 m12 l8"></div>






    <!-- .............sidebar............ -->

    <div class="cont_categoria_section_sidebar col s12 m12 l4">

      <div class="cont_sideBar_Buscador col s12 m6 l12">

                       <form id="cont_sideBar_Buscador_search">
                         <div class="input-field">
                           <input id="search" type="search" required>
                           <label for="search"><i class="fa fa-search" aria-hidden="true"></i></label>
                           <i class="material-icons">X</i>
                         </div>
                       </form>

      </div>

      <div class="cont_sideBar_Aviso col s12 m6 l12">
                    <a href="#!" alt="">
                        <img src="https://s3-sa-east-1.amazonaws.com/club.media/template/bot_aviso.jpg"/>
                        <div class="cont_sideBar_Aviso_info"> ¡Vos podés der el próximo! </div>
                    </a>
      </div>

      <div class="cont_sideBar_Conectate col s12 m6 l12">
              <h1>Conectate</h1>
              <div class="col s12 m12 l2 center iconCont">
                  <div class="row ">
                    <div class="col s3"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    <div class="col s3"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    <div class="col s3"><i class="fa fa-pinterest" aria-hidden="true"></i></div>
                    <div class="col s3"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                  </div>
              </div>
      </div>









      <!-- ...............................modulo dinamico de destacados.............................................-->
      <script id="template_destacado_indexCat_sideBar" type="text/x-handlebars-template">
            {{#each this}}
              {{#ifCond @index '==' 4}}
                 <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{urlImgVid}}" title="Destacado"/>
                 <!--img src="img/template/{{srcImgDestacado}}" title="Destacado"/-->

                 <div class="contAsideBotton_fondo_opacity"></div>
                 <div class="contAsideBotton_info">
                       <h1>
                        {{#each this.autores}}
                              {{#ifCond @index '<=' 1}}
                                   {{moduloDestacado_index_autores this.autores}}
                              {{/ifCond}}
                         {{/each}}
                       </h1>
                       <h4>
                       {{#each this.categorias}}
                            {{#ifCond @index '>=' 0}}
                                 {{moduloDestacado_index this.categorias}}
                            {{/ifCond}}
                       {{/each}}
                       </h4>
                       <p>{{titulo}}</p>
                   <a href="{{ moduloDestacado_index_linkPost_sideBar this.categorias }}" title="" class="waves-effect waves-light btn">Leer más</a>
                 </div>
              {{/ifCond}}
            {{/each}}
      </script>


      <div class="cont_sideBar_Destacado col s12 m6 l12">
      </div>



      <!-- ......................................nav categoria en sidebar..................................................... -->

          <script id="template_categoria_categorias_nav" type="text/x-handlebars-template">
              {{#each this}}
                        <div class="cont_sideBar_Categorias_individual" style="background:#{{colorFondo}};">
                          <a href="{{moduloCategoria_catNav_link this.categorias }}" target="_self" title="" style="color:#{{colorTexto}};">
                              <div class="cont_sideBar_Categorias_individual_info">
                                    <h1>{{cat_nombre}}</h1>
                                    <p>{{info_cat}}</p>
                                    <div class="cont_sideBar_Categorias_individual_info_vid">
                                        <div id="cantidad_videos_cat_{{categoria}}" class="cont_cantidad_vid_navCat">{{cantidad}}</div>
                                        <p>Videos</p>
                                        <div class="cont_sideBar_Categorias_individual_info_vid_icon" style="background:#{{colorTexto}};"></div>
                                    </div>
                              </div>
                          </a>
                    </div>
              {{/each}}
        </script>

       <div class="cont_sideBar_Categorias col s12 m12 l12"> </div>


    </div>
  </div>









  </div>
  </div>
  <!-- .............................fin cont section index............................. -->
