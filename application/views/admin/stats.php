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
    <h1>Statistik Afiliator STAINU</h1>
    <div class="stats-container">
        <div class="stats-top">
            <h3 id="top"></h3>
        </div>
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div> 
    </div>


    

    <script>
document.addEventListener('DOMContentLoaded', (event) => {
    var xValues = ["Sosial Media", "Dosen", "Alumni", "NU", "Lainnya"];
        var yValues = [0, 0, 0, 0, 0];
        var namedValue = {};
        var top = document.getElementById("top")

        var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];
        <?php 
        
        $arr = json_encode($this->Form_model->get_stats()->result_array());
        echo "var values = $arr;\n";
        ?>;
        
        values.forEach(value => {
            Object.values(value).forEach(id => {
                id = parseInt(id);
                yValues[id-1]++;
                namedValue[xValues[id-1]] = yValues[id-1];
            });
        });

        var max = Math.max(...yValues);
        var maxValues = [xValues[yValues.indexOf(max)]];
        Object.keys(namedValue).map(function (key, index) {
            if (namedValue[key] == max){
                if (key != xValues[yValues.indexOf(max)]){
                    maxValues.push(key);
                }
            }
        });


        var topText= "adalah yang paling berkontribusi dalam mempromosikan STAINU";
        maxValues.forEach(value => {
            var index = maxValues.indexOf(value);
            var color = `<span class='color' id='color${barColors.indexOf(barColors[index])}'>${value}</span>`
            maxValues[index] = color;
        });

        if (maxValues.length == 2){
            top.innerHTML = `<h3>${maxValues[0]} dan ${maxValues[1]} ${topText}</h3>`;
        }else {
            var text = maxValues.join(", ")
            top.innerHTML = `<h3>${text} ${topText}</h3>`;
        }



new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
});
})

    


    </script>
</body>
</html>