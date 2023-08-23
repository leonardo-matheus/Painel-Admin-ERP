// Get a reference to the tbody element where the table rows will be inserted
const estoqueBody = document.getElementById('estoque-table-body');
const popup = document.getElementById('popup');
const popupForm = document.getElementById('popup-form');

// Function to display inventory data in the table
function exibirEstoque(estoque) {
    estoqueBody.innerHTML = '';
    for (const item of estoque) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.produto}</td>
            <td>${item.categoria}</td>
            <td>${item.quantidade}</td>
            <td>${item.compradas}</td>
            <td>${item.vendidas}</td>
            <td>
                <button onclick="editarItem(${item.id})">Editar</button>
                <button onclick="removerItem(${item.id})">Remover</button>
            </td>
        `;
        estoqueBody.appendChild(row);
    }
}

// Function to fetch and display inventory data from the server
function buscarEstoque() {
    fetch('../bd/get_estoque.php') // Adjust the path to point to the correct directory
        .then(response => response.json())
        .then(data => {
            exibirEstoque(data);
        })
        .catch(error => {
            console.error('Erro ao buscar estoque:', error);
        });
}

// Function to open the popup for adding a new item
function abrirPopup() {
    popup.style.display = 'block';
}

// Function to close the popup
function fecharPopup() {
    popup.style.display = 'none';
    popupForm.reset();
}

// Function to add a new inventory item using the popup
function adicionarItemPopup() {
    const produto = document.getElementById('produto').value;
    const categoria = document.getElementById('categoria').value;
    const quantidade = parseInt(document.getElementById('quantidade').value);

    // Close the popup
    fecharPopup();

    // Send data to the server and update the table
    fetch('../bd/add_item_estoque.php', {
        method: 'POST',
        body: JSON.stringify({ produto, categoria, quantidade }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message); // Display the server response
        buscarEstoque(); // Update the table
    })
    .catch(error => {
        console.error('Erro ao adicionar item:', error);
    });
}

// Function to edit an inventory item
function editarItem(id) {
    const novoProduto = prompt('Digite o novo nome do produto:');
    const novaCategoria = prompt('Digite a nova categoria:');
    const novaQuantidade = parseInt(prompt('Digite a nova quantidade:'));

    // Send data to the server and update the table
    fetch('../bd/edit_item_estoque.php', {
        method: 'POST',
        body: JSON.stringify({ id, produto: novoProduto, categoria: novaCategoria, quantidade: novaQuantidade }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        buscarEstoque(); // Update the table
    })
    .catch(error => {
        console.error('Erro ao editar item:', error);
    });
}

// Function to remove an inventory item
function removerItem(id) {
    // Send data to the server and update the table
    fetch('../bd/remove_item_estoque.php', {
        method: 'POST',
        body: JSON.stringify({ id }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        buscarEstoque(); // Update the table
    })
    .catch(error => {
        console.error('Erro ao remover item:', error);
    });
}

// Initialize the display of inventory
buscarEstoque();
