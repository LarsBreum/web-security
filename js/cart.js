function printList() {
    var list = sessionStorage.getItem('productList');

    var products = $parseJSON( list ).products;

    var $table = $( "<table></table>" );

    //tänkte typ göra nån for - loop som printar ut alla produkter vi lagt i shopping cart idk hur fan det ens går till men det löser sig nog
}