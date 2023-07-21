var index = 0;
var codigos = [];
var idarticulos = [];
var nombres = [];
var precios = [];

$('#btnSubmit').attr("disabled", true);

function addProductOrder() {
    productdata = document.getElementById('select-idarticulo').value.split('_');
    if(productdata[0] != '')
    {
        idarticulos[index] = productdata[0];
        codigos[index] = productdata[1];
        nombres[index] = productdata[2];
        precios[index] = productdata[3];
        evaluar();
        fila = '<tr id="filaz' + index + '">'+
        '<td class="text-center"><input type="hidden" name="codigoarticulos[]" value="' + productdata[1] + '">' + productdata[1] + '</td>'+
        '<td class="text-center"><input type="hidden" name="idarticulos[]" value="' + productdata[0] + '">' + productdata[2] + '</td>'+
        '<td class="text-center"><input type="hidden" name="preciosarticulos[]" value="' + productdata[3] + '"><input class="form-control text-center" name="cantidadarticulos[]"></td>'+
        '<td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-xs" onclick="quitars(' + index + ')">Quitar</a></td></tr>';
        $('#product_detail').append(fila);
    }
}

function quitars(item) {
    $('#filaz' + item).remove();
    index--;
    codigos[item] = null;
    if (index == 0)
        $('#btnSubmit').attr("disabled", true);
    else
        $('#btnSubmit').attr("disabled", false);
}

function evaluar() {
    index++;
    if (index > 0)
        $('#btnSubmit').attr("disabled", false);
    else
        $('#btnSubmit').attr("disabled", true);

}
