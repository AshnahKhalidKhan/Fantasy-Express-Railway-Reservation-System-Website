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

            .InputHeading
            {
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
                width: 50%;
                font-family: 'Mystery Quest', cursive;
                font-size: 15px;
                /* font-weight: 700;
                text-shadow: 1px 1px 1px #FDC901;
                color: #bf9902; */
            }

            #BookTicketButtonSpan
            {
                background-color: #01AF00; 
            }

            #BookTicketButtonSpan:hover
            {
                background-color: #04D005;
                font-size: 30px;
            }

            #TicketBooking td
            {
                padding: 1%;
            }
        </style>
        <!--Give webpage a name-->
        <title>Fantasy Express - Book Your Ticket</title>
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
        <div class = "Heading" style = "padding: 20px; margin-left: auto; margin-right: auto; text-align: center; font-family: 'Mystery Quest', cursive; font-size: 400%; font-weight: 700; text-shadow: 2px 2px 1px #a78600; color: #FDC901;">
            Ticket Booking
        </div>
        <table id = "TicketBooking" style = "border-radius: 25px; background: rgba(255, 255, 255, 0.2); table-layout: fixed; width: 100%; text-align: center; font-family: 'Mystery Quest', cursive;">
            <form id = "TicketBookingForm" action = "" method = "POST">
                <tr>
                    <td div class = "InputHeading">
                            Train
                        </td>
                        <td id = "Train">
                            <select id = "Train" name = "Train" div class = "InputOptions" style = "width: 100%;" required>
                                <option></option>
                                <?php
                                    $sql = "SELECT * FROM trainsstatus ORDER BY destination";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        // output data of each row
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo "<option style = 'width: 100%;' value = \"" . $row['destination'] . "," . $row['origin'] . "," . $row['departuredate'] . "," . $row['arrivaldate'] . "\">DESTINATION:&nbsp;&nbsp;&nbsp;" . $row['destination'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORIGIN:&nbsp;&nbsp;&nbsp;" . $row['origin'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DEPARTURE:&nbsp;&nbsp;&nbsp;" . $row['departuredate'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARRIVAL:&nbsp;&nbsp;&nbsp;" . $row['arrivaldate'] . "</option>";
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
                        <td class = "InputHeading">
                            Seat Type
                        </td>
                        <td id = "SeatType">
                            <select id = "SeatType" name = "SeatType" div class = "InputOptions" required>
                                <option></option>
                                <option value = "A">AC</option>
                                <option value = "G">General</option>
                            </select>
                        </td>
                    </tr>
                        <td div class = "InputHeading">
                            Name
                        </td>
                        <td id = "Name">
                            <input type = "text" id = "Name" name = "Name"  div class = "InputOptions" required>
                        </td>
                        <td div class = "InputHeading">
                            House/Apartment #
                        </td>
                        <td id = "HouseApartmentNumber">
                            <input type = "text" id = "HouseApartmentNumber" name = "HouseApartmentNumber"  div class = "InputOptions" required>
                        </td>
                    </tr>
                    <tr>
                        <td div class = "InputHeading">
                            Age
                        </td>
                        <td id = "Age">
                            <input type = "number" min = "1" step = "1" id = "Age" name = "Age"  div class = "InputOptions" required>
                        </td>
                        <td div class = "InputHeading">
                            Street/Block #
                        </td>
                        <td id = "StreetBlockNumber">
                            <input type = "text" id = "StreetBlockNumber" name = "StreetBlockNumber"  div class = "InputOptions" required>
                        </td>
                    </tr>
                    <tr>
                        <td div class = "InputHeading">
                            Gender
                        </td>
                        <td id = "Gender">
                            <select id = "Gender" name = "Gender" div class = "InputOptions" required>
                                <option></option>
                                <option value = "F">Female</option>
                                <option value = "M">Male</option>
                            </select>
                        </td>
                        <td div class = "InputHeading">
                            City
                        </td>
                        <td id = "City">
                            <input type = "text" id = "City" name = "City"  div class = "InputOptions" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "4" id = "BookTicketButton" name = "BookTicketButton" style = "font-size: 25px; font-weight: 700;  text-shadow: 2px 2px 1px #a78600; color: #FDC901; padding: 2%;" onclick = "document.getElementById('SubmitButton').click();">
                            <div id = "BookTicketButtonSpan" style = "display: inline-block; padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px;" onclick = "document.getElementById('SubmitButton').click();">
                                Book Ticket!
                            </div>
                        </td>
                    </tr>
                    <button type = "submit" id = "SubmitButton" name = "SubmitButton" style = "visibility: hidden;"></button>
                </form>
            </table>
            
                <?php
                        if (isset($_POST['SubmitButton']))
                        {
                            $TrainDetails = explode(',', $_POST['Train']);
                            $Destination = addslashes($TrainDetails[0]);
                            $Origin = addslashes($TrainDetails[1]);
                            $DepartureDate = $TrainDetails[2];
                            $ArrivalDate = $TrainDetails[3];
                            $SeatType = $_POST['SeatType'];
                            $Name = $_POST['Name'];
                            $Age = $_POST['Age'];
                            $Gender = $_POST['Gender'];
                            $Address = addslashes($_POST['HouseApartmentNumber'] . ", " . $_POST['StreetBlockNumber'] . ", " . $_POST['City']);


                            // $sql = "CALL Booking('" . $Destination . "','" . $Origin . "','" .  $DepartureDate . "','" .  $ArrivalDate . "','" .  $SeatType. "','" .  $Name . "','" . $Age . "','" .  $Gender. "','" .  $Address . "')";
                            // if (mysqli_query($conn, $sql))
                            // {
                            //     $row = mysqli_fetch_assoc($result);
                            //     echo $row['@message'];
                            //     echo "<tr><td colspan = '4'>kkkkkkkkkkkkkkk". $row['@message'] ."</td></tr>";
                            // }
                            if ($stmt = $conn->prepare("CALL Booking(?,?,?,?,?,?,?,?,?)"))
                            {
                                $stmt->bind_param("ssssssiss", $Destination, $Origin, $DepartureDate, $ArrivalDate, $SeatType, $Name, $Age, $Gender, $Address);
                                // echo $Destination, $Origin, $DepartureDate, $ArrivalDate, $SeatType, $Name, $Age, $Gender, $Address;
                                if ($stmt->execute())
                                {
                                    // echo "Undar to arahay hain bhai";
                                    $stmt->bind_result($message);
                                    $stmt->fetch();
                                    echo "<script>";
                                        echo "document.getElementById('TicketBooking').style.visibility = 'collapse';";
                                    echo "</script>";
                                    echo "<table style = \"border-radius: 25px; background: rgba(255, 255, 255, 0.2); table-layout: fixed; width: 100%; text-align: center; font-family: 'Mystery Quest', cursive;\">";
                                        echo "<tr><td colspan = '4' div class = 'InputHeading' style = 'background: rgb(220, 20, 60, 0.8); padding: 1%; padding-left: 5%; padding-right: 5%; border-radius: 25px;'>". $message ."</td></tr>";
                                    echo "</table>";
                                }
                                else
                                {
                                    // printf("Error: %s\n", $stmt->error);
                                    // echo "<tr><td colspan = '4'>Nahin horaha execute bhai</td></tr>";
                                }
                                $stmt->close();
                            }
                        }
                        else
                        {
                            // echo "<tr><td colspan = '4'>Nothingggg</td></tr>";
                        }
                    //     $conn->close(); //Closing established connections
                    // }   
                ?>
    </body>
</html>