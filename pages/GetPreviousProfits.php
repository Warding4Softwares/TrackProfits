<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Profits</title>
    <link rel="stylesheet" href="../style.css">

    <style>
        #content {
            padding: 0 20px;
            width: fit-content;
            max-height: 300px;
            overflow-x: hidden;
            margin: 0 auto;
        }
    </style>

</head>

<body>

    <?php
    include("../db_Connection.php");

    print "<script> window.DOMAIN = '" . $_ENV['DOMAIN'] . "';</script>";
    ?>

    <header>
        <h1>TP | Track Profits</h1>
        <ul>
            <li><a href=<?php print $_ENV['DOMAIN'] ?>>Home</a></li>
            <li><a href=<?php print $_ENV['DOMAIN'] . "/pages/GetPreviousProfits.php" ?>>Profits</a></li>
        </ul>
    </header>

    <div>
        <form id="GetProfitsForm">
            <h1>Get Profits</h1>
            <div>
                <div>
                    <input type="number" name="year" placeholder="Year">
                </div>
                <div>
                    <input type="number" name="month" placeholder="Month">
                </div>
                <div>
                    <input type="number" name="day" placeholder="Day">
                </div>
                <div>
                    <button type="submit" id="Send">Get Profits</button>
                </div>
            </div>
        </form>
        <div id="content"></div>
    </div>

    <script>
        const TargetForm = document.getElementById("GetProfitsForm");
        const btn = document.getElementById("Send");
        const Content = document.getElementById("content");

        const getProfits = async (e) => {
            e.preventDefault();

            const DATA = Object.fromEntries(new FormData(TargetForm));
            const result = await fetch(`${window.DOMAIN}/GetProfits.php`, {
                method: "POST",
                body: JSON.stringify(DATA),
                headers: {
                    "Content-Type": "application/json"
                }
            });

            const data = await result.json();

            Content.innerHTML = `
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.map(ele => {
                        return `
                            <tr>
                                <td>${ele.id}</td>
                                <td>${ele.Item}</td>
                                <td>${ele.Price}$</td>
                                <td>${ele.Date}</td>
                            </tr>
                        `;
                    }).join("")}
                </tbody>
            </table>
            `;
        };

        btn.addEventListener("click", getProfits);
    </script>

</body>

</html>