# Manual de Usuario - Compilador Golampi (ARM64)

## 1. Instalación y Requisitos Previos

Para ejecutar el entorno de desarrollo (IDE) de Golampi, necesitas tener PHP y Composer instalados, además de las herramientas de compilación cruzada para simular la arquitectura ARM64 en tu sistema (preferiblemente Linux o WSL en Windows).

1. Abre una terminal y asegúrate de tener instalados los paquetes de ensamblado y emulación (en Ubuntu/Debian):
   `sudo apt install gcc-aarch64-linux-gnu qemu-user`
2. Abre una terminal en la carpeta raíz del proyecto Golampi.
3. Ejecuta el comando `composer install` para descargar las dependencias de ANTLR4.
4. Inicia el servidor integrado de PHP ejecutando el siguiente comando en la carpeta de tu proyecto:
   `php -S localhost:8000`
5. Abre tu navegador web y dirígete a `http://localhost:8000`.

## 2. Conociendo la Interfaz

El IDE de Golampi está diseñado para ser minimalista e intuitivo, facilitando la escritura de código fuente y la visualización del código máquina generado. Se divide en tres áreas principales:

* **Barra de Herramientas (Superior):** Botones de control de archivos, limpieza y ejecución.
* **Área de Trabajo (Izquierda):** Editor de código con numeración de líneas y la Consola de Salida interactiva.
* **Panel de Reportes (Derecha/Abajo):** Tablas dinámicas que se generan tras la compilación (Errores y Símbolos).

![alt text](image.png)

## 3. Crear, Editar y Ejecutar Código

### 3.1. Gestión de Archivos

En la barra de herramientas superior tienes opciones para manejar tu código sin necesidad de usar editores externos:

* **Nuevo Archivo:** Limpia el editor y la consola para empezar desde cero.
* **Abrir Archivo:** Abre el explorador de archivos de tu sistema operativo para cargar archivos directamente al editor.
* **Guardar Código:** Descarga el texto actual del editor como un archivo llamado `codigo.go` en tu computadora.

### 3.2. Escribir y Compilar

1. Escribe tu código Golampi en el **Editor de Código**. El editor soporta el uso de la tecla `Tab` para facilitar la indentación.
2. Haz clic en el botón oscuro **"Ejecutar Analizador"**.
3. El compilador traducirá tu código a Ensamblador ARM64, generará un archivo `.s`, lo compilará con GCC y lo ejecutará usando QEMU. 
4. El resultado final de la ejecución, seguido de **todo el código ASM generado**, se mostrará inmediatamente en la **Consola de Salida** (panel oscuro inferior).

![alt text](image-1.png)

## 4. Interpretación de Reportes

Al compilar el código, el sistema analiza todo el flujo estáticamente, generando tablas visuales en la parte inferior de la página para facilitar la depuración y el entendimiento del programa.

### 4.1. Reporte de Errores Encontrados

El compilador cuenta con un modo estricto de validación de tipos y sintaxis. Si tu código contiene operaciones inválidas, se recolectarán los fallos y se mostrará una tabla con detalles precisos:

* **Tipo:** Categoría del fallo (Léxico, Sintáctico o Semántico).
* **Descripción:** Explicación del fallo (por ejemplo, incompatibilidad de tipos o variables no declaradas).
* **Línea y Columna:** Ubicación exacta en tu código para una corrección rápida.

![alt text](image-2.png)

### 4.2. Reporte de Tabla de Símbolos

Si el análisis es exitoso y el código declara variables, constantes, funciones o matrices, se generará una tabla detallando el estado de la memoria detectado en *tiempo de compilación* :

* **Identificador:** El nombre asignado a la variable o función.
* **Tipo:** El tipo de dato (ej. `entero`, `cadena`, `arreglo`, `función`).
* **Ámbito:** El contexto donde existe (ej. `global`, `main`, o dentro de subrutinas).
* **Valor:** El contenido inicial detectado. 
* **Línea / Columna:** Ubicación exacta de su declaración original.

![alt text](image-3.png)