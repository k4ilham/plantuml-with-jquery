<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Live PHP Code Editor</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .editor {
        height: 300px;
        font-family: monospace;
      }
      pre {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        overflow: auto;
        white-space: pre-wrap;
      }
    </style>
  </head>

  <body>
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-6">
          <!-- Textarea for PHP Code -->
          <div class="card">
            <div class="card-header text-center">PHP Code</div>
            <div class="card-body">
              <textarea
                id="php-code"
                class="form-control editor"
                rows="10"
              >
<?php
echo "Hello World!";
?>
              </textarea>
              <button
                class="btn btn-primary mt-3"
                onclick="executePHPCode()"
              >
                Run Code
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Output for PHP Code -->
          <div class="card">
            <div class="card-header text-center">Output</div>
            <div class="card-body">
              <pre id="php-output"></pre>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      function executePHPCode() {
        const phpCode = document.getElementById("php-code").value;

        // Send PHP code to server for execution
        $.ajax({
          url: "execute.php",
          method: "POST",
          data: { code: phpCode },
          success: function(response) {
            document.getElementById("php-output").textContent = response;
          },
          error: function() {
            document.getElementById("php-output").textContent =
              "Error executing PHP code.";
          }
        });
      }
    </script>
  </body>
</html>
