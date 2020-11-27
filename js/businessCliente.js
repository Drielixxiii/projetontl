function gravaCliente(cliente, callback) {
  $.ajax({
    url: "js/sqlscopeCliente.php",
    dataType: "html", //tipo do retorno
    type: "post", //metodo de envio
    data: { funcao: "grava", cliente: cliente }, //valores enviados ao
    success: function (data) {
      callback(data);
    },
  });
}

// function gravaCliente(cliente, callback) {
//   $.ajax({
//     url: "js/sqlscopeCliente.php",
//     dataType: "html", //tipo do retorno
//     type: "post", //metodo de envio
//     data: { funcao: "grava", cliente: cliente }, //valores enviados ao script
//     beforeSend: function () {
//       //função chamada antes de realizar o ajax
//     },
//     complete: function () {
//       //função executada depois de terminar o ajax
//     },
//     success: function (data, textStatus) {
//       if (data.indexOf("sucess") < 0) {
//         var piece = data.split("#");
//         var mensagem = piece[1];
//         if (mensagem !== "") {
//           smartAlert("Atenção", mensagem, "error");
//         } else {
//           smartAlert(
//             "Atenção",
//             "Operação não realizada - entre em contato com a GIR!",
//             "error"
//           );
//         }

//         return "";
//       } else {
//         smartAlert("Sucesso", "Operação realizada com sucesso!", "success");
//         // novo();
//       }
//       //retorno dos dados
//     },
//     error: function (xhr, er) {
//       //tratamento de erro
//     },
//   });
//   return "";
// }

function recuperaCliente(codigo, callback) {
  $.ajax({
    url: "js/sqlscopeCliente.php", //caminho do arquivo a ser executado
    dataType: "html", //tipo do retorno
    type: "post", //metodo de envio
    data: { funcao: "recupera", codigo: codigo }, //valores enviados ao script
    //  beforeSend: function () {
    //função chamada antes de realizar o ajax
    //},
    //complete: function () {
    //função executada depois de terminar o ajax
    // },
    success: function (data, textStatus) {
      if (data.indexOf("failed") > -1) {
        return;
      } else {
        callback(data);
      }
    },
    error: function (xhr, er) {
      //tratamento de erro
    },
  });

  return;
}
function excluirCliente(cliente) {
  $.ajax({
    url: "js/sqlscopeCliente.php",
    dataType: "html", //tipo do retorno
    type: "post", //metodo de envio
    data: { funcao: "excluir", cliente: cliente },
    success: function (data, textStatus) {
      if (data.indexOf("sucess") < 0) {
        var piece = data.split("#");
        var mensagem = piece[1];
        if (mensagem !== "") {
          smartAlert("Atenção", mensagem, "error");
        } else {
          smartAlert(
            "Atenção",
            "Operação não realizada - entre em contato com a GIR!",
            "error"
          );
        }

        return "";
      } else {
        smartAlert("Sucesso", "Operação realizada com sucesso!", "success");
        voltar();
      }
      //retorno dos dados
    },
    error: function (xhr, er) {
      //tratamento de erro
    },
  });
  return "";
}
