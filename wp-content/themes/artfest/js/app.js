//--------------------------objeto para todos los artistas---------------
(function(){
  this.todosArt = function(){

        var categoriaVar="";
        var subCategoriaVar="";
        var urlVar="";

//--------------------------------------------------------------------------------------------------------------------


        this.set_categoriaVar=function(cat_){ categoriaVar=cat_;   }
        this.set_subCategoriaVar=function(subcat_){ subCategoriaVar=subcat_;  }
        this.get_categoriaVar=function(){ return categoriaVar;   }
        this.get_subCategoriaVar=function(){ return subCategoriaVar;  }

        localStorage.setItem("cantidadPost", true);


        //------------------

        this.verNav=function(){
          $("#nav_header_1").addClass("nav_fixed_top");
          $("#nav_header_1").removeClass("nav_off_top");
        }


        //---------------------scroll para nav fixed-----------------------
        this.scrollBody_ = function(cont_){
                var bod_cont=cont_;
                var y_ =  bod_cont.scrollTop;
                var yct_ =  bod_cont.offsetTop;
                //console.log(y_,yct_);
                if(y_>=100){
                  $("#nav_header_1").addClass("nav_fixed_top");
                  $("#nav_header_1").removeClass("nav_off_top");
                  //console.log(y);
                }else{
                  $("#nav_header_1").removeClass("nav_fixed_top");
                  $("#nav_header_1").addClass("nav_off_top");
                }
        }



        //-------------------if comparativo para Handlebars----------------------
        Handlebars.registerHelper("ifCond", function (v1, operator, v2, options) {
             switch (operator){
                 case '==':  return (v1 == v2) ? options.fn(this) : options.inverse(this);
                 case '===': return (v1 === v2) ? options.fn(this) : options.inverse(this);
                 case '<':   return (v1 < v2) ? options.fn(this) : options.inverse(this);
                 case '<=':  return (v1 <= v2) ? options.fn(this) : options.inverse(this);
                 case '>':   return (v1 > v2) ? options.fn(this) : options.inverse(this);
                 case '>=':  return (v1 >= v2) ? options.fn(this) : options.inverse(this);
                 case '&&':  return (v1 && v2) ? options.fn(this) : options.inverse(this);
                 case '||':  return (v1 || v2) ? options.fn(this) : options.inverse(this);
                 case '%':  return (v1 % v2) ? options.fn(this) : options.inverse(this);
                    default:    return options.inverse(this);
             }
        });



        //--------------------------json con colores para categorias-------------
        var col_Fondo=[];
        var listColCat={};

        var setColCat=function(){
            $.post("include/restApi/cantidad_cat.php",{}, function (data){
            }).done(function(data) {
                    if(data.length>0){
                        var categ_=JSON.parse(data);

                              for(var i=0 ; i< categ_.length ; i++){
                                  var jsonCat = {};
                                  jsonCat.cat_nombre=categ_[i].cat_nombre;
                                  jsonCat.categoria=categ_[i].categoria;
                                  jsonCat.colorFondo=categ_[i].colorFondo;
                                  jsonCat.colorTexto=categ_[i].colorTexto;
                                  jsonCat.imgCategoria=categ_[i].imgCategoria;
                                  jsonCat.info_cat=categ_[i].info_cat;
                                  jsonCat.subCat=categ_[i].subCat;
                                  jsonCat.cantidad=0;
                                  jsonCat.id=categ_[i].id;
                                  col_Fondo.push(jsonCat);
                                  var colFondo=JSON.stringify(col_Fondo);

                                  if(typeof Storage !== "undefined"){
                                    localStorage.setItem("colorFondoList", colFondo);
                                  }else{
                                    console.log(col_Fondo);
                                  }

                              }

                            if(typeof Storage !== "undefined"){
                              listColCat=JSON.parse(localStorage.colorFondoList);
                            }else{
                              listColCat=JSON.parse();
                            }


                        cantCat_();
                        arraySubCat();
                     }



             }).fail(function() {
             }).always(function() {
             },'json');
        }
        setColCat();



        //-----------------------------------------------------------------------
        var cantCat_=function(){
             for(var i=0;i<listColCat.length;i++){
                    var cat_=listColCat[i].categoria;
                    ver(cat_);
                    function ver(cat2_){
                       $.post("include/restApi/cantidadPorCategoria.php",{cat:cat2_}, function (data2){
                                for(var i=0 ; i< listColCat.length ; i++){
                                    if(listColCat[i].categoria==cat2_){
                                      listColCat[i].cantidad=data2;
                                    }
                                }
                       });
                    }
             }
        }


        //-----------------------------------------------------------------------
        var arraySubCat=function(){
            for(var i=0 ; i< listColCat.length ; i++){
                  //console.log(listColCat[i].subCat);
                  listColCat[i].subCat=listColCat[i].subCat.split(',');
            }
        }
        //console.log(listColCat);

        //-------------------color para cada cateogria---------------------------
        var colorFondoPorCategoria_=function(cat_){
                 var color_="fff";
                 var catSel=cat_.valueOf();
                 for(var i=0 ; i< listColCat.length ; i++){
                   //console.log(colorFondo[i].Nombre);
                   if(listColCat[i].categoria==catSel){
                         return listColCat[i].colorFondo;
                   }
                 }
        }

        //-------------------color para cada cateogria---------------------------
        var colorTextoPorCategoria_=function(cat_){
                var color_="333";
                var catSel=cat_.valueOf();
                for(var i=0 ; i< listColCat.length ; i++){
                  if(listColCat[i].categoria==catSel){
                        return listColCat[i].colorTexto;

                  }
                }
         }

         //----------------------------------------------------------------------
         var jsonCatSel=function(cat_){
           for(var i=0 ; i< listColCat.length ; i++){
             if(listColCat[i].categoria==cat_){
                  return listColCat[i];
             }
           }
         }




















//-------INDEX--------------INDEX-----------INDEX--------------INDEX------------INDEX-------------INDEX------------INDEX--------------INDEX---------INDEX-----------INDEX----
















        //-----------------------------------------------------------------
        this.listarCategoria_index=function(){

                     $("#contCategoria1").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");
                     $("#contCategoria2").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");

                      setTimeout(function(){

                              Handlebars.registerHelper("moduloCategoria_index_linkPost", function(value){
                                  return new Handlebars.SafeString(urlVar+"categoria.php?cat="+this.categoria);
                              });

                              var template_ = document.getElementById("template_categoria_index").innerHTML;
                              var template2_ = document.getElementById("template_categoria_index2").innerHTML;
                              var contTemplate = Handlebars.compile(template_);
                              var contTemplate2 = Handlebars.compile(template2_);
                              //---------------json para los resultados destacados del index-------------------

                              var context=listColCat;
                              var templateCompile = contTemplate(context);
                              var templateCompile2 = contTemplate2(context);
                              $("#contCategoria1").html(templateCompile);
                              $("#contCategoria2").html(templateCompile2);

                           setTimeout(function(){ $('#contCategoria1').addClass('contCatResult_on'); },10);
                           setTimeout(function(){ $('#contCategoria2').addClass('contCatResult_on'); },10);
                      }, 2000);



        }




        //-----------------------------------------------------------------
        this.listarDest_index_sideBar=function(){

            $.post("include/restApi/result_dest_index.php",{}, function (data){

              $("#contAsideBotton").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");

            }).done(function(data) {

                          setTimeout(function(){

                                    Handlebars.registerHelper("moduloDestacado_index_linkPost_sideBar", function(value){
                                        return new Handlebars.SafeString(urlVar+"post.php?id="+this.dia_id+'&hora='+this.hora_id);
                                    });
                                    Handlebars.registerHelper("moduloDestacado_index", function(value){
                                                 return new Handlebars.SafeString("<div>"+this+"</div>");
                                    });
                                    Handlebars.registerHelper("moduloDestacado_index_autores", function(value){
                                                 return new Handlebars.SafeString("<div>"+this+"</div>");
                                    });


                                    if(data.length>0){
                                      var dat=JSON.parse(data);
                                       //-----------convert array el string ','---------------
                                    if(dat != null && dat.length > 0) {
                                             for(var i=0;i < dat.length;i++){
                                               dat[i].categorias=dat[i].categorias.split(',');
                                               dat[i].autores=dat[i].autores.split(',');
                                             }

                                             var template_ = document.getElementById("template_destacado_index_sideBar").innerHTML;
                                             var contTemplate = Handlebars.compile(template_);
                                             //---------------json para los resultados destacados del index-----------------
                                             var context=dat;//bd_result_destacado_index;
                                             var templateCompile = contTemplate(context);
                                             $("#contAsideBotton").html(templateCompile);
                                       }
                                   }

                           setTimeout(function(){ $('#contAsideBotton').addClass('contCatResult_on'); },10);
                        },2000);


                     //console.log("load: result dest sidebar index");
                 }).fail(function() {
                     //console.log("error dest sidebar index");
                 }).always(function() {
                    //console.log("fin: result dest sidebar index");
                 },'json');

        }







        //-----------------------------------------------------------------
        this.listarDest_index=function(){

             $.post("include/restApi/result_dest_index.php",{}, function (data){

               $("#cont_destacado_header ul").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");


             }).done(function(data) {

               setTimeout(function(){

                         Handlebars.registerHelper("moduloDestacado_index_linkPost", function(value){
                              return new Handlebars.SafeString(urlVar+"post.php?id="+this.dia_id+'&hora='+this.hora_id);
                         });

                         Handlebars.registerHelper("moduloDestacado_index", function(value){
                                       return new Handlebars.SafeString(
                                       "<div class='cont_destacado_header_moduloCont_item1' style='background:#"+
                                         colorFondoPorCategoria_(this)+
                                       "; color:#"+
                                         colorTextoPorCategoria_(this)+
                                       ";'>"+
                                         this+
                                         "</div>"
                                       );
                          });

                          if(data.length>0){
                              var dat=JSON.parse(data);

                              //-----------convert array el string ','---------------
                              if(dat != null && dat.length > 0) {

                                    for(var i=0;i < dat.length;i++){  dat[i].categorias=dat[i].categorias.split(',');  }

                                    var template_ = document.getElementById("template_destacado_index").innerHTML;
                                    var contTemplate = Handlebars.compile(template_);
                                    //---------------json para los resultados destacados del index-------------
                                    var context=dat;//bd_result_destacado_index;
                                    var templateCompile = contTemplate(context);
                                    $("#cont_destacado_header ul").html(templateCompile);
                              }
                         }

                   setTimeout(function(){ $('#cont_destacado_header ul').addClass('contCatResult_on'); },10);
                }, 2000);


                // console.log("load: result dest index");
             }).fail(function() {
                // console.log("error dest index");
             }).always(function() {
                //console.log("fin: result dest index");
             },'json');

        }










       //------------------------------------------------------
       this.listarPost_index=function(posicion_result_list_){
             var pos_=posicion_result_list_;
             $.post("include/restApi/result_index.php",{pos:pos_}, function (data){

               $(".fila1_load").css({'display':'block'});


             }).done(function(data) {

                        //-------------crea URL para lista de post en el index----------
                         Handlebars.registerHelper("moduloResult_index_linkPost", function(value){
                             //console.log(this.dia_id,this.hora_id);
                             return new Handlebars.SafeString(urlVar+"post.php?id="+this.dia_id+'&hora='+this.hora_id);
                         });

                         //-----------------crea subcategorias en modulo POST index---------------------
                         Handlebars.registerHelper("moduloResult_itemsCategoria", function(value) {
                          return new Handlebars.SafeString(
                             "<div class='contResultIndex_moduloContfondo_cont_info_item1' style='background:#"+
                               colorFondoPorCategoria_(this)+
                             "; color:#"+
                               colorTextoPorCategoria_(this)+
                             ";'>"+
                               this+
                             "</div>");
                         });



                 setTimeout(function(){

                         if(data.length>0){
                               var dat=JSON.parse(data);
                               //console.log(dat[0]);
                                 if(dat[0] != undefined){
                                     if(dat[0].length>0 && typeof  dat === 'object'){

                                          //-----------convert array el string ','---------------
                                          for(var i=0;i < dat[0].length;i++){
                                            dat[0][i].categorias=dat[0][i].categorias.split(',');
                                          }
                                          var template_ = document.getElementById("template_ContChicoResult").innerHTML;
                                          var contTemplate = Handlebars.compile(template_);
                                          //---------------json para los resultados del index-------------------
                                          var context=dat[0];//bd_result_index;
                                          var templateCompile = contTemplate(context);
                                          $(".fila1").append(templateCompile);

                                          //---------------ultimo array-----------
                                          var ultimo_ = dat[0].pop();
                                          var primero_=dat[0].shift();
                                          $("#numResult_pos").html(primero_.id+" / "+ultimo_.id);
                                          $(".fila1_load").css({'display':'none'});

                                   }
                                 }
                           }

                   setTimeout(function(){ $('.fila1').addClass('contCatResult_on'); },10);
                }, 2000);


                  //  console.log("load: result index");
                }).fail(function() {
                  //  console.log("error");
                }).always(function() {
                  // console.log("fin: result index");
                },'json');

          }





















 //-----------CATEGORIA-------------CATEGORIA-------------CATEGORIA------------CATEGORIA----------------CATEGORIA--------------CATEGORIA------------------CATEGORIA---------------













       //------------------------------resultados para la seccion-----------------------------------
       this.listarResult_Categoria=function(cat_,sub_){

           if(cat_.length>0){

              $.post("include/restApi/result_sel_cat.php",{cat:cat_,sub:sub_}, function (data){

                   $(".cont_categoria_section_result").html("<div class='progress'><div class='indeterminate' style='background-color:#"+colorFondoPorCategoria_(cat_)+"'></div></div>");

              }).done(function(data){


                         Handlebars.registerHelper("moduloCategoria_index_linkPost", function(value){
                             return new Handlebars.SafeString(urlVar+"post.php?id="+this.dia_id+'&hora='+this.hora_id);
                         });

                         Handlebars.registerHelper("modulo_Categoria_resultado_cat", function(value){
                                             return new Handlebars.SafeString(
                                                   "<div class='result_post_01_contCat_bot' style='background:#"+
                                                     colorFondoPorCategoria_(this)+
                                                   "; color:#"+
                                                     colorTextoPorCategoria_(this)+
                                                   ";'>"+
                                                     this+
                                                   "</div>"
                                             );
                          });

                          Handlebars.registerHelper("modulo_Categoria_resultado_subCat", function(value){
                                var res_="";
                                for(var i=0;i<this.subcat.length;i++){ res_+=("&nbsp;&nbsp;#"+this.subcat[i]); }
                                return new Handlebars.SafeString("<div class='result_post_01_contCat_subcat'>"+res_+"</div>");
                         });


                  setTimeout(function(){
                          if(data.length>2){
                              var dat=JSON.parse(data);
                             if(dat[0].length>0 && typeof  dat === 'object'){

                                   //------pre compres a array el string ','-----------
                                   for(var i=0;i < dat[0].length;i++){  dat[0][i].categorias=dat[0][i].categorias.split(',');  }

                                   var template_ = document.getElementById("template_resultCategoria").innerHTML;
                                   var contTemplate = Handlebars.compile(template_);
                                   //---------------json para los resultados destacados del index-------------------
                                   var context=dat[0];
                                   var templateCompile = contTemplate(context);
                                   $(".cont_categoria_section_result").html(templateCompile);
                             }
                           }

                           setTimeout(function(){ $('.cont_categoria_section_result_post').addClass('contCatResult_on'); },10);

                }, 2000);

             }).fail(function(data) {
              //  console.log("error",data.length);

             }).always(function(data) {

                if(data.length<=2){
                      setTimeout(function(){
                          $(".cont_categoria_section_result").append("<div class='center'><i class='fa fa-hand-o-up' aria-hidden='true' style='font-size:22px;'></i>  Sin Resultados </div>");
                      },500);
                }

             },'json');
           }
       }





       //---------------------------lista de subcategorias en la categoria selccionada--------------------------------------

       this.listarResult_totalSubcat=function(cat_,sub_){
            (function() {

                //----------------
                  if(cat_.length>0){

                          setTimeout(function(){

                                      //----------------
                                       Handlebars.registerHelper("modulo_categoria_head_linkPost", function(value){
                                           return new Handlebars.SafeString(urlVar+"post.php?id="+this.id+'&hora='+this.hora);
                                       });

                                       Handlebars.registerHelper("modulo_categoria_subcat_link", function(value){
                                           return new Handlebars.SafeString(urlVar+"categoria.php?cat="+cat_+'&subcat='+this);
                                       });

                                       Handlebars.registerHelper("modulo_categoria_subcat", function(value){
                                           if(this.length>0 && this.length>1){
                                                 return new Handlebars.SafeString(this);
                                           }else{
                                                return new Handlebars.SafeString("");
                                           }
                                      });


                                      var template_ = document.getElementById("template_categoria_subCatList").innerHTML;
                                      var contTemplate = Handlebars.compile(template_);
                                      //---------------json para los resultados destacados del index-------------------
                                      var context=jsonCatSel(cat_); //dat;
                                      var templateCompile = contTemplate(context);
                                      $("#cont_categoria_head").html(templateCompile);


                          },2000);

                }

              })();
            }




           //--------------------------------lista de categorias para nav sidebar---------------------------------
           this.listarCategoria_navLik=function(){
             (function() {

                     Handlebars.registerHelper("moduloCategoria_catNav_link", function(value){
                         return new Handlebars.SafeString(urlVar+"categoria.php?cat="+this.categoria);
                     });

                setTimeout(function(){

                      var template_ = document.getElementById("template_categoria_categorias_nav").innerHTML;
                      var contTemplate = Handlebars.compile(template_);
                      //---------------json para los resultados destacados del index-------------------
                      var context=listColCat;//bd_categorias;
                      var templateCompile = contTemplate(context);
                      $(".cont_sideBar_Categorias").html(templateCompile);

                 }, 500);

              })();
           }













//------POST---------------POST----------------POST--------------POST----------POST----------POST---------------POST----------------POST---------------------POST------















//--------------------------------lista de categorias para nav sidebar---------------------------------
this.verPOST=function(id_dia,id_hora){
  (function() {
       $.post("include/restApi/result_post_template.php",{id:id_dia,hora:id_hora}, function (data){

       }).done(function(data){

          setTimeout(function(){

                   if(data.length>0){
                      var dat=JSON.parse(data);
                      if(typeof  dat === 'object'&&dat.dia_id==id_dia&&dat.hora_id==id_hora){
                          var template_ = document.getElementById("template_Post_Script").innerHTML;
                          var contTemplate = Handlebars.compile(template_);
                          //---------------json para los resultados destacados del index-------------------
                          var context=dat;//bd_post;
                          var templateCompile = contTemplate(context);
                          $("#cont_post_result_template").html(templateCompile);
                       }
                     }else{
                          location.replace("index.php");
                     }

            },500);

       }).fail(function(data) {
          //console.log("error",data);
       }).always(function(data) {
          //console.log("always",data);
       },'json');
   })();
}











        //-----------------------------------------------------------------
        this.listar_Dest_Post=function(){
          (function(){
             $.post("include/restApi/result_dest_index.php",{}, function (data){

             }).done(function(data) {

               setTimeout(function(){

                       Handlebars.registerHelper("moduloDestacado_index_linkPost", function(value){
                            return new Handlebars.SafeString(urlVar+"post.php?id="+this.dia_id+'&hora='+this.hora_id);
                       });
                       Handlebars.registerHelper("moduloDestacado_index", function(value){
                                     return new Handlebars.SafeString(
                                     "<div class='cont_destacado_header_moduloCont_item1' style='background:#"+
                                       colorFondoPorCategoria_(this)+
                                     "; color:#"+
                                       colorTextoPorCategoria_(this)+
                                     ";'>"+
                                       this +
                                       "</div>"
                                     );
                        });

                       if(data.length>0){
                             var dat=JSON.parse(data);

                             //-----------convert array el string ','---------------
                             for(var i=0;i < dat.length;i++){  dat[i].categorias=dat[i].categorias.split(',');  }

                             //console.log(dat.length);
                            if(dat.length>0){
                                   var template_ = document.getElementById("template_destacado_post").innerHTML;
                                   var contTemplate = Handlebars.compile(template_);
                                   //---------------json para los resultados destacados del index-------------
                                   var context=dat;//bd_result_destacado_index;
                                   var templateCompile = contTemplate(context);
                                   $("#cont_post_section_destacado").html(templateCompile);
                             }
                         }

              },500);


             }).fail(function() {
                // console.log("error dest index");
             }).always(function() {
                //console.log("fin: result dest index");
             });
           })();
        }



//---------------------scroll para nav fixed-----------------------
/*
      this.defineContHead_ = function(event){
                var bod_=document.getElementById("body_");
                var wb_=bod_.style.width;
                var hb_=bod_.style.height;
                var cImg_=$(".cont_img_slider");
                var cImgw_=cImg_.width();
                var cImgh_=cImg_.height();
                //console.log(cImgw_,cImgh_);
        }
*/



//--------------apiRest-----------
};

return todosArt;

})();
//-----------------------


(function($_){
    $_(document).ready(function(){

      $_(".button-collapse").sideNav();
      $_('.carousel.carousel-slider').carousel({full_width: true});

      $_('.modal-trigger').leanModal();
      $_('#aside').pushpin({ top:0, bottom:500 });

    });
})(jQuery);
