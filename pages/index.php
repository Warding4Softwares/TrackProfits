<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include("../db_Connection.php");

        $get = $connect -> prepare("SELECT * FROM profits");
        $get -> execute();

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
        <form action="../AddProfit.php" method="POST">
            <div>
                <h1>Add Profits</h1>
                <img src="/TrackProfits/icons/money-bill-trend-up-solid 1.svg" />
            </div>
            <div>
                <div>
                    <input type="text" name="Item" placeholder="Item" />
                </div>
                <div>
                    <input type="number" name="Price" placeholder="Price" />
                </div>
                <div>
                    <button>
                        <p>Add</p>
                        <img src="/TrackProfits/icons/plus-solid 1.svg" />
                    </button>
                </div>
            </div>
        </form>
        <div id="content">
            <?php if (count($response)) {?>

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
                                <td> <?php print $val['id']?> </td>
                                <td> <?php print $val['Item']?> </td>
                                <td> <?php print $val['Price']?> $ </td>
                                <td>
                                    <a href="#" style="margin-right: 7px;">
                                        <p>Edite</p>
                                        <img 
                                            src="/TrackProfits/icons/pen-to-square-solid 1.svg"
                                            style="margin-left: 5px;"
                                        />
                                    </a>
                                    <a href="#" style="margin-left: 7px;">
                                        <p>Delete</p>
                                        <img 
                                            src="/TrackProfits/icons/trash-solid 1.svg" 
                                            style="margin-left: 5px;"
                                        />
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            <?php }?>
        </div>
    </div>
</body>
</html>