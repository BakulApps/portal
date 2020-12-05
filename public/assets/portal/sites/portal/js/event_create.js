var postcreate = function () {
    var csrf_token = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

    var _componentSubmit = function () {
        $("#submit").click(function () {
            var fd      = new FormData();
            var image   = $('#event_image')[0].files[0];

            fd.append('_type', 'create');
            if (image !== undefined){

                fd.append('event_image', image);
            }
            fd.append('event_title', $('#event_title').val());
            fd.append('event_date_start', $('#event_date_start').val());
            fd.append('event_date_end', $('#event_date_end').val());
            fd.append('event_time', $('#event_time').val())
            fd.append('event_place', $('#event_place').val());
            fd.append('event_content', $('#event_content').summernote('code'));

            $.ajax({
                headers: csrf_token,
                url : baseurl + '/acara/buat',
                type: 'post',
                dataType: 'json',
                data: fd,
                contentType: false,
                processData: false,
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    setTimeout(function (){
                        window.location.href = baseurl + '/acara'
                    }, 2000);
                }
            })
        });
    }

    var _componentDateTime = function (){
        $('#event_date_start').daterangepicker({
            singleDatePicker: true,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('#event_date_end').daterangepicker({
            singleDatePicker: true,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('#event_time').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 5,
            timePickerSeconds: false,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'HH:mm:ss'
            }
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });;
    }

    var _componentEditor = function () {
        $('#event_content').summernote({
            tabsize: 1,
            height: 100
        });
        $('.note-image-input').uniform({
            fileButtonClass: 'action btn bg-warning-400'
        });
    }

    var _componentUpload = function () {
        $('.form-control-uniform').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400',
            fileButtonHtml: 'Pilih',
            fileDefaultHtml: 'Pilih Gambar'
        }).change(function (){
            var file = $('#event_image')[0].files[0];
            var reader = new FileReader()
            reader.onload = function (){
                $('.image-view').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        });

        $('[data-popup="lightbox"]').fancybox({
            padding: 3
        });
    }

    return {
        init: function() {
            _componentSubmit();
            _componentDateTime();
            _componentEditor();
            _componentUpload();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    postcreate.init();
});
