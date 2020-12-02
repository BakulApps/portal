var calendarjs = function () {
    var _componetnDataTable = function () {
        $('.datatable-calendar').DataTable({
            autoWidth: false,
            bLengthChange: true,
            bSort: false,
            scrollX: true,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                emptyTable: 'Tak ada data yang tersedia pada tabel ini',
                loadingRecords: '<i class="icon-spinner4 spinner"></i> Memuat data...',
                info: 'Menampilkan _START_ Sampai _END_ Total _TOTAL_ Entri',
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
            ],
            ajax: ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/kurikulum/kalender',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type' : 'data',
                    '_data' : 'all'
                }
            })
        }).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var calendar_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/kurikulum/kalender',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'delete',
                    'calendar_id': calendar_id,
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    $('.datatable-calendar').DataTable().ajax.reload();
                }
            });
        })
    }

    var _componentSelect2 = function() {
        $('.dataTables_length  select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };

    var _componentSubmit = function () {
        $("#submit").click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/kurikulum/kalender',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': $('#submit').val(),
                    'calendar_id': $('#calendar_id').val(),
                    'calendar_event': $('#calendar_event').val(),
                    'calendar_start': $('#calendar_start').val(),
                    'calendar_end': $('#calendar_end').val()
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    $('.title-add').html('TAMBAH DATA');
                    $('#submit').val('store');
                    $('#calendar_id').val('')
                    $('#calendar_event').val('')
                    $('#calendar_start').val('')
                    $('#calendar_end').val('');
                    $('.datatable-calendar').DataTable().ajax.reload();
                }
            })
        })
    }

    var _componentDatePicker = function () {
        $('.daterange-single').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD/MM/Y'
            }
        });
    }

    return {
        init: function() {
            _componetnDataTable();
            _componentSelect2();
            _componentSubmit();
            _componentDatePicker();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    calendarjs.init();
});
