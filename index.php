<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if ($height > 0) {
        $bmi = $weight / (((float)$height ** 2));
        $bmi = round($bmi, 2);
    } else {
        echo "<div class='container mt-5'><h2>Error: Height must be greater than zero.</h2></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="text-center mt-4">Welcome to the BMI Calculator App</h1>
    <form action="index.php" method="post" class="container mt-5">
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" class="form-control" id="weight" name="weight" required>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height (cm)</label>
            <input type="number" step="0.01" class="form-control" id="height" name="height" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate BMI</button>
    </form>
    <?php if (isset($bmi)): ?>
        <div class="container mt-5">
            <h2>Your BMI is: <?php
                                echo $bmi;

                                ?></h2>
            <?php if ($bmi < 18.5): ?>
                <p class="text-warning">You are underweight.</p>

            <?php elseif ($bmi >= 18.5 && $bmi < 24.9): ?>
                <p class="text-success">You have a normal weight.</p>

            <?php elseif ($bmi >= 25 && $bmi < 29.9): ?>
                <p class="text-warning">You are overweight.</p>

            <?php else: ?>
                <p class="text-danger">You are obese.</p>

            <?php endif; ?>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>