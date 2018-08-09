<?php

namespace Owip;

interface IAppStartup
{
    // TODO: Mudar isso para algo como IApp->handle() e IStartup->configure()
    public function configure(IAppBuilder $app, PropertiesDictionary $env);
}
