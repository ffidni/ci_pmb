<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/stats.css')?>">
</head>
<body>
    <!-- <canvas id="stats" style="width: 100%; max-width: 600px;"></canvas> -->
    <div class="main-container">
    <div class="main-stats afiliator">
        <h1>Statistik Afiliator</h1>
        <div class="stats-container">
            <div class="stats-top">
                <h3 id="afiliator-top"></h3>
            </div>
        <canvas id="afiliatorChart"></canvas>
        </div> 
    </div>
    <div class="main-stats prodi">
        <h1>Statistik Prodi</h1>
        <div class="main-stats stats-container">
            <canvas id="prodiChart" class="even-canvas"></canvas>
            <div class="stats-top even">
                <h3 id="prodi-top"></h3>
            </div>
        </div>
    </div>

    </div>


    

    <script>
document.addEventListener('DOMContentLoaded', (event) => {
    function loadCanvas(xValues, yValues, values, chartId, topId, barColors, topText, type, colorOffset){
        var top = document.getElementById(topId);
        var namedValue = {};
        var max;
        var topText;
        values.forEach(value => {
            Object.values(value).forEach(id => {
                id = parseInt(id);
                yValues[id-1]++;
                namedValue[xValues[id-1]] = yValues[id-1];
            });
        });

        max = Math.max(...yValues);
        var maxValues = [xValues[yValues.indexOf(max)]];
        Object.keys(namedValue).map(function (key, index) {
            if (namedValue[key] == max){
                if (key != xValues[yValues.indexOf(max)]){
                    maxValues.push(key);
                }
            }
        });
            maxValues.forEach(value => {
            var index = xValues.indexOf(value);
            var indexMax = maxValues.indexOf(value);
            var color = `<span class='color' id='color${index+colorOffset}'>${value}</span>`
            console.log(color);
            maxValues[indexMax] = color;
        });


        if (maxValues.length == 2){
            top.innerHTML = `<h3>${maxValues[0]} dan ${maxValues[1]} ${topText}</h3>`;
        }else {
            var text = maxValues.join(", ")
            top.innerHTML = `<h3>${text} ${topText}</h3>`;
        }
        new Chart(chartId, {
          type: type,
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: Object.values(barColors),
              data: yValues
            }]
          },
        });
    }

    function generateYValues(xValues){
        var result = [];
        for (var _ = 0; _ < xValues.length; _++){
            result.push(0);
        }
        return result;
    }


    var afiliatorNames = ["Sosial Media", "Dosen", "Alumni", "NU", "Lainnya"];
    var prodiTitles = ["Manajemen Pendidikan Islam", "Komunikasi Penyiaran Islam", "Hukum Keluarga Islam", "Ekonomi Syariah"];
    var afiliatorColors = {
                    0:"#d12250",
                    1:"#00aba9",
                    2:"#346cbf",
                    3:"#24975a",
                    4:"#8d8d8d",
    };
    var prodiColors = {
        5: "#1db966",
        6: "#1d88b9",
        7: "#b9921d",
        8: "#82b91d",

    };
    <?php 
        
        $afiliator = json_encode($this->Form_model->get_stats('tahu_stainu')->result_array());
        $prodi = json_encode($this->Form_model->get_stats('id_prodi')->result_array());
        echo "var afiliatorValues = $afiliator;\n";
        echo "var prodiValues = $prodi;\n";
    ?>;

    loadCanvas(afiliatorNames, generateYValues(afiliatorNames), afiliatorValues, 'afiliatorChart', 'afiliator-top', afiliatorColors, "adalah yang paling berkontribusi dalam mempromosikan STAINU", "pie", 0);
    loadCanvas(prodiTitles, generateYValues(prodiTitles), prodiValues, 'prodiChart', 'prodi-top', prodiColors, "adalah jurusan yang paling diminati di STAINU", "doughnut", 5);
    
})

    


    </script>
</body>
</html>