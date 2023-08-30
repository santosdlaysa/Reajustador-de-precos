<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajuste de preço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $preco = $_REQUEST["preco"] ?? '0';
        $reaj = $_REQUEST["reaj"] ?? '0';
       
    ?>
    <main>
        <h1>REAJUSTADOR DE PREÇOS</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do produto: </label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01"  value="<?=$preco?>">

            <label for="reaj">Qual sera o percentual do Reajuste: (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="reaj" id="reaj" min="0" max="100" step="1" oninput="mudaValor()" value="<?=$reaj?>">

            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        $aumento = $preco * $reaj / 100;
        $novo = $preco + $aumento;
    ?>
        <section>
            <h2>Resultado do Reajuste</h2>
            <p>O produto que custava R$<?=number_format($preco, 2, ",", ".")?>, com <strong><?=$reaj?> de aumento</strong> vai passar a custar <strong>R$<?=number_format($novo, 2, ",", ".")?></strong> a partir de agora.</p>
        </section>
        <script>
            //declaracao automaticas
            mudaValor()

            function mudaValor() {
                p.innerHTML = reaj.value;
            }
        </script>
</body>
</html>