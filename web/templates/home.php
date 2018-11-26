<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- CSS Form -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/style.css" />
    <title>Cebong</title>
     <!-- Sidebar & Content Style                                                   -->
     <!-- Source: https://bootstrapious.com/p/bootstrap-sidebar                     -->
     
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <!-- Sidebar Form -->

            <form action = "<?php $_PHP_SELF ?>" method = "POST" id="main-form" style="overflow: auto;max-height: 98vh;">
                <label for="age">Age:</label>
                <input type="text" class="form-control" placeholder=""  id="age" name="age">
                <br>

                <label for="sex">Sex:</label>
                <select class="btn btn-default btn-block" id="sex" name="sex">
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
                <br>

                <label for="chest">Chest Pain:</label>
                <select class="btn btn-default btn-block" id="chest" name="chest">
                    <option value="1">Typical angina</option>
                    <option value="2">Atypical angina</option>
                    <option value="3">Non-angina</option>
                    <option value="4">Asymptotic</option>
                </select>
                <br>

                <label for="bloodPressure">Blood Pressure:</label>
                <input type="text" class="form-control" placeholder="mmHg" id="bloodPressure" name="bloodPressure">
                <br>

                <label for="cholestrol">Cholestrol:</label>
                <input type="text" class="form-control" placeholder="mg/dl" id="cholestrol" name="cholestrol">
                <br>
    
                <label for="bloodSugar">Blood Sugar > 120mg/dl:</label>
                <select class="btn btn-default btn-block" id="bloodSugar" name="bloodSugar">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <br>

                <label for="ecg">Resting ECG:</label>
                <select class="btn btn-default btn-block" id="ecg" name="ecg">
                    <option value="0">Normal</option>
                    <option value="1">ST-T wave abnormality</option>
                    <option value="2">Left Ventricular Hyperthrophy</option>
                </select>
                <br>

                <label for="heartRate">Max Heart Rate:</label>
                <input type="text" class="form-control" placeholder="" id="heartRate" name="heartRate">
                <br>
                
                <label for="eia">Exercise Induced Angina:</label>
                <select class="btn btn-default btn-block" id="eia" name="eia">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <br>

                <label for="stDepression">ST depression relative to rest:</label>
                    <input type="text" class="form-control" placeholder="" id="stDepression" name="stDepression">
                <br>

                <label for="eia">Peak Exercise ST Segment:</label>
                <select class="btn btn-default btn-block" id="eia" name="eia">
                    <option value="1">Upsloping</option>
                    <option value="2">Flat</option>
                    <option value="3">Downsloping</option>
                </select>
                <br>

                <label for="vessles">Number of Major Vessels:</label>
                <select class="btn btn-default btn-block" id="vessles" name="vessles">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <br>

                <label for="thal">Thal:</label>
                <select class="btn btn-default btn-block" id="thal" name="thal">
                    <option value="3">Normal</option>
                    <option value="6">Fixed Defect</option>
                    <option value="7">Reversable Defect</option>
                </select>
                <br>

                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 5%">Submit</button>
            </form>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    
                    <h1 class="text-center">
                        <img class="rounded" src="static/content.jpg"></a>
                    </h1>                
                </div>
            </nav>
    
            <?php
                ini_set('max_execution_time', 600);
                $url = 'http://127.0.0.1:5000/';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
                $response = curl_exec($ch);
                curl_close($ch);

                $response = json_decode($response); 
                echo $response;
            ?>
        </div>
    </div>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });
        
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>
</html>