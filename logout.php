<?php
session_start();
session_unset();
session_destroy(); // 清除所有登录状态
header("Location: index.php"); // 送回首页
exit;