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
    sub sp, sp, #384
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #384
    // Declaracion de variables: arr
    mov x9, 0
    str x9, [x29, #-16]
    str x9, [x29, #-32]
    str x9, [x29, #-48]
    str x9, [x29, #-64]
    str x9, [x29, #-80]
    // Declaracion de variables: suma
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    // Declaracion de variables: i
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-112]
    // --- INICIO FOR ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variable: i
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-112]
    for_start_0:
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 5
    mov x9, #5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: <
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    cmp x11, x10
    cset x9, lt
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    cmp x9, xzr
    b.eq for_end_2
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
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
    // Cargando  INT: 10
    mov x9, #10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica (Mul/Div/Mod): *
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- ASIGNACION A ARREGLO: arr ---
    ldr x10, [sp, #0]
    add sp, sp, #16
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 16
    mov x13, 16
    mul x14, x11, x13
    add x15, x12, x14
    sub x16, x29, x15
    str x10, [x16, #0]
    for_update_1:
    // --- Incremento: i++ ---
    ldr x9, [x29, #-112]
    add x9, x9, 1
    str x9, [x29, #-112]
    b for_start_0
    for_end_2:
    // --- FIN FOR ---
    // Declaracion de variables: j
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-128]
    // --- INICIO FOR ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variable: j
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-128]
    for_start_3:
    // Lectura de variable: j
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 5
    mov x9, #5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: <
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    cmp x11, x10
    cset x9, lt
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    cmp x9, xzr
    b.eq for_end_5
    // Declaracion de variables: temporal
    // --- LECTURA DE ARREGLO: arr ---
    // Lectura de variable: j
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 16
    mov x13, 16
    mul x14, x11, x13
    add x15, x12, x14
    sub x16, x29, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    // Lectura de variable: temporal
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 25
    mov x9, #25
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
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_else_7
    // If: ejecutar bloque true
    // Lectura de variable: suma
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: temporal
    ldr x9, [x29, #-144]
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
    // Reasignacion de variable: suma
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    b if_end_6
    if_else_7:
    // If: ejecutar bloque else
    // Lectura de variable: suma
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: temporal
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica (Suma/Resta): -
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variable: suma
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    if_end_6:
    for_update_4:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-128]
    add x9, x9, 1
    str x9, [x29, #-128]
    b for_start_3
    for_end_5:
    // --- FIN FOR ---
    // Lectura de variable: suma
    ldr x9, [x29, #-96]
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
    add sp, sp, #384
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
