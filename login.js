function abreCadastro() {
    const laranja = document.getElementById("laranja")
    const login = document.getElementById("login")
    const cadastro = document.getElementById("cadastro")
    const logar = document.getElementById("logar")
    const cadastrar = document.getElementById("cadastrar")

    laranja.classList.add("clicado")
    login.style.display = 'none'
    cadastro.style.display = 'flex'
    logar.style.display = 'block'
    cadastrar.style.display = 'none'
}

function abreLogin() {
    const laranja = document.getElementById("laranja")
    const login = document.getElementById("login")
    const cadastro = document.getElementById("cadastro")
    const logar = document.getElementById("logar")
    const cadastrar = document.getElementById("cadastrar")

    laranja.classList.remove("clicado")
    login.style.display = 'block'
    cadastro.style.display = 'none'
    logar.style.display = 'none'
    cadastrar.style.display = 'block'
}