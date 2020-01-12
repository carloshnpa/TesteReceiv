$('#cep').change(event => {
    var cep = event.currentTarget.value;
    var xmlReq = new XMLHttpRequest();
    xmlReq.open('GET', `https://viacep.com.br/ws/${cep}/json/`);
    xmlReq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            infos = JSON.parse(xmlReq.responseText);
            try {
                $('#cidade').val(infos.localidade);
                $('#endereco').val(infos.logradouro);
                // $('select[name="state"]').val(infos.uf).change();
            } catch (erro) {
                console.error(erro)
            }
        }
    }
    xmlReq.send();
})