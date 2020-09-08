document.addEventListener("DOMContentLoaded", function() {

    document.getElementById("save_product").addEventListener("click", saveProduct);
    document.getElementById("get_all").addEventListener("click", getAll);
    document.getElementById("get").addEventListener("click", get);


    let baseUrl = "http://localhost/mongo"; //intercambiar con su url base

    function saveProduct() {
        newProduct = getData();
        var fd = new FormData();
        for (var i in newProduct) {
            fd.append(i, newProduct[i]);
        }
        fetch(baseUrl + "/saveProduct", {
                method: 'post',
                mode: 'cors',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                "body": fd
            })
            .then(function(r) {
                if (r.status == 200) {
                    return r.text();
                } else {
                    return "Sorry, there was an error on the server. Please try again in a few minutes"
                }
            }).then(function(text) {
                document.getElementById("result").innerHTML = text;
            })
    }

    function get() {
        fetch(baseUrl + "/get" + "/" + document.getElementById("limit").value, {
                method: 'get',
                mode: 'cors',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            })
            .then(function(r) {
                if (r.status == 200) {
                    return r.text();
                } else {
                    return "Sorry, there was an error on the server. Please try again in a few minutes"
                }
            }).then(function(text) {
                document.getElementById("filteredResult").innerHTML = text;
            })
    }

    function getAll() {
        fetch(baseUrl + "/getAll", {
                method: 'get',
                mode: 'cors',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            })
            .then(function(r) {
                if (r.status == 200) {
                    return r.text();
                } else {
                    return "Sorry, there was an error on the server. Please try again in a few minutes"
                }
            }).then(function(text) {
                document.getElementById("result").innerHTML = text;
            })
    }

    function getData() {
        let form = document.getElementById("add_product");
        let data = {};
        data.product = form['product'].value;
        data.price = form['price'].value;
        data.brand = form['brand'].value;
        return data;
    }
})