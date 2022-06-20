
window.localStorage.setItem("cartNumbers", 1);


function cartNumbers(element) {

    var price = element.parentElement.previousElementSibling.innerHTML;
    var item = element.parentElement.previousElementSibling.previousElementSibling
        .innerHTML;
    var row_number = window.localStorage.getItem("cartNumbers");
    var cart_table = document.getElementById("cartt");
    var row = cart_table.insertRow(row_number);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);

    cell0.innerHTML = row_number;
    cell1.innerHTML = item;
    cell2.innerHTML = price;
    window.localStorage.setItem("cartNumbers", ++row_number);
}

function to_payment() {
    open("payment-pg.php", screen)

}