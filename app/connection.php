<?php
// konekcija na db
$veza = mysqli_connect("localhost","rsc","mubyrenuh","zadmin_rsc");
if(!$veza)
die("Greška kod povezivanja na bazu".mysqli_error());
mysqli_query($veza,'set names "utf-8"'); // utf-8 ako nije
?>