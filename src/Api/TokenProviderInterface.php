<?php

namespace MHD\Numm\Api;

interface TokenProviderInterface
{
    public function getToken(): string;
}
