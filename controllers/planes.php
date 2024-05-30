<?php
    // Incluir el archivo de conexión
    include 'controllers/conn.php';

    $query = "SELECT nombre, precio, detalles FROM Planes";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($con));
    }

    $planes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $planes[] = $row;
    }
    ?>
    <div class="planes">
        <?php foreach ($planes as $plan): ?>
            <div class="plan">
                <h2><?= htmlspecialchars($plan['nombre']) ?></h2>
                <div class="price">MX$<?= number_format($plan['precio'], 2) ?>/mes</div>
                <ul>
                    <?php foreach (explode(',', $plan['detalles']) as $detalle): ?>
                        <li><?= htmlspecialchars($detalle) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button onclick="window.location.href='../interfaces/Comprar.php?plan=business'">Elegir plan</button>
            </div>
        <?php endforeach; ?>
    </div>