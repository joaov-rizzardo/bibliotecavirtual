create table tb_status(
	id_status int not null PRIMARY KEY AUTO_INCREMENT,
    nome_status varchar(20) not null
);

INSERT INTO tb_status(nome_status)VALUES('usuario'),('administrador');

create table tb_usuario(
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL,
    senha_usuario varchar(16) not null,
    id_status int not null DEFAULT 1,
    FOREIGN KEY(id_status) REFERENCES tb_status(id_status)
);

create table tb_categorias(
	id_categoria int PRIMARY KEY AUTO_INCREMENT,
    nome_categoria varchar(40) not null
);

create table tb_livro(
    id_livro int PRIMARY KEY AUTO_INCREMENT,
    titulo_livro varchar(50) not null,
    sinopse_livro varchar(500) not null,
    capa_livro varchar(80) not null,
    autor_livro varchar(50) not null,
    destaque int not null DEFAULT 0,
    id_categoria int not null,
    FOREIGN KEY(id_categoria) REFERENCES tb_categorias(id_categoria)
);

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Frank Herbert','duna.jpg',1,'O livro indica, numa leitura atenta, que o tempo de Paul Atreides está situado em cerca de 24.600 anos após o presente, no qual a Terra não é mais habitada e muito da sua história já foi esquecida, enquanto algumas tradições históricas e religiosas se mantêm','Duna');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('William Gibson','neuromancer.jpg',1,'Neuromancer conta a história de Case, um cowboy do ciberespaço e hacker da matrix. Como punição por tentar enganar os patrões, seu sistema nervoso foi contaminado por uma toxina que o impede de entrar no mundo virtual','Neuromancer');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Isaac Asimov','irobot.jpg',1,'O livro é composto de 10 contos que, de forma sucessiva, discorrem sobre a evolução dos robôs através do tempo.','I, Robot');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Ray Bradbury','fahrenheit.jpg',1,'Fahrenheit é contado em um futuro inespecífico em uma América hedonista e anti-intelectual que perdeu totalmente o controle. Qualquer um que é pego lendo livros é, no mínimo, confinado em um hospício.','Fahrenheit 451');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Philip K. Dick','androides.jpg',1,'Narra a crise moral de Rick Deckard, um caçador de recompensas que persegue androides, conhecidos como replicantes, numa San Francisco pós-nuclear, parcialmente deserta.','Androides Sonham com Ovelhas Elétricas?');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Suzanne Collins','jogosvorazes.jpg',1,'Quando Katniss Everdeen, de 16 anos, decide participar dos Jogos Vorazes para poupar a irmã mais nova, causando grande comoção no país, ela sabe que essa pode ser a sua sentença de morte.','Jogos Vorazes');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Kiera Cass','aselecao.jpg',2,'Para trinta e cinco garotas, a Seleção é a chance de uma vida. É a oportunidade de ser alçada a um mundo de vestidos deslumbrantes e joias valiosas. De morar em um palácio, conquistar o coração do belo príncipe Maxon e um dia ser a rainha. America Singer, no entanto, estar entre as Selecionadas é um pesadelo.','A seleção');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('John Green','culpadasestrelas.jpg',2,'Hazel é uma paciente terminal. Ainda que, por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.','A culpa é das estrelas');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Machado de Assis','domcasmurro.jpg',2,'Dom Casmurro" conta a história de Bento Santiago (Bentinho), apelidado de Dom Casmurro por ser calado e introvertido. Na adolescência, apaixona-se por Capítu, abandonando o seminário e, com ele, os desígnios traçados por sua mãe, Dona Glória, para que se tornasse padre. Casam-se e tudo corre bem, até o amor se tornar ciúme e desconfiança.','Dom Casmurro');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Fiódor Dostoiévski','crimecastigo.jpg',2,'Raskólnikov, um jovem estudante, pobre e desesperado, perambula pelas ruas de São Petersburgo até cometer um crime que tentará justificar por uma teoria: grandes homens, como César ou Napoleão, foram assassinos absolvidos pela História. Este ato desencadeia uma narrativa labiríntica que arrasta o leitor por becos, tabernas e pequenos cômodos, povoados de personagens que lutam para preservar sua dignidade contra as várias formas da tirania.','Crime e Castigo');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Jojo Moyes','comoeraantesdevoce.jpg',2,'Will é um jovem rico e bem-sucedido, até sofrer um grave acidente que o deixa preso a uma cadeira de rodas. Profundamente depressivo, sua família contrata Louisa para fazer companhia a ele. Ela sempre levou uma vida modesta, com dificuldades financeiras e problemas no trabalho, mas está disposta a provar para Will que ainda existem razões para viver.','Como eu era antes de você.');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Mark Twain','tomsawyer.jpg',3,'Tom Sawyer vive com sua tia Polly e o seu meio-irmão irmão Sid na cidade de São Petersburgo, no estado do Missouri, junto ao rio Mississipi. Tom e Huckleberry Finn, o filho do bêbado da cidade, envolvem-se nas mais destemidas aventuras que fazem as delícias do leitor.','As aventuras de Tom Sawyer');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Miguel de Cervantes','domquixote.jpg',3,'Dom Quixote era um velho fidalgo solitário que gostava muito de ler romances de cavalaria. Devido a isso, ele resolve se tornar um cavaleiro andante. Após providenciar um cavalo e armadura, o cavaleiro inicia sua aventura medieval.','Dom Quixote');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Júlio Verne, Patricia Arrou-Vignod','devoltaaomundo80dias.jpg',3,'Um inglês metódico, Phileas Fogg, diz aos seus colegas de clube que é capaz de completar a volta ao mundo em apenas 80 dias. ... Como todos duvidam, Fogg propõe uma aposta e parte para a viagem, acompanhado de seu empregado Jean Passepartout.','A Volta ao Mundo em 80 Dias');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Gabriel Dearo, Manu Digilio','aventurasdemike.jpg',3,'Ele é desastrado, prefere videogames e salgadinhos no lugar de futebol, e é PÉSSIMO com as garotas. Ao lado do seu fiel amigo Nando (que é o ser humano mais distraído do planeta Terra) vão se aventurar em uma competição de biscoitos em busca de um misterioso prêmio que irá mudar suas vidas para sempre.','As Aventuras de Mike');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Arthur Conan Doyle','sherlockholmes.jpg',3,'Sherlock Holmes é um famoso detetive, em tanto excêntrico, que tenta solucionar mistérios acompanhado por seu fiel escudeiro Watson.','As Aventuras de Sherlock Holmes');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Antoine de Saint-Exupéry','pequenoprincipe.jpg',4,'A Pequena Garota encontra o excêntrico Aviador, que a introduz ao mágico mundo do Pequeno Príncipe. Neste mundo em que tudo é possível, a Garota aprende a redescobrir sua infância.','O Pequeno Príncipe');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Lewis Carroll','alice.jpg',4,'Ainda garotinha, Alice Kingsleigh visitou um lugar mágico pela primeira vez e não tinha mais lembranças sobre o local a não ser em seus sonhos. Em uma festa da nobreza, a jovem vê um coelho branco. Alice o segue e cai em um buraco, indo parar em um mundo estranho: o País das Maravilhas. Lá, ela reencontra personagens que estavam guardados em sua memória através dos sonhos.','Alice no País das Maravilhas');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Hans Christian Andersen','patinhofeio.jpg',4,'Um patinho nasce muito diferente dos irmãos. Todos o achavam feio, por ser muito esquisito e desengonçado. Um dia, cansado daquela situação, o patinho foge para bem longe e passa por vários apuros. E, quando chega o verão, descobre sua verdadeira origem.','O patinho feio');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Carlo Collodi','pinoquio.jpg',4,'Em seu percurso de transformação de boneco em menino, Pinóquio enfrenta as intempéries das noites longas e frias, depara com a autoridade da lei, padece de uma fome terrível e descobre a solidão da condição humana.','As Aventuras de Pinóquio');

insert into tb_livro(autor_livro, capa_livro, id_categoria, sinopse_livro,titulo_livro)
values('Jonathan Swift','guliver.jpg',4,'Durante sua primeira viagem, após escapar de um naufrágio, Gulliver é aprisionado por uma raça de pessoas minúsculas, com menos de 15 centímetros de altura, que são os habitantes da ilha de Lilliput.','As viagens de Guliver');
