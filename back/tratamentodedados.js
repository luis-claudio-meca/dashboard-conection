$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 1 },
    dataType: "json",
    success: function (res) {
        let data = res;
        Criar(data);
    },

});

$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 6 },
    dataType: "json",
    success: function (res) {
        document.getElementById("loading").style.display = 'none';
        document.getElementById("indicerealizados").innerText = res.total
        document.getElementById("naorealizados").innerText = res.nao_atendidos
        document.getElementById("realizados").innerText = res.atendidos


    },

});

async function nextJS(n){
    let opcionselect = document.getElementById("inputGroupSelect01");
    values = [1,13,12];
    var data
 return $.ajax({
        url: "back/local.php",
        type: "POST",
        data: { opcion: values[opcionselect.value], limite: 10*n },
        dataType: "json",
        success: function (res) {
             data = res;
            Criar(data);
            
        },
    }).then(()=>{
        return data.length<1?true:false;
    })

   
}

 function Criar(data) {
   
    document.getElementById("root-1").innerHTML = " ";

    data.forEach(element => {

            document.getElementById("root-1").innerHTML += `
        <div id="`+ element.id + `" class="card shadow lift o-hidden d-flex col-xl-3 col-lg-5 col-sm-10 col-md-10" style="margin: 10px;">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 mb-2">
                                                <div class="h5 mb-0 font-weight-bold ">`+ element.name + `</div>
                                            </div>
                                            <div class="col-auto dropdown">

                                                    <i class="fa fa-address-card fa-3x fa-3x text-dark " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a type="button" onclick="Modal('` + element.id + ` ')" class="dropdown-item edit" data-toggle="modal" data-target="#modalExemplo">Editar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg></a>
                                                        <a type="button" onclick="Delete('` + element.id + ` ')" class="dropdown-item del" >Deletar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                      </svg></a>
                                                    </div>
                                            </div>
                                        </div>
                                        <h6 class="card-subtitle mb-2 text-muted">`+ element.phone + `</h6>
                                        <p class="card-text">
                                        <strong>Data:</strong> `+ FormataData(element.data) + `<br> 
                                        <strong>Culto:</strong> ` + element.culto + `<br>
                                        <strong>Idade:</strong> ` + element.idade + ` / <strong>Sexo:</strong> ` + element.sexo + `<br>
                                        <strong>Estado Civil:</strong> ` + element.civil + ` / <strong>Bairro:</strong> ` + element.bairro + `<br>
                                        <strong>Aceitou/Reconciliou com Jesus hoje:</strong> ` + element.aceitou + `<br>
                                        <strong>Está Visitando:</strong>  ` + element.visita + `<br>
                                        <strong>Quer se envolver:</strong> ` + element.queromais + `<br>
                                        <strong>Como conheceu a igreja:</strong> ` + element.conhecer + `<br>
                                        <strong>Proximo passo:</strong> ` + element.mais + `<br>
                                        <strong>Voluntário:</strong> ` + element.voluntario + `<br>
                                        <strong>Frequenta alguma igreja?:</strong> ` + (element.algumaigreja == 1?'Sim':'Não') + ` 
                                        <strong>Qual?</strong> ` + (element.qualigreja != 'Nenhuma'?element.qualigreja:'') + `</p>
                                        <button class="text-white `+ element.id + `" onClick="Atendido(` + element.id + `)">Atendido</button>
                                    </div>
                                </div>
        `;
        if (element.status == 1)
            Cor(element.id);
    });
}

function FormataData(props) {
 
    data = new Date(props)
    var dia = data.getDate() + 1;
    var mes = (data.getMonth() + 1);
    var ano = data.getFullYear();
    if (dia.toString().length == 1) dia = '0' + dia;
    if (mes.toString().length == 1) mes = '0' + mes;
    return dia + '/' + mes + '/' + ano;

}

function Atendido(id){

$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 2, id: id },
    dataType: "json",
    success: function (res) {
        Cor(id);
    },

});

}

function Cor(id) {
    card_cor = document.getElementById(id);

    botton = document.getElementsByClassName(id);
    $(botton).prop('disabled', true);
    botton[0].style.backgroundColor = '#5A5757';
    botton[0].style.color = "#000";
    card_cor.setAttribute('class', "card bg-info text-light shadow lift o-hidden d-flex col-xl-3 col-lg-5 col-sm-10 col-md-10");

}

document.getElementById("inputGroupSelect01").addEventListener("change", () => {
    let opcionselect = document.getElementById("inputGroupSelect01");
    currentTab = 0;
    values = [1,13,12];
    $.ajax({
        url: "back/local.php",
        type: "POST",
        data: { opcion: values[opcionselect.value], limite: 0 },
        dataType: "json",
        success: function (res) {
            let data = res;
            Criar(data);
        },
    
    });
});


function Modal(id) {
    document.getElementById("root").innerHTML =
        `
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Atualizar Dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-self-center">
      <div class="col-lg-10 ">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Data</span>
        </div>
        <input type="text" id="data" class="form-control `+ id + `" aria-label="Default" aria-describedby="inputGroup-sizing-default">
     </div>

     

     <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Nome</span>
        </div>
        <input type="text" class="form-control"  id="nome"
                        placeholder="Seu Nome..." required>
        </div>

     <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Sexo</span>
        </div>
        <select id="sexo" class="form-control">
                            <option selected>Selecionar...</option>
                            <option>Masculino</option>
                            <option>Feminino</option>
                        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Idade</span>
        </div>
        <input type="number" class="form-control" id="idade"  aria-describedby="idade"
                            placeholder="Sua Idade" required>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Estado Civil</span>
        </div>
        <select id="civil"  class="form-control">
                            <option selected>Selecionar...</option>
                            <option>Solteiro</option>
                            <option>Casado</option>
                            <option>Divorciado</option>
                            <option>Viúvo</option>
                        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Telefone</span>
        </div>
        <input type="text" class="form-control" 
                            data-mask="(00) 00000-0000" maxlength="15" autocomplete="off" id="phone">
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text " >Bairro</span>
        </div>
        <input type="text" class="form-control"  id="bairro" name="bairro"
                        placeholder="Seu Bairro..." required>
        </div>
                
      <small id="erro-upmetas" class="text-danger" style="font-size: 1rem; font-style: bold; display:none;">
      Preencha os campos vazios!
      </small> 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="fechamodal">Fechar</button>
        <button type="button" class="btn btn-success" onclick = "Upmodal('`+ id + `')">Salvar</button>
      </div>
    </div>
  </div>
</div>`;
    $.ajax({
        url: "back/local.php",
        type: "POST",
        data: { opcion: 3, id: id },
        dataType: "json",
        success: function (res) {
            res = res[0];

            document.getElementById("data").value = res.data;
            document.getElementById("nome").value = res.name;
            document.getElementById("sexo").value = res.sexo;
            document.getElementById("idade").value = res.idade;
            document.getElementById("civil").value = res.civil;
            document.getElementById("phone").value = res.phone;
            document.getElementById("bairro").value = res.bairro;
        },
    });




}

function Upmodal(id) {

    let data = document.getElementById("data").value;

    let nome = document.getElementById("nome").value;
    let sexo = document.getElementById("sexo").value;
    let idade = document.getElementById("idade").value;
    let civil = document.getElementById("civil").value;
    let phone = document.getElementById("phone").value;
    let bairro = document.getElementById("bairro").value;

    let obj = {
        data: data,

        nome: nome,
        sexo: sexo,
        idade: idade,
        civil: civil,
        phone: phone,
        bairro: bairro,
        opcion: 4,
        id: id
    }

    if (
        data == '' ||
        nome == '' ||
        sexo == '' ||
        idade == '' ||
        civil == '' ||
        phone == '' ||
        bairro == ''
    ) {
        Swal.fire({
            title: 'Opa!',
            text: "Preencha os campos vazios!",
            type: 'error',
            showConfirmButton: false,
            timer: 3000,
        });
    }
    else {
        $.ajax({
            url: "back/local.php",
            method: "POST",
            data: obj,
            dataType: "JSON",
            success: function (result) {
                Swal.fire({
                    title: 'Obrigado!',
                    text: "Dados atualizados com sucesso",
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                });

                document.getElementById("fechamodal").click();

                
                Criar(result);




            }
        });

    }

}

function Delete(id) {
    Swal.fire({
        title: 'Deletar',
        text: "Deseja excluir esse dado?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Não'
        }).then((result) =>{
              if (result.value) {
                $.ajax({
                    url: "back/local.php",
                    method: "POST",
                    data: {opcion : 5, id: id},
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            title: 'Obrigado!',
                            text: "Dados deletados com sucesso",
                            type: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                        });
            
                        Criar(data);
                    }
                });
              } 
    });





}


