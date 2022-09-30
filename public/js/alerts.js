
$('#send_save_employes').click(function(event) {
    var link = $('#send_save_employes');

    event.preventDefault();

    Swal.fire({
        title: '¿Estás seguro que deseas guardar y enviar el personal sorteado?',
        text: "Test",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#144578',
        cancelButtonColor: '#144578',
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            /*Swal.fire(
                'Enviado!',
                'Se han enviado.',
                'success'
            )*/
            window.location.href = this.href;
        }
    })
});

