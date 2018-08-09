<?php

namespace \Owip;

interface IHostBuilder
{
    public function useServer($serverClass);

    public function useContentRoot($contentRootPath);

    public function useStartup($startupClass);

    public function build();
}