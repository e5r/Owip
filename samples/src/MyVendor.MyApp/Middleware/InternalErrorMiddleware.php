<?php namespace MyVendor\MyApp\Middleware;

use Owip;

class InternalErrorMiddleware extends Middleware {
    private $next;

    public function __construct($next) {
        $this->next = $next;
    }

    public function run($context){
        try {
            $this->next($context);
        } catch (Exception $ex) {
            $context->response->clear();
            $context->response->code(500);
            $context->response->body($ex->getMessage());
        }
    }
}