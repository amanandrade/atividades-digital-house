//https://newsapi.org/
function carregarArticles(event){
    var url = 'https://newsapi.org/v2/top-headlines?' +
            'country=br&' +
            'apiKey=e978f103f69543bd8dfd02e0ee4cd4b8';
    var req = new Request(url);
    let container = document.getElementById('noticias');
    fetch(req)
        .then(function(response) {
            //json retorna um promise, assim como o fetch
            // (data) é o nome da variavel que nós nomeamos, é o retorno da promise. Poderia ser qualquer outro nome
            //o foreach só tem um elemento nesse caso, que é article
            response.json().then(function(data){
                data.articles.forEach(function (article){
                    //usar o innerhtml para renderizar a página
                    //usar o +=no innerhtml para concatenar
                    container.innerHTML += 
                        `
                        <div class="card conteudo" style="width: 18rem;">
                            <img src=${article.urlToImage} class="card-img-top" alt="${article.content}">
                            <div class="card-body">
                            <h5 class="card-title" id="title">${article.title}</h5>
                            <p class="card-text" id="description">${article.description}</p>
                            <a href="${article.url}" class="btn btn-primary">Veja mais</a>
                            </div>
                        </div>
                        `
                    })
                })
            });
}

document.querySelector('#exibir-noticias').onclick = carregarArticles;
