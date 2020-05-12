 <?php
 if (isset($_COOKIE['site_2400067262'])) {
    $site_cookie = $_COOKIE['site_2400067262'];
    list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
    $oid_arr = split("=", $user_oid);
    $u_oid = $oid_arr[1];
  }

echo "User_oid is '$u_oid'\n";
?>
