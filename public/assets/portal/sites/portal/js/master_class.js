var classjs = function () {
    var _componetnDataTable = function () {
        $('.datatable-class').DataTable({
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
                {className: 'text-center', targets: 4}
            ],
            ajax: ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/kelas',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type' : 'data',
                    '_data' : 'all '
                }
            })
        }).on('click', '.btn-edit', function (e) {
            e.preventDefault();
            var class_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/kesiswaan/kelas',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'data',
                    '_data': 'class',
                    'class_id': class_id,
                },
                success : function (resp) {
                    $('#class_id').val(resp.class_id);
                    $('#class_level').html('<option value="'+resp.class_level+'">'+resp.class_level+'</option>');
                    $('#class_major').html('<option value="'+resp.class_major+'">'+resp.class_major+'</option>');
                    $('#class_name').val(resp.class_name);
                    $('#submit').val('update');
                }
            });
        }).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var class_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/kelas',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'delete',
                    'class_id': class_id,
                },
                success: function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('.datatable-class').DataTable().ajax.reload();
                }
            });
        })
    }

    var _componentSelect = function () {
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
        $('#class_level').select2({
            ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/kelas',
                dataType: 'json',
                type: 'post',
                data: {
                    _type: 'data',
                    _data: 'level'
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
        $('#class_major').select2({
            ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/kelas',
                dataType: 'json',
                type: 'post',
                data: {
                    _type: 'data',
                    _data: 'major'
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

    var _componentSubmit = function () {
        $('#submit').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kesiswaan/kelas',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': $('#submit').val(),
                    'class_id' : $('#class_id').val(),
                    'class_level' : $('#class_level').val(),
                    'class_major' : $('#class_major').val(),
                    'class_name' : $('#class_name').val()
                },
                success: function (resp) {
                    $('#modal-edit').modal('hide')
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('#submit').val('store');
                    $('#class_id').val('');
                    $('#class_level').html('');
                    $('#class_major').html('');
                    $('#class_name').val('');
                    $('.datatable-class').DataTable().ajax.reload();
                }
            });
        });
    }

    return {
        init: function() {
            _componetnDataTable();
            _componentSelect();
            _componentSubmit();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    classjs.init();
});
