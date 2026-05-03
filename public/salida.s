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
    sub sp, sp, #1344
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #1344
    // --- IMPRESION ---
    // Cargando STRING: "=== INICIO DE CALIFICACION: ARREGLOS N-D ==="
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
    // Cargando STRING: "\n--- 5.3 INDICE DE INESTABILIDAD ---"
    ldr x9, =msg_1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion corta: matrizInstabilidad
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 5
    mov x9, #5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 8
    mov x9, #8
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 4
    mov x9, #4
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 6
    mov x9, #6
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 7
    mov x9, #7
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 9
    mov x9, #9
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 9
    mov x9, #9
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-192]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-176]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-160]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-128]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-112]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-80]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-64]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-48]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-32]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-16]
    // --- IMPRESION ---
    // Cargando STRING: "Indice:"
    ldr x9, =msg_2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // Lectura de variable: matrizInstabilidad
    mov x10, 16
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- Llamada a funcion: indiceInestabilidad (AAPCS64) ---
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    bl func_indiceInestabilidad
    mov x9, x0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.4 REGLA DE CRAMER ---"
    ldr x9, =msg_3
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion corta: matrizSistema
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-256]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-240]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-224]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-208]
    // Declaracion corta: vectorSistema
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 5
    mov x9, #5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 6
    mov x9, #6
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #288
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #272
    sub x16, x29, x16
    str x9, [x16]
    // Declaracion corta: resultadoCramer
    // Lectura de variable: matrizSistema
    mov x10, 208
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: vectorSistema
    mov x10, 272
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- Llamada a funcion: reglaCramer (AAPCS64) ---
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x1, x9
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    bl func_reglaCramer
    mov x9, x0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #304
    sub x16, x29, x16
    str x9, [x16]
    // --- IMPRESION ---
    // Cargando STRING: "x, y:"
    ldr x9, =msg_4
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: resultadoCramer ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x16, #304
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_int
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: resultadoCramer ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x16, #304
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // Cargando STRING: "\n--- 5.5 PROMEDIO DE CAPAS ---"
    ldr x9, =msg_5
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion corta: cubo
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 5
    mov x9, #5
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 7
    mov x9, #7
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 4
    mov x9, #4
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 6
    mov x9, #6
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 8
    mov x9, #8
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #432
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #416
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #400
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #384
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #368
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #352
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #336
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #320
    sub x16, x29, x16
    str x9, [x16]
    // Declaracion corta: promedios
    // Lectura de variable: cubo
    mov x10, 320
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- Llamada a funcion: promedioCapas (AAPCS64) ---
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    bl func_promedioCapas
    mov x9, x0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #448
    sub x16, x29, x16
    str x9, [x16]
    // --- IMPRESION ---
    // Cargando STRING: "Promedios capa 0:"
    ldr x9, =msg_6
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: promedios ---
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
    mov x16, #448
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: promedios ---
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
    mov x16, #448
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    fmov s0, w1
    fcvt d0, s0
    ldr x0, =fmt_float
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Promedios capa 1:"
    ldr x9, =msg_7
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: promedios ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
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
    mov x16, #448
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: promedios ---
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
    mov x16, #448
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    fmov s0, w1
    fcvt d0, s0
    ldr x0, =fmt_float
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n--- 5.6 SOFTMAX ---"
    ldr x9, =msg_8
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // Declaracion corta: matrizSoft
    // --- EVALUANDO ARREGLO LITERAL ---
    // Cargando FLOAT: 1.0
    ldr w9, =1065353216
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 2.0
    ldr w9, =1073741824
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 3.0
    ldr w9, =1077936128
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 4.0
    ldr w9, =1082130432
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 2.0
    ldr w9, =1073741824
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 1.0
    ldr w9, =1065353216
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #544
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #528
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #512
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #496
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #480
    sub x16, x29, x16
    str x9, [x16]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #464
    sub x16, x29, x16
    str x9, [x16]
    // Declaracion corta: soft
    // Lectura de variable: matrizSoft
    mov x10, 464
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- Llamada a funcion: softmax (AAPCS64) ---
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    bl func_softmax
    mov x9, x0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x16, #560
    sub x16, x29, x16
    str x9, [x16]
    // --- IMPRESION ---
    // Cargando STRING: "Fila 0:"
    ldr x9, =msg_9
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: soft ---
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
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: soft ---
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
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: soft ---
    mov x14, xzr
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    fmov s0, w1
    fcvt d0, s0
    ldr x0, =fmt_float
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "Fila 1:"
    ldr x9, =msg_10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    ldr x0, =fmt_str
    bl printf
    ldr x0, =fmt_space
    bl printf
    // --- LECTURA DE ARREGLO: soft ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
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
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: soft ---
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
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
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
    // --- LECTURA DE ARREGLO: soft ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Cargando  INT: 2
    mov x9, #2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x16, #560
    sub x16, x29, x16
    ldr x12, [x16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x1, [sp, #0]
    add sp, sp, #16
    fmov s0, w1
    fcvt d0, s0
    ldr x0, =fmt_float
    bl printf
    ldr x0, =fmt_newline
    bl printf
    // --- IMPRESION ---
    // Cargando STRING: "\n=== FIN DE CALIFICACION: ARREGLOS N-D ==="
    ldr x9, =msg_11
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
    add sp, sp, #1344
    // Retornar
    ret
    // ------- Fin de funcion: main -------
    // ------- Funcion : indiceInestabilidad -------
    func_indiceInestabilidad:
    // Reservar espacio para registro de activacion
    sub sp, sp, #368
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #368
    // Recibiendo parametro: matriz
    str x0, [x29, #-16]
    // Declaracion de variables: total
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-32]
    // --- INICIO FOR ---
    // Declaracion corta: i
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-48]
    for_start_0:
    // Lectura de variable: i
    ldr x9, [x29, #-48]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
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
    // --- INICIO FOR ---
    // Declaracion corta: j
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-64]
    for_start_3:
    // Lectura de variable: j
    ldr x9, [x29, #-64]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 4
    mov x9, #4
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
    // Declaracion corta: dif
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-48]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-64]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 4
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-48]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-64]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 4
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-80]
    // Lectura de variable: dif
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 0
    mov x9, #0
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
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_end_6
    // If: ejecutar bloque true
    // Lectura de variable: dif
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Negacion Unaria (-)
    ldr x10, [sp, #0]
    add sp, sp, #16
    sub x9, xzr, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-80]
    if_end_6:
    // Lectura de variable: dif
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (+=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    ldr x20, [x29, #-32]
    add x21, x20, x9
    str x21, [x29, #-32]
    for_update_4:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-64]
    add x9, x9, 1
    str x9, [x29, #-64]
    b for_start_3
    for_end_5:
    // --- FIN FOR ---
    for_update_1:
    // --- Incremento: i++ ---
    ldr x9, [x29, #-48]
    add x9, x9, 1
    str x9, [x29, #-48]
    b for_start_0
    for_end_2:
    // --- FIN FOR ---
    // Lectura de variable: total
    ldr x9, [x29, #-32]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Return: Preparando registros de salida multiples
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    b func_end_indiceInestabilidad
    func_end_indiceInestabilidad:
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #368
    // Retornar
    ret
    // ------- Fin de funcion: indiceInestabilidad -------
    // ------- Funcion : reglaCramer -------
    func_reglaCramer:
    // Reservar espacio para registro de activacion
    sub sp, sp, #416
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #416
    // Recibiendo parametro: matriz
    str x0, [x29, #-16]
    // Recibiendo parametro: vector
    str x1, [x29, #-32]
    // Declaracion de variables: respuesta
    mov x9, xzr
    str x9, [x29, #-64]
    str x9, [x29, #-48]
    // Declaracion corta: det
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-80]
    // Lectura de variable: det
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 0
    mov x9, #0
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
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_end_7
    // If: ejecutar bloque true
    // Lectura de variable: respuesta
    mov x10, 48
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Return: Preparando registros de salida multiples
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    b func_end_reglaCramer
    if_end_7:
    // Declaracion corta: detX
    // --- LECTURA DE ARREGLO: vector ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    ldr x12, [x29, #-32]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: vector ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    ldr x12, [x29, #-32]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    // Declaracion corta: detY
    // --- LECTURA DE ARREGLO: matriz ---
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: vector ---
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    ldr x12, [x29, #-32]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: vector ---
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    ldr x12, [x29, #-32]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Cargando  INT: 1
    mov x9, #1
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
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: * (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    mul x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sub x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-112]
    // --- ASIGNACION A ARREGLO: respuesta (=) ---
    // Lectura de variable: detX
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: det
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: / (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sdiv x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x19, [sp, #0]
    add sp, sp, #16
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 48
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    str x19, [x16, #0]
    // --- ASIGNACION A ARREGLO: respuesta (=) ---
    // Lectura de variable: detY
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: det
    ldr x9, [x29, #-80]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: / (int)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    sdiv x9, x11, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x19, [sp, #0]
    add sp, sp, #16
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 48
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    str x19, [x16, #0]
    // Lectura de variable: respuesta
    mov x10, 48
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Return: Preparando registros de salida multiples
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    b func_end_reglaCramer
    func_end_reglaCramer:
    // --- Salvando arreglo retornado en el HEAP ---
    ldr x1, =string_heap_ptr
    ldr x2, [x1]
    mov x3, 32
    add x4, x2, x3
    str x4, [x1]
    sub x5, x4, 16
    mov x10, x0
    mov x11, x5
    mov x12, 0
    copy_loop_reglaCramer:
    cmp x12, 2
    b.ge copy_done_reglaCramer
    ldr x13, [x10]
    str x13, [x11]
    sub x10, x10, 16
    sub x11, x11, 16
    add x12, x12, 1
    b copy_loop_reglaCramer
    copy_done_reglaCramer:
    mov x0, x5
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #416
    // Retornar
    ret
    // ------- Fin de funcion: reglaCramer -------
    // ------- Funcion : promedioCapas -------
    func_promedioCapas:
    // Reservar espacio para registro de activacion
    sub sp, sp, #496
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #496
    // Recibiendo parametro: cubo
    str x0, [x29, #-16]
    // Declaracion de variables: salida
    mov x9, xzr
    str x9, [x29, #-80]
    str x9, [x29, #-64]
    str x9, [x29, #-48]
    str x9, [x29, #-32]
    // --- INICIO FOR ---
    // Declaracion corta: k
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-96]
    for_start_8:
    // Lectura de variable: k
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
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
    b.eq for_end_10
    // --- INICIO FOR ---
    // Declaracion corta: i
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-112]
    for_start_11:
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
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
    b.eq for_end_13
    // Declaracion de variables: suma
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-128]
    // --- INICIO FOR ---
    // Declaracion corta: j
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    for_start_14:
    // Lectura de variable: j
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
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
    b.eq for_end_16
    // --- LECTURA DE ARREGLO: cubo ---
    mov x14, xzr
    // Lectura de variable: k
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (+=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    ldr x20, [x29, #-128]
    add x21, x20, x9
    str x21, [x29, #-128]
    for_update_15:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-144]
    add x9, x9, 1
    str x9, [x29, #-144]
    b for_start_14
    for_end_16:
    // --- FIN FOR ---
    // --- ASIGNACION A ARREGLO: salida (=) ---
    // Lectura de variable: suma
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 2.0
    ldr w9, =1073741824
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: / (float)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    scvtf s0, w11
    fmov s1, w10
    fdiv s2, s0, s1
    fmov w9, s2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x19, [sp, #0]
    add sp, sp, #16
    mov x14, xzr
    // Lectura de variable: k
    ldr x9, [x29, #-96]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: i
    ldr x9, [x29, #-112]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 2
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 32
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    str x19, [x16, #0]
    for_update_12:
    // --- Incremento: i++ ---
    ldr x9, [x29, #-112]
    add x9, x9, 1
    str x9, [x29, #-112]
    b for_start_11
    for_end_13:
    // --- FIN FOR ---
    for_update_9:
    // --- Incremento: k++ ---
    ldr x9, [x29, #-96]
    add x9, x9, 1
    str x9, [x29, #-96]
    b for_start_8
    for_end_10:
    // --- FIN FOR ---
    // Lectura de variable: salida
    mov x10, 32
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Return: Preparando registros de salida multiples
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    b func_end_promedioCapas
    func_end_promedioCapas:
    // --- Salvando arreglo retornado en el HEAP ---
    ldr x1, =string_heap_ptr
    ldr x2, [x1]
    mov x3, 64
    add x4, x2, x3
    str x4, [x1]
    sub x5, x4, 16
    mov x10, x0
    mov x11, x5
    mov x12, 0
    copy_loop_promedioCapas:
    cmp x12, 4
    b.ge copy_done_promedioCapas
    ldr x13, [x10]
    str x13, [x11]
    sub x10, x10, 16
    sub x11, x11, 16
    add x12, x12, 1
    b copy_loop_promedioCapas
    copy_done_promedioCapas:
    mov x0, x5
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #496
    // Retornar
    ret
    // ------- Fin de funcion: promedioCapas -------
    // ------- Funcion : softmax -------
    func_softmax:
    // Reservar espacio para registro de activacion
    sub sp, sp, #752
    // Guardar FP y LR al fondo del frame
    str x29, [sp, #0]
    str x30, [sp, #16]
    // Actualizar FP (Apunta al inicio del frame)
    add x29, sp, #752
    // Recibiendo parametro: matriz
    str x0, [x29, #-16]
    // Declaracion de variables: salida
    mov x9, xzr
    str x9, [x29, #-112]
    str x9, [x29, #-96]
    str x9, [x29, #-80]
    str x9, [x29, #-64]
    str x9, [x29, #-48]
    str x9, [x29, #-32]
    // --- INICIO FOR ---
    // Declaracion corta: i
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-128]
    for_start_17:
    // Lectura de variable: i
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 2
    mov x9, #2
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
    b.eq for_end_19
    // Declaracion de variables: max
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-128]
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
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    // --- INICIO FOR ---
    // Declaracion corta: j
    // Cargando  INT: 1
    mov x9, #1
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-160]
    for_start_20:
    // Lectura de variable: j
    ldr x9, [x29, #-160]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
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
    b.eq for_end_22
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-160]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: max
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: >
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    fmov s0, w11
    fmov s1, w10
    fcmp s0, s1
    cset x9, gt
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_end_23
    // If: ejecutar bloque true
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-160]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-144]
    if_end_23:
    for_update_21:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-160]
    add x9, x9, 1
    str x9, [x29, #-160]
    b for_start_20
    for_end_22:
    // --- FIN FOR ---
    // Declaracion de variables: sum
    // Cargando FLOAT: 0.0
    ldr w9, =0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-160]
    // Declaracion de variables: exp
    mov x9, xzr
    str x9, [x29, #-208]
    str x9, [x29, #-192]
    str x9, [x29, #-176]
    // --- INICIO FOR ---
    // Declaracion corta: j
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-224]
    for_start_24:
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
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
    b.eq for_end_26
    // Declaracion corta: v
    // Cargando FLOAT: 1.0
    ldr w9, =1065353216
    sub sp, sp, #16
    str x9, [sp, #0]
    // --- LECTURA DE ARREGLO: matriz ---
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    ldr x12, [x29, #-16]
    mov x13, 16
    mul x15, x14, x13
    sub x16, x12, x15
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: max
    ldr x9, [x29, #-144]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: - (float)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    fmov s0, w11
    fmov s1, w10
    fsub s2, s0, s1
    fmov w9, s2
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: + (float)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    fmov s0, w11
    fmov s1, w10
    fadd s2, s0, s1
    fmov w9, s2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-240]
    // Lectura de variable: v
    ldr x9, [x29, #-240]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando FLOAT: 0.1
    ldr w9, =1036831949
    sub sp, sp, #16
    str x9, [sp, #0]
    // Relacional: <
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    fmov s0, w11
    fmov s1, w10
    fcmp s0, s1
    cset x9, lt
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    // If: evaluar condicion
    cmp x9, xzr
    b.eq if_end_27
    // If: ejecutar bloque true
    // Cargando FLOAT: 0.1
    ldr w9, =1036831949
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-240]
    if_end_27:
    // --- ASIGNACION A ARREGLO: exp (=) ---
    // Lectura de variable: v
    ldr x9, [x29, #-240]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x19, [sp, #0]
    add sp, sp, #16
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 176
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    str x19, [x16, #0]
    // Lectura de variable: v
    ldr x9, [x29, #-240]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Reasignacion de variables (+=)
    ldr x9, [sp, #0]
    add sp, sp, #16
    ldr x20, [x29, #-160]
    fmov s0, w20
    fmov s1, w9
    fadd s2, s0, s1
    fmov w21, s2
    str x21, [x29, #-160]
    for_update_25:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-224]
    add x9, x9, 1
    str x9, [x29, #-224]
    b for_start_24
    for_end_26:
    // --- FIN FOR ---
    // --- INICIO FOR ---
    // Declaracion corta: j
    // Cargando  INT: 0
    mov x9, #0
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x9, [sp, #0]
    add sp, sp, #16
    str x9, [x29, #-224]
    for_start_28:
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Cargando  INT: 3
    mov x9, #3
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
    b.eq for_end_30
    // --- ASIGNACION A ARREGLO: salida (=) ---
    // --- LECTURA DE ARREGLO: exp ---
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    mov x12, 176
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    ldr x9, [x16, #0]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Lectura de variable: sum
    ldr x9, [x29, #-160]
    sub sp, sp, #16
    str x9, [sp, #0]
    // Aritmetica: / (float)
    ldr x10, [sp, #0]
    add sp, sp, #16
    ldr x11, [sp, #0]
    add sp, sp, #16
    fmov s0, w11
    fmov s1, w10
    fdiv s2, s0, s1
    fmov w9, s2
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x19, [sp, #0]
    add sp, sp, #16
    mov x14, xzr
    // Lectura de variable: i
    ldr x9, [x29, #-128]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x14, x11
    // Lectura de variable: j
    ldr x9, [x29, #-224]
    sub sp, sp, #16
    str x9, [sp, #0]
    ldr x11, [sp, #0]
    add sp, sp, #16
    mov x12, 3
    mul x14, x14, x12
    add x14, x14, x11
    mov x12, 32
    mov x13, 16
    mul x15, x14, x13
    add x16, x12, x15
    sub x16, x29, x16
    str x19, [x16, #0]
    for_update_29:
    // --- Incremento: j++ ---
    ldr x9, [x29, #-224]
    add x9, x9, 1
    str x9, [x29, #-224]
    b for_start_28
    for_end_30:
    // --- FIN FOR ---
    for_update_18:
    // --- Incremento: i++ ---
    ldr x9, [x29, #-128]
    add x9, x9, 1
    str x9, [x29, #-128]
    b for_start_17
    for_end_19:
    // --- FIN FOR ---
    // Lectura de variable: salida
    mov x10, 32
    sub x9, x29, x10
    sub sp, sp, #16
    str x9, [sp, #0]
    // Return: Preparando registros de salida multiples
    ldr x9, [sp, #0]
    add sp, sp, #16
    mov x0, x9
    b func_end_softmax
    func_end_softmax:
    // --- Salvando arreglo retornado en el HEAP ---
    ldr x1, =string_heap_ptr
    ldr x2, [x1]
    mov x3, 96
    add x4, x2, x3
    str x4, [x1]
    sub x5, x4, 16
    mov x10, x0
    mov x11, x5
    mov x12, 0
    copy_loop_softmax:
    cmp x12, 6
    b.ge copy_done_softmax
    ldr x13, [x10]
    str x13, [x11]
    sub x10, x10, 16
    sub x11, x11, 16
    add x12, x12, 1
    b copy_loop_softmax
    copy_done_softmax:
    mov x0, x5
    // Restaurar LR y FP
    ldr x30, [sp, #16]
    ldr x29, [sp, #0]
    // Restaurar SP
    add sp, sp, #752
    // Retornar
    ret
    // ------- Fin de funcion: softmax -------
.section .rodata
fmt_int: .asciz "%d"
fmt_float: .asciz "%.7g"
fmt_str: .asciz "%s"
fmt_char: .asciz "%c"
fmt_space: .asciz " "
fmt_newline: .asciz "\n"
fmt_nil: .asciz "<nil>"
msg_0: .asciz "=== INICIO DE CALIFICACION: ARREGLOS N-D ==="
msg_1: .asciz "\n--- 5.3 INDICE DE INESTABILIDAD ---"
msg_2: .asciz "Indice:"
msg_3: .asciz "\n--- 5.4 REGLA DE CRAMER ---"
msg_4: .asciz "x, y:"
msg_5: .asciz "\n--- 5.5 PROMEDIO DE CAPAS ---"
msg_6: .asciz "Promedios capa 0:"
msg_7: .asciz "Promedios capa 1:"
msg_8: .asciz "\n--- 5.6 SOFTMAX ---"
msg_9: .asciz "Fila 0:"
msg_10: .asciz "Fila 1:"
msg_11: .asciz "\n=== FIN DE CALIFICACION: ARREGLOS N-D ==="
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