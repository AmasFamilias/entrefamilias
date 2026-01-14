<?php

if (!function_exists('secure_file_url')) {
    /**
     * Genera una URL segura para archivos usando rutas controladas
     */
    function secure_file_url($type, $model, $filename = null)
    {
        if (!$filename && method_exists($model, 'getAttribute')) {
            $filename = basename($model->getAttribute($type === 'profile' ? 'profile_image' : ($type === 'vacante' ? 'imagen' : ($type === 'organizacion' ? 'imagen' : 'archivo'))));
        }
        
        if (!$filename) {
            return null;
        }
        
        $filename = basename($filename);
        
        switch ($type) {
            case 'profile':
                if (method_exists($model, 'getKey')) {
                    return route('file.profile', ['userId' => $model->getKey(), 'filename' => $filename]);
                }
                break;
            case 'vacante':
                if (method_exists($model, 'getKey')) {
                    return route('file.vacante', ['vacanteId' => $model->getKey(), 'filename' => $filename]);
                }
                break;
            case 'organizacion':
                if (method_exists($model, 'getKey')) {
                    return route('file.organizacion', ['organizacionId' => $model->getKey(), 'filename' => $filename]);
                }
                break;
            case 'message':
                if (method_exists($model, 'getKey')) {
                    return route('file.message', ['messageId' => $model->getKey(), 'filename' => $filename]);
                }
                break;
        }
        
        return null;
    }
}

if (!function_exists('categoria_cabecera_url')) {
    /**
     * Obtiene la URL segura de la imagen de cabecera de una categoría
     * Valida y sanitiza el nombre del archivo, usa mapeo si la BD está vacía
     * 
     * @param string|null $cabecera Nombre del archivo de cabecera desde la BD
     * @param string $descripcion Descripción de la categoría para mapeo
     * @return string|null URL del archivo o null si no existe
     */
    function categoria_cabecera_url($cabecera, $descripcion)
    {
        // Mapeo seguro de nombres de categorías a nombres de archivos de cabecera
        $cabeceraMap = [
            'Apoyo académico' => 'apoyoescolar.png',
            'Salud y bienestar' => 'saludybienestar.png',
            'Aprendizaje' => 'aprendizaje.png',
            'Hogar' => 'hogar.png',
            'Aficiones' => 'aficiones.png',
            'Idiomas' => 'idiomas.png',
            'Orientación profesional' => 'orientacionprofesional.png',
            'Ocio y deportes' => 'ocioydeportes.png',
            'Familias' => 'familia.png',
            'Donación material' => 'donacion.png',
            'Otros' => 'otros.png',
        ];
        
        // Determinar el nombre del archivo a usar
        $filename = null;
        if (!empty($cabecera)) {
            $filename = basename($cabecera);
        } elseif (isset($cabeceraMap[$descripcion])) {
            $filename = $cabeceraMap[$descripcion];
        }
        
        if (!$filename) {
            return null;
        }
        
        // Validar que solo contiene caracteres seguros y extensiones permitidas
        if (!preg_match('/^[a-zA-Z0-9._-]+\.(png|jpg|jpeg|gif|webp)$/i', $filename)) {
            return null;
        }
        
        // Verificar que el archivo existe físicamente
        $filePath = public_path('images/cabecerascat/' . $filename);
        if (!file_exists($filePath)) {
            // Intentar usar el mapeo como fallback
            if (isset($cabeceraMap[$descripcion])) {
                $fallbackFilename = $cabeceraMap[$descripcion];
                $fallbackPath = public_path('images/cabecerascat/' . $fallbackFilename);
                if (file_exists($fallbackPath)) {
                    $filename = $fallbackFilename;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
        
        return asset('images/cabecerascat/' . $filename);
    }
}

if (!function_exists('categoria_icono_url')) {
    /**
     * Obtiene la URL segura de la imagen de icono de una categoría
     * Valida y sanitiza el nombre del archivo, usa mapeo si la BD está vacía
     * 
     * @param string|null $icono Nombre del archivo de icono desde la BD
     * @param string $descripcion Descripción de la categoría para mapeo
     * @return string|null URL del archivo o null si no existe
     */
    function categoria_icono_url($icono, $descripcion)
    {
        // Mapeo seguro de nombres de categorías a nombres de archivos de iconos
        $iconoMap = [
            'Apoyo académico' => 'apoyoescolar.png',
            'Salud y bienestar' => 'saludybienestar.png',
            'Aprendizaje' => 'aprendizaje.png',
            'Hogar' => 'hogar.png',
            'Aficiones' => 'aficiones.png',
            'Idiomas' => 'idiomas.png',
            'Orientación profesional' => 'orientacionprofesional.png',
            'Ocio y deportes' => 'ocioydeportes.png',
            'Familias' => 'familias.png',
            'Donación material' => 'donacionmaterial.png',
            'Otros' => 'otros.png',
        ];
        
        // Determinar el nombre del archivo a usar
        $filename = null;
        if (!empty($icono)) {
            $filename = basename($icono);
        } elseif (isset($iconoMap[$descripcion])) {
            $filename = $iconoMap[$descripcion];
        }
        
        if (!$filename) {
            return null;
        }
        
        // Validar que solo contiene caracteres seguros y extensiones permitidas
        if (!preg_match('/^[a-zA-Z0-9._-]+\.(png|jpg|jpeg|gif|webp|svg)$/i', $filename)) {
            return null;
        }
        
        // Verificar que el archivo existe físicamente
        $filePath = public_path('images/iconoscat/' . $filename);
        if (!file_exists($filePath)) {
            // Intentar usar el mapeo como fallback
            if (isset($iconoMap[$descripcion])) {
                $fallbackFilename = $iconoMap[$descripcion];
                $fallbackPath = public_path('images/iconoscat/' . $fallbackFilename);
                if (file_exists($fallbackPath)) {
                    $filename = $fallbackFilename;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
        
        return asset('images/iconoscat/' . $filename);
    }
}
