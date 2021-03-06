<?php 

session_start();

session_destroy();

echo "
<script>

alert('Logisid välja!');

window.location.href='../index.php';

</script>
";

?>