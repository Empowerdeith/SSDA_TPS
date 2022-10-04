
$('.send_save_employes').click(function(event) {

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
            window.location.href = this.href;
        }
    })
});

