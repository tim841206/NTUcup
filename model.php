<?php
$mysql = mysqli_connect('localhost', 'NTUcup', '0986036999');
mysqli_query($mysql, "SET NAMES 'utf8'");
mysqli_select_db($mysql, 'NTUcup');
if ($_POST['service'] == "signup") {
    if (in_array($_POST['type'], array("MS", "WS", "MD", "WD", "XD", "G"))) {
        echo json_encode(signup($_POST));
    }
    elseif (in_array($_POST['type'], array("directMS", "directWS", "directMD", "directWD", "directXD"))) {
        echo json_encode(signupDirect($_POST));
    }
}
elseif ($_POST['service'] == "search") {
    if (isset($_POST['id'])) {
        echo search1($_POST['id']);
    }
    elseif (isset($_POST['type']) && isset($_POST['num'])) {
        echo search2($_POST['type'], $_POST['num']);
    }
}
elseif ($_POST['service'] == "delete") {
    echo delete($_POST['type'], $_POST['num']);
}
elseif ($_POST['service'] == "checkId") {
    echo check_id($_POST['type'], $_POST['id']);
}
elseif ($_POST['service'] == "checkBirth") {
    echo check_birth($_POST['birthy'], $_POST['birthm'], $_POST['birthd']);
}
elseif ($_POST['service'] == "checkPhone") {
    echo check_phone($_POST['phone']);
}
elseif ($_POST['service'] == "checkIdentityM") {
    echo check_identityM($_POST['identity']);
}
elseif ($_POST['service'] == "checkIdentityF") {
    echo check_identityF($_POST['identity']);
}

function safe($value) {
    return htmlspecialchars(addslashes(trim($value)));
}

function fulltohalf($str) {
    $nft = array(
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j",
        "k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
        "u", "v", "w", "x", "y", "z",
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J",
        "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T",
        "U", "V", "W", "X", "Y", "Z",
    );
    $wft = array(
        "０", "１", "２", "３", "４", "５", "６", "７", "８", "９",
        "ａ", "ｂ", "ｃ", "ｄ", "ｅ", "ｆ", "ｇ", "ｈ", "ｉ", "ｊ",
        "ｋ", "ｌ", "ｍ", "ｎ", "ｏ", "ｐ", "ｑ", "ｒ", "ｓ", "ｔ",
        "ｕ", "ｖ", "ｗ", "ｘ", "ｙ", "ｚ",
        "Ａ", "Ｂ", "Ｃ", "Ｄ", "Ｅ", "Ｆ", "Ｇ", "Ｈ", "Ｉ", "Ｊ",
        "Ｋ", "Ｌ", "Ｍ", "Ｎ", "Ｏ", "Ｐ", "Ｑ", "Ｒ", "Ｓ", "Ｔ",
        "Ｕ", "Ｖ", "Ｗ", "Ｘ", "Ｙ", "Ｚ",
    );
    return str_replace($wft, $nft, $str);
}

function search1($id) {
    $mysql = $GLOBALS['mysql'];
    $count = 1;
    $id = strtoupper(safe($id));
    $queryMS = mysqli_query($mysql, "SELECT * FROM MS WHERE ID='$id'");
    $queryresult_MS = ($queryMS == false) ? false : mysqli_fetch_array($queryMS);
    $queryWS = mysqli_query($mysql, "SELECT * FROM WS WHERE ID='$id'");
    $queryresult_WS = ($queryWS == false) ? false : mysqli_fetch_array($queryWS);
    $queryMD_1 = mysqli_query($mysql, "SELECT * FROM MD WHERE ID_1='$id'");
    $queryresult_MD_1 = ($queryMD_1 == false) ? false : mysqli_fetch_array($queryMD_1);
    $queryMD_2 = mysqli_query($mysql, "SELECT * FROM MD WHERE ID_2='$id'");
    $queryresult_MD_2 = ($queryMD_2 == false) ? false : mysqli_fetch_array($queryMD_2);
    $queryWD_1 = mysqli_query($mysql, "SELECT * FROM WD WHERE ID_1='$id'");
    $queryresult_WD_1 = ($queryWD_1 == false) ? false : mysqli_fetch_array($queryWD_1);
    $queryWD_2 = mysqli_query($mysql, "SELECT * FROM WD WHERE ID_2='$id'");
    $queryresult_WD_2 = ($queryWD_2 == false) ? false : mysqli_fetch_array($queryWD_2);
    $queryXD_1 = mysqli_query($mysql, "SELECT * FROM XD WHERE ID_1='$id'");
    $queryresult_XD_1 = ($queryXD_1 == false) ? false : mysqli_fetch_array($queryXD_1);
    $queryXD_2 = mysqli_query($mysql, "SELECT * FROM XD WHERE ID_2='$id'");
    $queryresult_XD_2 = ($queryXD_2 == false) ? false : mysqli_fetch_array($queryXD_2);
    $queryG_1 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_1='$id'");
    $queryresult_G = ($queryG_1 == false) ? false : mysqli_fetch_array($queryG_1);
    if (!$queryresult_G){
        $queryG_2 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_2='$id'");
        $queryresult_G = ($queryG_2 == false) ? false : mysqli_fetch_array($queryG_2);
    }
    if (!$queryresult_G){
        $queryG_3 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_3='$id'");
        $queryresult_G = ($queryG_3 == false) ? false : mysqli_fetch_array($queryG_3);
    }
    if (!$queryresult_G){
        $queryG_4 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_4='$id'");
        $queryresult_G = ($queryG_4 == false) ? false : mysqli_fetch_array($queryG_4);
    }
    if (!$queryresult_G){
        $queryG_5 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_5='$id'");
        $queryresult_G = ($queryG_5 == false) ? false : mysqli_fetch_array($queryG_5);
    }
    if (!$queryresult_G){
        $queryG_6 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_6='$id'");
        $queryresult_G = ($queryG_6 == false) ? false : mysqli_fetch_array($queryG_6);
    }
    if (!$queryresult_G){
        $queryG_7 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_7='$id'");
        $queryresult_G = ($queryG_7 == false) ? false : mysqli_fetch_array($queryG_7);
    }
    if (!$queryresult_G){
        $queryG_8 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_8='$id'");
        $queryresult_G = ($queryG_8 == false) ? false : mysqli_fetch_array($queryG_8);
    }
    if (!$queryresult_G){
        $queryG_9 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_9='$id'");
        $queryresult_G = ($queryG_9 == false) ? false : mysqli_fetch_array($queryG_9);
    }
    if (!$queryresult_G){
        $queryG_10 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_10='$id'");
        $queryresult_G = ($queryG_10 == false) ? false : mysqli_fetch_array($queryG_10);
    }
    if (!$queryresult_G){
        $queryG_11 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_11='$id'");
        $queryresult_G = ($queryG_11 == false) ? false : mysqli_fetch_array($queryG_11);
    }
    if (!$queryresult_G){
        $queryG_12 = mysqli_query($mysql, "SELECT * FROM G WHERE ID_12='$id'");
        $queryresult_G = ($queryG_12 == false) ? false : mysqli_fetch_array($queryG_12);
    }
    if ($queryresult_MS){
        $num_1 = '男單'.$queryresult_MS['NUM'];
        $grade_1 = $queryresult_MS['MAJOR'].translate_grade($queryresult_MS['GRADE']);
        $name_1 = $queryresult_MS['NAME'];
        $paystat_1 = translate_paystat($queryresult_MS['PAYSTAT']);
        $count = 2;
    }
    if ($queryresult_WS){
        $num_1 = '女單'.$queryresult_WS['NUM'];
        $grade_1 = $queryresult_WS['MAJOR'].translate_grade($queryresult_WS['GRADE']);
        $name_1 = $queryresult_WS['NAME'];
        $paystat_1 = translate_paystat($queryresult_WS['PAYSTAT']);
        $count = 2;
    }
    if ($queryresult_MD_1){
        if ($count == 1){
            $num_1 = '男雙'.$queryresult_MD_1['NUM'];
            $grade_1 = $queryresult_MD_1['MAJOR_1'].translate_grade($queryresult_MD_1['GRADE_1']).'<br>'.
                       $queryresult_MD_1['MAJOR_2'].translate_grade($queryresult_MD_1['GRADE_2']);
            $name_1 = $queryresult_MD_1['NAME_1'].'<br>'.$queryresult_MD_1['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_MD_1['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '男雙'.$queryresult_MD_1['NUM'];
            $grade_2 = $queryresult_MD_1['MAJOR_1'].translate_grade($queryresult_MD_1['GRADE_1']).'<br>'.
                       $queryresult_MD_1['MAJOR_2'].translate_grade($queryresult_MD_1['GRADE_2']);
            $name_2 = $queryresult_MD_1['NAME_1'].'<br>'.$queryresult_MD_1['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_MD_1['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_MD_2){
        if ($count == 1){
            $num_1 = '男雙'.$queryresult_MD_2['NUM'];
            $grade_1 = $queryresult_MD_2['MAJOR_1'].translate_grade($queryresult_MD_2['GRADE_1']).'<br>'.
                       $queryresult_MD_2['MAJOR_2'].translate_grade($queryresult_MD_2['GRADE_2']);
            $name_1 = $queryresult_MD_2['NAME_1'].'<br>'.$queryresult_MD_2['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_MD_2['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '男雙'.$queryresult_MD_2['NUM'];
            $grade_2 = $queryresult_MD_2['MAJOR_1'].translate_grade($queryresult_MD_2['GRADE_1']).'<br>'.
                       $queryresult_MD_2['MAJOR_2'].translate_grade($queryresult_MD_2['GRADE_2']);
            $name_2 = $queryresult_MD_2['NAME_1'].'<br>'.$queryresult_MD_2['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_MD_2['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_WD_1){
        if ($count == 1){
            $num_1 = '女雙'.$queryresult_WD_1['NUM'];
            $grade_1 = $queryresult_WD_1['MAJOR_1'].translate_grade($queryresult_WD_1['GRADE_1']).'<br>'.
                       $queryresult_WD_1['MAJOR_2'].translate_grade($queryresult_WD_1['GRADE_2']);
            $name_1 = $queryresult_WD_1['NAME_1'].'<br>'.$queryresult_WD_1['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_WD_1['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '女雙'.$queryresult_WD_1['NUM'];
            $grade_2 = $queryresult_WD_1['MAJOR_1'].translate_grade($queryresult_WD_1['GRADE_1']).'<br>'.
                       $queryresult_WD_1['MAJOR_2'].translate_grade($queryresult_WD_1['GRADE_2']);
            $name_2 = $queryresult_WD_1['NAME_1'].'<br>'.$queryresult_WD_1['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_WD_1['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_WD_2){
        if ($count == 1){
            $num_1 = '女雙'.$queryresult_WD_2['NUM'];
            $grade_1 = $queryresult_WD_2['MAJOR_1'].translate_grade($queryresult_WD_2['GRADE_1']).'<br>'.
                       $queryresult_WD_2['MAJOR_2'].translate_grade($queryresult_WD_2['GRADE_2']);
            $name_1 = $queryresult_WD_2['NAME_1'].'<br>'.$queryresult_WD_2['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_WD_2['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '女雙'.$queryresult_WD_2['NUM'];
            $grade_2 = $queryresult_WD_2['MAJOR_1'].translate_grade($queryresult_WD_2['GRADE_1']).'<br>'.
                       $queryresult_WD_2['MAJOR_2'].translate_grade($queryresult_WD_2['GRADE_2']);
            $name_2 = $queryresult_WD_2['NAME_1'].'<br>'.$queryresult_WD_2['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_WD_2['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_XD_1){
        if ($count == 1){
            $num_1 = '混雙'.$queryresult_XD_1['NUM'];
            $grade_1 = $queryresult_XD_1['MAJOR_1'].translate_grade($queryresult_XD_1['GRADE_1']).'<br>'.
                       $queryresult_XD_1['MAJOR_2'].translate_grade($queryresult_XD_1['GRADE_2']);
            $name_1 = $queryresult_XD_1['NAME_1'].'<br>'.$queryresult_XD_1['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_XD_1['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '混雙'.$queryresult_XD_1['NUM'];
            $grade_2 = $queryresult_XD_1['MAJOR_1'].translate_grade($queryresult_XD_1['GRADE_1']).'<br>'.
                       $queryresult_XD_1['MAJOR_2'].translate_grade($queryresult_XD_1['GRADE_2']);
            $name_2 = $queryresult_XD_1['NAME_1'].'<br>'.$queryresult_XD_1['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_XD_1['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_XD_2){
        if ($count == 1){
            $num_1 = '混雙'.$queryresult_XD_2['NUM'];
            $grade_1 = $queryresult_XD_2['MAJOR_1'].translate_grade($queryresult_XD_2['GRADE_1']).'<br>'.
                       $queryresult_XD_2['MAJOR_2'].translate_grade($queryresult_XD_2['GRADE_2']);
            $name_1 = $queryresult_XD_2['NAME_1'].'<br>'.$queryresult_XD_2['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_XD_2['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '混雙'.$queryresult_XD_2['NUM'];
            $grade_2 = $queryresult_XD_2['MAJOR_1'].translate_grade($queryresult_XD_2['GRADE_1']).'<br>'.
                       $queryresult_XD_2['MAJOR_2'].translate_grade($queryresult_XD_2['GRADE_2']);
            $name_2 = $queryresult_XD_2['NAME_1'].'<br>'.$queryresult_XD_2['NAME_2'];
            $paystat_2 = translate_paystat($queryresult_XD_2['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_G){
        if ($count == 1){
            $num_1 = '團體'.$queryresult_G['NUM'];
            $grade_1 = $queryresult_G['Gmajor'];
            $name_1 = $queryresult_G['Gname'];
            $paystat_1 = transfer_paystat($queryresult_G['PAYSTAT']);
            $count = 2;
        }
        elseif ($count == 2){
            $num_2 = '團體'.$queryresult_G['NUM'];
            $grade_2 = $queryresult_G['Gmajor'];
            $name_2 = $queryresult_G['Gname'];
            $paystat_2 = transfer_paystat($queryresult_G['PAYSTAT']);
            $count = 3;
        }
        elseif ($count == 3){
            $num_3 = '團體'.$queryresult_G['NUM'];
            $grade_3 = $queryresult_G['Gmajor'];
            $name_3 = $queryresult_G['Gname'];
            $paystat_3 = transfer_paystat($queryresult_G['PAYSTAT']);
            $count = 4;
        }
    }
    if ($count == 1){
        return json_encode(array('null' => 'null'));
    }
    elseif ($count == 2){
        return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
    }
    elseif ($count == 3){
        return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1, 'num_2' => $num_2, 'grade_2' => $grade_2, 'name_2' => $name_2, 'paystat_2' => $paystat_2));
    }
    elseif ($count == 4){
        return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1, 'num_2' => $num_2, 'grade_2' => $grade_2, 'name_2' => $name_2, 'paystat_2' => $paystat_2, 'num_3' => $num_3, 'grade_3' => $grade_3, 'name_3' => $name_3, 'paystat_3' => $paystat_3));
    }
}

function search2($type, $num) {
    $mysql = $GLOBALS['mysql'];
    $type = safe($type);
    $num = safe($num);
    if ($type == 'MS'){
        $queryMS = mysqli_query($mysql, "SELECT * FROM MS WHERE NUM='$num'");
        $queryresult_MS = ($queryMS == false) ? false : mysqli_fetch_array($queryMS);
        if ($queryresult_MS){
            $num_1 = '男單'.$queryresult_MS['NUM'];
            $grade_1 = $queryresult_MS['MAJOR'].translate_grade($queryresult_MS['GRADE']);
            $name_1 = $queryresult_MS['NAME'];
            $paystat_1 = translate_paystat($queryresult_MS['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
    elseif ($type == 'WS'){
        $queryWS = "SELECT * FROM WS WHERE NUM='$num'";
        $queryresult_WS = mysqli_fetch_array(mysqli_query($mysql, $queryWS));
        if ($queryresult_WS){
            $num_1 = '女單'.$queryresult_WS['NUM'];
            $grade_1 = $queryresult_WS['MAJOR'].translate_grade($queryresult_WS['GRADE']);
            $name_1 = $queryresult_WS['NAME'];
            $paystat_1 = translate_paystat($queryresult_WS['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
    elseif ($type == 'MD'){
        $queryMD = "SELECT * FROM MD WHERE NUM='$num'";
        $queryresult_MD = mysqli_fetch_array(mysqli_query($mysql, $queryMD));
        if ($queryresult_MD){
            $num_1 = '男雙'.$queryresult_MD['NUM'];
            $grade_1 = $queryresult_MD['MAJOR_1'].translate_grade($queryresult_MD['GRADE_1']).'<br>'.
                       $queryresult_MD['MAJOR_2'].translate_grade($queryresult_MD['GRADE_2']);
            $name_1 = $queryresult_MD['NAME_1'].'<br>'.$queryresult_MD['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_MD['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
    elseif ($type == 'WD'){
        $queryWD = "SELECT * FROM WD WHERE NUM='$num'";
        $queryresult_WD = mysqli_fetch_array(mysqli_query($mysql, $queryWD));
        if ($queryresult_WD){
            $num_1 = '女雙'.$queryresult_WD['NUM'];
            $grade_1 = $queryresult_WD['MAJOR_1'].translate_grade($queryresult_WD['GRADE_1']).'<br>'.
                       $queryresult_WD['MAJOR_2'].translate_grade($queryresult_WD['GRADE_2']);
            $name_1 = $queryresult_WD['NAME_1'].'<br>'.$queryresult_WD['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_WD['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
    elseif ($type == 'XD'){
        $queryXD = "SELECT * FROM XD WHERE NUM='$num'";
        $queryresult_XD = mysqli_fetch_array(mysqli_query($mysql, $queryXD));
        if ($queryresult_XD){
            $num_1 = '混雙'.$queryresult_XD['NUM'];
            $grade_1 = $queryresult_XD['MAJOR_1'].translate_grade($queryresult_XD['GRADE_1']).'<br>'.
                       $queryresult_XD['MAJOR_2'].translate_grade($queryresult_XD['GRADE_2']);
            $name_1 = $queryresult_XD['NAME_1'].'<br>'.$queryresult_XD['NAME_2'];
            $paystat_1 = translate_paystat($queryresult_XD['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
    elseif ($type == 'G'){
        $queryG = "SELECT * FROM G WHERE NUM='$num'";
        $queryresult_G = mysqli_fetch_array(mysqli_query($mysql, $queryG));
        if ($queryresult_G){
            $num_1 = '團體'.$queryresult_G['NUM'];
            $grade_1 = $queryresult_G['Gmajor'];
            $name_1 = $queryresult_G['Gname'];
            $paystat_1 = translate_paystat($queryresult_G['PAYSTAT']);
            return json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        }
        else {
            return json_encode(array('null' => 'null'));
        }
    }
}

function delete($type, $num) {
    $mysql = $GLOBALS['mysql'];
    $sql = "DELETE FROM $type WHERE NUM='$num'";
    if (mysqli_query($mysql, $sql)) {
        return 'ok';
    }
    else {
        return '資料庫異常，請重試！';
    }
}

function check_id($type, $id) {
    $id = strtoupper(fulltohalf($id));
    if (!preg_match('/^[A-Z][0-9]{2}.[0-9]{5}$/', $id)){
        return '請輸入正確的學號！';
    }
    else {
        $mysql = $GLOBALS['mysql'];
        $queryID_MS = "SELECT ID FROM MS WHERE ID='$id'";
        $queryresult_MS = mysqli_num_rows(mysqli_query($mysql, $queryID_MS));
        $queryID_WS = "SELECT ID FROM WS WHERE ID='$id'";
        $queryresult_WS = mysqli_num_rows(mysqli_query($mysql, $queryID_WS));
        $queryID_MD_1 = "SELECT ID_1 FROM MD WHERE ID_1='$id'";
        $queryresult_MD_1 = mysqli_num_rows(mysqli_query($mysql, $queryID_MD_1));
        $queryID_MD_2 = "SELECT ID_2 FROM MD WHERE ID_2='$id'";
        $queryresult_MD_2 = mysqli_num_rows(mysqli_query($mysql, $queryID_MD_2));
        $queryID_WD_1 = "SELECT ID_1 FROM WD WHERE ID_1='$id'";
        $queryresult_WD_1 = mysqli_num_rows(mysqli_query($mysql, $queryID_WD_1));
        $queryID_WD_2 = "SELECT ID_2 FROM WD WHERE ID_2='$id'";
        $queryresult_WD_2 = mysqli_num_rows(mysqli_query($mysql, $queryID_WD_2));
        $queryID_XD_1 = "SELECT ID_1 FROM XD WHERE ID_1='$id'";
        $queryresult_XD_1 = mysqli_num_rows(mysqli_query($mysql, $queryID_XD_1));
        $queryID_XD_2 = "SELECT ID_2 FROM XD WHERE ID_2='$id'";
        $queryresult_XD_2 = mysqli_num_rows(mysqli_query($mysql, $queryID_XD_2));
        $count = $queryresult_MS + $queryresult_WS + $queryresult_MD_1 + $queryresult_MD_2 + $queryresult_WD_1 + $queryresult_WD_2 + $queryresult_XD_1 + $queryresult_XD_2;
        if ($type == 'MS' || $type == 'directMS') {
            if ($queryresult_MS) return '您已經報名過此項目！';
            else {
                if ($count >= 2) return '您已經報名兩個項目！';
                else return 'ok';
            }
        }
        elseif ($type == 'WS' || $type == 'directWS') {
            if ($queryresult_WS) return '您已經報名過此項目！';
            else {
                if ($count >= 2) return '您已經報名兩個項目！';
                else return 'ok';
            }
        }
        elseif ($type == 'MD' || $type == 'directMD') {
            if ($queryresult_MD_1 || $queryresult_MD_2) return '您已經報名過此項目！';
            else {
                if ($count == 2) return '您已經報名兩個項目！';
                else return 'ok';
            }
        }
        elseif ($type == 'WD' || $type == 'directWD') {
            if ($queryresult_WD_1 || $queryresult_WD_2) return '您已經報名過此項目！';
            else {
                if ($count == 2) return '您已經報名兩個項目！';
                else return 'ok';
            }
        }
        elseif ($type == 'XD' || $type == 'directXD') {
            if ($queryresult_XD_1 || $queryresult_XD_2) return '您已經報名過此項目！';
            else {
                if ($count >= 2) return '您已經報名兩個項目！';
                else return 'ok';
            }
        }
        else {
            return 'Unknown type';
        }
    }
}

function check_id_G($id) {
    $id = strtoupper(fulltohalf($id));
    if (!preg_match('/^[A-Z][0-9]{2}.[0-9]{5}$/', $id)){
        return '請輸入正確的學號！';
    }
    else {
        $mysql = $GLOBALS['mysql'];
        $queryID_G1 = "SELECT * FROM G WHERE ID_1='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G1));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G2 = "SELECT * FROM G WHERE ID_2='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G2));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G3 = "SELECT * FROM G WHERE ID_3='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G3));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G4 = "SELECT * FROM G WHERE ID_4='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G4));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G5 = "SELECT * FROM G WHERE ID_5='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G5));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G6 = "SELECT * FROM G WHERE ID_6='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G6));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G7 = "SELECT * FROM G WHERE ID_7='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G7));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G8 = "SELECT * FROM G WHERE ID_8='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G8));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G9 = "SELECT * FROM G WHERE ID_9='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G9));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G10 = "SELECT * FROM G WHERE ID_10='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G10));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G11 = "SELECT * FROM G WHERE ID_11='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G11));
        if ($queryresult_G) return '您已經報名過此項目！';
        $queryID_G12 = "SELECT * FROM G WHERE ID_12='$id'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $queryID_G12));
        if ($queryresult_G) return '您已經報名過此項目！';
        else return 'ok';
    }
}

function check_birth($birthy, $birthm, $birthd) {
    $birthy = intval($birthy);
    $birthm = intval($birthm);
    $birthd = intval($birthd);
    if (!checkdate($birthm, $birthd, $birthy) || date('Y') - $birthy < 15 || date('Y') - $birthy > 65) return '請輸入正確的出生日期！';
    else return 'ok';
}

function check_phone($phone) {
    $phone = fulltohalf($phone);
    if (!preg_match('/^[0][9][0-9]{8}$/', $phone)) return '請輸入正確的聯絡電話！';
    else return 'ok';
}

function check_identityM($identity) {
    $identity = strtoupper(fulltohalf($identity));
    $len = strlen($identity);
    if (preg_match('/^[A-Z][1][0-9]+$/', $identity) && $len == 10) {
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        for ($i = 0; $i < $len; $i++) {
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for ($j = 0; $j < $len; $j++) {
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point) return '請輸入正確的身分證字號！';
        else return 'ok';
    }
    elseif (preg_match('/^[A-Z][AC][0-9]+$/', $identity) && $len == 10) {
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        if (substr($identity, 1, 1) == 'A') {
            $identity = substr($identity, 0, 1).'0'.substr($identity, 2);
        }
        else {
            $identity = substr($identity, 0, 1).'2'.substr($identity, 2);
        }
        for ($i = 0; $i < $len; $i++) {
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for ($j = 0; $j < $len; $j++) {
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point) return '請輸入正確的居留證字號！';
        else return 'ok';
    }
    else {
        return '請輸入正確的身分證字號！';
    }
}

function check_identityF($identity) {
    $identity = strtoupper(fulltohalf($identity));
    $len = strlen($identity);
    if (preg_match('/^[A-Z][2][0-9]+$/', $identity) && $len == 10) {
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        for ($i = 0; $i < $len; $i++) {
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for ($j = 0; $j < $len; $j++) {
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0) ? 0 : 10 - $total % 10) != $point) return '請輸入正確的身分證字號！';
        else return 'ok';
    }
    elseif (preg_match('/^[A-Z][BD][0-9]+$/', $identity) && $len == 10) {
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        if (substr($identity, 1, 1) == 'B') {
            $identity = substr($identity, 0, 1).'1'.substr($identity, 2);
        }
        else {
            $identity = substr($identity, 0, 1).'3'.substr($identity, 2);
        }
        for($i = 0; $i < $len; $i++){
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for ($j = 0; $j < $len; $j++) {
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0) ? 0 : 10 - $total % 10) != $point) return '請輸入正確的居留證字號！';
        else return 'ok';
    }
    else {
        return '請輸入正確的身分證字號！';
    }
}

function check_name($name) {
    if (empty($name)) return '請輸入您的姓名！';
    else return 'ok';
}

function check_major($major) {
    if (empty($major)) return '請輸入您的系別！';
    else return 'ok';
}

function check_grade($grade) {
    if (empty($grade)) return '請輸入您的年級！';
    else return 'ok';
}

function check_check($post) {
    if (isset($post['check']) && $post['check'] == 'Y') return 'ok';
    else return '請確認您已詳讀並願意遵守報名須知！';
}

function check_Gmajor($Gmajor) {
    if (empty($Gmajor)) return '請輸入您的隊伍系所！';
    else return 'ok';
}

function check_Gname($Gmajor, $Gname) {
    if (empty($Gname)) return '請選擇您的隊伍隊名！';
    elseif (!in_array($Gname, array("隊", "A", "B", "C"))) return '請正確選擇您的隊伍隊名！';
    else {
        $mysql = $GLOBALS['mysql'];
        $query_G = "SELECT Gmajor FROM G WHERE Gmajor='$Gmajor' AND Gname='$Gname'";
        $queryresult_G = mysqli_fetch_row(mysqli_query($mysql, $query_G));
        if ($queryresult_G[0] == $Gmajor) return '此隊別已經報名，請選擇其它隊別！';
        else return 'ok';
    }
}

function addToList($type, $content) {
    $file = fopen("resource/backup/".$type.".txt","a+");
    fwrite($file, $content);
    fclose($file);
}

function signup($post) {
    $mysql = $GLOBALS['mysql'];
    if (in_array($post['type'], array("MS", "WS"))) {
        $ID = strtoupper($post['id']);
        $NAME = $post['name'];
        $MAJOR = $post['major'];
        $GRADE = $post['grade'];
        $PHONE = $post['phone'];
        $BIRTHY = $post['birthy'];
        $BIRTHM = $post['birthm'];
        $BIRTHD = $post['birthd'];
        if (check_id($post['type'], $ID) != 'ok') return check_id($post['type'], $ID);
        if (check_name($NAME) != 'ok') return check_name($NAME);
        if (check_major($MAJOR) != 'ok') return check_major($MAJOR);
        if (check_grade($GRADE) != 'ok') return check_grade($GRADE);
        if (check_phone($PHONE) != 'ok') return check_phone($PHONE);
        if (check_birth($BIRTHY, $BIRTHM, $BIRTHD) != 'ok') return check_birth($BIRTHY, $BIRTHM, $BIRTHD);
        if (check_check($post) != 'ok') return check_check($post);
        $BIRTH = $BIRTHY.'-'.$BIRTHM.'-'.$BIRTHD;
        date_default_timezone_set('Asia/Taipei');
        $SIGN_TIME = date("Y-m-d H:i:s");
        if ($post['type'] == 'MS'){
            $IDENTITY = strtoupper($post['identity']);
            if (check_identityM($IDENTITY) != 'ok') return check_identityM($IDENTITY);
            $queryMS_NUM = "SELECT MS_NUM FROM setup";
            $queryresult_MS_NUM = mysqli_query($mysql, $queryMS_NUM);
            $fetchresult_MS_NUM = mysqli_fetch_row($queryresult_MS_NUM);
            $NUM = $fetchresult_MS_NUM[0];
            $insert_MS = "INSERT INTO MS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
            $update_MS_NUM = "UPDATE setup SET MS_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_MS) && mysqli_query($mysql, $update_MS_NUM)) {
            	addToList("MS", $NUM.", ".$ID.", ".$NAME.", ".$MAJOR.", ".$GRADE.", ".$PHONE.", ".$BIRTH.", ".$IDENTITY.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($post['type'] == 'WS'){
            $IDENTITY = strtoupper($post['identity']);
            if (check_identityF($IDENTITY) != 'ok') return check_identityF($IDENTITY);
            $queryWS_NUM = "SELECT WS_NUM FROM setup";
            $queryresult_WS_NUM = mysqli_query($mysql, $queryWS_NUM);
            $fetchresult_WS_NUM = mysqli_fetch_row($queryresult_WS_NUM);
            $NUM = $fetchresult_WS_NUM[0];
            $insert_WS = "INSERT INTO WS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
            $update_WS_NUM = "UPDATE setup SET WS_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_WS) && mysqli_query($mysql, $update_WS_NUM)) {
            	addToList("WS", $NUM.", ".$ID.", ".$NAME.", ".$MAJOR.", ".$GRADE.", ".$PHONE.", ".$BIRTH.", ".$IDENTITY.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
    }
    elseif (in_array($post['type'], array("MD", "WD", "XD"))) {
        $ID1 = strtoupper($post['id1']);
        $ID2 = strtoupper($post['id2']);
        $NAME1 = $post['name1'];
        $NAME2 = $post['name2'];
        $MAJOR1 = $post['major1'];
        $MAJOR2 = $post['major2'];
        $GRADE1 = $post['grade1'];
        $GRADE2 = $post['grade2'];
        $PHONE1 = $post['phone1'];
        $PHONE2 = $post['phone2'];
        $BIRTHY1 = $post['birthy1'];
        $BIRTHY2 = $post['birthy2'];
        $BIRTHM1 = $post['birthm1'];
        $BIRTHM2 = $post['birthm2'];
        $BIRTHD1 = $post['birthd1'];
        $BIRTHD2 = $post['birthd2'];
        if (check_id($post['type'], $ID1) != 'ok') return check_id($post['type'], $ID1);
        if (check_id($post['type'], $ID2) != 'ok') return check_id($post['type'], $ID2);
        if (check_name($NAME1) != 'ok') return check_name($NAME1);
        if (check_name($NAME2) != 'ok') return check_name($NAME2);
        if (check_major($MAJOR1) != 'ok') return check_major($MAJOR1);
        if (check_major($MAJOR2) != 'ok') return check_major($MAJOR2);
        if (check_grade($GRADE1) != 'ok') return check_grade($GRADE1);
        if (check_grade($GRADE2) != 'ok') return check_grade($GRADE2);
        if (check_phone($PHONE1) != 'ok') return check_phone($PHONE1);
        if (check_phone($PHONE2) != 'ok') return check_phone($PHONE2);
        if (check_birth($BIRTHY1, $BIRTHM1, $BIRTHD1) != 'ok') return check_birth($BIRTHY1, $BIRTHM1, $BIRTHD1);
        if (check_birth($BIRTHY2, $BIRTHM2, $BIRTHD2) != 'ok') return check_birth($BIRTHY2, $BIRTHM2, $BIRTHD2);
        if (check_check($post) != 'ok') return check_check($post);
        $BIRTH1 = $BIRTHY1.'-'.$BIRTHM1.'-'.$BIRTHD1;
        $BIRTH2 = $BIRTHY2.'-'.$BIRTHM2.'-'.$BIRTHD2;
        date_default_timezone_set('Asia/Taipei');
        $SIGN_TIME = date("Y-m-d H:i:s");
        if ($post['type'] == 'MD'){
            $IDENTITY1 = strtoupper($post['identity1']);
            $IDENTITY2 = strtoupper($post['identity2']);
            if (check_identityM($IDENTITY1) != 'ok') return check_identityM($IDENTITY1);
            if (check_identityM($IDENTITY2) != 'ok') return check_identityM($IDENTITY2);
            $queryMD_NUM = "SELECT MD_NUM FROM setup";
            $queryresult_MD_NUM = mysqli_query($mysql, $queryMD_NUM);
            $fetchresult_MD_NUM = mysqli_fetch_row($queryresult_MD_NUM);
            $NUM = $fetchresult_MD_NUM[0];
            $insert_MD = "INSERT INTO MD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_MD_NUM = "UPDATE setup SET MD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_MD) && mysqli_query($mysql, $update_MD_NUM)) {
            	addToList("MD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($post['type'] == 'WD'){
            $IDENTITY1 = strtoupper($post['identity1']);
            $IDENTITY2 = strtoupper($post['identity2']);
            if (check_identityF($IDENTITY1) != 'ok') return check_identityF($IDENTITY1);
            if (check_identityF($IDENTITY2) != 'ok') return check_identityF($IDENTITY2);
            $queryWD_NUM = "SELECT WD_NUM FROM setup";
            $queryresult_WD_NUM = mysqli_query($mysql, $queryWD_NUM);
            $fetchresult_WD_NUM = mysqli_fetch_row($queryresult_WD_NUM);
            $NUM = $fetchresult_WD_NUM[0];
            $insert_WD = "INSERT INTO WD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_WD_NUM = "UPDATE setup SET WD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_WD) && mysqli_query($mysql, $update_WD_NUM)) {
            	addToList("WD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($post['type'] == 'XD'){
            $IDENTITY1 = strtoupper($post['identity1']);
            $IDENTITY2 = strtoupper($post['identity2']);
            if (check_identityM($IDENTITY1) != 'ok') return check_identityM($IDENTITY1);
            if (check_identityF($IDENTITY2) != 'ok') return check_identityF($IDENTITY2);
            $queryXD_NUM = "SELECT XD_NUM FROM setup";
            $queryresult_XD_NUM = mysqli_query($mysql, $queryXD_NUM);
            $fetchresult_XD_NUM = mysqli_fetch_row($queryresult_XD_NUM);
            $NUM = $fetchresult_XD_NUM[0];
            $insert_XD = "INSERT INTO XD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_XD_NUM = "UPDATE setup SET XD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_XD) && mysqli_query($mysql, $update_XD_NUM)) {
            	addToList("XD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
    }
    elseif ($post['type'] == "G") {
        $Gmajor = safe($post['Gmajor']); $Gname = safe($post['Gname']);
        $ID1 = strtoupper(safe($post['id1']));    $ID2 = strtoupper(safe($post['id2']));
        $ID3 = strtoupper(safe($post['id3']));    $ID4 = strtoupper(safe($post['id4']));
        $ID5 = strtoupper(safe($post['id5']));    $ID6 = strtoupper(safe($post['id6']));
        $ID7 = strtoupper(safe($post['id7']));    $ID8 = strtoupper(safe($post['id8']));
        $ID9 = strtoupper(safe($post['id9']));    $ID10 = strtoupper(safe($post['id10']));
        $ID11 = strtoupper(safe($post['id11']));  $ID12 = strtoupper(safe($post['id12']));
        $NAME1 = safe($post['name1']);   $NAME2 = safe($post['name2']);
        $NAME3 = safe($post['name3']);   $NAME4 = safe($post['name4']);
        $NAME5 = safe($post['name5']);   $NAME6 = safe($post['name6']);
        $NAME7 = safe($post['name7']);   $NAME8 = safe($post['name8']);
        $NAME9 = safe($post['name9']);   $NAME10 = safe($post['name10']);
        $NAME11 = safe($post['name11']); $NAME12 = safe($post['name12']);
        $MAJOR1 = safe($post['major1']);     $MAJOR2 = safe($post['major2']);
        $MAJOR3 = safe($post['major3']);     $MAJOR4 = safe($post['major4']);
        $MAJOR5 = safe($post['major5']);     $MAJOR6 = safe($post['major6']);
        $MAJOR7 = safe($post['major7']);     $MAJOR8 = safe($post['major8']);
        $MAJOR9 = safe($post['major9']);     $MAJOR10 = safe($post['major10']);
        $MAJOR11 = safe($post['major11']);   $MAJOR12 = safe($post['major12']);
        $GRADE1 = safe($post['grade1']);     $GRADE2 = safe($post['grade2']);
        $GRADE3 = safe($post['grade3']);     $GRADE4 = safe($post['grade4']);
        $GRADE5 = safe($post['grade5']);     $GRADE6 = safe($post['grade6']);
        $GRADE7 = safe($post['grade7']);     $GRADE8 = safe($post['grade8']);
        $GRADE9 = safe($post['grade9']);     $GRADE10 = safe($post['grade10']);
        $GRADE11 = safe($post['grade11']);   $GRADE12 = safe($post['grade12']);
        $SEX1 = safe($post['sex1']);     $SEX2 = safe($post['sex2']);
        $SEX3 = safe($post['sex3']);     $SEX4 = safe($post['sex4']);
        $SEX5 = safe($post['sex5']);     $SEX6 = safe($post['sex6']);
        $SEX7 = safe($post['sex7']);     $SEX8 = safe($post['sex8']);
        $SEX9 = safe($post['sex9']);     $SEX10 = safe($post['sex10']);
        $SEX11 = safe($post['sex11']);   $SEX12 = safe($post['sex12']);
        $BIRTH1 = safe($post['birth1']);     $BIRTH2 = safe($post['birth2']);
        $BIRTH3 = safe($post['birth3']);     $BIRTH4 = safe($post['birth4']);
        $BIRTH5 = safe($post['birth5']);     $BIRTH6 = safe($post['birth6']);
        $BIRTH7 = safe($post['birth7']);     $BIRTH8 = safe($post['birth8']);
        $BIRTH9 = safe($post['birth9']);     $BIRTH10 = safe($post['birth10']);
        $BIRTH11 = safe($post['birth11']);   $BIRTH12 = safe($post['birth12']);
        $PHONE1 = safe($post['phone1']);     $PHONE2 = safe($post['phone2']);
        $PHONE3 = safe($post['phone3']);     $PHONE4 = safe($post['phone4']);
        $PHONE5 = safe($post['phone5']);     $PHONE6 = safe($post['phone6']);
        $PHONE7 = safe($post['phone7']);     $PHONE8 = safe($post['phone8']);
        $PHONE9 = safe($post['phone9']);     $PHONE10 = safe($post['phone10']);
        $PHONE11 = safe($post['phone11']);   $PHONE12 = safe($post['phone12']);
        $IDENTITY1 = strtoupper(safe($post['identity1']));
        $IDENTITY2 = strtoupper(safe($post['identity2']));
        $IDENTITY3 = strtoupper(safe($post['identity3']));
        $IDENTITY4 = strtoupper(safe($post['identity4']));
        $IDENTITY5 = strtoupper(safe($post['identity5']));
        $IDENTITY6 = strtoupper(safe($post['identity6']));
        $IDENTITY7 = strtoupper(safe($post['identity7']));
        $IDENTITY8 = strtoupper(safe($post['identity8']));
        $IDENTITY9 = strtoupper(safe($post['identity9']));
        $IDENTITY10 = strtoupper(safe($post['identity10']));
        $IDENTITY11 = strtoupper(safe($post['identity11']));
        $IDENTITY12 = strtoupper(safe($post['identity12']));
        if (check_Gmajor($Gmajor) != 'ok') return check_Gmajor($Gmajor);
        if (check_Gname($Gmajor, $Gname) != 'ok') return check_Gname($Gmajor, $Gname);
        if (check_id_G($ID1) != 'ok') return check_id_G($ID1);
        if (check_id_G($ID2) != 'ok') return check_id_G($ID2);
        if (check_id_G($ID3) != 'ok') return check_id_G($ID3);
        if (check_id_G($ID4) != 'ok') return check_id_G($ID4);
        if (check_id_G($ID5) != 'ok') return check_id_G($ID5);
        if (check_id_G($ID6) != 'ok') return check_id_G($ID6);
        if (check_id_G($ID7) != 'ok') return check_id_G($ID7);
        if (check_id_G($ID8) != 'ok') return check_id_G($ID8);
        if (check_name($NAME1) != 'ok') return check_name($NAME1);
        if (check_name($NAME2) != 'ok') return check_name($NAME2);
        if (check_name($NAME3) != 'ok') return check_name($NAME3);
        if (check_name($NAME4) != 'ok') return check_name($NAME4);
        if (check_name($NAME5) != 'ok') return check_name($NAME5);
        if (check_name($NAME6) != 'ok') return check_name($NAME6);
        if (check_name($NAME7) != 'ok') return check_name($NAME7);
        if (check_name($NAME8) != 'ok') return check_name($NAME8);
        if (check_major($MAJOR1) != 'ok') return check_major($MAJOR1);
        if (check_major($MAJOR2) != 'ok') return check_major($MAJOR2);
        if (check_major($MAJOR3) != 'ok') return check_major($MAJOR3);
        if (check_major($MAJOR4) != 'ok') return check_major($MAJOR4);
        if (check_major($MAJOR5) != 'ok') return check_major($MAJOR5);
        if (check_major($MAJOR6) != 'ok') return check_major($MAJOR6);
        if (check_major($MAJOR7) != 'ok') return check_major($MAJOR7);
        if (check_major($MAJOR8) != 'ok') return check_major($MAJOR8);
        if (check_grade($GRADE1) != 'ok') return check_grade($GRADE1);
        if (check_grade($GRADE2) != 'ok') return check_grade($GRADE2);
        if (check_grade($GRADE3) != 'ok') return check_grade($GRADE3);
        if (check_grade($GRADE4) != 'ok') return check_grade($GRADE4);
        if (check_grade($GRADE5) != 'ok') return check_grade($GRADE5);
        if (check_grade($GRADE6) != 'ok') return check_grade($GRADE6);
        if (check_grade($GRADE7) != 'ok') return check_grade($GRADE7);
        if (check_grade($GRADE8) != 'ok') return check_grade($GRADE8);
        $Mcount = 0;
        $Wcount = 0;
        if ($SEX1 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY1) != 'ok') return check_identityM($IDENTITY1);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY1) != 'ok') return check_identityF($IDENTITY1);
        }
        if ($SEX2 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY2) != 'ok') return check_identityM($IDENTITY2);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY2) != 'ok') return check_identityF($IDENTITY2);
        }
        if ($SEX3 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY3) != 'ok') return check_identityM($IDENTITY3);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY3) != 'ok') return check_identityF($IDENTITY3);
        }
        if ($SEX4 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY4) != 'ok') return check_identityM($IDENTITY4);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY4) != 'ok') return check_identityF($IDENTITY4);
        }
        if ($SEX5 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY5) != 'ok') return check_identityM($IDENTITY5);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY5) != 'ok') return check_identityF($IDENTITY5);
        }
        if ($SEX6 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY6) != 'ok') return check_identityM($IDENTITY6);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY6) != 'ok') return check_identityF($IDENTITY6);
        }
        if ($SEX7 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY7) != 'ok') return check_identityM($IDENTITY7);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY7) != 'ok') return check_identityF($IDENTITY7);
        }
        if ($SEX8 == 'M'){
            $Mcount += 1;
            if (check_identityM($IDENTITY8) != 'ok') return check_identityM($IDENTITY8);
        }
        else {
            $Wcount += 1;
            if (check_identityF($IDENTITY8) != 'ok') return check_identityF($IDENTITY8);
        }

        $birth = explode('-', $BIRTH1);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH2);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH3);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH4);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH5);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH6);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH7);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }
        $birth = explode('-', $BIRTH8);
        if (count($birth) != 3) {
            return '請輸入正確的出生日期！';
        }
        elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
            return check_birth($birth[0], $birth[1], $birth[2]);
        }

        if (!empty($ID9)){
            if (check_id_G($ID9) != 'ok') return check_id_G($ID9);
            if (check_name($NAME9) != 'ok') return check_name($NAME9);
            if (check_major($MAJOR9) != 'ok') return check_major($MAJOR9);
            if (check_grade($GRADE9) != 'ok') return check_grade($GRADE9);
            if ($SEX9 == 'M'){
                $Mcount += 1;
                if (check_identityM($IDENTITY9) != 'ok') return check_identityM($IDENTITY9);
            }
            else {
                $Wcount += 1;
                if (check_identityF($IDENTITY9) != 'ok') return check_identityF($IDENTITY9);
            }
            $birth = explode('-', $BIRTH9);
            if (count($birth) != 3) {
                return '請輸入正確的出生日期！';
            }
            elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
                return check_birth($birth[0], $birth[1], $birth[2]);
            }
        }
        if (!empty($ID10)){
            if (check_id_G($ID10) != 'ok') return check_id_G($ID10);
            if (check_name($NAME10) != 'ok') return check_name($NAME10);
            if (check_major($MAJOR10) != 'ok') return check_major($MAJOR10);
            if (check_grade($GRADE10) != 'ok') return check_grade($GRADE10);
            if ($SEX10 == 'M'){
                $Mcount += 1;
                if (check_identityM($IDENTITY10) != 'ok') return check_identityM($IDENTITY10);
            }
            else {
                $Wcount += 1;
                if (check_identityF($IDENTITY10) != 'ok') return check_identityF($IDENTITY10);
            }
            $birth = explode('-', $BIRTH10);
            if (count($birth) != 3) {
                return '請輸入正確的出生日期！';
            }
            elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
                return check_birth($birth[0], $birth[1], $birth[2]);
            }
        }
        if (!empty($ID11)){
            if (check_id_G($ID11) != 'ok') return check_id_G($ID11);
            if (check_name($NAME11) != 'ok') return check_name($NAME11);
            if (check_major($MAJOR11) != 'ok') return check_major($MAJOR11);
            if (check_grade($GRADE11) != 'ok') return check_grade($GRADE11);
            if ($SEX11 == 'M'){
                $Mcount += 1;
                if (check_identityM($IDENTITY11) != 'ok') return check_identityM($IDENTITY11);
            }
            else {
                $Wcount += 1;
                if (check_identityF($IDENTITY11) != 'ok') return check_identityF($IDENTITY11);
            }
            $birth = explode('-', $BIRTH11);
            if (count($birth) != 3) {
                return '請輸入正確的出生日期！';
            }
            elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
                return check_birth($birth[0], $birth[1], $birth[2]);
            }
        }
        if (!empty($ID12)){
            if (check_id_G($ID12) != 'ok') return check_id_G($ID12);
            if (check_name($NAME12) != 'ok') return check_name($NAME12);
            if (check_major($MAJOR12) != 'ok') return check_major($MAJOR12);
            if (check_grade($GRADE12) != 'ok') return check_grade($GRADE12);
            if ($SEX12 == 'M'){
                $Mcount += 1;
                if (check_identityM($IDENTITY12) != 'ok') return check_identityM($IDENTITY12);
            }
            else {
                $Wcount += 1;
                if (check_identityF($IDENTITY12) != 'ok') return check_identityF($IDENTITY12);
            }
            $birth = explode('-', $BIRTH12);
            if (count($birth) != 3) {
                return '請輸入正確的出生日期！';
            }
            elseif (check_birth($birth[0], $birth[1], $birth[2]) != 'ok') {
                return check_birth($birth[0], $birth[1], $birth[2]);
            }
        }
        if ($Mcount < 4){
            return "每隊至少需要有四位男生";
        }
        if ($Wcount < 4){
            return "每隊至少需要有四位女生";
        }
        if (check_phone($PHONE1) != 'ok') return check_phone($PHONE1);
        if (!empty($PHONE2) && check_phone($PHONE2) != 'ok') return check_phone($PHONE2);
        if (!empty($PHONE3) && check_phone($PHONE3) != 'ok') return check_phone($PHONE3);
        if (!empty($PHONE4) && check_phone($PHONE4) != 'ok') return check_phone($PHONE4);
        if (!empty($PHONE5) && check_phone($PHONE5) != 'ok') return check_phone($PHONE5);
        if (!empty($PHONE6) && check_phone($PHONE6) != 'ok') return check_phone($PHONE6);
        if (!empty($PHONE7) && check_phone($PHONE7) != 'ok') return check_phone($PHONE7);
        if (!empty($PHONE8) && check_phone($PHONE8) != 'ok') return check_phone($PHONE8);
        if (!empty($PHONE9) && check_phone($PHONE9) != 'ok') return check_phone($PHONE9);
        if (!empty($PHONE10) && check_phone($PHONE10) != 'ok') return check_phone($PHONE10);
        if (!empty($PHONE11) && check_phone($PHONE11) != 'ok') return check_phone($PHONE11);
        if (!empty($PHONE12) && check_phone($PHONE12) != 'ok') return check_phone($PHONE12);
        if (check_check($post) != 'ok') return check_check($post);

        date_default_timezone_set('Asia/Taipei');
        $SIGN_TIME = date("Y-m-d H:i:s");
        
        $queryG_NUM = "SELECT G_NUM FROM setup";
        $queryresult_G_NUM = mysqli_query($mysql, $queryG_NUM);
        $fetchresult_G_NUM = mysqli_fetch_row($queryresult_G_NUM);
        $NUM = $fetchresult_G_NUM[0];
        $insert_G = "INSERT INTO G (NUM, Gmajor, Gname, ID_1, ID_2, ID_3, ID_4, ID_5, ID_6, ID_7, ID_8, ID_9, ID_10, ID_11, ID_12, NAME_1, NAME_2, NAME_3, NAME_4, NAME_5, NAME_6, NAME_7, NAME_8, NAME_9, NAME_10, NAME_11, NAME_12, MAJOR_1, MAJOR_2, MAJOR_3, MAJOR_4, MAJOR_5, MAJOR_6, MAJOR_7, MAJOR_8, MAJOR_9, MAJOR_10, MAJOR_11, MAJOR_12, GRADE_1, GRADE_2, GRADE_3, GRADE_4, GRADE_5, GRADE_6, GRADE_7, GRADE_8, GRADE_9, GRADE_10, GRADE_11, GRADE_12, PHONE_1, PHONE_2, PHONE_3, PHONE_4, PHONE_5, PHONE_6, PHONE_7, PHONE_8, PHONE_9, PHONE_10, PHONE_11, PHONE_12, BIRTH_1, BIRTH_2, BIRTH_3, BIRTH_4, BIRTH_5, BIRTH_6, BIRTH_7, BIRTH_8, BIRTH_9, BIRTH_10, BIRTH_11, BIRTH_12, IDENTITY_1, IDENTITY_2, IDENTITY_3, IDENTITY_4, IDENTITY_5, IDENTITY_6, IDENTITY_7, IDENTITY_8, IDENTITY_9, IDENTITY_10, IDENTITY_11, IDENTITY_12, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$Gmajor', '$Gname', '$ID1', '$ID2', '$ID3', '$ID4', '$ID5', '$ID6', '$ID7', '$ID8', '$ID9', '$ID10', '$ID11', '$ID12', '$NAME1', '$NAME2', '$NAME3', '$NAME4', '$NAME5', '$NAME6', '$NAME7', '$NAME8', '$NAME9', '$NAME10', '$NAME11', '$NAME12', '$MAJOR1', '$MAJOR2', '$MAJOR3', '$MAJOR4', '$MAJOR5', '$MAJOR6', '$MAJOR7', '$MAJOR8', '$MAJOR9', '$MAJOR10', '$MAJOR11', '$MAJOR12', '$GRADE1', '$GRADE2', '$GRADE3', '$GRADE4', '$GRADE5', '$GRADE6', '$GRADE7', '$GRADE8', '$GRADE9', '$GRADE10', '$GRADE11', '$GRADE12', '$PHONE1', '$PHONE2', '$PHONE3', '$PHONE4', '$PHONE5', '$PHONE6', '$PHONE7', '$PHONE8', '$PHONE9', '$PHONE10', '$PHONE11', '$PHONE12', '$BIRTH1', '$BIRTH2', '$BIRTH3', '$BIRTH4', '$BIRTH5', '$BIRTH6', '$BIRTH7', '$BIRTH8', '$BIRTH9', '$BIRTH10', '$BIRTH11', '$BIRTH12', '$IDENTITY1', '$IDENTITY2', '$IDENTITY3', '$IDENTITY4', '$IDENTITY5', '$IDENTITY6', '$IDENTITY7', '$IDENTITY8', '$IDENTITY9', '$IDENTITY10', '$IDENTITY11', '$IDENTITY12', '$SIGN_TIME', 0)";
        $update_G_NUM = "UPDATE setup SET G_NUM = $NUM+1";
        if (mysqli_query($mysql, $insert_G) && mysqli_query($mysql, $update_G_NUM)){
        	addToList("G", $NUM.", ".$Gmajor.", ".$Gname.", ".$SIGN_TIME."<br>".
        		$ID_1.", ".$NAME_1.", ".$MAJOR_1.", ".$GRADE_1.", ".$PHONE_1.", ".$BIRTH_1.", ".$IDENTITY_1."<br>".
        		$ID_2.", ".$NAME_2.", ".$MAJOR_2.", ".$GRADE_2.", ".$PHONE_2.", ".$BIRTH_2.", ".$IDENTITY_2."<br>".
        		$ID_3.", ".$NAME_3.", ".$MAJOR_3.", ".$GRADE_3.", ".$PHONE_3.", ".$BIRTH_3.", ".$IDENTITY_3."<br>".
        		$ID_4.", ".$NAME_4.", ".$MAJOR_4.", ".$GRADE_4.", ".$PHONE_4.", ".$BIRTH_4.", ".$IDENTITY_4."<br>".
        		$ID_5.", ".$NAME_5.", ".$MAJOR_5.", ".$GRADE_5.", ".$PHONE_5.", ".$BIRTH_5.", ".$IDENTITY_5."<br>".
        		$ID_6.", ".$NAME_6.", ".$MAJOR_6.", ".$GRADE_6.", ".$PHONE_6.", ".$BIRTH_6.", ".$IDENTITY_6."<br>".
        		$ID_7.", ".$NAME_7.", ".$MAJOR_7.", ".$GRADE_7.", ".$PHONE_7.", ".$BIRTH_7.", ".$IDENTITY_7."<br>".
        		$ID_8.", ".$NAME_8.", ".$MAJOR_8.", ".$GRADE_8.", ".$PHONE_8.", ".$BIRTH_8.", ".$IDENTITY_8."<br>".
        		$ID_9.", ".$NAME_9.", ".$MAJOR_9.", ".$GRADE_9.", ".$PHONE_9.", ".$BIRTH_9.", ".$IDENTITY_9."<br>".
        		$ID_10.", ".$NAME_10.", ".$MAJOR_10.", ".$GRADE_10.", ".$PHONE_10.", ".$BIRTH_10.", ".$IDENTITY_10."<br>".
        		$ID_11.", ".$NAME_11.", ".$MAJOR_11.", ".$GRADE_11.", ".$PHONE_11.", ".$BIRTH_11.", ".$IDENTITY_11."<br>".
        		$ID_12.", ".$NAME_12.", ".$MAJOR_12.", ".$GRADE_12.", ".$PHONE_12.", ".$BIRTH_12.", ".$IDENTITY_12."<br><br>");
            return array('msg' => 'ok', 'num' => $NUM);
        }
        else {
            return "資料庫異常，請重試！";
        }
    }
}

function signupDirect($post) {
    $mysql = $GLOBALS['mysql'];
    if (in_array($post['type'], array("directMS", "directWS"))) {
        $ID = strtoupper($post['id']);
        $NAME = $post['name'];
        $MAJOR = $post['major'];
        $GRADE = $post['grade'];
        $PHONE = $post['phone'];
        $BIRTHY = $post['birthy'];
        $BIRTHM = $post['birthm'];
        $BIRTHD = $post['birthd'];
        $IDENTITY = strtoupper($post['identity']);
        if (check_id($post['type'], $ID) != 'ok') return check_id($post['type'], $ID);
        $BIRTH = $BIRTHY.'-'.$BIRTHM.'-'.$BIRTHD;
        date_default_timezone_set('Asia/Taipei');
        $SIGN_TIME = date("Y-m-d H:i:s");
        if ($post['type'] == 'directMS'){
            $queryMS_NUM = "SELECT MS_NUM FROM setup";
            $queryresult_MS_NUM = mysqli_query($mysql, $queryMS_NUM);
            $fetchresult_MS_NUM = mysqli_fetch_row($queryresult_MS_NUM);
            $NUM = $fetchresult_MS_NUM[0];
            $insert_MS = "INSERT INTO MS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
            $update_MS_NUM = "UPDATE setup SET MS_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_MS) && mysqli_query($mysql, $update_MS_NUM)) {
            	addToList("MS", $NUM.", ".$ID.", ".$NAME.", ".$MAJOR.", ".$GRADE.", ".$PHONE.", ".$BIRTH.", ".$IDENTITY.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($post['type'] == 'directWS'){
            $queryWS_NUM = "SELECT WS_NUM FROM setup";
            $queryresult_WS_NUM = mysqli_query($mysql, $queryWS_NUM);
            $fetchresult_WS_NUM = mysqli_fetch_row($queryresult_WS_NUM);
            $NUM = $fetchresult_WS_NUM[0];
            $insert_WS = "INSERT INTO WS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
            $update_WS_NUM = "UPDATE setup SET WS_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_WS) && mysqli_query($mysql, $update_WS_NUM)) {
            	addToList("WS", $NUM.", ".$ID.", ".$NAME.", ".$MAJOR.", ".$GRADE.", ".$PHONE.", ".$BIRTH.", ".$IDENTITY.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
    }
    elseif (in_array($post['type'], array("directMD", "directWD", "directXD"))) {
        $ID1 = strtoupper($post['id1']);
        $ID2 = strtoupper($post['id2']);
        $NAME1 = $post['name1'];
        $NAME2 = $post['name2'];
        $MAJOR1 = $post['major1'];
        $MAJOR2 = $post['major2'];
        $GRADE1 = $post['grade1'];
        $GRADE2 = $post['grade2'];
        $PHONE1 = $post['phone1'];
        $PHONE2 = $post['phone2'];
        $BIRTHY1 = $post['birthy1'];
        $BIRTHY2 = $post['birthy2'];
        $BIRTHM1 = $post['birthm1'];
        $BIRTHM2 = $post['birthm2'];
        $BIRTHD1 = $post['birthd1'];
        $BIRTHD2 = $post['birthd2'];
        $IDENTITY1 = strtoupper($post['identity1']);
        $IDENTITY2 = strtoupper($post['identity2']);
        if (check_id($post['type'], $ID1) != 'ok') return check_id($post['type'], $ID1);
        if (check_id($post['type'], $ID2) != 'ok') return check_id($post['type'], $ID2);
        $BIRTH1 = $BIRTHY1.'-'.$BIRTHM1.'-'.$BIRTHD1;
        $BIRTH2 = $BIRTHY2.'-'.$BIRTHM2.'-'.$BIRTHD2;
        date_default_timezone_set('Asia/Taipei');
        $SIGN_TIME = date("Y-m-d H:i:s");
        if ($new == 'directMD'){
            $queryMD_NUM = "SELECT MD_NUM FROM setup";
            $queryresult_MD_NUM = mysqli_query($mysql, $queryMD_NUM);
            $fetchresult_MD_NUM = mysqli_fetch_row($queryresult_MD_NUM);
            $NUM = $fetchresult_MD_NUM[0];
            $insert_MD = "INSERT INTO MD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_MD_NUM = "UPDATE setup SET MD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_MD) && mysqli_query($mysql, $update_MD_NUM)) {
            	addToList("MD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($new == 'directWD'){
            $queryWD_NUM = "SELECT WD_NUM FROM setup";
            $queryresult_WD_NUM = mysqli_query($mysql, $queryWD_NUM);
            $fetchresult_WD_NUM = mysqli_fetch_row($queryresult_WD_NUM);
            $NUM = $fetchresult_WD_NUM[0];
            $insert_WD = "INSERT INTO WD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_WD_NUM = "UPDATE setup SET WD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_WD) && mysqli_query($mysql, $update_WD_NUM)) {
            	addToList("WD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
        elseif ($new == 'directXD'){
            $queryXD_NUM = "SELECT XD_NUM FROM setup";
            $queryresult_XD_NUM = mysqli_query($mysql, $queryXD_NUM);
            $fetchresult_XD_NUM = mysqli_fetch_row($queryresult_XD_NUM);
            $NUM = $fetchresult_XD_NUM[0];
            $insert_XD = "INSERT INTO XD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2', '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
            $update_XD_NUM = "UPDATE setup SET XD_NUM = $NUM+1";
            if (mysqli_query($mysql, $insert_XD) && mysqli_query($mysql, $update_XD_NUM)) {
            	addToList("XD", $NUM.", ".$ID_1.", ".$ID_2.", ".$NAME_1.", ".$NAME_2.", ".$MAJOR_1.", ".$MAJOR_2.", ".$GRADE_1.", ".$GRADE_2.", ".$PHONE_1.", ".$PHONE_2.", ".$BIRTH_1.", ".$BIRTH_2.", ".$IDENTITY_1.", ".$IDENTITY_2.", ".$SIGN_TIME);
                return array('msg' => 'ok', 'num' => $NUM);
            }
            else {
                return '資料庫異常，請重試！';
            }
        }
    }
}

function translate_grade($grade) {
    if ($grade == 'A') return '大一';
    elseif ($grade == 'B') return '大二';
    elseif ($grade == 'C') return '碩一';    
    elseif ($grade == 'D') return '博一';    
}

function translate_paystat($paystat) {
    if ($paystat == 0) return '未繳費';
    elseif ($paystat == 1) return '已繳費';
}