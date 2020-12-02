var settingjs = function () {

    var _componentData = function () {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseurl + '/halaman',
            type: 'post',
            dataType: 'json',
            data: {
                '_type' : 'data',
                '_data' : 'page'
            },
            success: function (resp) {
                $('#home_layout_1_title').val(resp.home_layout_1_title);
                $('#home_layout_1_subtitle').val(resp.home_layout_1_subtitle);
                $('#home_layout_1_button_text').val(resp.home_layout_1_button_text);
                $('#home_layout_1_button_link').val(resp.home_layout_1_button_link);
                $('#home_layout_2_title').val(resp.home_layout_2_title);
                $('#home_layout_2_subtitle').val(resp.home_layout_2_subtitle);
                $('#home_layout_2_content').val(resp.home_layout_2_content);
                $('#home_layout_2_link').val(resp.home_layout_2_link);
                $('#home_layout_3_title').val(resp.home_layout_3_title);
                $('#home_layout_3_content').val(resp.home_layout_3_content);

                $('#profile_layout_1_title').val(resp.profile_layout_1_title);
                $('#profile_layout_1_content').val(resp.profile_layout_1_content);
                $('#profile_layout_2_visi').val(resp.profile_layout_2_visi);
                $('#profile_layout_2_structure').val(resp.profile_layout_2_structure);
                $('#profile_layout_2_student').val(resp.profile_layout_2_student);
                $('#profile_layout_2_curriculum').val(resp.profile_layout_2_curriculum);
                $('#profile_layout_2_headmaster').val(resp.profile_layout_2_headmaster);
            }
        })
    }

    var _componentSubmit = function () {
        $('#home').click(function () {
            var fd = new FormData();
            var files = $('#home_layout_1_image')[0].files[0];
            fd.append('_type', 'update');
            fd.append('_data', 'home');
            fd.append('home_layout_1_image', files);
            fd.append('home_layout_1_title', $('#home_layout_1_title').val());
            fd.append('home_layout_1_subtitle', $('#home_layout_1_subtitle').val());
            fd.append('home_layout_1_button_text', $('#home_layout_1_button_text').val());
            fd.append('home_layout_1_button_link', $('#home_layout_1_button_link').val());
            fd.append('home_layout_2_title', $('#home_layout_2_title').val());
            fd.append('home_layout_2_subtitle', $('#home_layout_2_subtitle').val());
            fd.append('home_layout_2_content', $('#home_layout_2_content').val());
            fd.append('home_layout_2_link', $('#home_layout_2_link').val());
            fd.append('home_layout_3_title', $('#home_layout_3_title').val());
            fd.append('home_layout_3_content', $('#home_layout_3_content').val());
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/halaman',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(resp){
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    return false;
                },
            });
        });
        $('#profile').click(function () {
            var fd = new FormData();
            var files = $('#profile_layout_1_image')[0].files[0];
            fd.append('_type', 'update');
            fd.append('_data', 'profile');
            fd.append('profile_layout_1_image', files);
            fd.append('profile_layout_1_title', $('#profile_layout_1_title').val());
            fd.append('profile_layout_1_content', $('#profile_layout_1_content').val());
            fd.append('profile_layout_2_visi', $('#profile_layout_2_visi').val());
            fd.append('profile_layout_2_structure', $('#profile_layout_2_structure').val());
            fd.append('profile_layout_2_student', $('#profile_layout_2_student').val());
            fd.append('profile_layout_2_curriculum', $('#profile_layout_2_curriculum').val());
            fd.append('profile_layout_2_headmaster', $('#profile_layout_2_headmaster').val());
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/halaman',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(resp){
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    return false;
                },
            });
        })
    }

    var _componentFileUpload = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas',
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400'
        })
    }

    return {
        init: function() {
            _componentData();
            _componentSubmit();
            _componentFileUpload();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    settingjs.init();
});
