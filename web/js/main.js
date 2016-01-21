$(document).ready(function(){

	var main = {
		tooltips : function(){
			$('[data-toggle="tooltip"]').tooltip()
		},
	};
	
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",		
	    autoclose: true,

	});

	$('#j-modal-detail').on('hidden.bs.modal', function (e) {
		var form = $(this).find('form');	
		form.clearForm();//reset form
		var date = new Date();
		$(form).find('#detailmodel-tgl').val(date.toISOString().slice(0,10).replace(/-/g,"-"));
		$(form).find('.j-form-todelete').remove();//buang jika ada inputan tambahan
		
		//buang pesan error
		var input = $(form).find('input[type="text"]');
		$(input).each(function(index, obj){
			$(this).closest('.form-group').removeClass('has-error');
			$(this).siblings('.help-block').removeClass('help-block-error').html('');
		});
	})

	$(document).on('click','.j-tambah-input',function(){
		$("#clone").children().clone().appendTo("#j-tempel-clone").hide().slideDown( "slow" );
		main.tooltips();
	})
	$(document).on('click','.j-delete-form',function(){
		that = $(this).closest('.j-form-todelete');
		that.slideUp( "slow",function(){
			that.remove();
		} );
	})
	
	//klik tombol simpan utk tambah data pengeluaran
	var busy = false;
	$(document).on('click','.j-submit-form',function(){
		if(busy){
			//return false;
		}
		var form = $(this).closest('form')
		var data = form.serializeArray('DetailModel');
		var url = form.attr('action');
		var input = $(form).find('input[type="text"]');
		
		var input_benar = true;
		$(input).each(function(index, obj){
			if($(this).val()==""){
				$(this).closest('.form-group').addClass('has-error');
				$(this).siblings('.help-block').addClass('help-block-error').html('inputan tidak boleh kosong');
				input_benar = false;				
			}else{
				$(this).closest('.form-group').removeClass('has-error');
				$(this).siblings('.help-block').removeClass('help-block-error').html('');
			}
		});
		if(!input_benar) return false;		
		busy = true;
		
		$.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (result) {
				$('#j-modal-detail').modal('hide')
				busy = false;
            },
        });
		return false;
	})

	//format angka yg diinput user(mencegah karakter titik)
    $(document).on('blur',".j-format-biaya",function(){ 
        var number = $(this).parseNumber({format:"#,###", locale:"de"});
        $(this).formatNumber({format:"#,###", locale:"de"});
        $(this).siblings(".j-biaya-value").val(number);
    });

    // fungsi untuk reset form
    $.fn.clearForm = function() {
	  return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
	    if (tag == 'form')
	      return $(':input',this).clearForm();
	    if (type == 'hidden' || type == 'text' || type == 'password' || tag == 'textarea')
	      this.value = '';
	    else if (type == 'checkbox' || type == 'radio')
	      this.checked = false;
	    else if (tag == 'select')
	      this.selectedIndex = -1;
	  });
	};


})