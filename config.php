<?php
// Configuração do Fuso Horário
date_default_timezone_set('America/Sao_Paulo');

// Sempre use barra (/) no final das URLs
define('URL', 'http://localhost/~guilhermesiani/SianiMVC/');
define('LIBS', 'libs/');

// Configuração com Banco de Dados
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'framework');
define('DB_USER', 'root');
define('DB_PASS', '123456');

// HASH KEY, nunca mude esta parte, pois é usada para as senhas!
define('HASH_GENERAL_KEY', 'MixitUp200');

// Isto é apenas para o Banco de Dados
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

// Configuração de Imagens
define('IMG_FOLDER', 'images/'); // Pasta das imagens sempre com "/" no final
define('IMG_SIZE', '1000000'); // Tamanho máximo do arquivo em bytes