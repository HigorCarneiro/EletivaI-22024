<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/cursos.php';
    require_once '../funcoes/professores.php';
    require_once '../funcoes/matriculas.php';

    $dadosCursos = gerarDadosGraficoCursos();
    $dadosProfessores = gerarDadosGraficoProfessores();
    $dadosMatriculas = gerarDadosGraficoMatriculas();
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard - Sistema de Gerenciamento de Cursos</h2>

        <div id="chart_cursos" style="width: 100%; height: 500px;"></div>
        <div id="chart_professores" style="width: 100%; height: 500px;"></div>
        <div id="chart_matriculas" style="width: 100%; height: 500px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Carregar a biblioteca do Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            var dataCursos = google.visualization.arrayToDataTable([
                ['Curso', 'Número de Alunos', { role: 'style' }],
                <?php foreach ($dadosCursos as $d): ?>
                    ['<?= $d['nome'] ?>', <?= $d['num_alunos'] ?>, 'blue'],
                <?php endforeach; ?>
            ]);

            var optionsCursos = {
                title: 'Número de Alunos por Curso',
                hAxis: {title: 'Cursos',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'}
            };

            var chartCursos = new google.visualization.BarChart(document.getElementById('chart_cursos'));
            chartCursos.draw(dataCursos, optionsCursos);

            var dataProfessores = google.visualization.arrayToDataTable([
                ['Professor', 'Número de Matrículas', { role: 'style' }],
                <?php foreach ($dadosProfessores as $d): ?>
                    ['<?= $d['nome'] ?>', <?= $d['num_matriculas'] ?>, 'magenta'],
                <?php endforeach; ?>
            ]);

            var optionsProfessores = {
                title: 'Número de Matrículas por Professor',
                hAxis: {title: 'Professor', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'}
            };

            var chartProfessores = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var dataMatriculas = google.visualization.arrayToDataTable([
                ['Curso', 'Número de Matrículas', { role: 'style' }],
                <?php foreach ($dadosMatriculas as $m): ?>
                    ['<?= $m['curso'] ?>', <?= $m['num_matriculas'] ?>, 'orange'],
                <?php endforeach; ?>
            ]);

            var optionsMatriculas = {
                title: 'Número de Matrículas por Curso',
                hAxis: {title: 'Cursos',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'}
            };

            var chartMatriculas = new google.visualization.BarChart(document.getElementById('chart_matriculas'));
            chartMatriculas.draw(dataMatriculas, optionsMatriculas);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
