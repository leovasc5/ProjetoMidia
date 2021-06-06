var $simpleCarousel = document.querySelector(".js-carousel--simple");

new Glider($simpleCarousel, {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: true,
  dots: ".js-carousel--simple-dots",
  arrows: {
    prev: ".js-carousel--simple-prev",
    next: ".js-carousel--simple-next",
  },
});

var qs = document.getElementById("QS");
var pa = document.getElementById("PA");
var eq = document.getElementById("EQ");
var co = document.getElementById("CO");
var tc = document.getElementById("TC");

function n1(){
    qs.style.fontWeight = "700";
    pa.style.fontWeight = "400";
    eq.style.fontWeight = "400";
    co.style.fontWeight = "400";
    tc.style.fontWeight = "400";
}

function n2(){
    qs.style.fontWeight = "400";
    pa.style.fontWeight = "700";
    eq.style.fontWeight = "400";
    co.style.fontWeight = "400";
    tc.style.fontWeight = "400";
}

function n3(){
    qs.style.fontWeight = "400";
    pa.style.fontWeight = "400";
    eq.style.fontWeight = "700";
    co.style.fontWeight = "400";
    tc.style.fontWeight = "400";
}

function n4(){
    qs.style.fontWeight = "400";
    pa.style.fontWeight = "400";
    eq.style.fontWeight = "400";
    co.style.fontWeight = "700";
    tc.style.fontWeight = "400";
}

function n5(){
    qs.style.fontWeight = "400";
    pa.style.fontWeight = "400";
    eq.style.fontWeight = "400";
    co.style.fontWeight = "400";
    tc.style.fontWeight = "700";
}

var nome_pa = document.getElementById("nome_pa");
var texto_pa = document.getElementById("txt_pa");
var img_pa = document.getElementById("img_pa");
var contador_de_cliques_pa = 0;

function next_pa(){
  if(contador_de_cliques_pa == 0){
    //LINKA.AI
    nome_pa.innerHTML="<h4 id='nome_pa' class='nome' onclick=window.open('https://linka.ai/'); style='margin-left: px;'>linka.ai</h4>";
    contador_de_cliques_pa = 1;
    img_pa.src = "img/parceiro2.jfif";
    texto_pa.innerHTML = "O primeiro apoiador do Projeto Mídia, é uma plataforma de árvore de links brasileira, uma ferramenta que facilita a junção de diversos links em uma página só, que ajuda influenciadores e empresas a terem mais conexão de suas redes sociais em menos tempo."
  }else if(contador_de_cliques_pa == 1){
    //VROCTI
    nome_pa.innerHTML = "<h4 id='nome_pa' class='nome' onclick=window.open('https://linka.ai/vrocti '); style='margin-left: 0px;'>Vrocti</h4>";
    contador_de_cliques_pa = 2;
    img_pa.src = "img/parceiro3.jfif";
    texto_pa.innerHTML = "Um streamer e influenciador novato, que chegou pra somar também na Twitch, seu conteúdo é de League Of Legends, sendo uma das apostas do Projeto Mídia nessa área."
  }else if(contador_de_cliques_pa == 2){
    //OZ GEEKS
    nome_pa.innerHTML = "<h4 id='nome_eq' class='nome' onclick=window.open('https://linka.ai/ozgeeks'); style='margin-left: -4px;'>Oz Geeks</h4>";
    contador_de_cliques_pa = 3;
    img_pa.src = "img/parceiro4.jfif";
    texto_pa.innerHTML = "Dois influenciadores de uma única vez, quem diria? Oz Geeks é uma das apostas do Projeto Mídia no YouTube, sendo de uma categoria que cresce cada vez mais no Brasil e no mundo, o universo Geek chega com tudo pra Oz Geeks."
  }else if(contador_de_cliques_pa == 3){
    //AKAMILOL
    nome_pa.innerHTML = "<h4 id='nome_eq' class='nome' onclick=window.open('https://linka.ai/akami'); style='margin-left: -4px;'>@akamilol</h4>";
    contador_de_cliques_pa = 0;
    img_pa.src = "img/parceiro1.jpg";
    texto_pa.innerHTML = "A primeira influenciadora do Projeto Mídia, é uma streamer que soma mais de 3 mil seguidores nas redes sociais. Uma influenciadora focada na plataforma da TwitchTv, no nicho de Games, é uma influenciadora que faz parte do nosso projeto de crescimento com micro-influenciadores."
  }
}

var nome_eq = document.getElementById("nome_eq");
var texto_eq = document.getElementById("txt_eq");
var img_eq = document.getElementById("img_eq");
var contador_de_cliques_eq = 0;

function next_eq(){
  if(contador_de_cliques_eq == 0){
    nome_eq.innerHTML="<h4 id='nome_eq' class='nome' onclick=window.open('https://linka.ai/doug'); style='margin-left: -20px;'>Douglas Junior</h4>";
    contador_de_cliques_eq = 1;
    img_eq.src = "img/eq2.jfif";
    texto_eq.innerHTML = "COO e co-fundador do Projeto Mídia, é o Diretor responsável por toda a parte de Operações Internas relacionados a marcas, sejam esses influenciadores ou empresas, assim cuidando de toda a parte relacionada ao crescimento de marcas.";
  }else if(contador_de_cliques_eq == 1){
    nome_eq.innerHTML = "<h4 id='nome_eq' class='nome' onclick=window.open('https://linka.ai/luan'); style='margin-left: -4px;'>Luan Silva</h4>";
    contador_de_cliques_eq = 0;
    img_eq.src = "img/eq1.jfif";
    texto_eq.innerHTML = "CEO e co-fundador do Projeto Midia, é o Diretor responsável por toda a parte administrativa do Projeto Mídia. Além de ser o CEO, é um dos Influenciadores Oficiais do PMD, com mais de 15 mil seguidores nas redes sociais."
  }
}


var botao_ctt = document.getElementById("botao_ctt");
var botao_tc = document.getElementById("botao_tc");

function mouseover_ctt(){
  botao_ctt.style.color="#808080";

}

function mouseout_ctt(){
  botao_ctt.style.color="#03e9f4";
}

function mouseover_tc(){
  botao_tc.style.color="#808080";
}

function mouseout_tc(){
  botao_tc.style.color="#03e9f4";
}