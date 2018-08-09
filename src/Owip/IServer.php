<?php

namespace \Owip;

interface IServer
{
    public function initializeProperties($properties);

    public function start(IAppStartup $app);
}