//--------------------------objeto para todos los artistas---------------
(function($_){

  this.todosArt = function(urlRoot_){

        var categoriaVar="";
        var subCategoriaVar="";
        var urlVar="";
        var urlR_=urlRoot_;
        var title_social="";
        var img_social ="";
        var contenido_social="";

        var lista_youtubers_array=[];
        var lista_youtubers_json={};

        if (Modernizr.localstorage) {
            // supported
            console.log('soporta localstorage');
        } else {
            // not-supported
            console.log('no soporta localstorage');
        }




//--------------------------------------------------------------------------------------------------------------------

        this.set_categoriaVar=function(cat_){ categoriaVar=cat_;   }
        this.set_subCategoriaVar=function(subcat_){ subCategoriaVar=subcat_;  }
        this.get_categoriaVar=function(){ return categoriaVar;   }
        this.get_subCategoriaVar=function(){ return subCategoriaVar;  }
        localStorage.setItem("cantidadPost", true);

//------------------------------------------------------------------------------

        function set_meta_social(tit_, cont_, img_, link_){
              title_social=tit_;
              contenido_social=cont_;
              img_social=img_;
              url_social=link_;
             // console.log(url_social);
              $_("meta[property='og:title']").attr('content',  title_social);
              $_("meta[property='og:description']").attr('content', contenido_social);
              $_("meta[property='og:image']").attr('content',  'https://s3-sa-east-1.amazonaws.com/club.media/post/'+img_social);
              $_("meta[property='og:url']").attr('content',  url_social);

              var tt_ = $_("meta[property='og:title']").attr('content');
              var cc_ = $_("meta[property='og:description']").attr('content');
              var im_ = $_("meta[property='og:image']").attr('content');
              var ll_ = $_("meta[property='og:url']").attr('content');

              //console.log(tt_,cc_,im_,ll_);
        }


//------------------------------------------------------------------------------


        this.verNav=function(){
          $_("#nav_header_1").addClass("nav_fixed_top");
          $_("#nav_header_1").removeClass("nav_off_top");
        }


//---------------------scroll para nav fixed------------------------------------



        this.scrollBody_ = function(cont_){
                var bod_cont=cont_;
                var y_ =  bod_cont.scrollTop;
                var yct_ =  bod_cont.offsetTop;
                //console.log(y_,yct_);
                if(y_>=100){
                  $_("#nav_header_1").addClass("nav_fixed_top");
                  $_("#nav_header_1").removeClass("nav_off_top");
                  //console.log(y);
                }else{
                  $_("#nav_header_1").removeClass("nav_fixed_top");
                  $_("#nav_header_1").addClass("nav_off_top");
                }
        }



//-------------------if comparativo para Handlebars-----------------------------


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





 //-------------------------creo JSON de en Localstorage para comparar informacion de BD con Wordpress----------------------

        var lista_total_youtubers=function(){
          $_.post(urlR_+"/include/restApi/tot_youtubers.php",{}, function (data){
          }).done(function(data) {

              if(data.length>0){

                      var dat_=JSON.parse(data);
                      dat_=dat_[0];
                      //console.log(dat_);

                      for(var i=0 ; i< dat_.length ; i++){
                          var jsonYoutubers = {};
                          jsonYoutubers.canal_1=dat_[i].canal_1;
                          jsonYoutubers.canal_2=dat_[i].canal_2;
                          jsonYoutubers.id=dat_[i].id;
                          jsonYoutubers.id_nombre=dat_[i].id_nombre;
                          jsonYoutubers.info=dat_[i].info;
                          jsonYoutubers.nombre=dat_[i].nombre;
                          jsonYoutubers.pais=dat_[i].pais;
                          jsonYoutubers.srcImg=dat_[i].srcImg;

                          lista_youtubers_array.push(jsonYoutubers);
                          var list_you=JSON.stringify(lista_youtubers_array);
                          localStorage.setItem("listaDeYoutubers", list_you);
                      }
                  //  console.log(lista_youtubers_json);
              }

           }).fail(function() {
           }).always(function() {
           },'json');
        }

        lista_total_youtubers();
        var listaYoutuber_=JSON.parse(localStorage.listaDeYoutubers);



//---------------------------set de nombre por ID----------------usa el localstorage de arriva-------------------------------
        var set_youtubers_name=function(name_){
            for(var i=0;i<listaYoutuber_.length;i++){
                 if(name_==listaYoutuber_[i].id_nombre){
                    return listaYoutuber_[i].nombre;
                 }
            }
        }
      //  console.log(set_youtubers_name('azu_makeup '));









//--------------------------json con colores para categorias--set de localstorage------------------

        var setColCat=function(){
            $_.post(urlR_+"/include/restApi/cantidad_cat.php",{}, function (data){
            }).done(function(data) {

                    if(data.length>0){
                        var categ_=JSON.parse(data);
                        var col_Fondo=[];

                              for(var i=0 ; i< categ_.length ; i++){
                                  var jsonCat = {};
                                  jsonCat.cat_nombre=categ_[i].cat_nombre;
                                  jsonCat.categoria=categ_[i].categoria;
                                  jsonCat.colorFondo=categ_[i].colorFondo;
                                  jsonCat.colorTexto=categ_[i].colorTexto;
                                  jsonCat.imgCategoria=categ_[i].imgCategoria;
                                  jsonCat.info_cat=categ_[i].info_cat;
                                  jsonCat.subCat=categ_[i].subCat;
                                  jsonCat.subCat_nombre=categ_[i].subCat_nombre;
                                  jsonCat.cantidad=0;
                                  jsonCat.id=categ_[i].id;
                                  col_Fondo.push(jsonCat);
                                  var colFondo=JSON.stringify(col_Fondo);
                                  localStorage.setItem("colorFondoList", colFondo);
                              }

                        //cantCat_();
                        cantCat_wordpress();
                        arraySubCat();
                        arraySubCat_nombre();
                     }

             }).fail(function() {
             }).always(function() {
             },'json');
        }

        setColCat();
        var listColCat=JSON.parse(localStorage.colorFondoList);


//------------------------------------------------------------------------------


        var set_categoria_name=function(name_){
            for(var i=0;i<listColCat.length;i++){
                 if(name_==listColCat[i].categoria){
                    return listColCat[i].cat_nombre;
                 }
            }
        }
        //console.log(set_categoria_name('musica'));











//----------------------------------set localstorage--------------------------------------------

      var categorias_wordpress=function(){
          var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
          $_.getJSON(ajaxURL+"/wp-json/wp/v2/categories", {'per_page':100}, function(data,status, textStatus){
                //console.log(data);
                if(textStatus.status===200){
                        var lista_array=[];
                        for(var i=0 ; i< data.length ; i++){
                            var json_Object= {};
                            json_Object.id=data[i].id;
                            json_Object.name=data[i].name;
                            json_Object.parent=data[i].parent;

                            lista_array.push(json_Object);
                            var lista_Json=JSON.stringify(lista_array);
                            localStorage.setItem("lista_categorias_id", lista_Json);
                        }
                }
          });
      }

      categorias_wordpress();
      var listaCategoriasID=JSON.parse(localStorage.lista_categorias_id);


//---------------------------


      var set_categoria_por_id_cat=function(id_){
            for(var i=0;i<listaCategoriasID.length;i++){
                    if(id_==listaCategoriasID[i].id && listaCategoriasID[i].parent<=0){
                       return listaCategoriasID[i].name;
                    }
             }
      }
      var set_categoria_por_id_subcat=function(id_){
            for(var i=0;i<listaCategoriasID.length;i++){
                    if(id_==listaCategoriasID[i].id && listaCategoriasID[i].parent > 0){
                       return listaCategoriasID[i].name;
                    }
             }
      }








//------------------------------------------------------------------------------


        var set_subCat_name=function(name_){
            for(var i=0;i<listColCat.length;i++){
                   for(var j=0;j<listColCat[i].subCat.length;j++){
                        if(name_==listColCat[i].subCat[j]){
                           //console.log(listColCat[i].subCat_nombre[j]);
                           return listColCat[i].subCat_nombre[j];
                        }
                   }
            }
        }



//-----------------------------------busco categorias parent 0 - en API wordpress------------------------------------


        var cantCat_wordpress=function(){
            var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
            $_.getJSON(ajaxURL+"/wp-json/wp/v2/categories?parent=0", {}, function(data,status, textStatus){

                  if(textStatus.status===200){
                          $_.each(data, function( key, value ) {
                                for(var i=0 ; i< listColCat.length ; i++){
                                   var cat_=listColCat[i].categoria;
                                     if(value.slug == cat_){
                                            listColCat[i].cantidad=value.count;
                                            //console.log(listColCat[i].cat_nombre,listColCat[i].cantidad);
                                     }
                                   }
                          });
                  }//status 200
             });
        }



//-----------------------------------------------------------------------

        var arraySubCat=function(){
            for(var i=0 ; i< listColCat.length ; i++){
                  //console.log(listColCat[i].subCat);
                  listColCat[i].subCat=listColCat[i].subCat.split(',');
            }
        }
        //console.log(listColCat);

//-----------------------------------------------------------------------

        var arraySubCat_nombre=function(){
            for(var i=0 ; i< listColCat.length; i++){
                  listColCat[i].subCat_nombre=listColCat[i].subCat_nombre.split(',');
            }
        }



//-------------------color para cada cateogria----------------------------------

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

//-------------------color para cada cateogria----------------------------------

        var colorTextoPorCategoria_=function(cat_){
                var color_="333";
                var catSel=cat_.valueOf();
                for(var i=0 ; i< listColCat.length ; i++){
                  if(listColCat[i].categoria==catSel){
                        return listColCat[i].colorTexto;

                  }
                }
         }

//------------------------------------------------------------------------------

         var jsonCatSel=function(cat_){
           for(var i=0 ; i< listColCat.length ; i++){
             if(listColCat[i].categoria==cat_){
                  return listColCat[i];
             }
           }
         }


//----------------------------------------busco imagenes en media WORDPRESS--------------------------------------

         var set_url_img_amazon = function(){
             var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
             $_.getJSON(ajaxURL+"/wp-json/wp/v2/media", {'per_page':100}, function(data,status, textStatus){
             }).done(function(data,status, textStatus) {

                   if(textStatus.status===200){
                        //https://s3-sa-east-1.amazonaws.com/club.media/uploads/
                            //console.log(data);

                            var lista_media_array=[];
                            var categ_=data;

                              for(var i=0 ; i< data.length ; i++){
                                  var jsonImg= {};
                                  jsonImg.id=categ_[i].id;
                                  jsonImg.img_name=categ_[i].media_details.file;

                                  lista_media_array.push(jsonImg);
                                  var listaMedia=JSON.stringify(lista_media_array);
                                  localStorage.setItem("lista_img_storage", listaMedia);
                              }

                   }//status 200

            }).fail(function() {
            }).always(function() {
            },'json');
         }

        set_url_img_amazon();
        var listMediaStorage=JSON.parse(localStorage.lista_img_storage);


//--------------


         var verURL_img_amazon=function(id_img){
           for(var i=0 ; i<listMediaStorage.length ; i++){
             if(listMediaStorage[i].id==id_img){
                //console.log('ok');
                return listMediaStorage[i].img_name;
             }
           }
         }


//------------------------------------------------------------------------------


























//-------INDEX--------------INDEX-----------INDEX--------------INDEX------------INDEX-------------INDEX------------INDEX--------------INDEX---------INDEX-----------INDEX----

//------funciones para el template INDEX------------























//------------------------------------------------------------------------------


        this.listarCategoria_index=function(){


                     $_("#contCategoria1").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");
                     $_("#contCategoria2").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");

                      setTimeout(function(){

                              Handlebars.registerHelper("moduloCategoria_index_linkPost", function(value){
                                  return new Handlebars.SafeString(urlVar+"index.php?page=categoria_&amp;cat="+this.categoria);
                              });

                              var template_ = document.getElementById("template_categoria_index").innerHTML;
                              var template2_ = document.getElementById("template_categoria_index2").innerHTML;
                              var contTemplate = Handlebars.compile(template_);
                              var contTemplate2 = Handlebars.compile(template2_);
                              //---------------json para los resultados destacados del index-------------------

                              var context=listColCat;
                              var templateCompile = contTemplate(context);
                              var templateCompile2 = contTemplate2(context);
                              $_("#contCategoria1").html(templateCompile);
                              $_("#contCategoria2").html(templateCompile2);

                           setTimeout(function(){ $_('#contCategoria1').addClass('contCatResult_on'); },10);
                           setTimeout(function(){ $_('#contCategoria2').addClass('contCatResult_on'); },10);
                      }, 2000);


        }




//------------------------------------------------------------------------------



        this.listarDest_index=function(){

            // $.post(urlR_+"/include/restApi/result_dest_index.php",{}, function (data){
            var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
            $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts?sticky=true", {'per_page':4,'page':1}, function(data){

               $_("#cont_destacado_header ul").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");

             }).done(function(data,status, textStatus){

                 if(textStatus.status===200){

                         setTimeout(function(){
                        //   console.log(data);

                                   Handlebars.registerHelper("moduloDestacado_index_linkPost", function(value){
                                        return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                                   });

                                   Handlebars.registerHelper("moduloDestacado_index", function(value){
                                                 return new Handlebars.SafeString(
                                                 "<div class='cont_destacado_header_moduloCont_item1' style='background:#"+
                                                   colorFondoPorCategoria_(this)+
                                                 "; color:#"+
                                                   colorTextoPorCategoria_(this)+
                                                 ";'>"+
                                                   set_categoria_name(this)+
                                                   "</div>"
                                                 );
                                    });

                                    Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_index_dest", function(value){
                                            return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                                    });

                                    //-----------convert array el string ','---------------
                                    if(data != null && data.length > 0) {

                                          var template_ = document.getElementById("template_destacado_index").innerHTML;
                                          var contTemplate = Handlebars.compile(template_);
                                          var context=data; //bd_result_destacado_index;
                                          var templateCompile = contTemplate(context);
                                          $_("#cont_destacado_header ul").html(templateCompile);
                                    }

                             setTimeout(function(){ $_('#cont_destacado_header ul').addClass('contCatResult_on'); },10);
                          }, 2000);

              }//status 200

                // console.log("load: result dest index");
             }).fail(function() {
                // console.log("error dest index");
             }).always(function() {
                //console.log("fin: result dest index");
             },'json');

        }




//------------------------------------------------------------------------------




 this.listarPost_index=function(posicion_result_list_){

       var pos_=posicion_result_list_;
       //$.post(urlR_+"/include/restApi/result_index.php",{pos:pos_}, function (data){

       var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
      $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts/", {"page":pos_,"per_page":10}, function(data){

         $_(".fila1_load").css({'display':'block'});

       }).done(function(data,status, textStatus){

           if(textStatus.status===200){

                  //-------------crea URL para lista de post en el index----------
                   Handlebars.registerHelper("moduloResult_index_linkPost", function(value){
                       //console.log(this.dia_id,this.hora_id);
                       return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                   });

                   //-----------------crea subcategorias en modulo POST index---------------------
                   Handlebars.registerHelper("moduloResult_itemsCategoria", function(value) {
                    return new Handlebars.SafeString(
                       "<div class='contResultIndex_moduloContfondo_cont_info_item1' style='background:#"+
                         colorFondoPorCategoria_(this)+
                       "; color:#"+
                         colorTextoPorCategoria_(this)+
                       ";'>"+
                         set_categoria_name(this)+
                       "</div>");
                   });

                   Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_index", function(value){
                           return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                   });


                   setTimeout(function(){

                           if(data.length>0){
                                 //var dat=JSON.parse(data);
                                 //console.log(dat[0]);
                                   if(data != undefined){
                                       if(data.length>0 && typeof  data === 'object'){

                                            var template_ = document.getElementById("template_ContChicoResult").innerHTML;
                                            var contTemplate = Handlebars.compile(template_);
                                            //---------------json para los resultados del index-------------------
                                            var context=data;//bd_result_index;
                                            //console.log(data);
                                            var templateCompile = contTemplate(context);
                                            $_(".fila1").append(templateCompile);

                                            //---------------ultimo array-----------
                                            //var ultimo_ =data.pop().id;
                                            //var primero_=data.shift().id;
                                            //$("#numResult_pos").html(primero_+" / "+ultimo_);
                                            $_(".fila1_load").css({'display':'none'});

                                     }
                                   }
                             }

                     setTimeout(function(){ $_('.fila1').addClass('contCatResult_on'); },10);
                  }, 2000);

            }//status 200


            //  console.log("load: result index");
          }).fail(function() {
            //  console.log("error");
          }).always(function() {
            // console.log("fin: result index");
          },'json');

    }




//------------------------------------------------------------------------------



    this.listarDest_indexCat_sideBar=function(page_){

      //  $.post(urlR_+"/include/restApi/result_dest_index.php",{}, function (data){
      var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
      $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts?sticky=true", {'per_page':5,'page':1}, function(data){

        if(page_=='index_'){
            $_("#contAsideBotton").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");
        }else if(page_=='categoria_'){
            $_(".cont_sideBar_Destacado").html("<div class='progress'><div class='indeterminate' style='background-color:#ffdf1f;'></div></div>");
        }

        }).done(function(data,status, textStatus){

            if(textStatus.status===200){
           //console.log(data);

                      setTimeout(function(){

                                Handlebars.registerHelper("moduloDestacado_index_linkPost_sideBar", function(value){
                                    return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                                });
                                Handlebars.registerHelper("moduloDestacado_index", function(value){
                                             return new Handlebars.SafeString("<div>"+set_categoria_name(this)+"</div>");
                                });
                                Handlebars.registerHelper("moduloDestacado_index_autores", function(value){
                                             return new Handlebars.SafeString("<div>"+set_youtubers_name(this)+"</div>");
                                });

                                Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_index_sidebar", function(value){
                                        return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                                });


                                if(data.length>0){
                                  //var dat=JSON.parse(data);
                                   //-----------convert array el string ','---------------
                                if(data != null && data.length > 0) {
                                        // for(var i=0;i < dat.length;i++){
                                        //   dat[i].categorias=dat[i].categorias.split(',');
                                        //   dat[i].autores=dat[i].autores.split(',');
                                        // }

                                         var template_ = document.getElementById("template_destacado_indexCat_sideBar").innerHTML;
                                         var contTemplate = Handlebars.compile(template_);
                                         //---------------json para los resultados destacados del index-----------------
                                         var context=data;//bd_result_destacado_index;
                                         var templateCompile = contTemplate(context);

                                         if(page_=='index_'){
                                              $_("#contAsideBotton").html(templateCompile);
                                         }else if(page_=='categoria_'){
                                              $_(".cont_sideBar_Destacado").html(templateCompile);
                                         }

                                   }
                               }

                       if(page_=='index_'){
                            setTimeout(function(){ $_('#contAsideBotton').addClass('contCatResult_on'); },10);
                       }else if(page_=='categoria_'){
                            setTimeout(function(){  $_(".cont_sideBar_Destacado").addClass('contCatResult_on'); },10);
                       }

                    },2000);

                }//status 200


                 //console.log("load: result dest sidebar index");
             }).fail(function() {
                 //console.log("error dest sidebar index");
             }).always(function() {
                //console.log("fin: result dest sidebar index");
             },'json');
    }


































 //-----------CATEGORIA-------------CATEGORIA-------------CATEGORIA------------CATEGORIA----------------CATEGORIA--------------CATEGORIA------------------CATEGORIA---------------


//------funciones para el template categoria------------


























//------------------------------resultados para la seccion-----------------------------------

   this.listarResult_Categoria=function(cat_, sub_, pag_, posicion_result_list_){
         var pos_=posicion_result_list_;
        //console.log(cat_.length,sub_.length);

       if(cat_.length>0||sub_.length>0){

          if(sub_.length>0){cat_=sub_;}

          //$.post(urlR_+"/include/restApi/result_sel_cat.php",{cat:cat_,sub:sub_}, function (data){
          var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
          $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts?filter[category_name]="+cat_, {"page":pos_,"per_page":7}, function(data){     //filter cat acf

            $_(".cont_categoria_section_result").html("<div class='progress'><div class='indeterminate' style='background-color:#"+ colorFondoPorCategoria_(cat_)+"'></div></div>");

          }).done(function(data,status, textStatus){

              if(textStatus.status===200){

                //   console.log(data);

                     Handlebars.registerHelper("moduloCategoria_index_linkPost", function(value){
                         return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                     });

                     Handlebars.registerHelper("modulo_Categoria_resultado_cat", function(value){
                                         return new Handlebars.SafeString(
                                               "<div class='result_post_01_contCat_bot' style='background:#"+
                                                 colorFondoPorCategoria_(this)+
                                               "; color:#"+
                                                 colorTextoPorCategoria_(this)+
                                               ";'>"+
                                                 set_categoria_name(this)+
                                               "</div>"
                                         );
                      });

                      Handlebars.registerHelper("modulo_Categoria_resultado_subCat", function(value){
                            var res_="";
                            for(var i=0;i<this.subcat.length;i++){ res_+=("&nbsp;&nbsp;#"+this.subcat[i]); }
                            return new Handlebars.SafeString("<div class='result_post_01_contCat_subcat'>"+res_+"</div>");
                     });

                     Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_cat", function(value){
                             return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                     });


                    setTimeout(function(){
                            if(data.length>0){
                                //var dat=JSON.parse(data);
                               if(data.length>0 && typeof  data === 'object'){

                                     //------pre compres a array el string ','-----------
                                     //for(var i=0;i < dat[0].length;i++){  dat[0][i].categorias=dat[0][i].categorias.split(',');  }

                                     var template_ = document.getElementById("template_resultCategoria").innerHTML;
                                     var contTemplate = Handlebars.compile(template_);
                                     //---------------json para los resultados destacados del index-------------------
                                     var context=data;
                                     var templateCompile = contTemplate(context);
                                     $_(".cont_categoria_section_result").html(templateCompile);
                               }
                             }

                             setTimeout(function(){ $_('.cont_categoria_section_result_post').addClass('contCatResult_on'); },10);


                       }, 2000);
              }


         }).fail(function(data) {
          //  console.log("error",data.length);

         }).always(function(data) {

            if(data.length<=0){
                  setTimeout(function(){
                      $_(".cont_categoria_section_result").append("<div class='center'><i class='fa fa-hand-o-up' aria-hidden='true' style='font-size:22px;'></i>  Sin Resultados </div>");
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

                          //console.log(colorFondoPorCategoria_(cat_));
                          $_("#cont_categoria_head").html("<div class='progress'><div class='indeterminate' style='background-color:#"+colorFondoPorCategoria_(cat_)+"'></div></div>");

                            setTimeout(function(){

                                      //----------------
                                       Handlebars.registerHelper("modulo_categoria_head_linkPost", function(value){
                                           return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id+'&hora='+this.hora);
                                       });

                                       Handlebars.registerHelper("modulo_categoria_subcat_link", function(value){
                                           return new Handlebars.SafeString(urlVar+"index.php?page=categoria_&amp;cat="+cat_+'&subcat='+this);
                                       });

                                       Handlebars.registerHelper("modulo_categoria_subcat", function(value){
                                           if(this.length>0 && this.length>1){
                                                 return new Handlebars.SafeString(set_subCat_name(value));
                                           }else{
                                                return new Handlebars.SafeString("");
                                           }
                                      });

                                      var template_ = document.getElementById("template_categoria_subCatList").innerHTML;
                                      var contTemplate = Handlebars.compile(template_);
                                      //---------------json para los resultados destacados del index-------------------

                                      var context=jsonCatSel(cat_); //dat;
                                      var templateCompile = contTemplate(context);
                                      $_("#cont_categoria_head").html(templateCompile);
                          },2000);
                      },100);
                }

        })();
      }




//--------------------------------lista de categorias para nav sidebar---------------------------------

     this.listarCategoria_navLik=function(){
       (function(){

           Handlebars.registerHelper("moduloCategoria_catNav_link", function(value){
               return new Handlebars.SafeString(urlVar+"index.php?page=categoria_&amp;cat="+this.categoria);
           });

          setTimeout(function(){

                var template_ = document.getElementById("template_categoria_categorias_nav").innerHTML;
                var contTemplate = Handlebars.compile(template_);
                //---------------json para los resultados destacados del index-------------------
                var context=listColCat;//bd_categorias;
                //console.log(listColCat);
                var templateCompile = contTemplate(context);
                $_(".cont_sideBar_Categorias").html(templateCompile);

           }, 1000);

        })();
     }































//------POST---------------POST----------------POST--------------POST----------POST----------POST---------------POST----------------POST---------------------POST------

//------funciones para el template POST------------

























//---------------------------------------------busca el POST por ID en la API wordpress para renderizar la informacion ---------------------------------


this.verPOST=function(id_dia){
  (function() {
       //$.post(urlR_+"/include/restApi/result_post_template.php",{id:id_dia}, function (data){

       var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
       $_.ajax({
           url : ajaxURL+"/wp-json/wp/v2/posts/"+id_dia,
           data : {},
           type : 'GET',
           dataType : 'json',
           xhrFields: {withCredentials: true},
           crossDomain: true,
           success : function(data,status, textStatus) {

              //console.log(data,"page");

                data.link=encodeURIComponent(data.link);
                set_meta_social(data.title.rendered, data.content.rendered, data.acf.url_img_video, data.link);


                 if(textStatus.status===200){

                      setTimeout(function(){

                                  Handlebars.registerHelper("modulo_cartegoriPorId", function(value){
                                      return new Handlebars.SafeString(set_categoria_name(value));
                                  });

                                  Handlebars.registerHelper("modulo_cartegoriPorId_wordpress", function(value){
                                      if(set_categoria_por_id_cat(value)!=undefined){
                                         return new Handlebars.SafeString("#"+set_categoria_por_id_cat(value));
                                      }
                                  });
                                  Handlebars.registerHelper("modulo_subCartegoriPorId_wordpress", function(value){
                                      if(set_categoria_por_id_subcat(value)!=undefined){
                                        return new Handlebars.SafeString("*"+set_categoria_por_id_subcat(value));
                                      }
                                  });

                                  Handlebars.registerHelper("modulo_set_youtuber_name", function(value){
                                      return new Handlebars.SafeString(set_youtubers_name(value));
                                  });

                                  Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_post", function(value){
                                        //  console.log(value,verURL_img_amazon(value));
                                          return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                                  });


                                  //var dat=JSON.parse(data);
                                  if(typeof  data === 'object' && data.id==Number(id_dia)){
                                      var template_ = document.getElementById("template_Post_Script").innerHTML;
                                      var contTemplate = Handlebars.compile(template_);
                                      //---------------json para los resultados destacados del index-------------------
                                      var context=data;//bd_post;
                                    //  console.log(data);
                                      var templateCompile = contTemplate(context);
                                      $_("#cont_post_result_template").html(templateCompile);

                                 }else{
                                      location.replace("index.php");
                                 }

                        },500);
                  }

          }, error : function(xhr, status) {
               //console.log('Disculpe, existió un problema');
          },complete : function(data,status, textStatus) {
                //console.log('Petición realizada');
          }

       });



   })();
}






//----------------------------------busca los post destacados--------------------------------------


        this.listar_Dest_Post=function(){
          (function(){
             //$.post(urlR_+"/include/restApi/result_dest_index.php",{}, function (data){
             var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
             $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts?sticky=true", {'per_page':4,'page':1}, function(data){

             }).done(function(data,status, textStatus){

               if(textStatus.status===200){

                  if(data.length>0){

                       Handlebars.registerHelper("moduloDestacado_index_linkPost", function(value){
                            return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                       });

                       Handlebars.registerHelper("moduloDestacado_post", function(value){
                                     return new Handlebars.SafeString(
                                     "<div class='cont_destacado_header_moduloCont_item1' style='background:#"+
                                       colorFondoPorCategoria_(this)+
                                     "; color:#"+
                                       colorTextoPorCategoria_(this)+
                                     "; '>"+
                                       set_categoria_name(this) +
                                       "</div>"
                                     );
                        });

                            // var dat=JSON.parse(data);
                             //-----------convert array el string ','---------------
                             //for(var i=0;i < dat.length;i++){  dat[i].categorias=dat[i].categorias.split(',');  }
                             //console.log(dat.length);

                                   var template_ = document.getElementById("template_destacado_post").innerHTML;
                                   var contTemplate = Handlebars.compile(template_);
                                   //---------------json para los resultados destacados del index-------------
                                   var context=data;//bd_result_destacado_index;
                                   var templateCompile = contTemplate(context);
                                   $_("#cont_post_section_destacado").html(templateCompile);

                         }
               }

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


























//----search----search----search----search----search---search----search---search----search----search----search-----search---search----search-----

//------ funciones para el template search ------ usa el template de categoria ------------



















//------------------------------------------buscador nav movile----------------------------------
this.modulo_buscador_form_nav=function(){


      $_("#bot_search_nav_mobile").click(function(event) {
                          event.preventDefault();
                          var info = $_("#search_nav").val();
                          //console.log(info);
                          location.href = '?page=search_&bus='+info;
      });

      $_("#li_search_nav_mobile input").keydown(function(event) {
              if(event.keyCode == 13) {
                          event.preventDefault();
                          var info = $_("#search_nav").val();
                          //console.log(info);
                          location.href = '?page=search_&bus='+info;
              }
        });


//--------------------------buscador-----top- y bottom-----------------


        var cli_search_top=false;

         $_("#bot_search_nav_top").click(function(event) {
                             event.preventDefault();
                             var info = $_("#search_nav_top").val();
                             //console.log(info);
                             location.href = '?page=search_&bus='+info;
         });

         $_("#li_search_nav_top input").keydown(function(event) {
                 if(event.keyCode == 13) {
                             event.preventDefault();
                             var info = $_("#search_nav_top").val();
                             //console.log(info);
                             location.href = '?page=search_&bus='+info;
                 }
           });

         $_("#bot_search_navTop_on_off").click(function(){
              cli_search_top=!cli_search_top;
              var form_=$_("#li_search_nav_top");
              if(cli_search_top){
                 form_.show(500);
              }else{
                 form_.hide(500);
              }
         });

           //------------------------------------------------------


           var cli_search_bottom=false;

            $_("#bot_search_nav_bottom").click(function(event) {
                                event.preventDefault();
                                var info = $_("#search_nav_bottom").val();
                                //console.log(info);
                                location.href = '?page=search_&bus='+info;
            });

            $_("#li_search_nav_bottom input").keydown(function(event) {
                    if(event.keyCode == 13) {
                                event.preventDefault();
                                var info = $_("#search_nav_bottom").val();
                                //console.log(info);
                                location.href = '?page=search_&bus='+info;
                    }
              });

           $_("#bot_search_navBottom_on_off").click(function(){
                cli_search_bottom=!cli_search_bottom;
                var form_=$_("#li_search_nav_bottom");
                if(cli_search_bottom){
                   form_.show(500);
                }else{
                   form_.hide(500);
                }
           });



}





//------------------------buscador index cat search------------------------

this.modulo_buscador_form=function(){

      $_("#bot_search").click(function(event) {
                          event.preventDefault();
                          var info = $_("#search").val();
                          //console.log(info);
                          location.href = '?page=search_&bus='+info;
      });

      $_("#cont_sideBar_Buscador_search input").keydown(function(event) {
              if(event.keyCode == 13) {
                          event.preventDefault();
                          var info = $_("#search").val();
                          //console.log(info);
                          location.href = '?page=search_&bus='+info;
              }
        });

}






//------------------------------resultados para la seccion search-----------------------------------

        this.listarResult_Search=function(busqueda_){

               var bb_=busqueda_;
               var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';+
              // console.log(bb_);

               $_.getJSON(ajaxURL+"/wp-json/wp/v2/posts?filter[s]="+bb_,{"page":1,"per_page":100}, function(data){

               }).done(function(data,textStatus) {

                      console.log(data);

                      Handlebars.registerHelper("moduloCategoria_index_linkPost", function(value){
                          return new Handlebars.SafeString(urlVar+"index.php?page=post_&amp;id="+this.id);
                      });

                      Handlebars.registerHelper("modulo_Categoria_resultado_cat", function(value){
                                          return new Handlebars.SafeString(
                                                "<div class='result_post_01_contCat_bot' style='background:#"+
                                                  colorFondoPorCategoria_(this)+
                                                "; color:#"+
                                                  colorTextoPorCategoria_(this)+
                                                ";'>"+
                                                  set_categoria_name(this)+
                                                "</div>"
                                          );
                       });

                       Handlebars.registerHelper("modulo_Categoria_resultado_subCat", function(value){
                             var res_="";
                             for(var i=0;i<this.subcat.length;i++){ res_+=("&nbsp;&nbsp;#"+this.subcat[i]); }
                             return new Handlebars.SafeString("<div class='result_post_01_contCat_subcat'>"+res_+"</div>");
                      });

                      Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_cat", function(value){
                              return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                      });

                        setTimeout(function(){

                                if(data.length>0){
                                    //var dat=JSON.parse(data);
                                   if(data.length>0 && typeof  data === 'object'){

                                         //------pre compres a array el string ','-----------
                                         //for(var i=0;i < dat[0].length;i++){  dat[0][i].categorias=dat[0][i].categorias.split(',');  }

                                         var template_ = document.getElementById("template_resultCategoria").innerHTML;
                                         var contTemplate = Handlebars.compile(template_);
                                         //---------------json para los resultados destacados del index-------------------
                                         var context=data;
                                         var templateCompile = contTemplate(context);
                                         $_(".cont_categoria_section_result").html(templateCompile);
                                   }
                                 }
                                 setTimeout(function(){ $_('.cont_categoria_section_result_post').addClass('contCatResult_on'); },10);

                           }, 2000);

               }).fail(function(data) {
               }).always(function(data) {

                 if(data.length<=0){
                       setTimeout(function(){
                           $_(".cont_categoria_section_result").append("<div class='center'><i class='fa fa-hand-o-up' aria-hidden='true' style='font-size:22px;'></i>  Sin Resultados </div>");
                       },500);
                 }

               },'json');
          }






























/*----------PAGE---------------PAGE--------------PAGE-----------------PAGE----------------PAGE---------------PAGE-------------PAGE---------------*/

//------funciones para el template PAGES-----es parecido al template de post -------

























//------------------------------------busca la info de una PAGE para renderizar en el template pages_-------------------------------------------------------


this.verPAGE=function(id_dia){
  (function() {
       //$.post(urlR_+"/include/restApi/result_post_template.php",{id:id_dia}, function (data){

       var ajaxURL = 'index.php';//'http://localhost/devCode/wordpress/';
       $_.ajax({
           url : ajaxURL+"/wp-json/wp/v2/pages/"+id_dia,
           data : {},
           type : 'GET',
           dataType : 'json',
           xhrFields: {withCredentials: true},
           crossDomain: true,
           success : function(data,status, textStatus) {

                //console.log(data,"page");

                data.link=encodeURIComponent(data.link);
                set_meta_social(data.title.rendered, data.content.rendered, data.acf.url_img_video, data.link);

                 if(textStatus.status===200){

                                  Handlebars.registerHelper("modulo_cartegoriPorId", function(value){
                                      return new Handlebars.SafeString(set_categoria_name(value));
                                  });

                                  Handlebars.registerHelper("modulo_cartegoriPorId_wordpress", function(value){
                                      if(set_categoria_por_id_cat(value)!=undefined){
                                         return new Handlebars.SafeString("#"+set_categoria_por_id_cat(value));
                                      }
                                  });
                                  Handlebars.registerHelper("modulo_subCartegoriPorId_wordpress", function(value){
                                      if(set_categoria_por_id_subcat(value)!=undefined){
                                        return new Handlebars.SafeString("*"+set_categoria_por_id_subcat(value));
                                      }
                                  });

                                  Handlebars.registerHelper("modulo_set_youtuber_name", function(value){
                                      return new Handlebars.SafeString(set_youtubers_name(value));
                                  });

                                  Handlebars.registerHelper("modulo_set_url_img_wordpress_Amazon_post", function(value){
                                          //console.log(value,verURL_img_amazon(value));
                                          if(verURL_img_amazon(value)!=undefined){
                                             return new Handlebars.SafeString("https://s3-sa-east-1.amazonaws.com/club.media/wp-content/uploads/"+verURL_img_amazon(value));
                                          }
                                  });

                                  //var dat=JSON.parse(data);
                                  if(typeof  data === 'object' && data.id==Number(id_dia)){
                                      var template_ = document.getElementById("template_Page_Script").innerHTML;
                                      var contTemplate = Handlebars.compile(template_);
                                      //---------------json para los resultados destacados del index-------------------
                                      var context=data;//bd_post;
                                    //  console.log(data);
                                      var templateCompile = contTemplate(context);
                                      $_("#cont_post_result_template").html(templateCompile);

                                 }else{
                                      location.replace("index.php");
                                 }
                  }

          }, error : function(xhr, status) {
               //console.log('Disculpe, existió un problema');
          },complete : function(data,status, textStatus) {
                //console.log('Petición realizada');
          }

       });




   })();
}










































//--------------apiRest-----------
};

return todosArt;

})(jQuery);
//-----------------------


(function($_){

    $_(document).ready(function(){

      //activa el menu Mobile y el slider de imagenes banner
      $_(".button-collapse").sideNav();
      $_('.carousel.carousel-slider').carousel({full_width: true});

      $_('.modal-trigger').leanModal();
      $_('#aside').pushpin({ top:0, bottom:500 });


    });


})(jQuery);
