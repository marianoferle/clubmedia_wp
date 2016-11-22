
    <header class="">
        <div class="col s12 m12 l12">
            <div id="slider_header_car" class="valign-wrapper carousel carousel-slider center" data-indicators="true">
                 <!--div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2">button</a></div-->
                 <div id="prev_header_car" class="valign-wrapper left" onClick="$('.carousel').carousel('prev');"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                 <div id="next_header_car" class="valign-wrapper rigth" onClick="$('.carousel').carousel('next');"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

                 <div class="carousel-item  white-text" href="#one!">
                   <div class="cont_img_slider img_banner1">
                       <!--h2>First Panel</h2>
                       <p class="white-text">This is your first panel</p-->
                   </div>
                 </div>
                 <div class="carousel-item white-text" href="#two!">
                   <div class="cont_img_slider img_banner2">
                     <!--h2>First Panel</h2>
                     <p class="white-text">This is your first panel</p-->
                   </div>
                 </div>
                 <div class="carousel-item white-text" href="#three!">
                   <div class="cont_img_slider img_banner3">
                     <!--h2>First Panel</h2>
                     <p class="white-text">This is your first panel</p-->
                   </div>
                 </div>
                 <div class="carousel-item white-text" href="#four!">
                   <div class="cont_img_slider img_banner4">
                     <!--h2>First Panel</h2>
                     <p class="white-text">This is your first panel</p-->
                   </div>
                 </div>

           </div>
        </div>



        <!-- ...............................modulo dinamico de destacados.............................................-->
        <script id="template_destacado_index" type="text/x-handlebars-template">
              {{#each this}}
              {{#ifCond @index '<' 4}}
                 <li class="col s12 m6 l3">
                     <div class="cont_destacado_header_moduloCont">

                         <a href="{{ moduloDestacado_index_linkPost this.categorias }}"target='_self' title=''>
                             <img src="https://s3-sa-east-1.amazonaws.com/club.media/post/{{urlImgVid}}" alt=""/>
                             <div class="cont_destacado_header_moduloCont_fondo_opacity{{@key}}"></div>
                             <div class="cont_info_destacado_header">
                               {{#each this.categorias}}
                                    {{moduloDestacado_index categorias}}
                               {{/each}}
                               <p>{{titulo}}</p>
                             </div>
                         </a>
                     </div>
                 </li>
                 {{/ifCond}}
              {{/each}}
        </script>


        <!-- ..........contenido de resultado de destacados index...................... -->
        <div id="cont_destacado_header" class="col s12 m12 l12">
            <ul class="row"></ul>
        </div>

  </header>
