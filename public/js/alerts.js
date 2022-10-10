
$('.send_save_employees').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro que deseas guardar y enviar el personal sorteado?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#144578',
        cancelButtonColor: '#144578',
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire({
                title: 'Enviando personal sorteado.',
                iconHtml: '<img src="../img/2.svg">',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
        }
    })
});

