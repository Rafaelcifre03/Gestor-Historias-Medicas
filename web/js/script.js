var check = document.getElementById("99");
var input = document.getElementById("98");
/*
        check.onclick = function () {
            if (input.hasAttribute("disabled")) {
                input.removeAttribute("disabled");
                input.value = "";
            }
            else {
                input.setAttribute("disabled", "true");
                input.value = "Niega";
            }
        }*/

var antecedentes = document.getElementsByClassName("antecedente");
var niega = document.getElementsByClassName("niega");
var aux = 0;

/*
antecedentes.item(aux).addEventListener("click", function () {
    if (niega.item(aux).hasAttribute("disabled")) {
        niega.item(aux).removeAttribute("disabled");
        niega.item(aux).value = "";
    }
    else {
        niega.item(aux).setAttribute("disabled", "true");
        niega.item(aux).value = "Niega";
    }
})
*/

function checkNiega(idItem) {
    var elemento = document.getElementById('input_' + idItem);

    if (elemento.hasAttribute("disabled")) {
        elemento.removeAttribute("disabled");
        elemento.value = "";
    }
    else {
        elemento.setAttribute("disabled", "true");
        elemento.value = "Niega";
    }
}


function inputAntecedentePersonal(IdCampo) {
    var elemento = document.getElementById("input_" + IdCampo);
    var tag = document.getElementById("tag_" + IdCampo);

    if (elemento.style.display == "none" && elemento.id != "hija" && elemento.id != "hijo") {
        elemento.style.display = "flex";
        tag.style.display = 'none';
    }
}

function createBlock(nombreCampo, value, idDiv = "divPersonales") {

    var divPersonal = document.getElementById(idDiv);

    var bigDiv = document.createElement("div");
    bigDiv.setAttribute("class", "ms-sm-3 mb-2");

    var div1 = document.createElement("div");
    div1.setAttribute("class", "d-flex mb-2 w-100 align-middle flex-wrap");

    var p = document.createElement("p");
    p.setAttribute("class", "col-12 col-md-5 col-lg-2 align-middle m-0");
    p.textContent = nombreCampo;

    var div2 = document.createElement("div");
    div2.setAttribute("class", "col-12 col-md-7 col-lg-10");

    var input = document.createElement("input");
    input.setAttribute("class", "form-control");
    input.setAttribute("type", "text");
    input.setAttribute("value", value);
    input.setAttribute("name", nombreCampo);


    div2.appendChild(input);
    div1.appendChild(p);
    div1.appendChild(div2);

    bigDiv.appendChild(div1)
    divPersonal.appendChild(bigDiv);


    var tag = document.getElementById("tag_" + nombreCampo).style.display = "none";
}