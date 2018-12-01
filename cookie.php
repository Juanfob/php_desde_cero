<?php
    setcookie('usuario','juan',time() + 60);
    echo $_COOKIE{'usuario'};