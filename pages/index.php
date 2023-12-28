<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    include("../db_Connection.php");

    $get = $connect->prepare("SELECT * FROM profits ORDER BY id DESC LIMIT 6");
    $get->execute();

    $response = $get->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <header>
        <h1>TP | Track Profits</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profits</a></li>
        </ul>
    </header>
    <div>
        <form id="TargetForm" action="./AddProfit.php" method="POST">
            <div>
                <h1>Add Profits</h1>
                <img src="/TrackProfits/icons/money-bill-trend-up-solid 1.svg" />
            </div>
            <div>
                <div>
                    <input type="text" id="item" name="Item" placeholder="Item" />
                </div>
                <div>
                    <input type="number" id="price" name="Price" placeholder="Price" />
                </div>
                <div id="add_edite">
                    <button>
                        <p>Add</p>
                        <img src="/TrackProfits/icons/plus-solid 1.svg" />
                    </button>
                </div>
            </div>
        </form>
        <div id="content">
            <?php if (count($response)) { ?>

                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($response as $val) { ?>

                            <tr>
                                <td> <?php print $val['id'] ?> </td>
                                <td> <?php print $val['Item'] ?> </td>
                                <td> <?php print $val['Price'] ?> $ </td>
                                <td>
                                    <a id="edite" style="margin-right: 7px;">
                                        <p>Edite</p>
                                        <img src="/TrackProfits/icons/pen-to-square-solid 1.svg" style="margin-left: 5px;" />
                                    </a>
                                    <a href=<?php print "./DeleteProfit.php?id=" . $val['id'] ?> style="margin-left: 7px;">
                                        <p>Delete</p>
                                        <img src="/TrackProfits/icons/trash-solid 1.svg" style="margin-left: 5px;" />
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            <?php } ?>
        </div>
    </div>

    <script>
        const EditeBtn = document.getElementById("edite");
        const add_edite = document.getElementById("add_edite");
        const TargetForm = document.getElementById("TargetForm");

        const OnClick_On_EditeBtn = (e) => {
            const Item = document.getElementById("item");
            const Price = document.getElementById("price");

            const id = e.target.parentElement.tagName === "A" ?
                e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent :
                e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;

            const OldItem = e.target.parentElement.tagName === "A" ?
                e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.textContent :
                e.target.parentElement.previousElementSibling.previousElementSibling.textContent;

            const OldPrice = e.target.parentElement.tagName === "A" ?
                e.target.parentElement.parentElement.previousElementSibling.textContent :
                e.target.parentElement.previousElementSibling.textContent;

            Item.value = OldItem, Price.value = parseInt(OldPrice);
            TargetForm.action = `./EditeProfit.php?id=${parseInt(id)}`;
            add_edite.innerHTML = `
                <button id='editeBTN' style="background: #1FCD26;">
                    <p>Edite</p>
                    <img src="/TrackProfits/icons/pen-to-square-solid-edite.svg" />
                </button>
            `;
        };

        EditeBtn.addEventListener("click", OnClick_On_EditeBtn);
    </script>

</body>

</html>