Dropzone.autoDiscover = false;
$(function () {

  $('#table_orders').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
  });

  $('#table_exp').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
  });

  /*$('#datetimepicker13').datetimepicker({
    format: 'L',
    inline: true,
    sideBySide: true
  });*/
  $('#startdate_0').datetimepicker({
    format: 'L',
    useCurrent: false
  });
  $('#enddate_0').datetimepicker({
    format: 'L',
    useCurrent: false
  });
  $("#startdate_0").on("change.datetimepicker", function (e) {
    $('#enddate_0').datetimepicker('minDate', e.date);
  });
  $("#enddate_0").on("change.datetimepicker", function (e) {
    $('#startdate_0').datetimepicker('maxDate', e.date);
  });

  $('.js-addPckg').click(function(){
    var count = 1;
    var new_pckg = '<h5>Precio</h5>'+'<p>Rango promedio del precio que tendrá en paquete </p>'+'<div class="input-group mb-4">'+'<div class="input-group-append">'+'<span class="input-group-text font-weight-bold" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;border-right:none;">$</span>'+'</div>'+'<input type="number" class="form-control" name="price" id="price">'+'<div class="input-group-append">'+'<span class="input-group-text font-weight-bold">MX</span>'+'</div>'+'</div>'+'<h5>Fecha de disponibilidad</h5>'+'<p>Describe las actividades y lo que podrán visitar cuando lleguen a su destino</p>'+'<div class="row mb-4">'+'<div class="col-md">'+'<div class="input-group" id="startdate_'+count+'" data-target-input="nearest">'+'<input type="text" class="form-control datetimepicker-input" data-target="#startdate_'+count+'"'+' name="startdate" id="startdate">'+'<div class="input-group-append" data-target="#startdate_'+count+'" data-toggle="datetimepicker">'+'<span class="input-group-text font-weight-bold">'+'<svg class="icon"><use xlink:href="../img/symbol-defs.svg#icon-calendar"></use></svg>'+'</span>'+'</div>'+'</div>'+'</div>'+'<div class="col-md">'+'<div class="input-group" id="enddate_'+count+'" data-target-input="nearest">'+'<input type="text" class="form-control datetimepicker-input" data-target="#enddate_'+count+'" name="enddate" id="enddate">'+'<div class="input-group-append" data-target="#enddate_'+count+'" data-toggle="datetimepicker">'+'<span class="input-group-text font-weight-bold">'+'<svg class="icon"><use xlink:href="../img/symbol-defs.svg#icon-calendar"></use></svg>'+'</span>'+'</div>'+'</div>'+'</div>'+'</div>'+'<h5>Qué incluye</h5>'+'<div class="form-group">'+'<textarea name="incluye" id="incluye" class="form-control" rows="3" cols="80" required></textarea>'+'</div>';
    $('#more_pckgs').append(new_pckg);
    count++;
    return false;
  });

  $('.js-addFaq').click(function(){
    var count = 1;
    var faq = '<div class="form-group">'+'<label for="calle">Pregunta</label>'+'<input type="text" class="form-control" name="pregunta_'+count+'" id="pregunta_'+count+'" required>'+'</div>'+'<div class="form-group">'+'<label for="respuesta_'+count+'">Respuesta</label>'+'<textarea name="respuesta_'+count+'" id="respuesta_'+count+'" class="form-control" rows="8" cols="80" required></textarea>'+'</div>';
    $('#more_faqs').append(faq);
    count++;
    return false;
  });

  $('#add_experiencie').on('click', '.js-prevstep', function(){
    var step_number = $(this).parents('.step').attr('id').match(/\d+/)[0];
    $('.steps-timeline__item').eq(step_number - 1).removeClass('steps-timeline__item--active');
    $(this).parents('.step').hide();
    $('#step_'+(parseInt(step_number) - 1)).show();
    return false;
  });

  var required_fields = 'input[required], textarea[required]';
  $('#add_experiencie').on('click', '.js-nextstep', function(){
    var valid = true;
    $(this).parents('.step').find(required_fields).each(function(){
      if($(this).val()){
        $(this).removeClass('is-invalid');
      } else {
        $(this).addClass('is-invalid');
        valid = false;
      }
    });
    if($(this).parents('.step').find('.dropzone').length){
      if($(this).parents('.step').find('.dropzone .dz-preview:not(.dz-error)').length === 0){
        alert('Debes ingresar una imagen');
        valid = false;
      }
    }
    if(valid){
      var step_number = $(this).parents('.step').attr('id').match(/\d+/)[0];
      $('.steps-timeline__item').eq(step_number).addClass('steps-timeline__item--active');
      $(this).parents('.step').hide();
      $('#step_'+(parseInt(step_number) + 1)).show();
    }
    return false;
  });

  $('#add_experiencie').on('blur', required_fields, function(){
    if($(this).val()){
      $(this).removeClass('is-invalid');
    } else{
      $(this).addClass('is-invalid');
    }
  });

  if($('#featured_image').lenght){
    var myDropzone = new Dropzone("div#featured_image", {
      acceptedFiles: "image/*",
      addRemoveLinks: true,
      autoProcessQueue: false,
      dictCancelUpload: 'x',
      dictRemoveFile: 'Eliminar',
      hiddenInputContainer: "form",
      maxFiles: 1,
      maxFilesize: 1,
      paramName: "featured_image",
      parallelUploads: "1",
      url: "/file/post"
    });
  }

  if($('#gallery').lenght){
    var myDropzone = new Dropzone("div#gallery", {
      acceptedFiles: "image/*",
      addRemoveLinks: true,
      autoProcessQueue: false,
      dictCancelUpload: 'x',
      dictRemoveFile: 'Eliminar',
      hiddenInputContainer: "form",
      maxFilesize: 1,
      paramName: "featured_image",
      parallelUploads: "10",
      url: "/file/post"
    });
  }

});
