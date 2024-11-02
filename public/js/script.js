// menggantikan method ready --- jika dokumen sudah siap, jalankan fungsi

// # untuk id
// . untuk class

$(function(){

$('#tombolCari').hide();


$('.tambahData').on('click',function() {
    $('#judulModal').html('Tambah Data Barang')
    $('.modal-footer button[type=submit]').html('Tambah Data')

});

$('.showEditModal').on('click', function() {
    $('#judulModal').html('Edit Data Barang')
    $('.modal-footer button[type=submit]').html('Edit Data')
    $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/inventory/edit')

    const id = $(this).data('id');
    
    $.ajax({
        url: 'http://localhost/phpmvc/public/inventory/getedit',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('#produk').val(data.produk);
            $('#kategori').val(data.kategori);
            $('#harga').val(data.harga);
            $('#stock').val(data.stock);
            $('#id').val(data.id);
        }

    });


});

});
