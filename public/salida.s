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
    // Declaracion de variables: a
    // Cargando  INT: 10
    mov x9, #10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-16]
    // Declaracion de variables: b
    // Cargando  INT: 20
    mov x9, #20
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-32]
    // Lectura de variable: a
    ldr x9, [x29, #-16]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: b
    ldr x9, [x29, #-32]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: >
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    cmp x11, x10
    cset x9, gt
    sub sp, sp, #16
    str x9, [sp, #0]
    // Logico: NOT ! 
    ldr x9, [sp, #0]
    add sp, sp, #16
    cmp x9, xzr
    cset x9, eq
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_else_1
    // If: ejecutar bloque true
    // Cargando  INT: 999
    mov x9, #999
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
    b if_end_0
    if_else_1:
    // If: ejecutar bloque else
    // Cargando  INT: 111
    mov x9, #111
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
    if_end_0:
    // Declaracion de variables: c
    // Lectura de variable: a
    ldr x9, [x29, #-16]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: b
    ldr x9, [x29, #-32]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: ==
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    cmp x11, x10
    cset x9, eq
    sub sp, sp, #16
    str x9, [sp, #0]
    // Logico: NOT ! 
    ldr x9, [sp, #0]
    add sp, sp, #16
    cmp x9, xzr
    cset x9, eq
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-48]
    // Lectura de variable: c
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
    // Lectura de variable: c
    ldr x9, [x29, #-48]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_end_2
    // If: ejecutar bloque true
    // Cargando  INT: 555
    mov x9, #555
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
    if_end_2:
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
cmp x5, #0
b.ge loop 
neg x5, x5
loop:
udiv x6, x5, x4
msub x7, x6, x4, x5
add x7, x7, #48
sub x2, x2, #1
strb w7, [x2]
mov x5, x6
cbnz x6, loop
cmp x0, #0 
bge done_itoa 
mov w7, #45 
sub x2, x2, #1 
strb w7, [x2] 
done_itoa: 
ldr x3, =buffer
add x3, x3, #31
sub x1, x3, x2
mov x0, x2
ret
.section .rodata
newline: .asciz "\n"
