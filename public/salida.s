.global _start
.section .bss
buffer: .skip 32
.section .text
_start:
    // --- PUNTO DE ENTRADA -----
    bl func_main
    // Fin del programa
    mov x0, #0
    mov x8, #93
    svc #0
    // ------- Funcion : main -------
    func_main:
    // Reservar espacio para registro de activacion
    sub sp, sp, #320
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #320
    // Declaracion de variables: base
    // Cargando  INT: 50
    mov x9, #50
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-16]
    // Declaracion de variables: negado
    // Lectura de variable: base
    ldr x9, [x29, #-16]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Negacion Unaria (-)
    ldr x10, [sp, #0]
    add sp, sp, #16
    sub x9, xzr, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-32]
    // Lectura de variable: negado
    ldr x9, [x29, #-32]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Imprimiendo valor
    ldr x0, [sp, #0]
    add sp, sp, #16
    bl itoa
    mov x2, x1
    mov x1, x0
    mov x0, #1
    mov x8, #64
    svc #0
    // Salto de línea
    mov x0, #1
    ldr x1, =newline
    mov x2, #1
    mov x8, #64
    svc #0
    // Declaracion de variables: calculo
    // Lectura de variable: base
    ldr x9, [x29, #-16]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 10
    mov x9, #10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Negacion Unaria (-)
    ldr x10, [sp, #0]
    add sp, sp, #16
    sub x9, xzr, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica (Suma/Resta): +
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    add x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-48]
    // Lectura de variable: calculo
    ldr x9, [x29, #-48]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Imprimiendo valor
    ldr x0, [sp, #0]
    add sp, sp, #16
    bl itoa
    mov x2, x1
    mov x1, x0
    mov x0, #1
    mov x8, #64
    svc #0
    // Salto de línea
    mov x0, #1
    ldr x1, =newline
    mov x2, #1
    mov x8, #64
    svc #0
    func_end_main:
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #320
    // Retornar
    ret
    // ------- Fin de funcion: main -------
itoa:
ldr x2, =buffer
add x2, x2, #31
mov w3, #0
strb w3, [x2]
mov x4, #10
mov x5, x0
loop:
udiv x6, x5, x4
msub x7, x6, x4, x5
add x7, x7, #48
sub x2, x2, #1
strb w7, [x2]
mov x5, x6
cbnz x6, loop
ldr x3, =buffer
add x3, x3, #31
sub x1, x3, x2
mov x0, x2
ret
.section .rodata
newline: .asciz "\n"
