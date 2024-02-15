document.getElementById("opciones").addEventListener("change", function() {
    var selectedProductId = this.value;
    document.getElementById("ID_PRODUCTO").value = selectedProductId;
});
