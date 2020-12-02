var paymentjs = function () {
    var _componetnDataTable = function () {
        $('.datatable-payment').DataTable({
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
                {className: 'text-center', targets: 5}
            ],
            ajax: ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/keuangan/pembayaran',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type' : 'data',
                    '_data' : 'all '
                }
            })
        }).on('click', '.btn-edit', function (e) {
            e.preventDefault();
            var payment_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/keuangan/pembayaran',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'data',
                    '_data': 'payment',
                    'payment_id': payment_id,
                },
                success : function (resp) {
                    $('#payment_id').val(resp.payment_id);
                    $('#payment_level').html('<option value="'+resp.payment_level+'">'+resp.payment_level+'</option>').prop('disabled', 'disabled');
                    $('#payment_name').val(resp.payment_name);
                    $('#payment_kind').val(resp.payment_kind).trigger('change');
                    $('#payment_price').val(resp.payment_price);
                    $('#submit').val('update');
                }
            });
        }).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var payment_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/keuangan/pembayaran',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'delete',
                    'payment_id': payment_id,
                },
                success: function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('.datatable-payment').DataTable().ajax.reload();
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

        $('.select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
        });

        $('#payment_level').select2({
            ajax: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/keuangan/pembayaran',
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
    }

    var _componentSubmit = function () {
        $('#submit').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/keuangan/pembayaran',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': $('#submit').val(),
                    'payment_id' : $('#payment_id').val(),
                    'payment_level' : $('#payment_level').val(),
                    'payment_name' : $('#payment_name').val(),
                    'payment_kind' : $('#payment_kind').val(),
                    'payment_price' : $('#payment_price').val()
                },
                success: function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                    $('#submit').val('store');
                    $('#payment_id').val('');
                    $('#payment_level').html('').prop('disabled', false);
                    $('#payment_name').val('');
                    $('#payment_kind').val('').trigger('change');
                    $('#payment_price').val('');
                    $('.datatable-payment').DataTable().ajax.reload();
                }
            });
        });
    }

    var _componentCheckBox = function () {
        $('.form-check-input-styled-primary').uniform({
            wrapperClass: 'border-primary-600 text-primary-800'
        });
    }

    return {
        init: function() {
            _componetnDataTable();
            _componentSelect();
            _componentSubmit();
            _componentCheckBox();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    paymentjs.init();
});
