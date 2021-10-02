$(function(){
    $('.tambahKategori').on('click',function(){
        
        $('#newKategoriModalLabel'). html('Buat Kategori');
        $('.modal-footer button[type=submit]').html(' Simpan')
    });

    $('.tampilModalUbah').on('click',function(){
        
        $('#newKategoriModalLabel'). html('Ubah Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data')

        const id=$(this).data('id');
       
        $.ajax({
            url:'http://localhost/WBS/master/ubahkategori/',
            data:{id : id},
            method: 'post',
            
            success: function(data){
                console.log(data);

            }
        });
    });


});