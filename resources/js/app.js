require('./bootstrap');

$(document).ready(function () {

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $('body').on('mouseenter mouseleave','.dropdown',function(e){
    var _d=$(e.target).closest('.dropdown');
    if (e.type === 'mouseenter')_d.addClass('show');
    setTimeout(function(){
      _d.toggleClass('show', _d.is(':hover'));
      $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
    },300);
  });

  $('input:radio[name="change_password"]').on('change',function(){
		if(this.checked && this.value == 0)
			$('.disabled-field').attr('disabled',true);
		else
			$('.disabled-field').attr('disabled',false);
  });

  $('form.js-submit-contact-form').on('submit', function(e){
    e.preventDefault();
    let form = $(this);
    let actionURL = form.find('input[name="_action"]').val();
    let elMessage = $('.messages', form);
    elMessage.html('');
    $.ajax({
      url: actionURL,
      method: 'post',
      data: {
        name: $('input[name="name"]', form).val(),
        email: $('input[name="email"]', form).val(),
        phone: $('input[name="phone"]', form).val(),
        subject: $('input[name="subject"]', form).val(),
        content: $('textarea[name="content"]', form).val(),
      },
      success: function(data){
        if (data.errors) {
          $.each(data.errors, function(key, value){
            $(elMessage).append('<div class="alert alert-danger alert-dismissible fade show">' + value + '</div>');
          });
        } else if (data.status == 1 && data.message ) {
          $(elMessage).html('<div class="alert alert-success alert-dismissible fade show">'+ data.message +'</div>');
        }
      },
      error: function(res) {
        let response = JSON.parse(res.responseText);
        $(elMessage).html('<div class="alert alert-danger alert-dismissible fade show">'+ response.message +'</div>');
      }
    });
  });

  $('form.js-submit-profile-form').on('submit', function(e){
    e.preventDefault();
    let form = $(this);
    let actionURL = form.find('input[name="_action"]').val();
    let elMessage = $('.messages', form);
    elMessage.html('');
    $.ajax({
      url: actionURL,
      method: 'post',
      data: {
        name: $('input[name="name"]', form).val(),
        role: $('input[name="role"]', form).is(":checked") ? 1 : 0,
        email: $('input[name="email"]', form).val(),
        password: $('input[name="password"]', form).val(),
        password_again: $('input[name="password_again"]', form).val(),
        change_password: $('input[name="change_password"]:checked', form).val(),
      },
      success: function(data){
        if (data.errors) {
          $.each(data.errors, function(key, value){
            $(elMessage).append('<div class="alert alert-danger alert-dismissible fade show">' + value + '</div>');
          });
        } else if (data.status == 1 && data.message ) {
          $(elMessage).html('<div class="alert alert-success alert-dismissible fade show">'+ data.message +'</div>');
        }
      },
      error: function(res) {
        let response = JSON.parse(res.responseText);
        $(elMessage).html('<div class="alert alert-danger alert-dismissible fade show">'+ response.message +'</div>');
      }
    });
  });

});
