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
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">

        <!--Google Fonts Link For Ticket View-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rye&family=Special+Elite&display=swap" rel="stylesheet">


        <!--Give webpage a favicon icon-->
        <link rel = "icon" type = "image/x-icon" href = "Images/TrainGreen2.ico">

        <!--CSS part-->
        <style>
            #NavigationBarTable:hover
            {
                font-size: 20px;
            }

            .Category
            {
                font-family: 'Rye', cursive;
                font-size: 130%;
                font-weight: 580;
                padding-top: 0px;
                padding-bottom: 0px;
                height: 0;
            }

            .Details
            {
                font-family: 'Special Elite', cursive;
                font-size: 100%;
                padding-top: 0px;
                padding-bottom: 0px;
                height: 0;
            }

            .InputHeading
            {
                text-align: right;
                height: 100%;
                /* width: 50%; */
                font-family: 'Mystery Quest', cursive;
                font-size: 25px;
                font-weight: 700;
                text-shadow: 2px 2px 1px #a78600;
                color: #FDC901;
            }

            .InputOptions
            {
                height: 100%;
                width: 20%;
                font-family: 'Mystery Quest', cursive;
                font-size: 15px;
                /* font-weight: 700;
                text-shadow: 1px 1px 1px #FDC901;
                color: #bf9902; */
            }

            #ShowTicketButtonSpan
            {
                background-color: #01AF00; 
            }

            #ShowTicketButtonSpan:hover
            {
                background-color: #04D005;
                font-size: 30px;
            }

            #TicketShowing td
            {
                padding: 1%;
            }

            #CancelTicket td
            {
                padding: 1%;
            }

            #CancelTicketButtonSpan
            {
                background-color: #DC143C; 
            }

            #CancelTicketButtonSpan:hover
            {
                background-color: #D2042D;
                font-size: 30px;
            }
        </style>
        <script>
            $('#TicketIDInput').on('input', function()
            {
                var TicketIDInput = $(this).val();
                $.ajax(
                {
                    url: 'TicketStatus.php',
                    type: 'POST',
                    data:
                        {
                            TicketIDInput: TicketIDInput
                        },
                    dataType: 'json',
                    success: function(response)
                    {
                        console.log(response);
                    }
                });
            });

            $('#CancelTicketIDInput').on('input', function()
            {
                var TicketIDInput = $(this).val();
                $.ajax(
                {
                    url: 'TicketStatus.php',
                    type: 'POST',
                    data:
                        {
                            CancelTicketIDInput: CancelTicketIDInput
                        },
                    dataType: 'json',
                    success: function(response)
                    {
                        console.log(response);
                    }
                });
            });
        </script>
        <!--Give webpage a name-->
        <title>Fantasy Express - Ticket Status</title>
    </head>
    <body style = "background-image: url('Images/Background.webp'); background-repeat: no-repeat; background-size:cover;">
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
        <div class = "Heading" style = "padding: 20px; padding-bottom: 0px; margin-left: auto; margin-right: auto; text-align: center; font-family: 'Mystery Quest', cursive; font-size: 400%; font-weight: 700; text-shadow: 2px 2px 1px #a78600; color: #FDC901;">
            Ticket Status
        </div>
        <div id = "ShowTicket">
            <table id = "TicketShowing" style = "table-layout: fixed; width: 100%; font-family: 'Mystery Quest', cursive;">
                <form action = "" method = "POST">
                <tr>
                    <td div class = "InputHeading">
                            Ticket ID
                    </td>
                    <td id = "TicketIDInput">
                        <select id = "TicketIDInput" name = "TicketIDInput" div class = "InputOptions" required>
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
                                    $sql = "SELECT * FROM passengers";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        // output data of each row
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo "<option value = \"" . $row['ticketid'] . "\">" . $row['ticketid'] . "</option>";
                                        }
                                    }
                                    else
                                    {
                                        // echo "No entries for location names";
                                    }
                                    // $conn->close();
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr style = "text-align: center;">
                        <td colspan = "2" id = "ShowTicketButton" name = "ShowTicketButton" style = "font-size: 25px; font-weight: 700;  text-shadow: 2px 2px 1px #a78600; color: #FDC901; padding: 2%;" onclick = "document.getElementById('SubmitButton').click();">
                            <div id = "ShowTicketButtonSpan" style = "display: inline-block; padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px;" onclick = "document.getElementById('SubmitButton').click();">
                                Show Ticket
                            </div>
                        </td>
                    </tr>
                    <button type = "submit" id = "SubmitButton" name = "SubmitButton" style = "visibility: collapse;"></button>
                </form>
            </table>
        </div>
        <div id = "Ticket" style = "visibility: collapse;">
            <!-- <img src = "Images/TicketWithoutBackground.png" style = "width: 100%; display: flex;"> -->
            <!-- <table style = "width: 100%; height: 100%; display: block; padding: 4%; padding-left: 5%; padding-right: 5%; background-image: url('Images/TicketWithoutBackground.png'); background-repeat: no-repeat; background-size: 100% 100%;"> -->
                <!-- F8CE7C     401300 -->
                <!-- <tbody style = "display: block; border: 2px solid #401300; outline: 1px solid #F8CE7C; box-shadow: 0 0 0 2px #401300, 0 0 0 5px #F8CE7C, 0 0 0 15px #401300; padding-left: 1%;"> -->
            <?php
                if (isset($_POST['CancelButton']))
                {
                    echo "<script>";
                        echo "document.getElementById('ShowTicket').style.visibility = 'collapse';";
                        echo "document.getElementById('SubmitButton').click();";
                        echo "document.getElementById('Ticket').style.visibility = 'visible';";
                    echo "</script>";
                    $TicketID = $_POST['CancelTicketIDInput'];
                    if ($stmt = $conn->prepare("CALL Cancel(?)"))
                    {
                        $stmt->bind_param("i", $TicketID);
                        // echo $Destination, $Origin, $DepartureDate, $ArrivalDate, $SeatType, $Name, $Age, $Gender, $Address;
                        if ($stmt->execute())
                        {
                            // echo "Undar to arahay hain bhai";
                            echo "<table style = \"border-radius: 25px; background: rgba(255, 255, 255, 0.2); table-layout: fixed; width: 100%; text-align: center; font-family: 'Mystery Quest', cursive;\">";
                                echo "<td class = 'InputHeading' style = 'background: rgb(220, 20, 60, 0.9); padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px; text-align: center;'>Ticket has been successfully deleted.</td>";
                            echo "</table>";
                        }
                        else
                        {
                            // printf("Error: %s\n", $stmt->error);
                            // echo "<tr><td colspan = '4'>Nahin horaha execute bhai</td></tr>";
                        }
                        $stmt->close();
                    }
                    // echo "<h1>" . $_POST['CancelTicketIDInput'] ."</h1>";
                }
                if (isset($_POST['SubmitButton']))
                {
                    echo "<script>";
                        echo "document.getElementById('ShowTicket').style.visibility = 'collapse';";
                        echo "document.getElementById('SubmitButton').click();";
                        echo "document.getElementById('Ticket').style.visibility = 'visible';";
                    echo "</script>";
                    $sql = "SELECT * FROM passengers, trainsstatus, trainslist WHERE ticketid = '" . $_POST['TicketIDInput'] . "' AND passengers.trainsstatusid = trainsstatus.trainsstatusid AND trainslist.trainnumber = trainsstatus.trainnumber LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                            echo "<table id = 'TicketTable' style = \"width: 100%; height: 100%; display: block; padding: 4%; padding-left: 5%; padding-right: 5%; background-image: url('Images/TicketWithoutBackground.png'); background-repeat: no-repeat; background-size: 100% 100%;\">";
                                echo "<tbody style = \"display: block; border: 2px solid #401300; outline: 1px solid #F8CE7C; box-shadow: 0 0 0 2px #401300, 0 0 0 5px #F8CE7C, 0 0 0 15px #401300; padding-left: 1%;\">";
                                    echo "<tr>";
                                        echo "<td colspan = '2'>";
                                            echo "<span style = \"font-family: 'Rye', cursive; font-size: 250%;\">Ticket ID:</span>";
                                            echo "<span style = \"font-family: 'Special Elite', cursive; font-size: 250%;\">&nbsp;" . $row['ticketid'] . "</span>";
                                            echo "<br>";
                                            echo "<span style = \"font-family: 'Rye', cursive; font-size: 130%;\">Status:</span>";
                                            if ($row['ticketstatus'] == 'W')
                                            {
                                                echo "<span style = \"font-family: 'Special Elite', cursive; font-size: 100%;\">&nbsp;Waiting</span>";
                                            }
                                            else if ($row['ticketstatus'] == 'C')
                                            {
                                                echo "<span style = \"font-family: 'Special Elite', cursive; font-size: 100%;\">&nbsp;Confirmed</span>";
                                            }
                                        echo "</td>";
                                        echo "<td rowspan = '3'>";
                                            echo "<img src = 'Images/TicketImage1.jpg' style = 'display: block; object-fit: contain; width: 100%; height: 100%;'>";
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td colspan = '2'>";
                                            echo "<span class = 'Category'>Destination:</span>";
                                            echo "<span class = 'Details'>&nbsp;" . $row['destination'] ."</span>";
                                            echo "<br>";
                                            echo "<span class = 'Category'>Origin:</span>";
                                            echo "<span class = 'Details'>&nbsp;" . $row['origin'] ."</span>";
                                            echo "<br>";
                                            echo "<br>";
                                            echo "<span class = 'Category'>Train:</span>";
                                            echo "<span class = 'Details'>&nbsp;" . $row['trainname'] ."</span>";
                                            echo "<br>";
                                            echo "<span class = 'Category'>Seat Type:</span>";
                                            if ($row['seattype'] == 'A')
                                            {
                                                echo "<span class = 'Details'>&nbsp;AC</span>";
                                            }
                                            else if ($row['seattype'] == 'G')
                                            {
                                                echo "<span class = 'Details'>&nbsp;General</span>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "<span class = 'Category'>Departure:</span>";
                                            echo "<br>";
                                            echo "<span class = 'Details'>" . date('jS F, Y', strtotime($row['departuredate'])) . "<br>" . $row['departuretime'] . "</span>";
                                            echo "<br>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<span class = 'Category'>Arrival:</span>";
                                            echo "<br>";
                                            echo "<span class = 'Details'>" . date('jS F, Y', strtotime($row['arrivaldate'])) . "<br>" . $row['arrivaltime'] . "</span>";
                                            echo "<br>";
                                        echo "</td>";
                                    echo "</tr>";
                                echo "</tbody>";
                            echo "</table>";
                            echo "<table id = 'CancelTicket' style = \"table-layout: fixed; width: 100%; text-align: center; font-family: 'Mystery Quest', cursive;\">";
                                echo "<form method = 'POST' action = ''>"; 
                                    echo "<tr>";
                                        echo "<td id = 'CancelTicketButton' name = 'CancelTicketButton' style = \"font-size: 25px; font-weight: 700;  text-shadow: 2px 2px 1px #a78600; color: #FDC901;\" onclick = \"document.getElementById('CancelButton').click();\">";
                                            echo "<div id = 'CancelTicketButtonSpan' style = \"display: inline-block; padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px;\" onclick = \"document.getElementById('CancelButton').click();\">Cancel Ticket</div>";
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr style = \"visibility: collapse;\">";
                                        echo "<td>";
                                            echo "<input type = 'number; id = 'CancelTicketIDInput' name = 'CancelTicketIDInput'  style = 'visibility: collapse;' value = '" . $row['ticketid'] . "'>";
                                            echo "<button type = 'submit' id = 'CancelButton' name = 'CancelButton' style = \"visibility: collapse;\"></button>";
                                        echo "</td>";
                                    echo "</tr>";
                                echo "</form>"; 
                            echo "</table>";
                            // if (isset($_POST['CancelButton']))
                            // {
                            //     echo "<h1>lllllllllllllllllllllllllll" . $row['ticketid'] . "</h1>";
                            // }
                        }
                    }
                    else
                    {
                        echo "<table style = \"width: 100%; height: 100%; display: block; padding: 4%; padding-left: 5%; padding-right: 5%; background-image: url('Images/TicketWithoutBackground.png'); background-repeat: no-repeat; background-size: 100% 100%;\">";
                            echo "<tbody style = \"display: block; border: 2px solid #401300; outline: 1px solid #F8CE7C; box-shadow: 0 0 0 2px #401300, 0 0 0 5px #F8CE7C, 0 0 0 15px #401300; padding-left: 1%;\">";
                                echo "<tr>";
                                    echo "<td colspan = '2'>";
                                        echo "<span style = 'font-family: 'Rye', cursive; font-size: 250%;'>Ticket ID Does Not Exist.</span>";
                                    echo "</td>";
                                echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                    }
                }                     
            ?>
        </div>
    </body>
</html>