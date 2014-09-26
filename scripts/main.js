$(document).ready(function() {

  //Define bg de cada banner a partir de seu respectivo data-img que contém nome da imagem
  $.each($('.bannerImg'), function(){
    $(this).css({'background-image': 'url('+$(this).data('img')+')'});
  });

  //bullets
  $('.bullets').on('click', 'a', function(event) {
    event.preventDefault();
    var current = $(this).index();
    $('.bannerImg').removeClass('active');
    $('.bannerImg').eq(current).addClass('active');
    $('.bullets').find('a').removeClass('active');
    $(this).addClass('active');
  });

  //minigaleria

  var thumbs = $('.minigaleria').find('ul');
  var thumb_qtd = $('.minigaleria').find('li').length-4;

  thumbs.find('li').find('a').on('click', function(event) {
    event.preventDefault();
  });

  $('.arrow2').on('click', function(event) {
    event.preventDefault();
    var marginAtual = +thumbs.css('marginLeft').replace('px',''); //recebe valor atual do marginLeft e converte em INT
    if(marginAtual != ((thumb_qtd) * (-201))) { //Verifica se a marginAtual é diferente do valor da thumbs_qtd * -201
      thumbs.not(':animated').animate({marginLeft : marginAtual-201+'px'});
    }
  });
  $('.arrow1').on('click', function(event) {
    event.preventDefault();
    var marginAtual = +thumbs.css('marginLeft').replace('px','');
    if (marginAtual!=0) {
      thumbs.not(':animated').animate({marginLeft : marginAtual+201+'px'});
    }
  });

  //Colorbox Plugin

  var alturaTela = $(window).height() - 10;
  $(".group1").colorbox({rel:'group1', maxHeight:alturaTela});
  $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});


  //Contato - Radio

  $('.check').on('click', function() {
    if ($('#tipom').is(':checked')) {
      $('.form_serv').removeClass('active');
      $('.form_msg').addClass('active');
      $('#msg').attr('required', true);
      $('#details').attr('required', false);

    } else {
      $('.form_msg').removeClass('active');
      $('.form_serv').addClass('active');
      $('#details').attr('required', true);
      $('#msg').attr('required', false);
    }
  });

  //Formulario

  // Get the form.
  var form = $('#ajax-contact');

  // Get the messages div.
  var formMessages = $('#form-messages');

  //Validação
  var formValid = $('form').validate({
    rules: {
      telefone: {
        minlength: 13
      },
      empresa: {
        minlength: 2
      },
      responsavel: {
        minlength: 2
      }
    },
    messages: {
      telefone: 'Telefone inválido.'
    }
  });

  // Set up an event listener for the contact form.
  $(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();

    if(formValid.valid()) {

      $('.aguarde').addClass('active');

      // Serialize the form data.
      var formData = $(form).serialize();

      // Submit the form using AJAX.
      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
      })
      .done(function(response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');
        $('.aguarde').removeClass('active');

        // Set the message text.
        $(formMessages).text(response);

        // Clear the form.
        $('#empresa').val('');
        $('#responsavel').val('');
        $('#email').val('');
        $('#telefone').val('');
        $('#bairro').val('');
        $('#cidade').val('');
        $('#estado').val('');
        $('#details').val('');
        $('#duvidas').val('');
        $('#msg').val('');

      })
      .fail(function(data) {
        // Make sure that the formMessages div has the 'error' class.
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');
        $('.aguarde').removeClass('active');

        // Set the message text.
        if (data.responseText !== '') {
          $(formMessages).text(data.responseText);
        } else {
          $(formMessages).text('Foi encontrado um erro e sua mensagem não pode ser enviada.');
        }
      });

    } else {
      $('#details-error').hide();
      $('#msg-error').hide();
    }

  });


  //Máscara do formulário

  $('#telefone').on('focusin', function() {
    $('#telefone').mask('(00) 00009-0000');
  });

  $('#telefone').on('focusout', function() {
    if (this.value.length === 14)
    $('#telefone').mask('(00) 0000-0000');
  });

}); 


  //Código imcompleto da minigaleria com scroll infinito:

  // var thumbs = $('.minigaleria').find('ul');
  // var thumb_qtd = thumbs.find('li').length;
  // var largura = thumbs.find('li').outerWidth()+10;

  // $('.arrow2').on('click', function(event) {
  //   event.preventDefault();
  //   thumbs.not(':animated').animate({
  //     'margin-left' : '-='+largura+'px'
  //   }, {
  //     complete:function(){
  //       thumbs.append(thumbs.find('li').eq(0));
  //       thumbs.css({'margin-left':largura*(-1)});
  //     }
  //   });    
  // });
  // $('.arrow1').on('click', function(event) {
  //   event.preventDefault();
  //   thumbs.not(':animated').animate({
  //     'margin-left' : '+='+largura+'px'
  //   }, {
  //     complete:function(){
  //       thumbs.append(thumbs.find('li').eq(thumb_qtd));
  //       thumbs.css({'margin-left':largura});
  //     }
  //   });
  // });


  //Lightbox sem plugin:

  // var imgID, imgWidth, imgHeight,
  //   LightboxResize = function() {
  //     //Recebe valores de altura e largura da imagem
  //     imgWidth = $('.lightbox').find('img').outerWidth(); 
  //     imgHeight = $('.lightbox').find('img').outerHeight();



  //     //Define largura e altura da LightBox de acordo com tamanho da imagem, incluindo margem para centralizar
  //     $('.lightbox').width(imgWidth+50).height(imgHeight+50);
  //     $('.lightbox').css('margin-top', ((imgHeight+50)/2)*(-1))
  //     $('.lightbox').css('margin-left', ((imgWidth+50)/2)*(-1))
  //     $('.lightbox').find('img').fadeIn(300);
  //   };
  //   //alturaTela = $(window).height();

  // $('.linha').on('click', 'a', function() {
  //   var large = $(this).find('img').data('lg');
  //   $('.lightbox').find('img').attr('src', large);
  //   $('.lightbox').find('img').load(LightboxResize);
  //   imgID = $(this).parent().index();
  //   $('.overlay, .lightbox').addClass('active');
  //   //alert(alturaTela);
  // });

  // $('.overlay').on('click', function() {
  //   $('.overlay, .lightbox').removeClass('active');
  // });
  
  // $('.lightbox').on('click', '.close', function() {
  //   $('.overlay, .lightbox').removeClass('active');
  // });

  // $('.nav').on('click', function() {
  //   var linha = $('.linha li'), 
  //     qtd = $('.linha').find('li').length;

  //   if ($(this).hasClass('right')) {
  //     if(imgID === qtd-1) {
  //       imgID = 0;
  //     } else {
  //       imgID++;
  //     }
  //   } else {
  //     if(imgID === 1) {
  //       imgID = qtd;
  //     } else {
  //       imgID--;
  //     }
  //   }
  //   $('.lightbox').find('img').fadeOut({
  //     duration: 300,
  //     complete: function(){
  //       $('.lightbox').find('img').attr('src', linha.eq(imgID).find('img').data('lg'));
  //       $('.lightbox').find('img').load(LightboxResize);
  //     }
  //   });

    
  // });

// (function($, Demolidora, undefined){


//   Demolidora.Contato = function(){

//     this.settings = function(){
//       formSettings : {
//         form : $('.form'),
//         url : 'http://2girls1cup.com'
//       },
//       submit : $('input[type="submit"]')
//     };

//     this.init = function(){

//       var s = this.settings;

//       this.submit(s);

//     };

//     this.sendForm = function(options){

//       var o = options,
//       formData = o.form.serialize();

//       $.ajax({

//         url : o.url,
//         data : formData,
//         method : 'post',

//         beforeSend : function(){
//           // faz um loader super transado aparecer pro
//           // usuário saber que tem algo acontecendo
//         },

//         success : function(){
//           // formulário enviado
//         },

//         complete : function(){
//           // esconde o loader
//           // (se isso fosse colocado no success e o form desse erro,
//           // o loader não iria desaparecer)
//         },

//         error : function(){
//           // deu merda
//         }

//       });
//     };

//     this.submit = function(options){

//       var o = options

//       o.submit.on('click', function(e){
//         e.preventDefault();

//         if(this.isValid()){
//           this.sendForm(o.formSettings);
//         } else{
//           // tá faltando merda aí
//         }
//       });
//     };

//     this.isValid = function(){
//       return !!(/* Validação do form */);
//     };

//     return this;
//   }

//   $(document).ready(function(){
//     new Demolidora.Contato().init();
//   });

// })(jQuery, {} || window.Demolidora);
