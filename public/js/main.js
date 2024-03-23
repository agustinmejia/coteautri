$(document).on('change','.PDFLength',function(){
    var fileName = this.files[0].name;
    var fileSize = this.files[0].size;

    if(fileSize > 100000000){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El archivo no debe superar los 100 MB!'
        })
        this.value = '';
        this.files[0].name = '';
    }
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    switch (ext) {
        case 'pdf': break;
        default:
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El archivo no tiene la extensión adecuada!'
            })
            this.value = ''; // reset del valor
            this.files[0].name = '';
    }
});