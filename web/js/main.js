$(document).ready(function(){


	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		// format: {
	 //        /*
	 //         * Say our UI should display a week ahead,
	 //         * but textbox should store the actual date.
	 //         * This is useful if we need UI to select local dates,
	 //         * but store in UTC
	 //         */
	 //        toDisplay: function (date, format, language) {
	 //            var d = new Date(date);
	 //            var monthNames = [
		// 		  "January", "February", "March",
		// 		  "April", "May", "June", "July",
		// 		  "August", "September", "October",
		// 		  "November", "December"
		// 		];
		// 		console.log(d.getFullYear());
	 //            return d.getDay()+" "+monthNames[d.getMonth()]+" "+d.getFullYear();
	 //        },
	 //        toValue: function (date, format, language) {
	 //            var d = new Date(date);
	 //            return d.getFullYear()+"-"+d.getMonth()+"-"+d.getDay();
	 //        }
	 //    },
	    autoclose: true,

	});

	$('#j-modal-detail').on('hidden.bs.modal', function (e) {
		$(this).find('form').clearForm();
		$("#j-tempel-clone").children().remove();
		$("#clone").children().clone().appendTo("#j-tempel-clone");
	})

	$(document).on('click','.j-tambah-input',function(){
		$("#clone").children().clone().appendTo("#j-tempel-clone");
	})

	$(document).on('click','.j-submit-form',function(){
		var form = $(this).closest('form').serialize('DetailModel');
		var url = $(this).closest('form').attr('action');
		$.ajax({
            url: url,
            data: form,
            type: 'POST',
            success: function (data) {

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