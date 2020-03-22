require('./bootstrap');

$(document).ready(function () {

  // $('#sidebar-menu').metisMenu();

  $('textarea.ckeditor').each(function() {
    CKEDITOR.replace( this.id );
  });

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $('.dataTables').DataTable({
    responsive: true
  });

  $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
  });

  $('.js-change-term').on('change', function() {
    let termId = $(this).val();
    let elTerm = $(this);
    let elForm = $(this).closest('form');
    let elCategory = $('select[name="category_id"]', elForm);
    let urlGetCategoryByTerm = 'category-by-term/' + termId;
    $.get(urlGetCategoryByTerm, function(response) {
      if (response && response.length > 0) {
        elCategory.html('');
        $.each(response, function(index, item) {
          elCategory.append('<option value="'+ item.ID +'">'+ item.name +'</option>');
        });
      } else {
        elCategory.html('<option value="-1">Không có dữ liệu</option>');
      }
    });
  });

  $('.js-change-category').on('change', function() {
    let categoryID = $(this).val();
    let elForm = $(this).closest('form');
    let elTerm = $('select[name="term_id"] > option', elForm);
    let urlGetTermByCategory = 'term-by-category/' + categoryID;
    $.get(urlGetTermByCategory, function(response) {
      if (response) {
        $.each(elTerm, function(index, item) {
          console.log(response, $(item).val())
          if (response.ID == $(item).val()) {
            console.log('secledtd')
            $(item).prop('selected', true);
          }
        });
      } else {
        elTerm.html('<option value="-1">Không có dữ liệu</option>');
      }
    });
  });

  $('input:radio[name="change_password"]').on('change',function(){
		if(this.checked && this.value == 0)
			$('.disabled-field').attr('disabled',true);
		else
			$('.disabled-field').attr('disabled',false);
  });

  $('input[name="role"]').on('change',function(){
		if(this.checked && this.value == 0)
			$(this).prop('checked',true);
		else
			$(this).attr('checked',false);
	});
});
