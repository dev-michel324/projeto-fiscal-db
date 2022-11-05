const productsTable = document.getElementById('available-products');
const cart = document.getElementById('cart');
let productData = null;
const cart_data = [];

function closeModal(){
    document.querySelector('.modal')
        .classList.add('display-none');
}

document.getElementById('cancel-modal')
    .addEventListener('click', (e) => {
        closeModal();
    });

document.getElementById('confirm-buy')
    .addEventListener('click', (e) => {
        if(!verifyQntd())
            return alert('Quantidade inválida.');
        return confirmBuy(productData);
    });

function getDataFromTable(rowIndex){
    const row = productsTable.querySelectorAll('tr')[rowIndex]
    const datas = row.querySelectorAll('td');
    return {
        'id': parseInt(datas[0].textContent),
        'description': datas[1].textContent,
        'valor': parseFloat(datas[2].textContent),
        'estoque': parseInt(datas[4].textContent)
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

function confirmBuy(product){
    const qntd = parseInt(document.querySelector('#product-qntd-user').value);
    if(!verifyQntd())
        return alert("Quantidade do produto inválido.");
    delete product['estoque'];
    product['user_qntd'] = qntd;
    cart_data.push(product);
    closeModal();
    return renderToCartTable();
}

function renderToCartTable(){
    let content = "";
    for(line in cart_data)
        content += `<tr><td>${cart_data[line]['id']}</td><td>${cart_data[line]['description']}</td><td>${cart_data[line]['valor']}</td><td>${cart_data[line]['user_qntd']}</td></tr>`;
    cart.querySelector('tbody').innerHTML = content;
}

document.getElementById('sendForm')
    .addEventListener('click', () => {
        if (cart_data.length == 0)
            return alert('Você precisa adicionar um produto ao carrinho antes de comprar.');
        let form = document.getElementById('form_cart');
        let hiddenInput = document.createElement('input');

        hiddenInput.type = 'hidden';
        hiddenInput.name = 'data';
        hiddenInput.value = JSON.stringify(cart_data);
        form.appendChild(hiddenInput);
        form.submit();
    })