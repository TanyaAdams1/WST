<?php
echo password_hash("Tanya19980929",PASSWORD_DEFAULT);
echo "\n";
echo password_verify("Tanya19980929","$2y$10$7DXZkqK1FTXlHrHVikbuJea/7py.ZP/xZ2OnfhPHSoIvi.9xwcWcW");