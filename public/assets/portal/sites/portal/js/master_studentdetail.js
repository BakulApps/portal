var studentdetailjs = function () {

    var _componentUniform = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400',
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas terpilih'
        });
    }

    var _componentModal = function () {
        $('#student_place').click(function (){
            $('#modal-title').html('Unggah Informasi Tempat Tinggal');
            $('#_data').val('student_place')
            $('#modal-upload').modal('show');
        });
        $('#student_parent').click(function (){
            $('#modal-title').html('Unggah Informasi Orang Tua');
            $('#_data').val('student_parent')
            $('#modal-upload').modal('show');
        });
        $('#parent_place').click(function (){
            $('#modal-title').html('Unggah Informasi Tempat Tinggal Orang Tua');
            $('#_data').val('place_parent')
            $('#modal-upload').modal('show');
        });
        $('#student_scholarship').click(function (){
            $('#modal-title').html('Unggah Informasi Bantuan Siswa');
            $('#_data').val('student_scholarship')
            $('#modal-upload').modal('show');
        });
        $('#student_school').click(function (){
            $('#modal-title').html('Unggah Informasi Sekolah Sebelumnya');
            $('#_data').val('student_school')
            $('#modal-upload').modal('show');
        });
    }

    var _componentUpload = function () {
        $('#store').click(function () {
            $('#modal-upload').modal('hide');
            var notice = new PNotify({
                text: "Mengunggah...",
                addclass: 'bg-primary border-primary',
                type: 'info',
                icon: 'icon-spinner4 spinner',
                hide: false,
                buttons: {
                    closer: false,
                    sticker: false
                },
                opacity: .9,
                width: "200px"
            });
            var fd = new FormData();
            var files = $('#data_student')[0].files[0];
            fd.append('_type', 'data');
            fd.append('_data', $('#_data').val());
            fd.append('data_student', files);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/siswadetail',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(resp){
                    var options = {
                        title: resp.title,
                        addclass: 'alert bg-'+resp.class+' border-'+resp.class+' alert-styled-left',
                        type: resp.class,
                        icon: false,
                        hide: true,
                        text: resp.text,
                        buttons: {closer: true, sticker: true},
                        opacity: 1,
                        width: PNotify.prototype.options.width,
                    };
                    notice.update(options);
                    $('#modal-title').html('');
                    $('#_data').val('');
                    $('#data_student').val('');
                },
            });
        })
    }

    return {
        init: function() {
            _componentUniform();
            _componentModal();
            _componentUpload();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    studentdetailjs.init();
});
