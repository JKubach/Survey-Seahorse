<!DOCTYPE html>
<html>
    <head>
    <title>Question <?php echo $_GET['question'] ?> Details</title>
        <style type="text/css">
#chart-container {
    width: 640px;
    height: auto;
}
        </style>
    </head>
    <body>
        <center>
            <div id="chart-container">
                <canvas id="mycanvas"></canvas>
            </div>

            <!-- javascript -->
            <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="Chart.min.js"></script>
            <script type="text/javascript" src="app.js"></script>
        </center>
    </body>
</html>
