<!-- ........................header slider................................. -->
<?php

    require_once(dirname(__FILE__) . "/header_slider.php");

?>


<!-- ...........................cont section index...................................................... -->
    <div id="contSection">
     <div class="col s12 m12 l12">



          <div class="col s12 m12 l12">
            <div id="contModalSubHead" class="row">


                  <!-- .......................categorias - index...................................-->

                  <div id="contModalCategoria" class="col s12 m12 l8">


                  <script id="template_categoria_index" type="text/x-handlebars-template">
                       {{#each this}}
                        {{#ifCond @index '<' 3}}
                             {{#ifCond @index '==' 0 }}
                                   <div class="contGrandeCat col s12 m12 l12">
                                         <a href="{{moduloCategoria_index_linkPost this.categorias }}" target="_self" title="">
                                             <img src="https://s3-sa-east-1.amazonaws.com/club.media/template/{{imgCategoria}}"/>
                                             <div class="contCat_fondo_opacity"></div>
                                             <div class="contInfoGrandeCat">
                                                   <h1>{{cat_nombre}}</h1>
                                                   <p>{{info_cat}}</p>
                                                   <div class="contVidInfo">
                                                     <div id="cantidad_videos_{{categoria}}" class="cont_cantidad_vid">{{cantidad}}</div>
                                                     <p>Videos</p>
                                                     <div class="contVidInfo_icon"></div>
                                                   </div>
                                             </div>
                                         </a>
                                   </div>
                              {{else}}
                                   <div class="contChicoCat col s12 m12 l6" style="background:#{{colorFondo}}; ">
                                       <a href="{{moduloCategoria_index_linkPost this.categorias }}" target="_self" title="">
                                           <div class="contInfoChicoCat"  style="color:#{{colorTexto}};">
                                                 <h1>{{cat_nombre}}</h1>
                                                 <p>{{info_cat}}</p>
                                                 <div class="contVidInfo">
                                                     <div id="cantidad_videos_{{categoria}}" class="cont_cantidad_vid">{{cantidad}}</div>
                                                     <p>Videos</p>
                                                     <div class="contVidInfo_icon" style="background:#{{colorTexto}};"></div>
                                                 </div>
                                           </div>
                                       </a>
                                   </div>
                              {{/ifCond}}
                         {{/ifCond}}
                     {{/each}}
                 </script>

                 <script id="template_categoria_index2" type="text/x-handlebars-template">
                     {{#each this}}
                       {{#ifCond @index '>' 2}}
                         {{#ifCond @index '<' 6 }}
                                 <div class="contChicoCat col s12 m12 l12" style="background:#{{colorFondo}};">
                                     <a href="{{moduloCategoria_index_linkPost this.categorias }}" target="_self" title="">
                                         <div class="contInfoChicoCat"  style="color:#{{colorTexto}};">
                                               <h1>{{cat_nombre}}</h1>
                                               <p>{{info_cat}}</p>
                                               <div class="contVidInfo">
                                                     <div id="cantidad_videos_{{categoria}}" class="cont_cantidad_vid">{{cantidad}}</div>
                                                     <p>Videos</p>
                                                     <div class="contVidInfo_icon" style="background:#{{colorTexto}};"></div>
                                               </div>
                                         </div>
                                     </a>
                                 </div>
                              {{/ifCond}}
                       {{/ifCond}}
                   {{/each}}
               </script>




                        <div id="contCategoria1" class="col s12 m12 l8">   </div>
                        <div  id="contCategoria2" class="col s12 m12 l4">   </div>


                  </div>










                  <!-- .......................sidebar index...................................-->




                  <!-- ...............................modulo dinamico de destacados.............................................-->
                  <script id="template_destacado_indexCat_sideBar" type="text/x-handlebars-template">
                        {{#each this}}
                          {{#ifCond sticky '==' true}}
                          {{#ifCond @index '==' 4}}
                             <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{acf.url_img_video}}" title="Destacado"/>
                             <!--img src="img/template/{{srcImgDestacado}}" title="Destacado"/-->

                             <div class="contAsideBotton_fondo_opacity"></div>
                             <div class="contAsideBotton_info">
                                   <h1>
                                    {{#each acf.autores}}
                                          {{#ifCond @index '<=' 1}}
                                               {{moduloDestacado_index_autores acf.autores}}
                                          {{/ifCond}}
                                     {{/each}}
                                   </h1>
                                   <h4>
                                   {{#each acf.categorias}}
                                        {{#ifCond @index '>=' 0}}
                                             {{moduloDestacado_index acf.categorias}}
                                        {{/ifCond}}
                                   {{/each}}
                                   </h4>
                                   <p>{{title.rendered}}</p>
                               <a href="{{ moduloDestacado_index_linkPost_sideBar acf.categorias }}" title="" class="waves-effect waves-light btn">Leer más</a>
                             </div>
                          {{/ifCond}}
                          {{/ifCond}}
                        {{/each}}
                  </script>


                  <div id="contModalAside" class="col s12 m12 l4">

                            <div id="contAsideUp" class="col s12 m12 l12">

                              <form id="cont_sideBar_Buscador_search">
                                <div class="input-field">
                                  <input id="search" type="search" required>
                                  <label for="search" id="bot_search"><i class="fa fa-search" aria-hidden="true"></i></label>
                                  <i class="material-icons">X</i>
                                </div>
                              </form>

                            </div>

                            <div id="contAsideBotton" class="col s12 m12 l12">

                            </div>

                  </div>


            </div>
         </div>

         <!-- ................................................................................. -->










         <!-- .........................modulo resultados cont.................................... -->
         <div class="col s12 m12 l12">
           <div id="contModalResult" class="row">

             <!-- ...................................modulo de resultado A....................................................-->
             <script id="template_ContChicoResult" type="text/x-handlebars-template">
              {{#each this}}
              {{#ifCond @index '<' 10}}
                  {{#ifCond @index '<' 5}}
                                    {{#ifCond @index '==' 2}}
                                            <!-- .........modulo conectate en posicion 3 antes de seguir con el each.....................-->
                                            <div class="contChicoResult col s12 m12 l4">
                                                    <div class="contChicoResult_moduloPopUp_Conectate">
                                                        <h1>Conectate</h1>
                                                        <div class="col s12 m12 l2 center iconCont">
                                                            <div class="row ">
                                                              <div class="col s3"><a href="#!" alt="" target="_self"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                                                              <div class="col s3"><a href="#!" alt="" target="_self"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                                                              <div class="col s3"><a href="#!" alt="" target="_self"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
                                                              <div class="col s3"><a href="#!" alt="" target="_self"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>

                                            <!--.................... modulo de resultado grande...................-->
                                            <div class="contGrandeResult col s12 m12 l8">
                                                    <div class="contGrandeResult_moduloCont">
                                                        <a href="{{moduloResult_index_linkPost acf.categorias}}" target="_self" title="link post">
                                                            <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{acf.url_img_video}}"/>
                                                            <div class="contGrandeResult_moduloContfondo_opacity"></div>
                                                            <div class="contGrandeResult_moduloContfondo_cont_info">
                                                              {{#each acf.categorias}}
                                                                   {{moduloResult_itemsCategoria acf.categorias}}
                                                              {{/each}}
                                                            <!--  {{id}}- {{hora_id}} - {{dia_id}} -->
                                                              <h1>{{title.rendered}}</h1>
                                                              <p>{{acf.subtit}}</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                            </div>
                                    {{else}}
                                          <!--.................... modulo de resultado chico................-->
                                            <div class="contChicoResult col s12 m12 l4">
                                              <div class="contChicoResult_moduloCont">
                                                 <a href="{{moduloResult_index_linkPost acf.categorias}}" target="_self" title="link post">
                                                      <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{acf.url_img_video}}"/>
                                                      <div class="contChicoResult_moduloContfondo_opacity"></div>
                                                      <div class="contChicoResult_moduloContfondo_cont_info">
                                                        {{#each acf.categorias}}
                                                             {{moduloResult_itemsCategoria acf.categorias}}
                                                        {{/each}}
                                                        <!--  {{id}}- {{hora_id}} - {{dia_id}} -->
                                                        <h1>{{title.rendered}}</h1>
                                                        <p>{{acf.subtit}}</p>
                                                      </div>
                                                  </a>
                                              </div>
                                            </div>
                                  {{/ifCond}}
                {{else}}
                <!-- mayor a 5 resultados-->
                              {{#ifCond @index '==' 8}}
                                    <div class="contChicoResult col s12 m12 l4">
                                            <div class="contChicoResult_moduloPopUp_Aviso">
                                                <a href="#!" alt="">
                                                    <img src="https://s3-sa-east-1.amazonaws.com/club.media/template/bot_aviso.jpg"/>
                                                    <div class="contChicoResult_moduloPopUp_Aviso_info">¡Vos podés ser el próximo!</div>
                                                </a>
                                            </div>
                                    </div>
                                    <div class="contGrandeResult contGrandeResult_2b col s12 m12 l8">
                                          <div class="contGrandeResult_moduloCont">
                                              <a href="{{moduloResult_index_linkPost acf.categorias}}" target="_self" title="link post">
                                                  <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{acf.url_img_video}}"/>
                                                  <div class="contGrandeResult_moduloContfondo_opacity"></div>
                                                  <div class="contGrandeResult_moduloContfondo_cont_info">
                                                    {{#each acf.categorias}}
                                                         {{moduloResult_itemsCategoria acf.categorias}}
                                                    {{/each}}
                                                    <!--  {{id}}- {{hora_id}} - {{dia_id}} -->
                                                    <h1>{{title.rendered}}</h1>
                                                    <p>{{acf.subtit}}</p>
                                                  </div>
                                              </a>
                                          </div>
                                    </div>
                              {{else}}
                                      <!--.................... modulo de resultado chico................-->
                                        <div class="contChicoResult col s12 m12 l4">
                                          <div class="contChicoResult_moduloCont">
                                               <a href="{{moduloResult_index_linkPost acf.categorias}}" target="_self" title="link post">
                                                  <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{acf.url_img_video}}"/>
                                                  <div class="contChicoResult_moduloContfondo_opacity"></div>
                                                  <div class="contChicoResult_moduloContfondo_cont_info">
                                                    {{#each acf.categorias}}
                                                         {{moduloResult_itemsCategoria acf.categorias}}
                                                    {{/each}}
                                                    <!--  {{id}}- {{hora_id}} - {{dia_id}} -->
                                                    <h1>{{title.rendered}}</h1>
                                                    <p>{{acf.subtit}}</p>
                                                  </div>
                                              </a>
                                          </div>
                                        </div>
                              {{/ifCond}}
                  {{/ifCond}}
              {{/ifCond}}
              {{/each}}
             </script>
             <!-- contenedor para modulos de resultado index-->
             <div class="fila1"></div>
             <div class="fila1_load"><div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div></div>

             <div id="cont_page_pos" class="col s12 m12 l12 center">
                   <!--div id="prev_pos" class="col s4 m4 l4"> <i class="fa fa-angle-double-left" aria-hidden="true"></i> </div>
                   <div id="numResult_pos" class="col s4 m4 l4">  </div-->
                   <div id="next_pos" class="col s12 m12 l12">
                     <a class="btn-floating btn-large waves-effect waves-light yellow">+</a>
                   </div>
             </div>



          </div>
         </div>
         <!-- .......................................................... -->








        </div>
         </div>
         <!-- .............................fin cont section index............................. -->
