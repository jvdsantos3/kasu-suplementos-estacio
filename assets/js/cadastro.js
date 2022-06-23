$(() => {
    mask();
});

const form = $('#form')
const nome = $('#usr_name')
const email = $('#email')
const senha = $('#senha')
const confirmSenha = $('#confirmSenha')
const telefone = $('#usr_phone')
const botao = $('.btn_enviar')

function enviarDados() {
    let dados = {
        usr_name: $('#usr_name').val(),
        usr_email: $('#usr_email').val(),
        usr_password: $('#usr_password').val(),
        usr_phone: $('#usr_phone').val(),
        usr_birthdate: $('#usr_birthdate').val(),
        usr_gender: $('#usr_gender').val(),
    }

    if (dados) {
        if (!validaDados(dados)) {
            return false;
        }


    }
}

nome.on('blur', () => {

    if (!validaNome(nome.val())) {
        nome.removeClass('is-valid').addClass('is-invalid');
    } else {
        nome.removeClass('is_invalid').addClass('is-valid');
    }
})

email.on('blur', () => {
    if (!validaEmail(email.val())) {
        email.removeClass('is-valid').addClass('is-invalid');
    } else {
        email.removeClass('is_invalid').addClass('is-valid');
    }
})

senha.on('blur', () => {
    if (!validaSenha(senha.val())) {
        senha.removeClass('is-valid').addClass('is-invalid');
    } else {
        senha.removeClass('is_invalid').addClass('is-valid')
    }
})

confirmSenha.on('blur', () => {

    if (!validaSenhas(senha.val(), confirmSenha.val())) {
        confirmSenhaconfirmSenha.val().removeClass('is-valid').addClass('is-invalid');
    } else {
        confirmSenhaconfirmSenha.val().removeClass('is_invalid').addClass('is-valid')
    }
})

telefone.on('blur', () => {

    if (!validaTel(telefone.val())) {
        telefone.removeClass('is-valid').addClass('is-invalid');
    } else {
        telefone.removeClass('is_invalid').addClass('is-valid')
    }
})

function pegaValores() {
    nomeValue = nome.val()
    emailValue = email.val()
    senhaValue = senha.val()
    confirmSenhaValue = confirmSenha.val()
    telefoneValue = telefone.val()

    return nomeValue, emailValue, senhaValue, confirmSenhaValue, telefoneValue
}

function validaEmail(emailValue) {
    var re = /\S+@\S+\.\S+/;
    return re.test(emailValue);
}

function validaSenha(senhaValue) {
    if (senhaValue.length < 8) {
        return false
    } else {
        return true
    }
}

function validaSenhas(senhaValue, confirmSenhaValue) {
    if (senhaValue === confirmSenhaValue && confirmSenhaValue.length > 1) {
        return true
    } else {
        return false
    }
}

function validaNome(nomeValue) {
    if (nomeValue.length < 1) {
        return false
    } else {
        return true
    }
}

function validaTel(telefoneValue) {
    if (telefoneValue.length < 15) {
        return false
    } else {
        return true
    }
}

function mask() {

    telefone.mask('(00) 00000-0000', {
        onKeyPress: function (tel, ev, el, op) {
            telefone.mask('(00) 00000-0000', op);
        }
    });
}