<?php namespace MyVendor\MyApp;

use Owip;

class Startup extends Application {
    
    public function configure($app) {
        $app->useMiddleware(MyVendor\MyApp\Middleware\InternalErrorMiddleware::class);
        
        $app->use("/", function(){
            return new TextResult("Hello World");
        });

        $app->use(function($context) {
            if($context->request->path != "/other")
                return;

            $context->response->body("Hello " . $context->request->param("name") . "!");
        });
    }
}