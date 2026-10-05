<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IS436 Blog List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <main class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4 fw-bold">IS436</span>
        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="form/registration.html" class="nav-link" target="_blank">Add Blog</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
      </header>

      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Blog Posts</h5>
        </div>
        <div class="card-body bg-white">
          <?php 
            // Database connection
            $connect = mysqli_connect(
              'db',          // Host (Docker service name)
              'lamp_demo',   // MySQL username
              'password',    // MySQL password
              'lamp_demo'    // Database name
            );

            if (!$connect) {
              die("<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>");
            }

            $query = 'SELECT * FROM blog';
            $result = mysqli_query($connect, $query);

            if (!$result) {
              echo "<div class='alert alert-warning'>Error running query: " . mysqli_error($connect) . "</div>";
            } elseif (mysqli_num_rows($result) > 0) {
              echo "<div class='table-responsive'>";
              echo "<table class='table table-striped table-hover align-middle'>";
              echo "<thead class='table-dark'>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Body</th>
                        <th scope='col'>Date Created</th>
                      </tr>
                    </thead><tbody>";

              $i = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$i}</td>
                        <td>" . htmlspecialchars($row['title']) . "</td>
                        <td>" . htmlspecialchars($row['body']) . "</td>
                        <td>" . htmlspecialchars($row['date_created']) . "</td>
                      </tr>";
                $i++;
              }

              echo "</tbody></table></div>";
            } else {
              echo "<div class='alert alert-info'>No blog posts found.</div>";
            }

            mysqli_close($connect);
          ?>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
