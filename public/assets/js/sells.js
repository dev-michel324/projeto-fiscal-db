const productsTable = document.getElementById('available-products');
const cart = document.getElementById('cart');
let productData = null;

document.getElementById('cancel-modal')
    .addEventListener('click', (e) => {
        document.querySelector('.modal')
            .classList.add('display-none');
    });

document.getElementById('confirm-buy')
    .addEventListener('click', (e) => {
        if(!verifyQntd())
            return alert('Quantidade inválida.');
        
    });

function getDataFromTable(rowIndex){
    const tr = productsTable.querySelectorAll('tr')[rowIndex]
    const tds = tr.querySelectorAll('td');
    return {
        'id': parseInt(tds[0].textContent),
        'description': tds[1].textContent,
        'valor': parseFloat(tds[2].textContent),
        'estoque': parseInt(tds[4].textContent)
    };
}

function verifyQntd(){
    const inputQntd = document.getElementById('product-qntd-user');
    const productEstoque = parseInt(document.getElementById('product-estoque').textContent);
    const userProductQntd = parseInt(document.getElementById('product-qntd-user').value);
    if(isNaN(userProductQntd) || userProductQntd <= 0 || userProductQntd > productEstoque){
        inputQntd.classList.remove('is-success');
        inputQntd.classList.add('is-invalid');
        return false;
    }
    inputQntd.classList.remove('is-invalid');
    inputQntd.classList.add('is-success');
    return true;
}

function insertToModal(description, estoque){
    const modal = document.querySelector('.modal');
    const userQntd = document.querySelector('#product-qntd-user');
    userQntd.value = "";
    userQntd.classList.remove('is-success');
    userQntd.classList.remove('is-invalid');
    document.getElementById('product-name').innerText = description;
    document.getElementById('product-estoque').innerText = estoque;
    modal.classList.remove('display-none');
}

function buy(data) {
    const rowIndex = data.parentNode.parentNode.rowIndex;
    productData = getDataFromTable(rowIndex);
    insertToModal(productData['description'], productData['estoque']);
}