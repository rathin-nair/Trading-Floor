//  main.js

function get_price(){
    //  GET request using fetch()
    var sym = document.getElementById("sym").value;
    var symb = sym.toLowerCase();
    fetch_url = "https://cloud.iexapis.com/stable/stock/"+symb+"/quote?token=pk_3251b0d4b1fc472aaaf9a03643ed5b40";
    console.log(fetch_url);

    fetch(fetch_url)
    
    // Converting received data to JSON
    .then(response => response.json())
    .then(json => {
        let li = `
        <tr>
            <td>
                Company Name: 
            </td>
            <td>
                Close Price:
            </td>
            <td>
                Primary Exchange:
            </td>
        </tr>
        <tr>
            <td>`
                +json.companyName+
            `</td>
            <td>`
                +json.iexClose+
            `</td>
            <td>`
                +json.primaryExchange+
            `</td>
        </tr>`
        document.getElementById("users").innerHTML = li;
        console.log(json);
    });
}
