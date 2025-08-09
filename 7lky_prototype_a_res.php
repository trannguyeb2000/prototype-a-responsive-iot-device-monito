<?php
// Configuration
$devices = [
    'Device 1' => [
        'id' => 'dev1',
        'type' => 'temperature',
        'data' => 23.5
    ],
    'Device 2' => [
        'id' => 'dev2',
        'type' => 'humidity',
        'data' => 60
    ],
    'Device 3' => [
        'id' => 'dev3',
        'type' => 'pressure',
        'data' => 1013
    ]
];

// HTML Structure
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titleレスponsive IoT Device Monitor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <style>
        .device {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">IoT Device Monitor</h1>
        <div class="columns is-multiline">
            <?php foreach ($devices as $deviceName => $deviceInfo) { ?>
                <div class="column is-4">
                    <div class="device">
                        <h2><?= $deviceName ?></h2>
                        <p>Type: <?= $deviceInfo['type'] ?></p>
                        <p>Data: <?= $deviceInfo['data'] ?></p>
                        <button class="button is-small is-primary">Refresh</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- JavaScript for real-time updates -->
    <script>
        const devices = <?= json_encode($devices) ?>;

        // Simulate real-time updates
        setInterval(() => {
            Object.keys(devices).forEach((deviceName) => {
                devices[deviceName]['data'] = Math.random() * 100;
                document.querySelector(`[data-device="${deviceName}"]`).innerHTML = `Data: ${devices[deviceName]['data'].toFixed(2)}`;
            });
        }, 2000);
    </script>
</body>
</html>