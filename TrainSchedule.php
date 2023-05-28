<?php
    include_once 'DBConnection.php'
 ?>

<!DOCTYPE html>
<html>
    <head>
        <!--Link CSS file-->
        <link rel = "stylesheet" href = "Railway.css">

        <!--Link JavaScript file-->
        <script type = "text/javascript" src = "Railway.js"></script>

        <!--Google Icons/Symbols Link-->
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family = Material+Icons">

        <!--Google Fonts Link For Navigation Bar-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">

        <!--Give webpage a favicon icon-->
        <link rel = "icon" type = "image/x-icon" href = "Images/TrainGreen2.ico">

        <!--CSS part-->
        <style>
            #NavigationBarTable:hover
            {
                font-size: 20px;
            }

            .Input
            {
                height: 100%;
                width: 50%;
                font-family: 'Mystery Quest', cursive;
            }

            #ShowTrainsButtonSpan
            {
                background-color: #01AF00; 
            }

            #ShowTrainsButtonSpan:hover
            {
                background-color: #04D005;
                font-size: 30px;
            }
        </style>
        
        <!--Give webpage a name-->
        <title>Fantasy Express - Train Schedule</title>
    </head>
    <body style = "background-image: url('Images/Background.webp'); background-repeat:repeat-y; background-size: 100% auto;">
        <!--Navigation Bar-->
        <div class = "NavigationBar">
            <table style = "margin-left: auto; margin-right: auto; table-layout: fixed; width: 60%; height: 120px; border-collapse: collapse;">
                <tbody style = "background-image: url('Images/TrainNavigationBar2878140.png'); background-repeat: no-repeat; background-size: 100% 100%;">
                    <tr style = "text-align: center; font-family: 'Mystery Quest', cursive; font-size: 16px; font-weight: 700; text-shadow: 1px 1px 0px #a78600; color: #FDC901;">
                        <!-- <td style = "text-align: center; padding-bottom: 25px;">Train<br/>Schedule</td> -->
                        <!-- <td style = "text-align: center; padding-bottom: 25px; text-shadow: 1px 1px 1px #f8eec5; color: #be9902;">Book<br/>Ticket</td> -->
                        <!-- <td style = "text-align: center; padding-bottom: 25px;">Ticket<br/>Status</td> -->
                        <td colspan = "6"></td>
                        <td colspan = "5" id = "NavigationBarTable" style = "text-align: center; padding-bottom: 15px;" onclick = "document.location = 'TrainSchedule.php'">Train<br>Schedule</td>
                        <td colspan = "6"></td>
                        <td colspan = "4" id = "NavigationBarTable"  style = "text-align: center; padding-bottom: 15px; text-shadow: 1px 1px 1px #f8eec5; color: #be9902;" onclick = "document.location = 'TicketBooking.php'">Book<br>Ticket</td>
                        <td colspan = "6"></td>
                        <td colspan = "4" id = "NavigationBarTable"  style = "text-align: center; padding-bottom: 15px; padding-left: 15px;" onclick = "document.location = 'TicketStatus.php'">Ticket<br>Status</td>
                        <td colspan = "6"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class = "Heading" style = "padding: 20px; margin-left: auto; margin-right: auto; text-align: center; font-family: 'Mystery Quest', cursive; font-size: 400%; font-weight: 700; text-shadow: 2px 2px 1px #a78600; color: #FDC901;">
            Train Schedule
        </div>
        <table id = "TrainSchedule" style = "border-radius: 25px; background: rgba(255, 255, 255, 0.4); table-layout: fixed; width: 100%; text-align: center; font-family: 'Mystery Quest', cursive;">
            <thead style = "font-size: 25px; font-weight: 700;  text-shadow: 2px 2px 1px #a78600; color: #FDC901;">
                <th>Train<br>Name</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Seat<br>Available</th>
            </thead>
            <tbody style = "font-size: 15px; font-weight: 700;  text-shadow: 1px 1px 1px #FDC901; color: #bf9902;">
                <form action = "" method = "POST">
                    <tr>
                        <td id = "TrainName">
                            <select id = "TrainName" name = "TrainName" div class = "Input">
                                <option></option>
                                <?php
                                // // Create connection
                                // $host = "localhost"; //server name
                                // $dbUsername = "root";
                                // $dbPassword = "";
                                // $dbname = "railwaysystem";

                                // //Creating connection to database
                                // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                                // //Checking connection
                                // if (mysqli_connect_error())
                                // {
                                //     die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                                // }
                                $sql = "SELECT DISTINCT trainname FROM trainslist";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0)
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<option value = \"" . $row['trainname'] . "\">" . $row['trainname'] . "</option>";
                                    }
                                }
                                else
                                {
                                    echo "No entries for train name";
                                }
                                ?>
                            </select>
                        </td>
                        <td id = "Origin">
                            <select id = "Origin" name = "Origin" div class = "Input">
                                <option></option>
                                <?php
                                // // Create connection
                                // $host = "localhost"; //server name
                                // $dbUsername = "root";
                                // $dbPassword = "";
                                // $dbname = "railwaysystem";

                                // //Creating connection to database
                                // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                                // //Checking connection
                                // if (mysqli_connect_error())
                                // {
                                //     die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                                // }
                                $sql = "SELECT DISTINCT locationname FROM locations";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0)
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<option value = \"" . $row['locationname'] . "\">" . $row['locationname'] . "</option>";
                                    }
                                }
                                else
                                {
                                    echo "No entries for location names";
                                }
                                // $conn->close();
                                ?>
                            </select>
                        </td>
                        <td id = "Destination">
                            <select id = "Destination" name = "Destination" div class = "Input">
                                <option></option>
                                <?php
                                // // Create connection
                                // $host = "localhost"; //server name
                                // $dbUsername = "root";
                                // $dbPassword = "";
                                // $dbname = "railwaysystem";

                                // //Creating connection to database
                                // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                                // //Checking connection
                                // if (mysqli_connect_error())
                                // {
                                //     die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                                // }
                                $sql = "SELECT DISTINCT locationname FROM locations";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0)
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<option value = \"" . $row['locationname'] . "\">" . $row['locationname'] . "</option>";
                                    }
                                }
                                else
                                {
                                    echo "No entries for location names";
                                }
                                // $conn->close();
                                ?>
                            </select>
                        </td>
                        <td id = "Departure">
                            <input type = "date" id = "Departure" name = "Departure" div class = "Input">
                        </td>
                        <td id = "Arrival">
                            <input type = "date" id = "Arrival" name = "Arrival"  div class = "Input">
                        </td>
                        <td id = "SeatAvailable">
                            <select id = "SeatAvailable" name = "SeatAvailable" div class = "Input">
                                <option></option>
                                <option value = "AC">AC</option>
                                <option value = "General">General</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "6" id = "ShowTrainsButton" name = "ShowTrainsButton" style = "font-size: 25px; font-weight: 700;  text-shadow: 2px 2px 1px #a78600; color: #FDC901; padding: 2%;" onclick = "document.getElementById('SubmitButton').click();">
                            <div id = "ShowTrainsButtonSpan" style = "display: inline-block; padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px;" onclick = "document.getElementById('SubmitButton').click();">
                                Show trains!
                            </div>
                        </td>
                    </tr>
                    <button type = "submit" id = "SubmitButton" name = "SubmitButton" style = "visibility: hidden;"></button>
                </form>
                <?php
                    // // Create connection
                    // $host = "localhost"; //server name
                    // $dbUsername = "root";
                    // $dbPassword = "";
                    // $dbname = "railwaysystem";

                    // //Creating connection to database
                    // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                    // //Checking connection
                    // if (mysqli_connect_error())
                    // {
                    //     die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                    // }                
                    $SELECT = "SELECT * FROM trainsstatus INNER JOIN trainslist ON trainsstatus.trainnumber = trainslist.trainnumber";
                    if (isset($_POST['SubmitButton']))
                    {
                        // echo "<tr><td colspan = '6'>Isset is being set</td></tr>";
                        $WHERE = " WHERE ";
                        if (!empty($_POST['TrainName']))
                        {
                            $WHERE .= "trainslist.trainname = \"" . $_POST['TrainName'] . "\"";
                        }
                        if (!empty($_POST['Origin']))
                        {
                            if ($WHERE != " WHERE ")
                            {
                                $WHERE .= " AND ";
                            }
                            $WHERE .= "trainsstatus.origin = \"" . $_POST['Origin'] . "\"";
                        }
                        if (!empty($_POST['Destination']))
                        {
                            // echo "<tr><td colspan = '6'>Isset is being set". $_POST['Destination'] . "</td></tr>";
                            if ($WHERE != " WHERE ")
                            {
                                $WHERE .= " AND ";
                            }
                            $WHERE .= "trainsstatus.destination = \"" . $_POST['Destination'] . "\"";
                        }
                        if (!empty($_POST['Departure']))
                        {
                            if ($WHERE != " WHERE ")
                            {
                                $WHERE .= " AND ";
                            }
                            $WHERE .= "trainsstatus.departuredate = '" . $_POST['Departure'] . "'";
                        }
                        if (!empty($_POST['Arrival']))
                        {
                            if ($WHERE != " WHERE ")
                            {
                                $WHERE .= " AND ";
                            }
                            $WHERE .= "trainsstatus.arrivaldate = '" . $_POST['Arrival'] . "'";
                        }
                        /*
                        NOTE TO SELF: WRITE CODE FOR SEAT AVAILABLE
                        */
                        if (!empty($_POST['SeatAvailable']))
                        {
                            if ($WHERE != " WHERE ")
                            {
                                $WHERE .= " AND ";
                            }
                            if ($_POST['SeatAvailable'] == "AC")
                            {
                                $WHERE .= "trainslist.totalacseats > 0";
                            }
                            else if ($_POST['SeatAvailable'] == "General")
                            {
                                $WHERE .= "trainslist.totalgeneralseats > 0";
                            }
                        }
                        if ($WHERE != " WHERE ")
                        {
                            $SELECT = $SELECT . $WHERE;
                        }
                    }
                    $AllDatabaseData = mysqli_query($conn, $SELECT);
                    $NoOfRowsInDatabase = mysqli_num_rows($AllDatabaseData);
                    if ($NoOfRowsInDatabase > 0)
                    {
                        //Printing all rows in the database
                        while ($DatabaseEntry = mysqli_fetch_assoc($AllDatabaseData))
                        {
                            echo "<tr>";
                            echo "<td>" . $DatabaseEntry['trainname'] . "</td>";
                            echo "<td>" . $DatabaseEntry['origin'] . "</td>";
                            echo "<td>" . $DatabaseEntry['destination'] . "</td>";
                            echo nl2br("<td>" . date('jS F, Y', strtotime($DatabaseEntry['departuredate'])) . "\n" . $DatabaseEntry['departuretime'] . "</td>");
                            echo nl2br("<td>" . date('jS F, Y', strtotime($DatabaseEntry['arrivaldate'])) . "\n" . $DatabaseEntry['arrivaltime'] . "</td>");
                            if ($DatabaseEntry['totalacseats'] > 0 && $DatabaseEntry['totalgeneralseats'] > 0)
                            {
                                echo nl2br("<td>AC\nGeneral</td>");
                            }
                            else if ($DatabaseEntry['totalacseats'] > 0)
                            {
                                echo nl2br("<td>AC</td>");
                            }
                            else if ($DatabaseEntry['totalgeneralseats'] > 0)
                            {
                                echo nl2br("<td>General</td>");
                            }   
                            echo "</tr>";
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan = '6'>0 entries in database.</td></tr>";
                    }
                    $conn->close(); //Closing established connections
                ?>
            </tbody>
        </table>
    </body>
</html>