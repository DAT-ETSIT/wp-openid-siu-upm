<?php

class GithubUpdater
{
    private string $file;
    private array $plugin;
    private string $basename;
    private bool $active;
    private ?string $repository;
    private string $asset_name;
    private string $readme_url;
    private string $slug = 'wp-openid-siu-upm'; // Forzamos el slug correcto

    public static function make(): self
    {
        return new self();
    }

    public function boot(string $file): self
    {
        $this->file = $file;
        $this->plugin = get_plugin_data($this->file);
        $this->basename = $this->slug . '/' . basename($this->file); // Usamos el slug forzado
        $this->active = is_plugin_active($this->basename);

        if ($this->repository) {
            add_filter('pre_set_site_transient_update_plugins', [$this, 'modify_transient'], 10, 1);
            add_filter('plugins_api', [$this, 'plugin_popup'], 10, 3);
            add_filter('upgrader_post_install', [$this, 'after_install'], 10, 3);
        }

        return $this;
    }

    public function repository(string $repository): self
    {
        $this->repository = $repository;
        return $this;
    }

    public function asset_name(string $asset_name): self
    {
        $this->asset_name = $asset_name;
        return $this;
    }

    public function readme_url(string $readme_url): self
    {
        $this->readme_url = $readme_url;
        return $this;
    }

    public function modify_transient($transient)
    {
        if ($update = $this->_get_update_from_repository()) {
            $transient->response[$this->basename] = $update;
        } else {
            // No update, return a fake update to enable auto update check
            $transient->no_update[$this->basename] = (object)[
                'id' => $this->basename,
                'slug' => $this->slug, // Usamos el slug correcto
                'plugin' => $this->basename,
                'new_version' => $this->plugin['Version'],
                'url' => '',
                'package' => '',
                'icons' => [],
                'banners' => [],
                'banners_rtl' => [],
                'tested' => '',
                'requires_php' => '',
                'compatibility' => new stdClass(),
            ];
        }

        return $transient;
    }

    public function plugin_popup($result, $action, $args)
    {
        if ($action !== 'plugin_information') {
            return false;
        }

        if (!empty($args->slug)) {
            if ($args->slug == $this->slug) { // Comparar con el slug forzado
                $gh = $this->_get_repository();

                $plugin = [
                    'name' => $this->plugin['Name'],
                    'slug' => $this->slug, // Usamos el slug correcto
                    'requires' => '5.0',
                    'tested' => '6.6.2',
                    'version' => $gh['tag_name'],
                    'author' => $this->plugin['AuthorName'],
                    'author_profile' => $this->plugin['AuthorURI'],
                    'last_updated' => $gh['published_at'],
                    'homepage' => $this->plugin['PluginURI'],
                    'short_description' => $this->plugin['Description'],
                    'sections' => [
                        'Description' => nl2br(file_get_contents($this->readme_url)),
                        'Updates' => nl2br($gh['body']),
                    ],
                    'download_link' => $gh['zipball_url']
                ];

                return (object)$plugin;
            }
        }

        return $result;
    }

    public function after_install($response, $hook_extra, $result)
    {
        global $wp_filesystem;
    
        $install_directory = plugin_dir_path($this->file);
        $new_directory = trailingslashit(WP_PLUGIN_DIR) . $this->slug; // Ruta de la carpeta renombrada
    
        // Mueve el directorio descargado al nuevo directorio
        $wp_filesystem->move($result['destination'], $new_directory);
    
        // Actualiza la propiedad basename con el nuevo directorio
        $this->basename = plugin_basename($new_directory . '/' . basename($this->file));
        $result['destination'] = $new_directory;
    
        // Actualizar las referencias en la base de datos
        $this->update_database_references();
    
        // Reactiva el plugin si estaba activo antes
        if ($this->active) {
            activate_plugin($this->basename);
        }
    
        return $result;
    }
    
    private function update_database_references()
    {
        // Obtener la lista de plugins activos
        $active_plugins = get_option('active_plugins', []);
    
        // Buscar la referencia antigua del plugin en los plugins activos y reemplazarla
        $old_basename = plugin_basename($this->file); // Referencia antigua
        $new_basename = $this->slug . '/' . basename($this->file); // Nueva referencia
    
        if (in_array($old_basename, $active_plugins)) {
            // Reemplazar la referencia antigua por la nueva en la lista de plugins activos
            $active_plugins = array_map(function ($plugin) use ($old_basename, $new_basename) {
                return ($plugin === $old_basename) ? $new_basename : $plugin;
            }, $active_plugins);
        
            // Guardar la nueva lista de plugins activos
            update_option('active_plugins', $active_plugins);
        }
    
        // Actualizar otros datos de configuración relacionados, si es necesario
        $this->update_plugin_options($old_basename, $new_basename);
    }

    private function _get_repository(): array
    {
        $request_uri = sprintf('https://api.github.com/repos/%s/releases', $this->repository);

        $response = wp_remote_get($request_uri);

        if (!is_wp_error($response) || wp_remote_retrieve_response_code($response) === 200) {
            return current(json_decode(wp_remote_retrieve_body($response), true));
        }

        return [];
    }

    private function _get_update_from_repository(): ?object
    {
        $response = $this->_get_repository();

        $current_version = $this->plugin['Version'];
        $response_version = $response['tag_name'];

        if (version_compare($response_version, $current_version, '>')) {
            // Search for an asset with the correct name
            $asset = current(array_filter($response['assets'], function ($asset) {
                return $asset['name'] === $this->asset_name;
            }));

            // If we have an asset, use it to build the update object
            if ($asset) {
                return (object)[
                    'id' => $this->basename,
                    'slug' => $this->slug, // Usamos el slug correcto
                    'plugin' => $this->basename,
                    'new_version' => $response_version,
                    'url' => $response['url'],
                    'package' => $asset['browser_download_url'],
                    'icons' => array(),
                    'banners' => array(),
                    'banners_rtl' => array(),
                    'tested' => '',
                    'requires_php' => '',
                    'compatibility' => new stdClass(),
                ];
            }
        }

        return null;
    }
}
