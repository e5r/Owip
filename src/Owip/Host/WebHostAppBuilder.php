<?php

namespace Owip\Host;

use \Owip\IAppBuilder;
use \Owip\IAppFunc;
use \Owip\IAppStartup;
use \Owip\IHost;
use \Owip\IServer;
use \Owip\PropertiesDictionary;

class WebHostAppBuilder implements IHost, IAppBuilder, IAppFunc
{
    private $properties;
    private $server;
    private $startup;

    public function __construct($serverClass, $startupClass)
    {
        $this->log("_construct: serverClass -> $serverClass, startupClass -> $startupClass");

        if (!array_key_exists(IServer::class, class_implements($serverClass))) {
            throw new \Exception("The class needs to implement Owip\\IServer");
        }

        if (!array_key_exists(IAppStartup::class, class_implements($startupClass))) {
            throw new \Exception("The class needs to implement Owip\\IAppStartup");
        }

        //1. O host cria um Properties IDictionary<string, object> e preenche todos os dados ou recursos de inicialização fornecidos pelo host.
        $this->log("_construct: Criando propriedades");
        $this->properties = new PropertiesDictionary();
        // TODO: Incluir propriedades host

        //2. O host seleciona qual servidor será usado e fornece a coleção Properties para que ele possa anunciar qualquer recurso.
        $this->log("_construct: Criando servidor");
        $this->server = new $serverClass();
        $this->log("_construct: Iniciando propriedades do servidor");
        $this->server->initializeProperties($this->properties);

        //3. O host localiza o código de configuração do aplicativo e o chama com a coleção Properties.
        //4. O aplicativo lê e / ou define a configuração na coleção Properties, constrói o pipeline de processamento de solicitação desejado e retorna o delegado do aplicativo resultante.
        $this->log("_construct: Criando Startup");
        $this->startup = new $startupClass();
        $this->log("_construct: Configurando Startup");
        $this->startup->configure($this, $this->properties);
    }

    private function log($message)
    {
        echo "<pre style='color:green'>LOG WebHostAppBuilder: $message</pre>";
    }

    public function run()
    {
        $this->log("run");
        //5. O host chama o código de inicialização do servidor com o delegado do aplicativo em questão e o dicionário de propriedades.
        //   O servidor termina de se configurar, começa a aceitar solicitações e chama o delegado do aplicativo para processar essas solicitações.
        $this->server->start($this, $this->properties);
    }

    public function handler(PropertiesDictionary $env)
    {
        // TODO: Implement handler() method.
        $this->log("handler");

        //print_r($_COOKIE);
        echo "<p>\$_COOKIE[]:</p><ul>";
        foreach ($_COOKIE as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";

        //print_r($_ENV);
        echo "<p>\$_ENV[]:</p><ul>";
        foreach ($_ENV as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";

        //print_r($_FILES);
        echo "<p>\$_FILES[]:</p><ul>";
        foreach ($_FILES as $k => $v) {
            echo "<li>$k -> " . join(" | ", $v) . "</li>";
            // [name]
            // [type]
            // [tmp_name]
            // [error]
            // [size]
        }
        echo "</ul>";

        //print_r($_GET);
        echo "<p>\$_GET[]:</p><ul>";
        foreach ($_GET as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";

        //print_r($_POST);
        echo "<p>\$_POST[]:</p><ul>";
        foreach ($_POST as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";

        //print_r($_REQUEST);
        echo "<p>\$_REQUEST[]:</p><ul>";
        foreach ($_REQUEST as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";

        //print_r($_SERVER);
        echo "<p>\$_SERVER[]:</p><ul>";
        foreach ($_SERVER as $k => $v) {
            echo "<li>$k -> $v</li>";
        }
        echo "</ul>";
        //print_r($_SESSION);

        /* Request Data
         * ----------------------
         * owip.RequestBody         => $_SERVER['']
         * --> fopen('php://input', 'r')
         * --> file_get_contents('php://input')
         * owip.RequestHeaders      => $_SERVER['HTTP_*']
         * owip.RequestMethod       => $_SERVER['REQUEST_METHOD']
         * owip.RequestPath         => $_SERVER['SCRIPT_NAME']
         * owip.RequestPathBase     => $_SERVER['??'] => "/"
         * owip.RequestProtocol     => $_SERVER['SERVER_PROTOCOL']
         * owip.RequestQueryString  => $_SERVER['QUERY_STRING']
         * owip.RequestScheme       => $_SERVER['HTTPS'] ?? 'http'
         */

        /* Response Data
         * ----------------------
         * owip.ResponseBody
         * owip.ResponseHeaders
         * owip.ResponseStatusCode
         * owip.ResponseReasonPhrase
         * owip.ResponseProtocol
         */
    }
}