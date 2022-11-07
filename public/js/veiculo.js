async function excluir(botao) {
    let id = $(botao).data('veiculo');
    if (await modalConfirmacao('Tem certeza de que deseja excluir este veículo?')) {
        $.ajax({
            type: 'DELETE',
            url: '/veiculos/' + id,
            success: function () {
                $(botao).parents('tr').first().remove();
            },
            error: function (data) {
                alert(data.resposeJSON?.message);
            }
        });
    }
}

async function modalConfirmacao(texto) {
    return new Promise((resolve, reject) => {
        $('#modalConfirmacao .modal-body').html(texto);
        $('#modalConfirmacao').off();
        $('#modalConfirmacao').data('confirma', false);
        $('#modalConfirmacao').modal('show');
        $('#modalConfirmacao').on('hidden.bs.modal', function () {
            if ($('#modalConfirmacao').data('confirma') == true) {
                resolve();
            }

            reject();
        });
    })
    .then(() => { return 1; })
    .catch(() => { return 0; });
}

function confirmar() {
    $('#modalConfirmacao').data('confirma', true);
    $('#modalConfirmacao').modal('hide');
}

function salvar(event) {
    event.preventDefault();
    let form = event.target;
    let formData = new FormData(form);

    $.ajax({
        type: form.method,
        url: form.action,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            alert('Veículo salvo com sucesso!');
            location = '/';
        },
        error: function (data) {
            alert(data.responseJSON?.message);
        }
    })
}

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
