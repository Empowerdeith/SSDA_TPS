function checkEmails(emailAddress){
    var res =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return res.test(emailAddress);
}
$('.send_save_employees').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");

    event.preventDefault();
    //console.log(checkEmails(mail_tester));
    //if(checkEmails(mail_tester)){
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
                showConfirmButton:false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                },
            });
        }
    })
    //}
    /*else{
        Swal.fire({
            icon: 'error',
            title: 'El formato del correo es inválido.'
        });
    }*/
});
$('.delete_users').click(function(event) {
    var form2 =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro que deseas Eliminar a este Usuario?',
        text: 'Se eliminará al usuario de forma permanente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#144578',
        cancelButtonColor: '#144578',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            form2.submit();
        }
    })
});

$(function(){
    $("#email-addresses").multiEmails();
});

$("form").keypress(function(e){
    if(e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
})
