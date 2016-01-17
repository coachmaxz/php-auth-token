<?php

/* =============================================
 * Disconnect
 * ============================================= */

if (!empty($mode) && $mode == "PDO_MYSQL") {
    mysql_close($conn);
}

unset($conn);