<?php
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = [
        "username" => sanitize($_POST['username'] ?? ''),
        "nickname" => sanitize($_POST['nickname'] ?? ''),
        "email" => sanitize($_POST['email'] ?? ''),
        "base_percentage" => floatval($_POST['base_percentage'] ?? 0),
        "referenciadores" => []
    ];

    if (isset($_POST['referenciadores']) && is_array($_POST['referenciadores'])) {
        foreach ($_POST['referenciadores'] as $ref) {
            $username = sanitize($ref['username'] ?? '');
            $percent = floatval($ref['percent'] ?? 0);
            if ($username && $percent) {
                $result['referenciadores'][] = [
                    "username" => $username,
                    "percent" => $percent
                ];
            }
        }
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Formulário de Afiliado</title>
    <link rel="stylesheet" href="bootstrap-5.3.6-dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-lg">
          <div class="card-header bg-success text-white text-center">
            <h3>Dados Recebidos</h3>
          </div>
          <div class="card-body">
            <pre><?php echo isset($result) ? json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : "Nenhum dado recebido."; ?></pre>
            <a href="index.html" class="btn btn-outline-primary mt-3">Voltar ao formulário</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
