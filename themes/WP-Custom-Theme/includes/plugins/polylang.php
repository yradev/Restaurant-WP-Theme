<?php  
/**
 * Add echo string support for polylang
 */
function ct_e( $content, $domain ) {
	if (function_exists('pll_register_string')) {
		pll_e( $content, $domain );
	} else {
		_e( $content, $domain );
	}
}

/**
 * Add return string support for polylang
 */
function ct__( $content, $domain ) {
	if (function_exists('pll_register_string')) {
		return pll__( $content, $domain );
	} else {
		return __( $content, $domain );
	}
}

/**
 * Read php files in theme dir and register all text_domains for backend translation
 */
function ct_register_custom_group() {
	if ( ! function_exists('pll_register_string')) {
		return;
	}

	$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(get_template_directory()));
	$text_domain = 'ct';
	$domain_name = 'Custom Theme Group';
	
	foreach ($files as $file) {
        if ($file->isDir() || $file->getExtension() !== 'php') {
			continue;
		}

		if (strpos($file->getPathname(), DIRECTORY_SEPARATOR . 'includes') 
		|| strpos($file->getPathname(), DIRECTORY_SEPARATOR . 'dist') 
		|| strpos($file->getPathname(), DIRECTORY_SEPARATOR . 'node_modules') 
		|| strpos($file->getPathname(), DIRECTORY_SEPARATOR . 'vendors') ) {
			continue;
		}

        $content = file_get_contents($file->getRealPath());
		preg_match_all('/ct_(e|_)\s*\(\s*[\'"]([^\'"]*)[\'"]\s*,\s*[\'"]' . $text_domain . '[\'"]\s*\)/', $content, $matches);
        
        if (!empty($matches[2])) {
            foreach ($matches[2] as $string) {
				$content_name = strtolower(str_replace(' ', '_', $string));
                pll_register_string($content_name, $string, $domain_name);
            }
        }
    }
}
add_action('admin_init', 'ct_register_custom_group');