<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <title>Formulário de Criação de Afiliado</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Import Poppins Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="bootstrap-5.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center">
            <h3>Formulário de Criação de Afiliado</h3>
          </div>
          <div class="card-body">
            <form id="afiliadoForm" method="POST" action="form.php" autocomplete="off">
              <div class="mb-3">
                <label for="username" class="form-label">Username *</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="nickname" class="form-label">Nickname / Alias *</label>
                <input type="text" class="form-control" id="nickname" name="nickname" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="base_percentage" class="form-label">Percentagem Base (%) *</label>
                <input type="number" min="0" max="100" step="0.01" class="form-control" id="base_percentage" name="base_percentage" required>
              </div>
              <hr>
              <label class="form-label">Referenciado por + Percentagem:</label>
              <div id="referenciadores-list"></div>
              <button type="button" class="btn btn-outline-success btn-sm mb-3" id="addRefBtn">+ Adicionar Referenciador</button>
              <hr>
              <button type="submit" class="btn btn-primary w-100">Submeter</button>
            </form>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header bg-secondary text-white">
            <strong>Pré-visualização dos Dados (JSON)</strong>
          </div>
          <div class="card-body">
            <pre id="jsonPreview" class="bg-light p-2 rounded" style="font-size: 0.95em; max-height: 250px; overflow:auto;">{}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="footer_info">
    <div>
      <div class="footer-icon">
        <a href="https://github.com/bakill3" target="_blank" rel="noopener" title="GitHub">
          <i class="bi bi-github"></i>
        </a>
      </div>
      <div class="footer-icon">
        <a href="https://www.linkedin.com/in/gabriel-brandao-2000-pt/" target="_blank" rel="noopener" title="LinkedIn">
          <i class="bi bi-linkedin"></i>
        </a>
      </div>
    </div>
  </div>

      
      <script src="bootstrap-5.3.6-dist/js/bootstrap.bundle.min.js"></script>
      <script src="main.js"></script>
</body>

</html>