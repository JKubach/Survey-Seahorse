$(document).ready(function(){
        var queryValues = location.search;
    $.ajax({
        url: "https://www.surveyseahorse.com/res/query.php" + queryValues,
        method: "GET",
        success: function(data) {
            console.log(data);
            var question = [];
            var answer = [];
            var num_ans = [];
            var rand_clr = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                var a = 0.3;
                return "rgb(" + r + "," + g + "," + b + "," + a + ")";
            };

            for(var i in data) {
                question.push("Question " + data[i].question_number);
                answer.push(data[i].answer);
                num_ans.push(data[i].num_ans);
                rand_clr.push(dynamicColors());
            }

            var chartdata = {
                labels: answer,
                datasets : [
                    {
                        label: 'Answer Frequency',
                        backgroundColor: rand_clr,
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: num_ans
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'polarArea',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        text: 'Overall Distribution Of Answers for Question' + window.location.search.substr(1)
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
