function aumentaBotao() {
    document.getElementById('botao-principal').style.width = '310px'
    document.getElementById('botao-principal').style.height = '55px'
}

function diminueBotao() {
    document.getElementById('botao-principal').style.width = '300px'
    document.getElementById('botao-principal').style.height = '50px'
}

function verSenha() {
    let estadoSenha = document.getElementById('senha')
    let estadoVer = document.getElementById('ver-senha')

    if(estadoSenha.getAttribute('type') == 'password'){
        estadoSenha.setAttribute('type','text')
        estadoVer.className = 'fas fa-eye-slash'
    }else{
        estadoSenha.setAttribute('type','password')
        estadoVer.className = 'fas fa-eye'
    }

}