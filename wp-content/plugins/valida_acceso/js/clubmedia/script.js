var id_servicio = document.getElementById('id_servicio').value;
var precio1 = document.getElementById('tarifa1').value; // Claro
var precio2 = document.getElementById('tarifa2').value; // Movistar
var precio3 = document.getElementById('tarifa3').value; // Personal
var url_app = document.getElementById('urlApp') ? document.getElementById('urlApp').value : null;

var operadora = null;
var msisdn = null;
var necesita_captcha = true;

function openNav() {
    document.getElementById('myNav').style.width = '100%';
    document.getElementById('tarifa').innerHTML = '<span>' + this.precio3 + '</span><div class="txt_final_precio"> final</div>';
    var link1 = document.getElementById('urlApp1');
    var link2 = document.getElementById('urlApp2');
    if(link1){
      if(this.url_app){
        link1.setAttribute('href', this.url_app);
      } else {
        link1.style.display = 'none';
      }
    }
    if(link2){
      if(this.url_app){
        link2.setAttribute('href', this.url_app);
      } else {
        link2.style.display = 'none';
      }
    }
    document.getElementById('login02').style.display = 'none';
    document.getElementById('login03').style.display = 'none';
}

function closeNav() {
  document.getElementById('myNav').style.width = '0%';
  document.getElementById('login01').style.display = 'none';
  document.getElementById('login02').style.display = 'none';
  document.getElementById('login03').style.display = 'none';
}

function cambia_tarifa(){

    this.operadora = document.getElementById('carrierId');
    switch (this.operadora.value) {
      case '1': // Claro
        document.getElementById('tarifa').innerHTML = '<span>' + this.precio1 + '</span>';
      break;
      case '2': // Movistar
        document.getElementById('tarifa').innerHTML = '<span>' + this.precio2 + '</span>';
      break;
      case '3': // Personal
        document.getElementById('tarifa').innerHTML = '<span>' + this.precio3 + '</span>';
      break;
    }
}

function validate_captcha() {
  var captcha_token = document.getElementById('g-recaptcha-response');

  if (captcha_token.value == "" && this.necesita_captcha) {
    alert("Por favor verifique el Re-Captcha");
  } else {

    req_data = {
      response: captcha_token.value,
      secret:'6LeNuwsUAAAAAPJBzSUxxYZ-kYCY_0rI5DxVhZ-M'
    };

    if (this.necesita_captcha){
      jQuery.ajax({
        type: "POST",
        url: '/wp-admin/admin-ajax.php?action=validate_captcha_ajax',
        data: req_data,
        success: function (data) {
          if (data.success){
            setNecesitaCaptcha(false);
            validate_pincode();
          } else {
            alert("Verificacion Re-Captcha incorrecta.");
          }
          console.log(data);
        },
        error: function (data){
          alert("Error de conexión a Re-Captcha de Google. Por favor intenta nuevamente.");
        },
        dataType: "json"
      });
    } else {
      validate_pincode();
    }
  }
}

function setNecesitaCaptcha(value){
  this.necesita_captcha = value;
}

function validate_pincode(){
  var pincode = document.getElementById('pincode');

  if (pincode.value == ""  || pincode.value.trim().includes(' ')){
    alert("Por favor escriba el PIN que recibió sin espacios.");
  } else {
    var url = '/wp-admin/admin-ajax.php?action=validate_pincode_ajax&id_servicio=' + this.id_servicio + '&id_operadora=' + this.operadora.value + '&msisdn=' + this.msisdn + '&pincode=' + pincode.value;
    jQuery.ajax({
      type: "POST",
      url: url,
      success: function (data) {
        // Dar acceso al portal
        if ("suscripto" in data){
          closeNav();
        } else {
          alert(data.mensaje);
        }
        console.log(data);
      },
      error: function (data){
        alert("Error de validación con la operadora.");
      },
      dataType: "json"
    });
  }
}

function genera_pincode(){
  this.operadora = document.getElementById('carrierId');
  this.prefijo = document.getElementById('areareg');
  this.telefono = document.getElementById('telreg');

  if (this.prefijo.value == ""  || this.telefono.value.trim().includes(' ') || this.telefono.value.includes('-') || this.telefono.value.includes('+') || this.telefono.value.includes(',') || this.telefono.value.includes('.')){
    alert("Por favor escriba la característica de su número sin espacios, ni guiones ni caracteres especiales.");
  } else if (this.telefono.value == "" || this.telefono.value.length < 7  || this.telefono.value.trim().includes(' ') || this.telefono.value.includes('-') || this.telefono.value.includes('+') || this.telefono.value.includes(',') || this.telefono.value.includes('.')){
    alert("Por favor escriba su número de celular completo sin espacios, ni guiones ni caracteres especiales.");
  } else {

    var url = '/wp-admin/admin-ajax.php?action=get_pincode_ajax&id_servicio='+this.id_servicio+'&id_operadora=';
    switch (this.operadora.value) {
      case '1': // Claro
        this.msisdn = '549' + this.prefijo.value.trim() + this.telefono.value.trim();
        url = url + this.operadora.value + '&msisdn=' + this.msisdn;
        obtener_pin(url);
      break;
      case '2': // Movistar
        //this.msisdn = '54' + this.prefijo.value.trim() + this.telefono.value.trim();
        // No hay servicio Movistar
        //url = '';
        document.getElementById('login01').style.display = 'none';
        document.getElementById('login03').style.display = 'initial';
      break;
      case '3': // Personal
        this.msisdn = '54' + this.prefijo.value.trim() + this.telefono.value.trim();
        url = url + this.operadora.value + '&msisdn=' + this.msisdn;
        obtener_pin(url);
      break;
    }
  }

}

function obtener_pin(url){
  jQuery.ajax({
      type: "POST",
      url: url,
      success: function (data) {
        if(data.status == "OK"){
          if("suscripto" in data){
            closeNav();
          } else {
            document.getElementById('login01').style.display = 'none';
            document.getElementById('login02').style.display = 'initial';
          }
        } else {
          alert("Error de validación con la operadora. Intente verificar su característica, número y operadora. O intente más tarde.");
        }
        console.log(data);
      },
      error: function (data){
        alert("Error de conexión con su operadora.");
      },
      dataType: "json"
    });
}

openNav();
