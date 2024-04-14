<?php

include ("./../layout/head.php");
?>
<!-- <h1>LOGIN</h1> -->
<div class="container">
    <div class="card px-5 py-3">
        <label for="">Login : </label>
        <form action="./../act/authCheck.php" method="POSt">
            <input placeholder="USERNAME" type="text" name="username" class="form-control my-3 ">
            <input placeholder="PASSWORD" type="password" name="password" id="" class="form-control mb-3">
            <button class="w-100" type="submit">OK</button>
        </form>
    </div>
</div>