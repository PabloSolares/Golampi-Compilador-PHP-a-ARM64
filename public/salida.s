.global main
.section .text
main:
   stp x29, x30, [sp, -16]!
   mov x29, sp
   bl init_heap
    // --- PUNTO DE ENTRADA -----
    bl func_main
    // Fin del programa
    mov x0, #0
    ldp x29, x30, [sp], 16
    ret
    // ------- Funcion : main -------
    func_main:
    // Reservar espacio para registro de activacion
    sub sp, sp, #480
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #480
    // --- IMPRESION ---
    // Cargando STRING: "=== INICIO DE CALIFICACION: ARREGLOS ==="
    ldr x9, =msg_0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.1 DECLARACION 1D INICIALIZADA Y NO INICIALIZADA ---"
    ldr x9, =msg_1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion de variables: arregloNoInit
    mov x9, xzr
    str x9, [x29, #0]
    str x9, [x29, #0]
    str x9, [x29, #0]
    str x9, [x29, #0]
    str x9, [x29, #-16]
    // Declaracion corta: arregloInit
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 10
    mov x9, #10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 20
    mov x9, #20
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 30
    mov x9, #30
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 40
    mov x9, #40
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 50
    mov x9, #50
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-32]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-48]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-64]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-80]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    // --- IMPRESION ---
    // Cargando STRING: "No inicializado pos0:"
    ldr x9, =msg_2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arregloNoInit ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 16
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Inicializado pos2:"
    ldr x9, =msg_3
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arregloInit ---
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 96
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.2 ARREGLOS DE TIPOS ESTATICOS ---"
    ldr x9, =msg_4
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion corta: arrFloat
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando FLOAT: 1.1
    ldr w9, =1066192077
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 2.2
    ldr w9, =1074580685
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 3.3
    ldr w9, =1079194419
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-160]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-176]
    // Declaracion corta: arrBool
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando TRUE
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FALSE
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando TRUE
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-192]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-208]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-224]
    // Declaracion corta: arrRune
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando CHAR: 'A' (ASCII: 65)
    mov x9, #65
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando CHAR: 'B' (ASCII: 66)
    mov x9, #66
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando CHAR: 'C' (ASCII: 67)
    mov x9, #67
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-240]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-256]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #272
    sub x16, x29, x16
    str x9, [x16]
    // Declaracion corta: arrString
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando STRING: "Ana"
    ldr x9, =msg_5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando STRING: "Luis"
    ldr x9, =msg_6
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando STRING: "Maria"
    ldr x9, =msg_7
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #288
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #304
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #320
    sub x16, x29, x16
    str x9, [x16]
    // --- IMPRESION ---
    // --- LECTURA DE ARREGLO: arrFloat ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 176
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    fmov s0, w1
    fcvt d0, s0
    ldr x0, =fmt_float
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arrBool ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 224
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    cmp x1, xzr
    b.ne bool_true_0
    ldr x1, =msg_8
    b bool_end_1
    bool_true_0:
    ldr x1, =msg_9
    bool_end_1:
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arrRune ---
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 272
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arrString ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 320
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.3 ACCESO Y MODIFICACION 1D ---"
    ldr x9, =msg_10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Original arregloInit[1]:"
    ldr x9, =msg_11
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arregloInit ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 96
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- ASIGNACION A ARREGLO: arregloInit (=) ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 96
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    // Cargando  INT: 99
    mov x9, #99
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x10, [sp, #0]
    add sp, sp, #16
    str x10, [x16, #0]
    // --- IMPRESION ---
    // Cargando STRING: "Modificado arregloInit[1]:"
    ldr x9, =msg_12
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: arregloInit ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 96
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Longitud arregloInit:"
    ldr x9, =msg_13
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // Funcion embebida: len() de Arreglo/Matriz
    mov x9, 5
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.4 DECLARACION MULTIDIMENSIONAL ---"
    ldr x9, =msg_14
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion de variables: matrizNoInit
    mov x9, xzr
    mov x16, #320
    sub x16, x29, x16
    str x9, [x16]
    mov x16, #336
    sub x16, x29, x16
    str x9, [x16]
    mov x16, #352
    sub x16, x29, x16
    str x9, [x16]
    mov x16, #368
    sub x16, x29, x16
    str x9, [x16]
    // Declaracion corta: matrizInit
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 4
    mov x9, #4
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #384
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #400
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #416
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #432
    sub x16, x29, x16
    str x9, [x16]
    // --- IMPRESION ---
    // Cargando STRING: "Matriz no inicializada [1][1]:"
    ldr x9, =msg_15
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: matrizNoInit ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 368
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Matriz inicializada [0][0]:"
    ldr x9, =msg_16
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: matrizInit ---
    mov x14, xzr
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 432
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.5 ACCESO Y MODIFICACION MULTIDIMENSIONAL ---"
    ldr x9, =msg_17
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Original matrizNoInit[0][1]:"
    ldr x9, =msg_18
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: matrizNoInit ---
    mov x14, xzr
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 368
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- ASIGNACION A ARREGLO: matrizNoInit (=) ---
    mov x14, xzr
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 368
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    // Cargando  INT: 77
    mov x9, #77
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x10, [sp, #0]
    add sp, sp, #16
    str x10, [x16, #0]
    // --- IMPRESION ---
    // Cargando STRING: "Modificado matrizNoInit[0][1]:"
    ldr x9, =msg_19
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: matrizNoInit ---
    mov x14, xzr
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 368
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n=== FIN DE CALIFICACION: ARREGLOS ==="
    ldr x9, =msg_20
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    func_end_main:
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #480
    // Retornar
    ret
    // ------- Fin de funcion: main -------
.section .rodata
fmt_int: .asciz "%d"
fmt_float: .asciz "%f"
fmt_str: .asciz "%s"
fmt_char: .asciz "%c"
fmt_space: .asciz " "
fmt_newline: .asciz "\n"
fmt_nil: .asciz "<nil>"
msg_0: .asciz "=== INICIO DE CALIFICACION: ARREGLOS ==="
msg_1: .asciz "\n--- 5.1 DECLARACION 1D INICIALIZADA Y NO INICIALIZADA ---"
msg_2: .asciz "No inicializado pos0:"
msg_3: .asciz "Inicializado pos2:"
msg_4: .asciz "\n--- 5.2 ARREGLOS DE TIPOS ESTATICOS ---"
msg_5: .asciz "Ana"
msg_6: .asciz "Luis"
msg_7: .asciz "Maria"
msg_8: .asciz "false"
msg_9: .asciz "true"
msg_10: .asciz "\n--- 5.3 ACCESO Y MODIFICACION 1D ---"
msg_11: .asciz "Original arregloInit[1]:"
msg_12: .asciz "Modificado arregloInit[1]:"
msg_13: .asciz "Longitud arregloInit:"
msg_14: .asciz "\n--- 5.4 DECLARACION MULTIDIMENSIONAL ---"
msg_15: .asciz "Matriz no inicializada [1][1]:"
msg_16: .asciz "Matriz inicializada [0][0]:"
msg_17: .asciz "\n--- 5.5 ACCESO Y MODIFICACION MULTIDIMENSIONAL ---"
msg_18: .asciz "Original matrizNoInit[0][1]:"
msg_19: .asciz "Modificado matrizNoInit[0][1]:"
msg_20: .asciz "\n=== FIN DE CALIFICACION: ARREGLOS ==="
.section .bss
string_heap: .skip 8192      // 8KB de memoria para nuevas cadenas
string_heap_ptr: .quad 0     // Puntero a la memoria libre

.section .text
// Funciones de inicializacion y concatenacion
init_heap:
    ldr x0, =string_heap
    ldr x1, =string_heap_ptr
    str x0, [x1]
    ret

concat_strings:
    ldr x2, =string_heap_ptr
    ldr x3, [x2]             
    mov x4, x3               
copy_str1:
    ldrb w5, [x0], #1        
    cbz w5, copy_str2        
    strb w5, [x3], #1        
    b copy_str1
copy_str2:
    ldrb w5, [x1], #1        
    cbz w5, done_concat      
    strb w5, [x3], #1        
    b copy_str2
done_concat:
    strb wzr, [x3], #1       
    str x3, [x2]             
    mov x0, x4               
    ret

// len
string_length:
    // Parametro: x0 = puntero al string. Retorno: x0 = longitud
    mov x1, 0                
count_loop:
    ldrb w2, [x0], #1        
    cbz w2, done_length      
    add x1, x1, 1            
    b count_loop
done_length:
    mov x0, x1               
    ret

// substr
substring:
    // x0 = str_ptr, x1 = start, x2 = length. Retorno: x0 = nuevo_str_ptr
    ldr x3, =string_heap_ptr
    ldr x4, [x3]          
    mov x5, x4            // guardamos inicio para retornar

    add x0, x0, x1        // avanza el puntero fuente hasta 'start'

copy_substr:
    cbz x2, done_substr   // Si length == 0 se termina
    ldrb w6, [x0], #1     // Leemos 1 byte
    cbz w6, done_substr   // Si encontramos ' ' antes de tiempo se termina 
    strb w6, [x4], #1     // Guardamos en el heap
    sub x2, x2, 1         // length--
    b copy_substr

done_substr:
    strb wzr, [x4], #1    // Ponemos ' ' al final
    str x4, [x3]          // Actualizamos puntero del heap
    mov x0, x5            // Retornamos la nueva cadena
    ret