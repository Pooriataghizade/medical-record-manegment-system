<?php
require ("./../jdf.php");
?> 
<!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT -->
<!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT -->
   <script>
        function updateTime() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            // Format the time
            const formattedTime = `${hours}:${minutes}:${seconds}`;

            // Update the time display
            document.getElementById("time").textContent = formattedTime;
        }

        // Update the time every second
        setInterval(updateTime, 1000);
    </script>
    <!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT -->
    <!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT --><!-- SCRIPT -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../style.css">
</head>