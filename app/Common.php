<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter4.github.io/CodeIgniter4/
 */

use CodeIgniter\HTTP\URI;
use Config\App;

if (! function_exists('_get_uri')) {
    /**
     * Used by the other URL functions to build a
     * framework-specific URI based on the App config.
     *
     * @internal Outside of the framework this should not be used directly.
     *
     * @param string $relativePath May include queries or fragments
     *
     * @throws InvalidArgumentException For invalid paths or config
     */
    function _get_uri(string $relativePath = '', ?App $config = null): URI
    {
        $config = $config ?? config('App');

        if ($config->baseURL === '') {
            throw new InvalidArgumentException('_get_uri() requires a valid baseURL.');
        }

        // If a full URI was passed then convert it
        if (is_int(strpos($relativePath, '://'))) {
            $full         = new URI($relativePath);
            $relativePath = URI::createURIString(null, null, $full->getPath(), $full->getQuery(), $full->getFragment());
        }

        $relativePath = URI::removeDotSegments($relativePath);

        // Build the full URL based on $config and $relativePath
        $url = rtrim($config->baseURL, '/ ') . '/';

        // Check for an index page
        if ($config->indexPage !== '') {
            $url .= '/';

            // Check if we need a separator
            if ($relativePath !== '' && $relativePath[0] !== '/' && $relativePath[0] !== '?') {
                $url .= '/';
            }
        }

        $url .= $relativePath;

        $uri = new URI($url);

        // Check if the baseURL scheme needs to be coerced into its secure version
        if ($config->forceGlobalSecureRequests && $uri->getScheme() === 'http') {
            $uri->setScheme('https');
        }

        return $uri;
    }
}


/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\VarDumper\VarDumper;

if(!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars) {
        VarDumper::dump($var);

        foreach($moreVars as $v) {
            VarDumper::dump($v);
        }

        if(1 < func_num_args()) {
            return func_get_args();
        }

        return $var;
    }
}

if(!function_exists('dd')) {
    function dd(...$vars) {
        foreach($vars as $v) {
            VarDumper::dump($v);
        }

        exit(1);
    }
}