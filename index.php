<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>공기청정기 관리 페이지</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--blue);">
            <a class="navbar-brand text-light" href="#">공기청정기</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">메인 <span class="sr-only">(현재 페이지)</span></a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="settings.php">설정</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row vertical-center-row">
            <div class="col-sm-6 card" max-width="660" height="400">
                <div class="card-header">실시간 기록</div>
                <canvas id="data" width="660" height="400"></canvas>
            </div>
            <div class="col-sm-3">
				<h3>청정기 관리</h3>
                <div class="card">
                    <div class="card-header">바람 세기 조절</div>
						<form>
							<div class="form-group">
								<label for="fan-control" id="fan-strangth">현재 세기: 0/255</label>
								<input type="range" class="form-control-range" id="fan-control" min="0" max="255" value="0" height="40px">
							</div>
						</form>
                        <button id="fan-confirm" class="btn btn-primary">적용</button>
                </div>
				<br>
                <h3>CO2</h3>
                <div class="card" id="co2">
                    <div class="card-header"><b>CO2 상태</b></div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-spinner"></i> 데이터 없음</h5>
                        <p class="card-text">안전한 정도는 약 <b>1000ppm 이하</b>입니다.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            <h3>미세먼지, 온/습도</h3>
                <div class="card" id="microdust">
                    <div class="card-header"><b>미세먼지(PM 2.5) 상태</b></div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-spinner"></i> 데이터 없음</h5>
                        <p class="card-text">안전한 정도는 약 <b>60ugm3 이하</b>입니다.</p>
                    </div>
                </div>
                <br>
                <div class="card" id="dht">
                    <div class="card-header"><b>현재 온도/습도</b></div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-spinner"></i> 데이터 없음</h5>
                        <p class="card-text">온도와 습도를 감지합니다.</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
		<!-- colors
							background
							'rgba(255, 159, 64, 0.2)'
							
							border
							'rgba(255, 159, 64, 1)'
		!-->
		<script>
			var ctx = document.getElementById("data").getContext('2d');
			var dataChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["PM 3:00", "PM 4:00", "PM 5:00", "PM 6:00", "PM 7:00", "PM 9:00"],
					datasets: [{
						label: 'CO2 (NDIR Way, ppm)',
						data: [12, 19, 3, 5, 2, 3],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)'
						],
						borderWidth: 1
					},
					{
						label: 'CO2 (Chemical Way, ppm)',
						data: [16, 12, 6, 8, 3, 5],
						backgroundColor: [
							'rgba(54, 162, 235, 0.2)'
						],
						borderColor: [
							'rgba(54, 162, 235, 1)'
						],
						borderWidth: 1
					},
					{
						label: '미세먼지 (PM 2.5, ug/m3)',
						data: [32, 34, 67, 10, 8, 6],
						backgroundColor: [
							'rgba(255, 206, 86, 0.2)'
						],
						borderColor: [
							'rgba(255, 206, 86, 1)'
						],
						borderWidth: 1
					},
					{
						label: '온도 (ºC)',
						data: [24, 24, 23, 23, 22, 21],
						backgroundColor: [
							'rgba(75, 192, 192, 0.2)'
						],
						borderColor: [
							'rgba(75, 192, 192, 1)'
						],
						borderWidth: 1
					},
					{
						label: '습도 (%)',
						data: [32, 34, 34, 32, 29, 28],
						backgroundColor: [
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(153, 102, 255, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
            $(document).ready(function() {
                updateSensors();
                updateGraph();
            })

            function updateGraph() {
                $.ajax({
                    url: "/history.php",
                    type: "post",
                    cache: false,
                    success: function (data) {
                        var timeline = data.split("\n"),
                            glabels = [],
                            co2n = [],
                            co2c = [],
                            md = [],
                            humid = [],
                            temp = [];
                        $.each(timeline, function(index, value) {
                            var content = value.split(":");
                            if(content.length == 2) {
                                var date = new Date(parseInt(content[0], 10) * 1000);
                                var hours = "0" + date.getHours();
                                var minutes = "0" + date.getMinutes();
                                glabels.push(date.getMonth() + "/" + date.getDate() + "\n" + hours.substr(-2) + ":" + minutes.substr(-2));
                                var data = content[1];
                                var res = data.split(" ");
                                co2n.push(res[0]);
                                co2c.push(res[1]);
                                md.push(res[2]);
                                temp.push(res[3]);
                                humid.push(res[4]);
                            }
                        });
                        dataChart.data.labels = glabels;
                        var i = 0;
                        dataChart.data.datasets.forEach((dataset) => {
                            switch(i) {
                                case 0:
                                    dataset.data = co2n;
                                    break;
                                case 1:
                                    dataset.data = co2c;
                                    break;
                                case 2:
                                    dataset.data = md;
                                    break;
                                case 3:
                                    dataset.data = temp;
                                    break;
                                case 4:
                                    dataset.data = humid;
                                    break;
                            }
                            i++;
                        });
                        dataChart.update();
                    },
                    error: function (error) {
                        //console.log(error);
                    }
                });
                setTimeout("updateGraph()", 5000);
            }
            
            function updateSensors() {
                $.ajax({
                    url: "/sensors.php",
                    type: "post",
                    cache: false,
                    success: function (data) {
                        if(data == "noupdate") {
                            return;
                        }
                        var dummy = "true";
                        var res = data.split(" ");
                        if(res[0] < 700) {
                            $('#co2').addClass("bg-success");
                            $('#co2').removeClass("bg-warning");
                            $('#co2').removeClass("bg-danger");
                            $('#co2 .card-title').html("<i class=\"fas fa-check\"></i> 안전: <b>" + res[0] + " ppm(N)</b> / <b>" + res[1] + " ppm(C)</b>");
                        } else if(res[0] >= 700 && res[0] < 1000) {
                            $('#co2').addClass("bg-warning");
                            $('#co2').removeClass("bg-danger");
                            $('#co2').removeClass("bg-succcess");
                            $('#co2 .card-title').html("<i class=\"fas fa-times-circle\"></i> 주의: <b>" + res[0] + " ppm(N)</b> / <b>" + res[1] + " ppm(C)</b>");
                        } else if(res[0] >= 1000) {
                            $('#co2').addClass("bg-danger");
                            $('#co2').removeClass("bg-warning");
                            $('#co2').removeClass("bg-succcess");
                            $('#co2 .card-title').html("<i class=\"fas fa-times-circle\"></i> 위험: <b>" + res[0] + " ppm(N)</b> / <b>" + res[1] + " ppm(C)</b>");
                        } else {
                            $('#co2').removeClass("bg-danger");
                            $('#co2').removeClass("bg-warning");
                            $('#co2').removeClass("bg-succcess");
                            $('#co2 .card-title').html("<i class=\"fas fa-spinner\"></i> 데이터 없음");
                        }
                        if(res[2] < 25) {
                            $('#microdust').addClass("bg-success");
                            $('#microdust').removeClass("bg-warning");
                            $('#microdust').removeClass("bg-danger");
                            $('#microdust .card-title').html("<i class=\"fas fa-check\"></i> 안전: <b>" + res[2] + " ug/m3</b>");
                        } else if(res[2] >= 25 && res[2] < 70) {
                            $('#microdust').addClass("bg-warning");
                            $('#microdust').removeClass("bg-danger");
                            $('#microdust').removeClass("bg-succcess");
                            $('#microdust .card-title').html("<i class=\"fas fa-times-circle\"></i> 나쁨: <b>" + res[2] + " ug/m3</b>");
                        } else if(res[2] >= 70) {
                            $('#microdust').addClass("bg-danger");
                            $('#microdust').removeClass("bg-warning");
                            $('#microdust').removeClass("bg-succcess");
                            $('#microdust .card-title').html("<i class=\"fas fa-times-circle\"></i> 매우 나쁨: <b>" + res[2] + " ug/m3</b>");
                        } else {
                            $('#microdust').removeClass("bg-danger");
                            $('#microdust').removeClass("bg-warning");
                            $('#microdust').removeClass("bg-succcess");
                            $('#microdust .card-title').html("<i class=\"fas fa-spinner\"></i> 데이터 없음");
                        }
                        if(res[4] >= 0) {
                            $('#dht').addClass("bg-primary");
                            $('#dht').removeClass("bg-danger");
                            $('#dht .card-title').html("<i class=\"fas fa-spinner\"></i> 측정 중: <b>" + res[3] + "  ºC</b> / <b>" + res[4] + "%</b>");
                        } else {
                            $('#dht').removeClass("bg-danger");
                            $('#dht').removeClass("bg-succcess");
                            $('#dht .card-title').html("<i class=\"fas fa-spinner\"></i> 데이터 없음");
                        }
                        $('#fan-strangth').html("현재 세기: " + res[5] + "/255");
                    }
                });
                setTimeout("updateSensors()", 300);
            }
			$("#fan-confirm").click(function() {
                if(!$("#fan-confirm").hasClass("disabled")) {
                    $("#fan-confirm").addClass("disabled");
                    $.ajax({
                        url: "/fanset.php",
                        data: {power: document.getElementById("fan-control").value},
                        type: "post",
                        cache: false,
                        success: function (data) {
                            //console.log($("#fan-input").val());
                            //console.log(data);
                            if(data == "true") {
                                $("#fan-confirm").addClass("btn-success");
                                $("#fan-confirm").removeClass("btn-primary");
                                $("#fan-confirm").removeClass("btn-warning");
                                $("#fan-confirm").removeClass("btn-danger");
                                $("#fan-confirm").html("<i class=\"fas fa-check\"></i> 적용 완료!");
                            } else {
                                $("#fan-confirm").addClass("btn-danger");
                                $("#fan-confirm").removeClass("btn-primary");
                                $("#fan-confirm").removeClass("btn-success");
                                $("#fan-confirm").removeClass("btn-warning");
                                $("#fan-confirm").html("<i class=\"fas fa-times-circle\"></i> 적용 실패!");
                            }
                            setTimeout("restoreFanButton()", 1000);
                        }
                    });
                }
            })
			function restoreFanButton() {
                $("#fan-confirm").removeClass("bg-success");
                $("#fan-confirm").removeClass("bg-warning");
                $("#fan-confirm").removeClass("disabled");
                $("#fan-confirm").addClass("bg-primary");
                $("#fan-confirm").html("적용");
            }
        </script>
    </body>
</html>
