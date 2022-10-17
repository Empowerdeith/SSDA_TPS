function checkEmails(emailAddress){
    var res =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return res.test(emailAddress);
}
$('.send_save_employees').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    var mail_tester = $("input[name='mail_form']").val();
    //console.log(checkEmails(mail_tester));
    if(checkEmails(mail_tester)){
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
                    showConfirmButton:false,
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
            }
        })
    }
    else{
        Swal.fire({
            icon: 'error',
            title: 'El formato del correo es inválido.'
        });
    }
});


