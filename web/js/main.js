$(document).ready(function () {

    var main = {
        tooltips: function () {
            $('[data-toggle="tooltip"]').tooltip()
        },
    };

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $('#j-modal-detail').on('shown.bs.modal', function (e) {
        $('#j-sukses-alert').hide();
    });

    $('#j-modal-detail').on('hidden.bs.modal', function (e) {
        var form = $(this).find('form');
        form.clearForm();//reset form
        var date = new Date();
        $(form).find('#detailmodel-tgl').val(date.toISOString().slice(0, 10).replace(/-/g, "-"));//isi input tgl default hari ini
        $(form).find('.j-form-todelete').remove();//buang inputan tambahan

        //buang pesan error
        var input = $(form).find('input[type="text"]');
        $(input).each(function (index, obj) {
            $(this).closest('.form-group').removeClass('has-error');
            $(this).siblings('.help-block').removeClass('help-block-error').html('');
        });
    })

    $(document).on('click', '.j-tambah-input', function () {
        $("#clone").children().clone().appendTo("#j-tempel-clone").hide().slideDown("slow");
        main.tooltips();
    })
    $(document).on('click', '.j-delete-form', function () {
        that = $(this).closest('.j-form-todelete');
        that.slideUp("slow", function () {
            that.remove();
        });
    })

    //klik tombol simpan utk tambah data pengeluaran
    var busy = false;
    $(document).on('click', '.j-submit-form', function () {
        if (busy) {
            return false;
        }
        var form = $(this).closest('form')
        var data = form.serializeArray('DetailModel');
        var url = form.attr('action');
        var input = $(form).find('input[type="text"]');

        var input_benar = true;
        $(input).each(function (index, obj) {
            if ($(this).val() == "") {
                $(this).closest('.form-group').addClass('has-error');
                $(this).siblings('.help-block').addClass('help-block-error').html('inputan tidak boleh kosong');
                input_benar = false;
            } else {
                $(this).closest('.form-group').removeClass('has-error');
                $(this).siblings('.help-block').removeClass('help-block-error').html('');
            }
        });
        if (!input_benar)
            return false;
        busy = true;

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            dataType: 'JSON',
            success: function (result) {
                // alert(result.msg);
                if (result.status) {
                    $('#j-modal-detail').modal('hide');
                    $('#j-sukses-alert').show();
                    $.pjax.reload({container: '#pjax-detail'});
                }
                busy = false;
            },
            error: function (result, e) {
                alert("Terjadi kesalahan server");
                busy = false;
            }
        });
        return false;
    })

    //format angka yg diinput user(mencegah karakter titik)
    $(document).on('blur', ".j-format-biaya", function () {
        var number = $(this).parseNumber({format: "#,###", locale: "de"});
        $(this).formatNumber({format: "#,###", locale: "de"});
        $(this).siblings(".j-biaya-value").val(number);
    });

    // fungsi untuk reset form
    $.fn.clearForm = function () {
        return this.each(function () {
            var type = this.type, tag = this.tagName.toLowerCase();
            if (tag == 'form')
                return $(':input', this).clearForm();
            if (type == 'hidden' || type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    };

    $(document).on('click', '.j-delete', function () {
        if (confirm('Anda yakin akan menghapus data ini?')) {
            var url = $(this).attr('href');
            var id = $(this).attr('data-id');
            $.ajax({
                url: url,
                data: {id:id},
                type: 'POST',
                dataType: 'JSON',
                success: function (result) {
                    if (result.status) {
                        $('#j-delete-alert').show();
                        $.pjax.reload({container: '#pjax-detail'});
                    }else{
                        alert(result.msg);                        
                    }
                },
                error: function (result, e) {
                    alert("Terjadi kesalahan server");
                }
            });
        }
        return false;
    })


})