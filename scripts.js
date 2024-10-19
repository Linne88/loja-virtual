document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/produtos')
        .then(response => response.json())
        .then(data => {
            const produtosContainer = document.getElementById('produtos');
            data.forEach(produto => {
                const produtoDiv = document.createElement('div');
                produtoDiv.className = 'produto';
                produtoDiv.innerHTML = `
                    <h2>${produto.nome}</h2>
                    <p>${produto.descricao}</p>
                    <p>Preço: R$ ${produto.preco.toFixed(2)}</p>
                `;
                produtosContainer.appendChild(produtoDiv);
            });
        })
        .catch(error => console.error('Erro ao carregar produtos:', error));
});
