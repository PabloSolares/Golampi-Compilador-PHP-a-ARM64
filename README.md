# Golampi — Compilador PHP a ARM64

Compilador académico desarrollado en PHP que transforma programas escritos en Golampi a código ensamblador ARM64.

El proyecto demuestra conocimientos de compiladores, análisis semántico, diseño de lenguajes, generación de código y administración de memoria.

## Funcionalidades

- Análisis léxico y sintáctico mediante ANTLR4.
- Construcción y recorrido de un AST.
- Validación semántica y de tipos.
- Tabla de símbolos y manejo de ámbitos.
- Variables, arreglos, funciones y estructuras de control.
- Referencias, punteros y administración de pila.
- Generación de código ensamblador ARM64.
- Compatibilidad con GCC para ARM64 y QEMU.
- Interfaz web para ingresar, compilar y analizar código.
- Reportes de errores y resultados del proceso de compilación.

## Tecnologías

- PHP
- ANTLR4
- Composer
- ARM64 Assembly
- GCC Cross Compiler
- QEMU
- HTML, CSS y JavaScript

## Estructura principal

- `grammar/`: gramática del lenguaje.
- `ANTLRv4/`: lexer y parser generados.
- `src/AST/`: nodos y procesamiento del árbol sintáctico.
- `src/ARM/`: generación de código ARM64.
- `src/Env/`: ambientes y tabla de símbolos.
- `public/`: interfaz web y punto de entrada.

## Instalación

Requisitos:

- PHP
- Composer
- `gcc-aarch64-linux-gnu`
- `qemu-user`

```bash
composer install
php -S localhost:8000 -t public
```

Después, abre http://localhost:8000.
## Documentación
- [Manual técnico](ManualTecnico.md)
- [Manual de usuario](ManualUsuario.md)
Aprendizajes demostrados
Este proyecto evidencia conocimientos de teoría de compiladores, análisis estático, patrones de diseño, generación de código, estructuras de datos y programación de bajo nivel.
