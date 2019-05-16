$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {
        $.post("display.php",
        function (data)
        {
            console.log(data);
             var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].country);
                marks.push(data[i].amount);
            }

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: 'Ilość osób z poszczególnych krajów',
                        backgroundColor: '#49e2ff',
                        borderColor: '#fff',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: marks,
                        
                    }
                ]
            };

            var graphTarget = $("#graphCanvas");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata
            });
        });
    }
}