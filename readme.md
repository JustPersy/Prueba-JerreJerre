# Formulario de carga de Usuarios para GEMA.SAS / Manual de instalación

## Descripción

Sistema web desarrollado en PHP que permite importar usuarios desde archivos de texto y categorizarlos según su estado (activo, inactivo o en espera). La aplicación facilita la gestión de información de usuarios a través de una interfaz simple y efectiva.

## Características

- Carga de archivos de texto con formato CSV
- Validación automática de datos (email, nombres, apellidos, código)
- Clasificación de usuarios según su estado
- Visualización organizada de resultados
- Interfaz responsive y amigable

## Estructura del Proyecto

```
/
├── config.php          # Configuración de la base de datos
├── index.php           # Página principal con formulario de carga
├── upload.php          # Procesamiento y validación de archivos
├── resultados.php      # Visualización de usuarios categorizados
├── styles.css          # Estilos CSS
└── /uploads            # Directorio para almacenamiento de archivos (creado automáticamente)
```

## Requisitos

- Servidor web (Apache/Nginx)
- PHP 7.0 o superior
- MySQL 5.6 o superior

## Instalación

### 1. Configuración de la base de datos

1. Crea una base de datos llamada `prueba_gema` en MySQL:
   ```sql
   CREATE DATABASE prueba_gema;
   ```

2. Crea la tabla `usuarios` con la siguiente estructura:
   ```sql
   CREATE TABLE usuarios (
     id INT AUTO_INCREMENT PRIMARY KEY,
     email VARCHAR(255) NOT NULL UNIQUE,
     nombre VARCHAR(100) NOT NULL,
     apellido VARCHAR(100) NOT NULL,
     estado INT NOT NULL
   );
   ```

### 2. Configuración del entorno

1. Clona o descarga los archivos en el directorio raíz de tu servidor web
2. Asegúrate de que PHP tenga permisos de escritura para crear la carpeta "uploads"
3. Modifica el archivo `config.php` con tus credenciales de base de datos:
   ```php
   $servername = "tu_servidor";
   $username = "tu_usuario";
   $password = "tu_contraseña";
   $dbname = "prueba_gema";
   ```

## Uso

### Formato del archivo de importación

El sistema acepta archivos .txt con formato CSV que deben contener las siguientes columnas:
- Email (formato válido)
- Nombre
- Apellido
- Código de estado (1: Activo, 2: Inactivo, 3: En espera)

Ejemplo:
```
usuario@ejemplo.com,Juan,Pérez,1
otro@ejemplo.com,Ana,López,2
```

### Proceso de importación

1. Accede a la página principal
2. Haz clic en "Seleccionar archivo" y elige el archivo .txt a importar
3. Presiona "Subir archivo" para iniciar el procesamiento
4. El sistema validará y procesará los datos
5. Se mostrará un mensaje de confirmación o error según corresponda

### Visualización de resultados

1. Después de una importación exitosa, haz clic en "Ver resultados"
2. Se mostrarán tres tablas con los usuarios clasificados por estado:
   - Usuarios activos (estado 1)
   - Usuarios inactivos (estado 2)
   - Usuarios en espera (estado 3)

## Solución de posibles problemas

- **Error de conexión a la base de datos:** Verifica las credenciales en `config.php`
- **Problemas con la carga de archivos:** Comprueba los permisos de escritura del directorio
- **Archivo rechazado:** Asegúrate de que el archivo cumpla con el formato requerido
- **Datos no mostrados:** Verifica que los estados de los usuarios correspondan a los valores 1, 2 o 3

## Tecnologías utilizadas

- PHP
- MySQL
- HTML5
- CSS3

---

*Desarrollado por Cristian Castillo para JerreJerre*