var studentjs = function () {
    var _componetnDataTable = function () {
        $('.datatable-student').DataTable({
            autoWidth: false,
            bLengthChange: true,
            bSort: false,
            scrollX: true,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                emptyTable: 'Tak ada data yang tersedia pada tabel ini',
                loadingRecords: '<i class="icon-spinner4 spinner"></i> Memuat data...',
                info: 'Menampilkan _START_ - _END_ Total _TOTAL_ entri',
                search: '_INPUT_',
                binfo: false,
                orderable: false,
                searchPlaceholder: 'Pencarian...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') === 'rtl' ? '&rarr;' : '&larr;' }
            },
            columnDefs : [
                {className: 'text-center', targets: 0},
                {className: 'text-center', targets: 1},
                {className: 'text-center', targets: 2},
                {className: 'text-center', targets: 3},
                {className: 'text-center', targets: 4},
                {className: 'text-center', targets: 5},
                {className: 'text-center', targets: 6},
                {className: 'text-center', targets: 7}
            ],
            ajax: ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/siswa',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type' : 'data',
                    '_data' : 'all'
                }
            })
        }).on('click', '.btn-detail', function (e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/kesiswaan/siswa',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'data',
                    '_data': 'student',
                    'student_id': student_id,
                },
                success : function (resp) {
                    $('#student_id').val(resp.student_id)
                    $('#student_name').val(resp.student_name)
                    $('#student_nisn').val(resp.student_nisn)
                    $('#student_nism').val(resp.student_nism)
                    $('#student_nik').val(resp.student_nik)
                    $('#student_place_birth').val(resp.student_place_birth)
                    $('#student_birthday').val(resp.student_birthday)
                    $('#student_religion').val(resp.student_religion).trigger('change')
                    $('#student_citizen').val(resp.student_citizen).trigger('change')
                    $('#student_gender').val(resp.student_gender).trigger('change')
                    $('#student_hobby').val(resp.student_hobby).trigger('change')
                    $('#student_future').val(resp.student_future).trigger('change')
                    $('#student_place_sibling').val(resp.student_place_sibling)
                    $('#student_sibling').val(resp.student_sibling)
                    $('#student_paud').val(resp.student_paud).trigger('change')
                    $('#student_tk').val(resp.student_tk).trigger('change')
                    $('#student_absen').val(resp.student_absen)
                    $('#student_date_entry').val(resp.student_date_entry)
                    $('#student_high').val(resp.student_high)
                    $('#student_weight').val(resp.student_weight)
                    $('#student_head_cir').val(resp.student_head_cir)
                    $('#student_im_hepatitis').val(resp.student_im_hepatitis).trigger('change')
                    $('#student_im_folio').val(resp.student_im_folio).trigger('change')
                    $('#student_im_bcg').val(resp.student_im_bcg).trigger('change')
                    $('#student_im_campak').val(resp.student_im_campak).trigger('change')
                    $('#student_im_dpthbhib').val(resp.student_im_dpthbhib).trigger('change')

                    $('#place_type').val(resp.place.place_type).trigger('change')
                    $('#place_address').html(resp.place.place_address)
                    $('#province_code').append('<option value"${resp.place.province_code}" selected>'+resp.place.province_name+'</option>');
                    $('#distric_code').append('<option value"${resp.place.distric_code}" selected>'+resp.place.distric_name+'</option>');
                    $('#modal-detail').modal('show');
                }
            });
        }).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/siswa',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'delete',
                    'student_id': student_id,
                },
                success: function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('.datatable-student').DataTable().ajax.reload();
                }
            });
        })
    }

    var _componentDateTime = function () {
        $('.daterange-time').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    }

    var _componentSelect = function () {
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });

        $('.select').select2({
            minimumResultsForSearch: Infinity,
        });

        $('#province_code').select2({
            ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/master/propinsi',
                dataType: 'json',
                type: 'get',
                processResults: function (data) {
                    return {
                        results: data
                    }
                },
                cache: true
            },
            minimumResultsForSearch: -1
        });

        $('#class_id').select2({
            ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/siswa',
                dataType: 'json',
                type: 'post',
                data: {
                    _type: 'data',
                    _data: 'class'
                },
                processResults: function (data) {
                    return {
                        results: data
                    }
                },
                cache: true
            },
            minimumResultsForSearch: -1
        });
    }

    var _componentUniform = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400',
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas terpilih'
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
            fd.append('_data', 'upload');
            fd.append('class_id', $('#class_id').val());
            fd.append('data_student', files);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/siswa',
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
                    $('#class_id').html('');
                    $('#data_student').val('');
                    $('.datatable-student').DataTable().ajax.reload();
                },
            });
        })
    }

    var _componentSubmit = function () {
        $('#submit').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/siswa',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'update',
                    'student_id' : $('#student_id').val(),
                    'student_name' : $('#student_name').val(),
                    'student_nisn' : $('#student_nisn').val(),
                    'student_nism' : $('#student_nism').val(),
                    'student_class' : $('#student_class').val(),
                    'student_place_birth' : $('#student_place_birth').val(),
                    'student_birthday' : $('#student_birthday').val(),
                    'student_gender' : $('#student_gender').val(),
                    'student_address' : $('#student_address').val(),
                    'student_parent' : $('#student_parent').val()
                },
                success: function (resp) {
                    $('#modal-edit').modal('hide')
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('.datatable-student').DataTable().ajax.reload();
                }
            });
        });
    }

    var _componentSortable = function() {
        $('.accordion-sortable').sortable({
            connectWith: '.accordion-sortable',
            items: '.card',
            helper: 'original',
            cursor: 'move',
            handle: '[data-action=move]:not(.disabled)',
            revert: 100,
            containment: '.content',
            forceHelperSize: true,
            placeholder: 'sortable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            start: function(e, ui){
                ui.placeholder.height(ui.item.outerHeight());
            }
        });

        $('.collapsible-sortable').sortable({
            connectWith: '.collapsible-sortable',
            items: '.card',
            helper: 'original',
            cursor: 'move',
            handle: '[data-action=move]:not(.disabled)',
            revert: 100,
            containment: '.content',
            forceHelperSize: true,
            placeholder: 'sortable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            start: function(e, ui){
                ui.placeholder.height(ui.item.outerHeight());
            }
        });
    };


    return {
        init: function() {
            _componetnDataTable();
            _componentSelect();
            _componentDateTime();
            _componentUniform();
            _componentUpload();
            _componentSubmit();
            _componentSortable();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    studentjs.init();
});
