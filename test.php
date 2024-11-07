<?php

$mdp = password_hash("admin",PASSWORD_ARGON2I);
echo $mdp;
