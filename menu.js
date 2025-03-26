//Carrossel de imagens
let indexImagem = 0;

setInterval(function(){
const imagens = document.querySelectorAll('.imagem');
const totalImagens = imagens.length;
if (indexImagem >= totalImagens - 1) {
    indexImagem = -1;
} else if (indexImagem < 0) {
    indexImagem = totalImagens - 1;
}
    indexImagem ++;

const carrossel = document.querySelector('.carrossel');
carrossel.style.transform = `translateX(-${indexImagem * 100}%)`; /* Mudança para porcentagem */
}, 4000);

function mudarImagem(n) {
const imagens = document.querySelectorAll('.imagem');
const totalImagens = imagens.length;

indexImagem += n;

if (indexImagem >= totalImagens) {
    indexImagem = 0;
} else if (indexImagem < 0) {
    indexImagem = totalImagens - 1;
}

const carrossel = document.querySelector('.carrossel');
carrossel.style.transform = `translateX(-${indexImagem * 100}%)`; /* Mudança para porcentagem */
}

//animacao de scrool contatos
const myObserver3 = new IntersectionObserver( (entries3) => {
    //console.log(entries3)
    entries3.forEach( (entry3) => {
        if (entry3.isIntersecting){
            entry3.target.classList.add('show3')
        } else{
            entry3.target.classList.remove('show3')
        }
    })
})

const elements3 = document.querySelectorAll('.ctt')

//myObserver3.observe(contatos)
elements3.forEach( (element3) => myObserver3.observe(element3))

function logar() {
    var janela = document.getElementById("janela")

    janela.classList.add('carregado')
}

function abreMenu() {
    var menu = document.getElementById("open")
    var modal = document.getElementById("ul")

    menu.style.display = 'none'
    modal.style.marginLeft = '0%'
}

function fechaMenu() {
    var modal = document.getElementById("ul")
    var menu = document.getElementById("open")

    modal.style.marginLeft = '100%'
    menu.style.display = 'block'
}