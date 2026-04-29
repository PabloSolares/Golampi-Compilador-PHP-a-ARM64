<?php
require __DIR__ . '/../vendor/autoload.php';
require_once 'bootstrap.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

$input = "";
$output = "";
$allErrors = []; 
$symbolTable = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["expression"] ?? "";

    if (!empty($input)) {
        
        $inputStream = InputStream::fromString($input);

        $lexer = new GrammarLexer($inputStream);
        $lexer->removeErrorListeners();
        $errListener = new ErrorsListener();
        $lexer->addErrorListener($errListener);

        $tokens = new CommonTokenStream($lexer);
        $tokens->fill();
        $tokens->seek(0);
        
        $parser = new GrammarParser($tokens);
        $parser->removeErrorListeners();
        $parser->addErrorListener($errListener);

        $tree = $parser->program();
        $compiler = new \App\Compiler();

        try {
            $asmGenerador = $compiler->visit($tree);
            $asmCode = $asmGenerador->toString();
            
            $filename = "salida";
            file_put_contents("$filename.s", $asmCode);

            $compileCmd = "aarch64-linux-gnu-gcc  -static -o $filename $filename.s 2>&1";
            $compileOutput = shell_exec($compileCmd);

            if($compileOutput && !str_contains(strtolower($compileOutput), 'warning')){
                $output = "--- ERROR DE ENSAMBLADO ---\n" . $compileOutput . "\n\n--- CODIGO ASM GENERADO ---\n" . $asmCode;
            } else {
                $runCmd = "qemu-aarch64 $filename 2>&1";
                $runOutput = shell_exec($runCmd);
                $output = "--- SALIDA CONSOLA  (QEMU) ---\n" . $runOutput . "\n\n--- CODIGO ASM GENERADO ---\n" . $asmCode;
            }
        } catch(\Exception $e){
            $compiler->addErr($e->getMessage(), $tree);
        }

        $allErrors = array_merge($errListener->getErrors(), $compiler->errors);
        
        $symbolTable = [];

    } else {
        $output = "INGRESE UNA EXPRESION";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammar IDE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #line-numbers::-webkit-scrollbar { display: none; }
        #line-numbers { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen flex flex-col">

    <header class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <div>
            <h1 class="font-semibold text-xl tracking-wide">Grammar Interpreter</h1>
            <p class="text-xs text-slate-400 mt-1">Proyecto 1 [OLC2] - Pablo Daniel Solares Samayoa - 202400044</p>
        </div>
    </header>

    <main class="flex-1 p-6 flex flex-col gap-6 max-w-screen-2xl mx-auto w-full">
        
        <form method="post" class="flex flex-col border border-gray-300 rounded-lg shadow-sm bg-white overflow-hidden">
            
           <div class="bg-gray-50 border-b border-gray-300 px-4 py-2 flex flex-wrap gap-3 items-center">
                <input type="file" id="file-input" class="hidden" accept=".gl,.go,.txt">

                <button type="button" id="btn-nuevo" class="px-4 py-1.5 text-sm bg-white border border-gray-300 rounded shadow-sm hover:bg-gray-100 text-gray-700 transition">
                    Nuevo Archivo
                </button>
                <button type="button" id="btn-abrir" class="px-4 py-1.5 text-sm bg-white border border-gray-300 rounded shadow-sm hover:bg-gray-100 text-gray-700 transition">
                    Abrir Archivo
                </button>
                <button type="button" id="btn-guardar" class="px-4 py-1.5 text-sm bg-white border border-gray-300 rounded shadow-sm hover:bg-gray-100 text-gray-700 transition">
                    Guardar Código
                </button>
                
                <button type="submit" class="ml-auto px-5 py-1.5 text-sm bg-slate-800 text-white font-medium rounded shadow-sm hover:bg-slate-700 transition">
                    Ejecutar Analizador
                </button>
                
                <button type="button" onclick="document.getElementById('console-output').innerHTML=''" class="px-4 py-1.5 text-sm bg-white border border-gray-300 rounded shadow-sm hover:text-red-600 hover:bg-red-50 text-gray-700 transition">
                    Limpiar Consola
                </button>
            </div>

            <div class="flex flex-col lg:flex-row h-[600px]">
                
                <div class="flex-1 flex flex-col border-r border-gray-300 min-w-0">
                    
                    <div class="flex flex-1 overflow-hidden relative bg-white">
                        <div id="line-numbers" class="bg-gray-50 border-r border-gray-200 text-gray-400 font-mono text-sm text-right py-4 px-3 select-none overflow-y-auto w-12 flex-shrink-0">
                            1
                        </div>
                        <textarea id="code-editor" name="expression" spellcheck="false" class="flex-1 resize-none w-full h-full p-4 font-mono text-sm outline-none whitespace-pre overflow-auto text-gray-800 leading-normal" placeholder="Escribe tu código Grammar aquí..."><?php echo htmlspecialchars($input); ?></textarea>
                    </div>

                    <div class="bg-gray-50 px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider border-y border-gray-300">
                        Consola de Salida
                    </div>

                    <div class="h-1/3 bg-slate-900 text-gray-100 p-4 overflow-auto">
                        <pre id="console-output" class="whitespace-pre-wrap font-mono text-sm leading-relaxed text-emerald-400"><?php echo htmlspecialchars($output); ?></pre>
                    </div>
                </div>

                
            </div>
        </form>

        <?php if (count($allErrors) > 0): ?>
        <div class="bg-white border border-red-200 rounded-lg shadow-sm overflow-hidden">
            <div class="bg-red-50 border-b border-red-200 px-4 py-3 text-red-700 font-semibold text-sm uppercase tracking-wide">
                Reporte de Errores Encontrados
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Tipo</th>
                            <th scope="col" class="px-6 py-3">Descripción</th>
                            <th scope="col" class="px-6 py-3">Línea</th>
                            <th scope="col" class="px-6 py-3">Columna</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allErrors as $index => $err): ?>
                        <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-6 py-3 font-medium text-gray-900"><?php echo $index + 1; ?></td>
                            <td class="px-6 py-3">
                                <?php 
                                    $tipoError = htmlspecialchars($err['tipo'] ?? $err['type']);
                                    $isSemantico = (strtolower($tipoError) === 'semántico');
                                ?>
                                <span class="px-2 py-1 rounded text-xs font-medium <?php echo $isSemantico ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800'; ?>">
                                    <?php echo $tipoError; ?>
                                </span>
                            </td>
                            <td class="px-6 py-3"><?php echo htmlspecialchars($err['msg'] ?? $err['mensaje']); ?></td>
                            <td class="px-6 py-3"><?php echo $err['line'] ?? $err['linea']; ?></td>
                            <td class="px-6 py-3"><?php echo $err['column'] ?? $err['columna']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>

        <?php if (count($symbolTable) > 0): ?>
        <div class="bg-white border border-blue-200 rounded-lg shadow-sm overflow-hidden mb-8">
            <div class="bg-blue-50 border-b border-blue-200 px-4 py-3 text-blue-800 font-semibold text-sm uppercase tracking-wide">
                Reporte de Tabla de Símbolos
            </div>
            <div class="overflow-y-auto max-h-96">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200 sticky top-0">
                        <tr>
                            <th scope="col" class="px-6 py-3">Identificador</th>
                            <th scope="col" class="px-6 py-3">Tipo</th>
                            <th scope="col" class="px-6 py-3">Ámbito</th>
                            <th scope="col" class="px-6 py-3">Valor</th>
                            <th scope="col" class="px-6 py-3">Línea</th>
                            <th scope="col" class="px-6 py-3">Columna</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($symbolTable as $sym): ?>
                        <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-6 py-3 font-bold text-gray-800"><?php echo htmlspecialchars($sym['id']); ?></td>
                            <td class="px-6 py-3">
                                <span class="bg-slate-100 text-slate-700 border border-slate-200 px-2 py-1 rounded text-xs">
                                    <?php echo htmlspecialchars($sym['tipo']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-3"><?php echo htmlspecialchars($sym['ambito']); ?></td>
                            <td class="px-6 py-3 font-mono text-emerald-600"><?php echo htmlspecialchars($sym['valor']); ?></td>
                            <td class="px-6 py-3"><?php echo $sym['linea']; ?></td>
                            <td class="px-6 py-3"><?php echo $sym['columna']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>

    </main>

    <script>
        const editor = document.getElementById('code-editor');
        const lineNumbers = document.getElementById('line-numbers');
        
        const btnNuevo = document.getElementById('btn-nuevo');
        const btnAbrir = document.getElementById('btn-abrir');
        const btnGuardar = document.getElementById('btn-guardar');
        const fileInput = document.getElementById('file-input');


        function updateLineNumbers() {
            const lines = editor.value.split('\n').length;
            lineNumbers.innerHTML = Array(lines).fill(0).map((_, i) => i + 1).join('<br>');
        }

        editor.addEventListener('input', updateLineNumbers);
        
        editor.addEventListener('scroll', () => {
            lineNumbers.scrollTop = editor.scrollTop;
        });

        editor.addEventListener('keydown', function(e) {
            if (e.key == 'Tab') {
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;
                this.value = this.value.substring(0, start) + "    " + this.value.substring(end);
                this.selectionStart = this.selectionEnd = start + 4;
            }
        });


        btnNuevo.addEventListener('click', () => {
            if (confirm('¿Estás seguro de que deseas limpiar el entorno? Se perderá el código no guardado.')) {
                editor.value = '';
                updateLineNumbers();
                document.getElementById('console-output').innerHTML = '';
            }
        });

        btnAbrir.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) {
                editor.value = event.target.result;
                updateLineNumbers();
            };
            reader.readAsText(file);
            
            fileInput.value = ''; 
        });

        btnGuardar.addEventListener('click', () => {
            const text = editor.value;
            if (text.trim() === '') {
                alert('El editor está vacío. No hay nada que guardar.');
                return;
            }
            
            const blob = new Blob([text], { type: 'text/plain' });
            const anchor = document.createElement('a');
            
            anchor.download = 'codigo.gl'; 
            anchor.href = window.URL.createObjectURL(blob);
            anchor.click();
            
            window.URL.revokeObjectURL(anchor.href);
        });

        updateLineNumbers();
    </script>
</body>
</html>