<?php
header('Content-Type: application/json; charset=utf-8');
$db = mysql_connect('localhost', 'root', '');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('NTUcup', $db);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['account']) && isset($_POST['password'])){
    login();
}

else if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if (isset($_GET['id'])){
        search1();
    }
    else if (isset($_GET['type']) && isset($_GET['num'])){
        search2();
    }
}

else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['new'])){
    if (safe($_POST['new']) == "MS"){
        sign_up_1('MS');
    }
    else if (safe($_POST['new']) == "WS"){
        sign_up_1('WS');
    }
    else if (safe($_POST['new']) == "MD"){
        sign_up_2('MD');
    }
    else if (safe($_POST['new']) == "WD"){
        sign_up_2('WD');
    }
    else if (safe($_POST['new']) == "XD"){
        sign_up_2('XD');
    }
    else if(safe($_POST['new']) == "G"){
        sign_up_3();
    }
}
else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
    $id = (string)safe($_POST['id']);
    $id = strtoupper($id);
    send_back(check_id($id));
}
else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['phone'])){
    $phone = safe($_POST['phone']);
    send_back(check_phone($phone));
}
else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['birthy']) && isset($_POST['birthm']) && isset($_POST['birthd'])){
    $birthy = (int)safe($_POST['birthy']);
    $birthm = (int)safe($_POST['birthm']);
    $birthd = (int)safe($_POST['birthd']);
    send_back(check_birth($birthy, $birthm, $birthd));
}
else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['identity'])){
    $identity = (string)safe($_POST['identity']);
    $identity = strtoupper($identity);
    send_back(check_identity($identity));
}
else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['identity_W'])){
    $identity = (string)safe($_POST['identity_W']);
    $identity = strtoupper($identity);
    send_back(check_identity_W($identity));
}

function safe($value) {
    return htmlspecialchars(addslashes($value));
}

function transfer_grade($grade) {
    if ($grade == 'A'){
        return '大一';
    }
    else if ($grade == 'B'){
        return '大二';
    }
    else if ($grade == 'C'){
        return '碩一';
    }
    else if ($grade == 'D'){
        return '博一';
    }
}

function transfer_paystat($paystat) {
    if ($paystat == 0){
        return '未繳費';
    }
    else if ($paystat == 1){
        return '已繳費';
    }
}

function send_back($msg) {
    echo json_encode(array('msg' => $msg));
    return;
}

function login() {
    if ($_POST['account'] == 'NTUcup' && $_POST['password'] == '0986036999'){
        session_start();
        $_SESSION['valid'] = 'Y';
        send_back('ok');
    }
    else {
        send_back('請輸入正確的帳號與密碼');
    }
}

function search1() {
    $count = 1;
    $num_1 = null; $grade_1 = null; $name_1 = null; $paystat_1 = null;
    $num_2 = null; $grade_2 = null; $name_2 = null; $paystat_2 = null;
    $num_3 = null; $grade_3 = null; $name_3 = null; $paystat_3 = null;
    $id = strtoupper(safe($_GET['id']));
    $queryMS = "SELECT * FROM MS WHERE ID='$id'";
    $queryresult_MS = mysql_fetch_array(mysql_query($queryMS));
    $queryWS = "SELECT * FROM WS WHERE ID='$id'";
    $queryresult_WS = mysql_fetch_array(mysql_query($queryWS));
    
    $queryMD_1 = "SELECT * FROM MD WHERE ID_1='$id'";
    $queryresult_MD = mysql_fetch_array(mysql_query($queryMD_1));
    if (!$queryresult_MD){
        $queryMD_2 = "SELECT * FROM MD WHERE ID_2='$id'";
        $queryresult_MD = mysql_fetch_array(mysql_query($queryMD_2));
    }
    $queryWD_1 = "SELECT * FROM WD WHERE ID_1='$id'";
    $queryresult_WD = mysql_fetch_array(mysql_query($queryWD_1));
    if (!$queryresult_WD){
        $queryWD_2 = "SELECT * FROM WD WHERE ID_2='$id'";
        $queryresult_WD = mysql_fetch_array(mysql_query($queryWD_2));
    }    
    $queryXD_1 = "SELECT * FROM XD WHERE ID_1='$id'";
    $queryresult_XD = mysql_fetch_array(mysql_query($queryXD_1));
    if (!$queryresult_XD){
        $queryXD_2 = "SELECT * FROM XD WHERE ID_2='$id'";
        $queryresult_XD = mysql_fetch_array(mysql_query($queryXD_2));
    }
    $queryG_1 = "SELECT * FROM G WHERE ID_1='$id'";
    $queryresult_G = mysql_fetch_array(mysql_query($queryG_1));
    if (!$queryresult_G){
        $queryG_2 = "SELECT * FROM G WHERE ID_2='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_2));
    }
    if (!$queryresult_G){
        $queryG_3 = "SELECT * FROM G WHERE ID_3='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_3));
    }
    if (!$queryresult_G){
        $queryG_4 = "SELECT * FROM G WHERE ID_4='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_4));
    }
    if (!$queryresult_G){
        $queryG_5 = "SELECT * FROM G WHERE ID_5='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_5));
    }
    if (!$queryresult_G){
        $queryG_6 = "SELECT * FROM G WHERE ID_6='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_6));
    }
    if (!$queryresult_G){
        $queryG_7 = "SELECT * FROM G WHERE ID_7='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_7));
    }
    if (!$queryresult_G){
        $queryG_8 = "SELECT * FROM G WHERE ID_8='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_8));
    }
    if (!$queryresult_G){
        $queryG_9 = "SELECT * FROM G WHERE ID_9='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_9));
    }
    if (!$queryresult_G){
        $queryG_10 = "SELECT * FROM G WHERE ID_10='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_10));
    }
    if (!$queryresult_G){
        $queryG_11 = "SELECT * FROM G WHERE ID_11='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_11));
    }
    if (!$queryresult_G){
        $queryG_12 = "SELECT * FROM G WHERE ID_12='$id'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG_12));
    }

    if ($queryresult_MS){
        $num_1 = '男單'.$queryresult_MS['NUM'];
        $grade_1 = $queryresult_MS['MAJOR'].transfer_grade($queryresult_MS['GRADE']);
        $name_1 = $queryresult_MS['NAME'];
        $paystat_1 = transfer_paystat($queryresult_MS['PAYSTAT']);
        $count = 2;
    }
    if ($queryresult_WS){
        $num_1 = '女單'.$queryresult_WS['NUM'];
        $grade_1 = $queryresult_WS['MAJOR'].transfer_grade($queryresult_WS['GRADE']);
        $name_1 = $queryresult_WS['NAME'];
        $paystat_1 = transfer_paystat($queryresult_WS['PAYSTAT']);
        $count = 2;
    }
    if ($queryresult_MD){
        if ($count == 1){
            $num_1 = '男雙'.$queryresult_MD['NUM'];
            $grade_1 = $queryresult_MD['MAJOR_1'].transfer_grade($queryresult_MD['GRADE_1']).'<br>'.
                       $queryresult_MD['MAJOR_2'].transfer_grade($queryresult_MD['GRADE_2']);
            $name_1 = $queryresult_MD['NAME_1'].'<br>'.$queryresult_MD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_MD['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '男雙'.$queryresult_MD['NUM'];
            $grade_2 = $queryresult_MD['MAJOR_1'].transfer_grade($queryresult_MD['GRADE_1']).'<br>'.
                       $queryresult_MD['MAJOR_2'].transfer_grade($queryresult_MD['GRADE_2']);
            $name_2 = $queryresult_MD['NAME_1'].'<br>'.$queryresult_MD['NAME_2'];
            $paystat_2 = transfer_paystat($queryresult_MD['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_WD){
        if ($count == 1){
            $num_1 = '女雙'.$queryresult_WD['NUM'];
            $grade_1 = $queryresult_WD['MAJOR_1'].transfer_grade($queryresult_WD['GRADE_1']).'<br>'.
                       $queryresult_WD['MAJOR_2'].transfer_grade($queryresult_WD['GRADE_2']);
            $name_1 = $queryresult_WD['NAME_1'].'<br>'.$queryresult_WD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_WD['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '女雙'.$queryresult_WD['NUM'];
            $grade_2 = $queryresult_WD['MAJOR_1'].transfer_grade($queryresult_WD['GRADE_1']).'<br>'.
                       $queryresult_WD['MAJOR_2'].transfer_grade($queryresult_WD['GRADE_2']);
            $name_2 = $queryresult_WD['NAME_1'].'<br>'.$queryresult_WD['NAME_2'];
            $paystat_2 = transfer_paystat($queryresult_WD['PAYSTAT']);
            $count = 3;
        }
    }
    if ($queryresult_XD){
        if ($count == 1){
            $num_1 = '混雙'.$queryresult_XD['NUM'];
            $grade_1 = $queryresult_XD['MAJOR_1'].transfer_grade($queryresult_XD['GRADE_1']).'<br>'.
                       $queryresult_XD['MAJOR_2'].transfer_grade($queryresult_XD['GRADE_2']);
            $name_1 = $queryresult_XD['NAME_1'].'<br>'.$queryresult_XD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_XD['PAYSTAT']);
            $count = 2;
        }
        else {
            $num_2 = '混雙'.$queryresult_XD['NUM'];
            $grade_2 = $queryresult_XD['MAJOR_1'].transfer_grade($queryresult_XD['GRADE_1']).'<br>'.
                       $queryresult_XD['MAJOR_2'].transfer_grade($queryresult_XD['GRADE_2']);
            $name_2 = $queryresult_XD['NAME_1'].'<br>'.$queryresult_XD['NAME_2'];
            $paystat_2 = transfer_paystat($queryresult_XD['PAYSTAT']);
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
        else if ($count == 2){
            $num_2 = '團體'.$queryresult_G['NUM'];
            $grade_2 = $queryresult_G['Gmajor'];
            $name_2 = $queryresult_G['Gname'];
            $paystat_2 = transfer_paystat($queryresult_G['PAYSTAT']);
            $count = 3;
        }
        else if ($count == 3){
            $num_3 = '團體'.$queryresult_G['NUM'];
            $grade_3 = $queryresult_G['Gmajor'];
            $name_3 = $queryresult_G['Gname'];
            $paystat_3 = transfer_paystat($queryresult_G['PAYSTAT']);
            $count = 4;
        }
    }

    if ($count == 1){
        echo json_encode(array('null' => 'null'));
        return;
    }
    else if ($count == 2){
        echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
        return;
    }
    else if ($count == 3){
        echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1,
                               'num_2' => $num_2, 'grade_2' => $grade_2, 'name_2' => $name_2, 'paystat_2' => $paystat_2));
        return;
    }
    else if ($count == 4){
        echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1,
                               'num_2' => $num_2, 'grade_2' => $grade_2, 'name_2' => $name_2, 'paystat_2' => $paystat_2,
                               'num_3' => $num_3, 'grade_3' => $grade_3, 'name_3' => $name_3, 'paystat_3' => $paystat_3));
        return;
    }
}

function search2() {
    $type = safe($_GET['type']);
    $num = safe($_GET['num']);
    if ($type == 'A'){
        $queryMS = "SELECT * FROM MS WHERE NUM='$num'";
        $queryresult_MS = mysql_fetch_array(mysql_query($queryMS));
        if ($queryresult_MS){
            $num_1 = '男單'.$queryresult_MS['NUM'];
            $grade_1 = $queryresult_MS['MAJOR'].transfer_grade($queryresult_MS['GRADE']);
            $name_1 = $queryresult_MS['NAME'];
            $paystat_1 = transfer_paystat($queryresult_MS['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
    else if ($type == 'B'){
        $queryWS = "SELECT * FROM WS WHERE NUM='$num'";
        $queryresult_WS = mysql_fetch_array(mysql_query($queryWS));
        if ($queryresult_WS){
            $num_1 = '女單'.$queryresult_WS['NUM'];
            $grade_1 = $queryresult_WS['MAJOR'].transfer_grade($queryresult_WS['GRADE']);
            $name_1 = $queryresult_WS['NAME'];
            $paystat_1 = transfer_paystat($queryresult_WS['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
    else if ($type == 'C'){
        $queryMD = "SELECT * FROM MD WHERE NUM='$num'";
        $queryresult_MD = mysql_fetch_array(mysql_query($queryMD));
        if ($queryresult_MD){
            $num_1 = '男雙'.$queryresult_MD['NUM'];
            $grade_1 = $queryresult_MD['MAJOR_1'].transfer_grade($queryresult_MD['GRADE_1']).'<br>'.
                       $queryresult_MD['MAJOR_2'].transfer_grade($queryresult_MD['GRADE_2']);
            $name_1 = $queryresult_MD['NAME_1'].'<br>'.$queryresult_MD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_MD['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
    else if ($type == 'D'){
        $queryWD = "SELECT * FROM WD WHERE NUM='$num'";
        $queryresult_WD = mysql_fetch_array(mysql_query($queryWD));
        if ($queryresult_WD){
            $num_1 = '女雙'.$queryresult_WD['NUM'];
            $grade_1 = $queryresult_WD['MAJOR_1'].transfer_grade($queryresult_WD['GRADE_1']).'<br>'.
                       $queryresult_WD['MAJOR_2'].transfer_grade($queryresult_WD['GRADE_2']);
            $name_1 = $queryresult_WD['NAME_1'].'<br>'.$queryresult_WD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_WD['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
    else if ($type == 'E'){
        $queryXD = "SELECT * FROM XD WHERE NUM='$num'";
        $queryresult_XD = mysql_fetch_array(mysql_query($queryXD));
        if ($queryresult_XD){
            $num_1 = '混雙'.$queryresult_XD['NUM'];
            $grade_1 = $queryresult_XD['MAJOR_1'].transfer_grade($queryresult_XD['GRADE_1']).'<br>'.
                       $queryresult_XD['MAJOR_2'].transfer_grade($queryresult_XD['GRADE_2']);
            $name_1 = $queryresult_XD['NAME_1'].'<br>'.$queryresult_XD['NAME_2'];
            $paystat_1 = transfer_paystat($queryresult_XD['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
    else if ($type == 'F'){
        $queryG = "SELECT * FROM G WHERE NUM='$num'";
        $queryresult_G = mysql_fetch_array(mysql_query($queryG));
        if ($queryresult_G){
            $num_1 = '團體'.$queryresult_G['NUM'];
            $grade_1 = $queryresult_G['Gmajor'];
            $name_1 = $queryresult_G['Gname'];
            $paystat_1 = transfer_paystat($queryresult_G['PAYSTAT']);
            echo json_encode(array('num_1' => $num_1, 'grade_1' => $grade_1, 'name_1' => $name_1, 'paystat_1' => $paystat_1));
            return;
        }
        else {
            echo json_encode(array('null' => 'null'));
            return;
        }
    }
}

function check_id($id) {
    $id = fulltohalf($id);
    if (strlen($id) != 9 || !preg_match('/^[A-Z][0-9]{2}.[0-9]{5}$/', $id)){
        return '請輸入正確的學號！';
    }
    else {
        $queryID_MS = "SELECT ID FROM MS WHERE ID='$id'";
        $queryresult_MS = mysql_fetch_row(mysql_query($queryID_MS));
        $queryID_WS = "SELECT ID FROM WS WHERE ID='$id'";
        $queryresult_WS = mysql_fetch_row(mysql_query($queryID_WS));
        $queryID_MD_1 = "SELECT ID_1 FROM MD WHERE ID_1='$id'";
        $queryresult_MD_1 = mysql_fetch_row(mysql_query($queryID_MD_1));
        $queryID_MD_2 = "SELECT ID_2 FROM MD WHERE ID_2='$id'";
        $queryresult_MD_2 = mysql_fetch_row(mysql_query($queryID_MD_2));
        $queryID_WD_1 = "SELECT ID_1 FROM WD WHERE ID_1='$id'";
        $queryresult_WD_1 = mysql_fetch_row(mysql_query($queryID_WD_1));
        $queryID_WD_2 = "SELECT ID_2 FROM WD WHERE ID_2='$id'";
        $queryresult_WD_2 = mysql_fetch_row(mysql_query($queryID_WD_2));
        $queryID_XD_1 = "SELECT ID_1 FROM XD WHERE ID_1='$id'";
        $queryresult_XD_1 = mysql_fetch_row(mysql_query($queryID_XD_1));
        $queryID_XD_2 = "SELECT ID_2 FROM XD WHERE ID_2='$id'";
        $queryresult_XD_2 = mysql_fetch_row(mysql_query($queryID_XD_2));
        $type = safe($_POST['type']);
        if ($type == 'MS'){
            if ($queryresult_MS){
                return '您已經報名過此項目！';
            }
            else {
                $count = 0;
                if ($queryresult_MD_1){
                    $count += 1;
                }
                if ($queryresult_MD_2){
                    $count += 1;
                }
                if ($queryresult_XD_1){
                    $count += 1;
                }
                if ($count >= 2){
                    return '您已經報名兩個個人賽項目！';
                }
                else {
                    return 'ok';
                }
            }
        }
        else if ($type == 'WS'){
            if ($queryresult_WS){
                return '您已經報名過此項目！';
            }
            else {
                $count = 0;
                if ($queryresult_WD_1){
                    $count += 1;
                }
                if ($queryresult_WD_2){
                    $count += 1;
                }
                if ($queryresult_XD_2){
                    $count += 1;
                }
                if ($count >= 2){
                    return '您已經報名兩個個人賽項目！';
                }
                else {
                    return 'ok';
                }
            }
        }
        else if ($type == 'MD'){
            if ($queryresult_MD_1 || $queryresult_MD_2){
                return '您已經報名過此項目！';
            }
            else {
                $count = 0;
                if ($queryresult_MS){
                    $count += 1;
                }
                if ($queryresult_XD_1){
                    $count += 1;
                }
                if ($count == 2){
                    return '您已經報名兩個個人賽項目！';
                }
                else {
                    return 'ok';
                }
            }
        }
        else if ($type == 'WD'){
            if ($queryresult_WD_1 || $queryresult_WD_2){
                return '您已經報名過此項目！';
            }
            else {
                $count = 0;
                if ($queryresult_WS){
                    $count += 1;
                }
                if ($queryresult_XD_2){
                    $count += 1;
                }
                if ($count == 2){
                    return '您已經報名兩個個人賽項目！';
                }
                else {
                    return 'ok';
                }
            }
        }
        else if ($type == 'XD'){
            if ($queryresult_XD_1 || $queryresult_XD_2){
                return '您已經報名過此項目！';
            }
            else {
                $count = 0;
                if ($queryresult_MS){
                    $count += 1;
                }
                if ($queryresult_WS){
                    $count += 1;
                }
                if ($queryresult_MD_1){
                    $count += 1;
                }
                if ($queryresult_MD_2){
                    $count += 1;
                }
                if ($queryresult_WD_1){
                    $count += 1;
                }
                if ($queryresult_WD_2){
                    $count += 1;
                }
                if ($count >= 2){
                    return '您已經報名兩個個人賽項目！';
                }
                else {
                    return 'ok';
                }
            }
        }
    }
}

function check_id_G($id) {
    $id = fulltohalf($id);
    $first = substr($id, 0, 1);
    if (strlen($id) != 9 || !preg_match('/^[A-Z]+$/', $first)){
        return '請輸入正確的學號！';
    }
    else {
        $queryID_G1 = "SELECT * FROM G WHERE ID_1='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G1));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G2 = "SELECT * FROM G WHERE ID_2='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G2));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G3 = "SELECT * FROM G WHERE ID_3='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G3));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G4 = "SELECT * FROM G WHERE ID_4='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G4));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G5 = "SELECT * FROM G WHERE ID_5='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G5));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G6 = "SELECT * FROM G WHERE ID_6='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G6));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G7 = "SELECT * FROM G WHERE ID_7='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G7));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G8 = "SELECT * FROM G WHERE ID_8='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G8));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G9 = "SELECT * FROM G WHERE ID_9='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G9));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G10 = "SELECT * FROM G WHERE ID_10='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G10));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G11 = "SELECT * FROM G WHERE ID_11='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G11));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        $queryID_G12 = "SELECT * FROM G WHERE ID_12='$id'";
        $queryresult_G = mysql_fetch_row(mysql_query($queryID_G12));
        if ($queryresult_G) {return '您已經報名過此項目！';}
        else {return 'ok';}
    }

}


function check_phone($phone) {
    if (!preg_match('/^[0][9][0-9]{8}$/', $phone)){ 
        return '請輸入正確的聯絡電話！';
    }
    else {
        return 'ok';
    }
}

function check_birth($birthy, $birthm, $birthd) {
    if (!checkdate($birthm, $birthd, $birthy) || date('Y') - $birthy < 15 || date('Y') - $birthy > 65){
        return '請輸入正確的出生日期！';
    }
    else {
        return 'ok';
    }
}

function check_identity($identity) {
    $identity = fulltohalf($identity);
    $len = strlen($identity);
    if (preg_match('/^[A-Z][1-2][0-9]+$/', $identity) && $len == 10){
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        for($i = 0; $i < $len; $i++){
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for($j = 0; $j < $len; $j++){
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point){
            return '請輸入正確的身分證字號！';
        }
        else {
            return 'ok';
        }
    }
    else if (preg_match('/^[A-Z][AC][0-9]+$/', $identity) && $len == 10){
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
        for($i = 0; $i < $len; $i++){
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for($j = 0; $j < $len; $j++){
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point){
            return '請輸入正確的居留證字號！';
        }
        else {
            return 'ok';
        }
    }
    else {
        return '請輸入正確的身分證字號！';
    }
}

function check_identity_W($identity) {
    $identity = fulltohalf($identity);
    $len = strlen($identity);
    if (preg_match('/^[A-Z][2][0-9]+$/', $identity) && $len == 10){
        $headPoint = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
                           'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
                           'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
                           'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
                           'Y'=>12,'Z'=>30);
        $multiply = array(8,7,6,5,4,3,2,1);
        for($i = 0; $i < $len; $i++){
            $stringArray[$i] = substr($identity, $i, 1);
        }
        $total = $headPoint[array_shift($stringArray)];
        $point = array_pop($stringArray);
        $len = count($stringArray);
        for($j = 0; $j < $len; $j++){
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point){
            return '請輸入正確的身分證字號！';
        }
        else {
            return 'ok';
        }
    }
    else if (preg_match('/^[A-Z][BD][0-9]+$/', $identity) && $len == 10){
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
        for($j = 0; $j < $len; $j++){
            $total += $stringArray[$j] * $multiply[$j];
        }
        if ((($total % 10 == 0 ) ? 0 : 10 - $total % 10) != $point){
            return '請輸入正確的居留證字號！';
        }
        else {
            return 'ok';
        }
    }
    else {
        return '請輸入正確的身分證字號！';
    }
}

function check_name($name) {
    if (empty($name)){
        return '請輸入您的姓名！';
    }
    else {
        return 'ok';
    }
}

function check_major($major) {
    if (empty($major)){
        return '請輸入您的系別！';
    }
    else {
        return 'ok';
    }
}

function check_grade($grade) {
    if (empty($grade)){
        return '請輸入您的年級！';
    }
    else {
        return 'ok';
    }
}

function check_check() {
    if (isset($_POST['check']) && safe($_POST['check']) == 'Y'){
        return 'ok';
    }
    else {
        return '請確認您已詳讀並願意遵守報名須知！';
    }
}

function check_Gmajor($Gmajor) {
    if (empty($Gmajor)){
        return '請輸入您的隊伍系所！';
    }
    else {
        return 'ok';
    }
}

function check_Gname($Gname) {
    if (empty($Gname)){
        return '請輸入您的隊伍隊名！';
    }
    else {
        return 'ok';
    }
}

function sign_up_1($new) {
    $ID = strtoupper(safe($_POST['id']));
    $NAME = safe($_POST['name']);
    $MAJOR = safe($_POST['major']);
    $GRADE = safe($_POST['grade']);
    $PHONE = safe($_POST['phone']);
    $BIRTHY = safe($_POST['birthy']);
    $BIRTHM = safe($_POST['birthm']);
    $BIRTHD = safe($_POST['birthd']);
    if (check_id($ID) != 'ok') {send_back(check_id($ID)); return;}
    if (check_name($NAME) != 'ok') {send_back(check_name($NAME)); return;}
    if (check_major($MAJOR) != 'ok') {send_back(check_major($MAJOR)); return;}
    if (check_grade($GRADE) != 'ok') {send_back(check_grade($GRADE)); return;}
    if (check_phone($PHONE) != 'ok') {send_back(check_phone($PHONE)); return;}
    if (check_birth($BIRTHY, $BIRTHM, $BIRTHD) != 'ok') {send_back(check_birth($BIRTHY, $BIRTHM, $BIRTHD)); return;}
    if (check_check() != 'ok') {send_back(check_check()); return;}
    $BIRTH = $BIRTHY.'-'.$BIRTHM.'-'.$BIRTHD;
    date_default_timezone_set('Asia/Taipei');
    $SIGN_TIME = date("Y-m-d H:i:s");
    if ($new == 'MS'){
        $IDENTITY = strtoupper(safe($_POST['identity']));
        if (check_identity($IDENTITY) != 'ok') {send_back(check_identity($IDENTITY)); return;}
        $queryMS_NUM = "SELECT MS_NUM FROM setup";
        $queryresult_MS_NUM = mysql_query($queryMS_NUM);
        $fetchresult_MS_NUM = mysql_fetch_row($queryresult_MS_NUM);
        $NUM = $fetchresult_MS_NUM[0];
        $insert_MS = "INSERT INTO MS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT)
                        VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
        $update_MS_NUM = "UPDATE setup SET MS_NUM = $NUM+1";
        if (mysql_query($insert_MS) && mysql_query($update_MS_NUM)){
            echo json_encode(array('msg' => 'ok', 'num' => $NUM));
            return;
        }
        else{
            send_back('資料庫異常，請重試！');
        }
    }
    else if ($new == 'WS'){
        $IDENTITY = safe($_POST['identity_W']);
        if (check_identity_W($IDENTITY) != 'ok') {send_back(check_identity_W($IDENTITY)); return;}
        $queryWS_NUM = "SELECT WS_NUM FROM setup";
        $queryresult_WS_NUM = mysql_query($queryWS_NUM);
        $fetchresult_WS_NUM = mysql_fetch_row($queryresult_WS_NUM);
        $NUM = $fetchresult_WS_NUM[0];
        $insert_WS = "INSERT INTO WS (NUM, ID, NAME, MAJOR, GRADE, PHONE, BIRTH, IDENTITY, SIGN_TIME, PAYSTAT)
                        VALUES ('$NUM', '$ID', '$NAME', '$MAJOR', '$GRADE', '$PHONE', '$BIRTH', '$IDENTITY', '$SIGN_TIME', 0)";
        $update_WS_NUM = "UPDATE setup SET WS_NUM = $NUM+1";
        if (mysql_query($insert_WS) && mysql_query($update_WS_NUM)){
            echo json_encode(array('msg' => 'ok', 'num' => $NUM));
            return;
        }
        else{
            send_back('資料庫異常，請重試！');
        }
    }
}

function sign_up_2($new) {
    $ID1 = strtoupper(safe($_POST['id1']));
    $ID2 = strtoupper(safe($_POST['id2']));
    $NAME1 = safe($_POST['name1']);
    $NAME2 = safe($_POST['name2']);
    $MAJOR1 = safe($_POST['major1']);
    $MAJOR2 = safe($_POST['major2']);
    $GRADE1 = safe($_POST['grade1']);
    $GRADE2 = safe($_POST['grade2']);
    $PHONE1 = safe($_POST['phone1']);
    $PHONE2 = safe($_POST['phone2']);
    $BIRTHY1 = safe($_POST['birthy1']);
    $BIRTHY2 = safe($_POST['birthy2']);
    $BIRTHM1 = safe($_POST['birthm1']);
    $BIRTHM2 = safe($_POST['birthm2']);
    $BIRTHD1 = safe($_POST['birthd1']);
    $BIRTHD2 = safe($_POST['birthd2']);
    if (check_id($ID1) != 'ok') {send_back(check_id($ID1)); return;}
    if (check_id($ID2) != 'ok') {send_back(check_id($ID2)); return;}
    if (check_name($NAME1) != 'ok') {send_back(check_name($NAME1)); return;}
    if (check_name($NAME2) != 'ok') {send_back(check_name($NAME2)); return;}
    if (check_major($MAJOR1) != 'ok') {send_back(check_major($MAJOR1)); return;}
    if (check_major($MAJOR2) != 'ok') {send_back(check_major($MAJOR2)); return;}
    if (check_grade($GRADE1) != 'ok') {send_back(check_grade($GRADE1)); return;}
    if (check_grade($GRADE2) != 'ok') {send_back(check_grade($GRADE2)); return;}
    if (check_phone($PHONE1) != 'ok') {send_back(check_phone($PHONE1)); return;}
    if (check_phone($PHONE2) != 'ok') {send_back(check_phone($PHONE2)); return;}
    if (check_birth($BIRTHY1, $BIRTHM1, $BIRTHD1) != 'ok') {send_back(check_birth($BIRTHY1, $BIRTHM1, $BIRTHD1)); return;}
    if (check_birth($BIRTHY2, $BIRTHM2, $BIRTHD2) != 'ok') {send_back(check_birth($BIRTHY2, $BIRTHM2, $BIRTHD2)); return;}
    if (check_check() != 'ok') {send_back(check_check()); return;}
    $BIRTH1 = $BIRTHY1.'-'.$BIRTHM1.'-'.$BIRTHD1;
    $BIRTH2 = $BIRTHY2.'-'.$BIRTHM2.'-'.$BIRTHD2;
    date_default_timezone_set('Asia/Taipei');
    $SIGN_TIME = date("Y-m-d H:i:s");
    if ($new == 'MD'){
        $IDENTITY1 = strtoupper(safe($_POST['identity1']));
        $IDENTITY2 = strtoupper(safe($_POST['identity2']));
        if (check_identity($IDENTITY1) != 'ok') {send_back(check_identity($IDENTITY1)); return;}
        if (check_identity($IDENTITY2) != 'ok') {send_back(check_identity($IDENTITY2)); return;}
        $queryMD_NUM = "SELECT MD_NUM FROM setup";
        $queryresult_MD_NUM = mysql_query($queryMD_NUM);
        $fetchresult_MD_NUM = mysql_fetch_row($queryresult_MD_NUM);
        $NUM = $fetchresult_MD_NUM[0];
        $insert_MD = "INSERT INTO MD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, 
                        BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT)
                        VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2',
                        '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
        $update_MD_NUM = "UPDATE setup SET MD_NUM = $NUM+1";
        if (mysql_query($insert_MD) && mysql_query($update_MD_NUM)){
            echo json_encode(array('msg' => 'ok', 'num' => $NUM));
            return;
        }
        else{
            send_back('資料庫異常，請重試！');
        }
    }
    else if ($new == 'WD'){
        $IDENTITY1 = strtoupper(safe($_POST['identity_W1']));
        $IDENTITY2 = strtoupper(safe($_POST['identity_W2']));
        if (check_identity_W($IDENTITY1) != 'ok') {send_back(check_identity_W($IDENTITY1)); return;}
        if (check_identity_W($IDENTITY2) != 'ok') {send_back(check_identity_W($IDENTITY2)); return;}
        $queryWD_NUM = "SELECT WD_NUM FROM setup";
        $queryresult_WD_NUM = mysql_query($queryWD_NUM);
        $fetchresult_WD_NUM = mysql_fetch_row($queryresult_WD_NUM);
        $NUM = $fetchresult_WD_NUM[0];
        $insert_WD = "INSERT INTO WD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, 
                        BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT)
                        VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2',
                        '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
        $update_WD_NUM = "UPDATE setup SET WD_NUM = $NUM+1";
        if (mysql_query($insert_WD) && mysql_query($update_WD_NUM)){
            echo json_encode(array('msg' => 'ok', 'num' => $NUM));
            return;
        }
        else{
            send_back('資料庫異常，請重試！');
        }
    }
    else if ($new == 'XD'){
        $IDENTITY1 = strtoupper(safe($_POST['identity1']));
        $IDENTITY2 = strtoupper(safe($_POST['identity_W2']));
        if (check_identity($IDENTITY1) != 'ok') {send_back(check_identity($IDENTITY1)); return;}
        if (check_identity_W($IDENTITY2) != 'ok') {send_back(check_identity_W($IDENTITY2)); return;}
        $queryXD_NUM = "SELECT XD_NUM FROM setup";
        $queryresult_XD_NUM = mysql_query($queryXD_NUM);
        $fetchresult_XD_NUM = mysql_fetch_row($queryresult_XD_NUM);
        $NUM = $fetchresult_XD_NUM[0];
        $insert_XD = "INSERT INTO XD (NUM, ID_1, ID_2, NAME_1, NAME_2, MAJOR_1, MAJOR_2, GRADE_1, GRADE_2, PHONE_1, PHONE_2, 
                        BIRTH_1, BIRTH_2, IDENTITY_1, IDENTITY_2, SIGN_TIME, PAYSTAT)
                        VALUES ('$NUM', '$ID1', '$ID2', '$NAME1', '$NAME2', '$MAJOR1', '$MAJOR2', '$GRADE1', '$GRADE2',
                        '$PHONE1', '$PHONE2', '$BIRTH1', '$BIRTH2', '$IDENTITY1', '$IDENTITY2', '$SIGN_TIME', 0)";
        $update_XD_NUM = "UPDATE setup SET XD_NUM = $NUM+1";
        if (mysql_query($insert_XD) && mysql_query($update_XD_NUM)){
            echo json_encode(array('msg' => 'ok', 'num' => $NUM));
            return;
        }
        else{
            send_back('資料庫異常，請重試！');
        }
    }
}

function sign_up_3() {
    $Gmajor = safe($_POST['Gmajor']); $Gname = safe($_POST['Gname']);
    $ID1 = strtoupper(safe($_POST['id1']));    $ID2 = strtoupper(safe($_POST['id2']));
    $ID3 = strtoupper(safe($_POST['id3']));    $ID4 = strtoupper(safe($_POST['id4']));
    $ID5 = strtoupper(safe($_POST['id5']));    $ID6 = strtoupper(safe($_POST['id6']));
    $ID7 = strtoupper(safe($_POST['id7']));    $ID8 = strtoupper(safe($_POST['id8']));
    $ID9 = strtoupper(safe($_POST['id9']));    $ID10 = strtoupper(safe($_POST['id10']));
    $ID11 = strtoupper(safe($_POST['id11']));  $ID12 = strtoupper(safe($_POST['id12']));
    $NAME1 = safe($_POST['name1']);   $NAME2 = safe($_POST['name2']);
    $NAME3 = safe($_POST['name3']);   $NAME4 = safe($_POST['name4']);
    $NAME5 = safe($_POST['name5']);   $NAME6 = safe($_POST['name6']);
    $NAME7 = safe($_POST['name7']);   $NAME8 = safe($_POST['name8']);
    $NAME9 = safe($_POST['name9']);   $NAME10 = safe($_POST['name10']);
    $NAME11 = safe($_POST['name11']); $NAME12 = safe($_POST['name12']);
    $MAJOR1 = safe($_POST['major1']);     $MAJOR2 = safe($_POST['major2']);
    $MAJOR3 = safe($_POST['major3']);     $MAJOR4 = safe($_POST['major4']);
    $MAJOR5 = safe($_POST['major5']);     $MAJOR6 = safe($_POST['major6']);
    $MAJOR7 = safe($_POST['major7']);     $MAJOR8 = safe($_POST['major8']);
    $MAJOR9 = safe($_POST['major9']);     $MAJOR10 = safe($_POST['major10']);
    $MAJOR11 = safe($_POST['major11']);   $MAJOR12 = safe($_POST['major12']);
    $GRADE1 = safe($_POST['grade1']);     $GRADE2 = safe($_POST['grade2']);
    $GRADE3 = safe($_POST['grade3']);     $GRADE4 = safe($_POST['grade4']);
    $GRADE5 = safe($_POST['grade5']);     $GRADE6 = safe($_POST['grade6']);
    $GRADE7 = safe($_POST['grade7']);     $GRADE8 = safe($_POST['grade8']);
    $GRADE9 = safe($_POST['grade9']);     $GRADE10 = safe($_POST['grade10']);
    $GRADE11 = safe($_POST['grade11']);   $GRADE12 = safe($_POST['grade12']);
    $SEX1 = safe($_POST['sex1']);     $SEX2 = safe($_POST['sex2']);
    $SEX3 = safe($_POST['sex3']);     $SEX4 = safe($_POST['sex4']);
    $SEX5 = safe($_POST['sex5']);     $SEX6 = safe($_POST['sex6']);
    $SEX7 = safe($_POST['sex7']);     $SEX8 = safe($_POST['sex8']);
    $SEX9 = safe($_POST['sex9']);     $SEX10 = $_POST['sex10'];
    $SEX11 = $_POST['sex11'];   $SEX12 = $_POST['sex12'];
    $BIRTH1 = safe($_POST['birth1']);     $BIRTH2 = safe($_POST['birth2']);
    $BIRTH3 = safe($_POST['birth3']);     $BIRTH4 = safe($_POST['birth4']);
    $BIRTH5 = safe($_POST['birth5']);     $BIRTH6 = safe($_POST['birth6']);
    $BIRTH7 = safe($_POST['birth7']);     $BIRTH8 = safe($_POST['birth8']);
    $BIRTH9 = safe($_POST['birth9']);     $BIRTH10 = safe($_POST['birth10']);
    $BIRTH11 = safe($_POST['birth11']);   $BIRTH12 = safe($_POST['birth12']);
    $PHONE1 = safe($_POST['phone1']);     $PHONE2 = safe($_POST['phone2']);
    $PHONE3 = safe($_POST['phone3']);     $PHONE4 = safe($_POST['phone4']);
    $PHONE5 = safe($_POST['phone5']);     $PHONE6 = safe($_POST['phone6']);
    $PHONE7 = safe($_POST['phone7']);     $PHONE8 = safe($_POST['phone8']);
    $PHONE9 = safe($_POST['phone9']);     $PHONE10 = safe($_POST['phone10']);
    $PHONE11 = safe($_POST['phone11']);   $PHONE12 = safe($_POST['phone12']);
    $IDENTITY1 = strtoupper(safe($_POST['identity1']));
    $IDENTITY2 = strtoupper(safe($_POST['identity2']));
    $IDENTITY3 = strtoupper(safe($_POST['identity3']));
    $IDENTITY4 = strtoupper(safe($_POST['identity4']));
    $IDENTITY5 = strtoupper(safe($_POST['identity5']));
    $IDENTITY6 = strtoupper(safe($_POST['identity6']));
    $IDENTITY7 = strtoupper(safe($_POST['identity7']));
    $IDENTITY8 = strtoupper(safe($_POST['identity8']));
    $IDENTITY9 = strtoupper(safe($_POST['identity9']));
    $IDENTITY10 = strtoupper(safe($_POST['identity10']));
    $IDENTITY11 = strtoupper(safe($_POST['identity11']));
    $IDENTITY12 = strtoupper(safe($_POST['identity12']));
    if (check_Gmajor($Gmajor) != 'ok') {send_back(check_Gmajor($Gmajor)); return;}
    if (check_Gname($Gname) != 'ok') {send_back(check_Gname($Gname)); return;}
    if (check_id_G($ID1) != 'ok') {send_back(check_id_G($ID1)); return;}
    if (check_id_G($ID2) != 'ok') {send_back(check_id_G($ID2)); return;}
    if (check_id_G($ID3) != 'ok') {send_back(check_id_G($ID3)); return;}
    if (check_id_G($ID4) != 'ok') {send_back(check_id_G($ID4)); return;}
    if (check_id_G($ID5) != 'ok') {send_back(check_id_G($ID5)); return;}
    if (check_id_G($ID6) != 'ok') {send_back(check_id_G($ID6)); return;}
    if (check_id_G($ID7) != 'ok') {send_back(check_id_G($ID7)); return;}
    if (check_id_G($ID8) != 'ok') {send_back(check_id_G($ID8)); return;}
    if (check_name($NAME1) != 'ok') {send_back(check_name($NAME1)); return;}
    if (check_name($NAME2) != 'ok') {send_back(check_name($NAME2)); return;}
    if (check_name($NAME3) != 'ok') {send_back(check_name($NAME3)); return;}
    if (check_name($NAME4) != 'ok') {send_back(check_name($NAME4)); return;}
    if (check_name($NAME5) != 'ok') {send_back(check_name($NAME5)); return;}
    if (check_name($NAME6) != 'ok') {send_back(check_name($NAME6)); return;}
    if (check_name($NAME7) != 'ok') {send_back(check_name($NAME7)); return;}
    if (check_name($NAME8) != 'ok') {send_back(check_name($NAME8)); return;}
    if (check_major($MAJOR1) != 'ok') {send_back(check_major($MAJOR1)); return;}
    if (check_major($MAJOR2) != 'ok') {send_back(check_major($MAJOR2)); return;}
    if (check_major($MAJOR3) != 'ok') {send_back(check_major($MAJOR3)); return;}
    if (check_major($MAJOR4) != 'ok') {send_back(check_major($MAJOR4)); return;}
    if (check_major($MAJOR5) != 'ok') {send_back(check_major($MAJOR5)); return;}
    if (check_major($MAJOR6) != 'ok') {send_back(check_major($MAJOR6)); return;}
    if (check_major($MAJOR7) != 'ok') {send_back(check_major($MAJOR7)); return;}
    if (check_major($MAJOR8) != 'ok') {send_back(check_major($MAJOR8)); return;}
    if (check_grade($GRADE1) != 'ok') {send_back(check_grade($GRADE1)); return;}
    if (check_grade($GRADE2) != 'ok') {send_back(check_grade($GRADE2)); return;}
    if (check_grade($GRADE3) != 'ok') {send_back(check_grade($GRADE3)); return;}
    if (check_grade($GRADE4) != 'ok') {send_back(check_grade($GRADE4)); return;}
    if (check_grade($GRADE5) != 'ok') {send_back(check_grade($GRADE5)); return;}
    if (check_grade($GRADE6) != 'ok') {send_back(check_grade($GRADE6)); return;}
    if (check_grade($GRADE7) != 'ok') {send_back(check_grade($GRADE7)); return;}
    if (check_grade($GRADE8) != 'ok') {send_back(check_grade($GRADE8)); return;}
    $Mcount = 0;
    $Wcount = 0;
    if ($SEX1 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY1) != 'ok') {send_back(check_identity($IDENTITY1)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY1) != 'ok') {send_back(check_identity_W($IDENTITY1)); return;}
    }
    if ($SEX2 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY2) != 'ok') {send_back(check_identity($IDENTITY2)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY2) != 'ok') {send_back(check_identity_W($IDENTITY2)); return;}
    }
    if ($SEX3 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY3) != 'ok') {send_back(check_identity($IDENTITY3)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY3) != 'ok') {send_back(check_identity_W($IDENTITY3)); return;}
    }
    if ($SEX4 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY4) != 'ok') {send_back(check_identity($IDENTITY4)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY4) != 'ok') {send_back(check_identity_W($IDENTITY4)); return;}
    }
    if ($SEX5 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY5) != 'ok') {send_back(check_identity($IDENTITY5)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY5) != 'ok') {send_back(check_identity_W($IDENTITY5)); return;}
    }
    if ($SEX6 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY6) != 'ok') {send_back(check_identity($IDENTITY6)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY6) != 'ok') {send_back(check_identity_W($IDENTITY6)); return;}
    }
    if ($SEX7 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY7) != 'ok') {send_back(check_identity($IDENTITY7)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY7) != 'ok') {send_back(check_identity_W($IDENTITY7)); return;}
    }
    if ($SEX8 == 'M'){
        $Mcount += 1;
        if (check_identity($IDENTITY8) != 'ok') {send_back(check_identity($IDENTITY8)); return;}
    }
    else {
        $Wcount += 1;
        if (check_identity_W($IDENTITY8) != 'ok') {send_back(check_identity_W($IDENTITY8)); return;}
    }
    

    $birth = explode('-', $BIRTH1);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH2);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH3);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH4);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH5);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH6);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH7);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    $birth = explode('-', $BIRTH8);
    if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
        {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}


    if (!empty($ID9)){
        if (check_id_G($ID9) != 'ok') {send_back(check_id_G($ID9)); return;}
        if (check_name($NAME9) != 'ok') {send_back(check_name($NAME9)); return;}
        if (check_major($MAJOR9) != 'ok') {send_back(check_major($MAJOR9)); return;}
        if (check_grade($GRADE9) != 'ok') {send_back(check_grade($GRADE9)); return;}
        if ($SEX9 == 'M'){
            $Mcount += 1;
            if (check_identity($IDENTITY9) != 'ok') {send_back(check_identity($IDENTITY9)); return;}
        }
        else {
            $Wcount += 1;
            if (check_identity_W($IDENTITY9) != 'ok') {send_back(check_identity_W($IDENTITY9)); return;}
        }
        $birth = explode('-', $BIRTH9);
        if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
            {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    }
    if (!empty($ID10)){
        if (check_id_G($ID10) != 'ok') {send_back(check_id_G($ID10)); return;}
        if (check_name($NAME10) != 'ok') {send_back(check_name($NAME10)); return;}
        if (check_major($MAJOR10) != 'ok') {send_back(check_major($MAJOR10)); return;}
        if (check_grade($GRADE10) != 'ok') {send_back(check_grade($GRADE10)); return;}
        if ($SEX10 == 'M'){
            $Mcount += 1;
            if (check_identity($IDENTITY10) != 'ok') {send_back(check_identity($IDENTITY10)); return;}
        }
        else {
            $Wcount += 1;
            if (check_identity_W($IDENTITY10) != 'ok') {send_back(check_identity_W($IDENTITY10)); return;}
        }
        $birth = explode('-', $BIRTH10);
        if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
            {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    }
    if (!empty($ID11)){
        if (check_id_G($ID11) != 'ok') {send_back(check_id_G($ID11)); return;}
        if (check_name($NAME11) != 'ok') {send_back(check_name($NAME11)); return;}
        if (check_major($MAJOR11) != 'ok') {send_back(check_major($MAJOR11)); return;}
        if (check_grade($GRADE11) != 'ok') {send_back(check_grade($GRADE11)); return;}
        if ($SEX11 == 'M'){
            $Mcount += 1;
            if (check_identity($IDENTITY11) != 'ok') {send_back(check_identity($IDENTITY11)); return;}
        }
        else {
            $Wcount += 1;
            if (check_identity_W($IDENTITY11) != 'ok') {send_back(check_identity_W($IDENTITY11)); return;}
        }
        $birth = explode('-', $BIRTH11);
        if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
            {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    }
    if (!empty($ID12)){
        if (check_id_G($ID12) != 'ok') {send_back(check_id_G($ID12)); return;}
        if (check_name($NAME12) != 'ok') {send_back(check_name($NAME12)); return;}
        if (check_major($MAJOR12) != 'ok') {send_back(check_major($MAJOR12)); return;}
        if (check_grade($GRADE12) != 'ok') {send_back(check_grade($GRADE12)); return;}
        if ($SEX12 == 'M'){
            $Mcount += 1;
            if (check_identity($IDENTITY12) != 'ok') {send_back(check_identity($IDENTITY12)); return;}
        }
        else {
            $Wcount += 1;
            if (check_identity_W($IDENTITY12) != 'ok') {send_back(check_identity_W($IDENTITY12)); return;}
        }
        $birth = explode('-', $BIRTH12);
        if (check_birth($birth[0], $birth[1], $birth[2]) != 'ok')
            {send_back(check_birth($birth[1], $birth[2], $birth[3])); return;}
    }
    if ($Mcount < 4){
        send_back("每隊至少需要有四位男生");
        return;
    }
    if ($Wcount < 4){
        send_back("每隊至少需要有四位女生");
        return;
    }
    if (check_phone($PHONE1) != 'ok') {send_back(check_phone($PHONE1)); return;}
    if (!empty($PHONE2)) {if (check_phone($PHONE2) != 'ok') {send_back(check_phone($PHONE2)); return;}}
    if (!empty($PHONE3)) {if (check_phone($PHONE3) != 'ok') {send_back(check_phone($PHONE3)); return;}}
    if (!empty($PHONE4)) {if (check_phone($PHONE4) != 'ok') {send_back(check_phone($PHONE4)); return;}}
    if (!empty($PHONE5)) {if (check_phone($PHONE5) != 'ok') {send_back(check_phone($PHONE5)); return;}}
    if (!empty($PHONE6)) {if (check_phone($PHONE6) != 'ok') {send_back(check_phone($PHONE6)); return;}}
    if (!empty($PHONE7)) {if (check_phone($PHONE7) != 'ok') {send_back(check_phone($PHONE7)); return;}}
    if (!empty($PHONE8)) {if (check_phone($PHONE8) != 'ok') {send_back(check_phone($PHONE8)); return;}}
    if (!empty($PHONE9)) {if (check_phone($PHONE9) != 'ok') {send_back(check_phone($PHONE9)); return;}}
    if (!empty($PHONE10)) {if (check_phone($PHONE10) != 'ok') {send_back(check_phone($PHONE10)); return;}}
    if (!empty($PHONE11)) {if (check_phone($PHONE11) != 'ok') {send_back(check_phone($PHONE11)); return;}}
    if (!empty($PHONE12)) {if (check_phone($PHONE12) != 'ok') {send_back(check_phone($PHONE12)); return;}}
    if (check_check() != 'ok') {send_back(check_check()); return;}

    date_default_timezone_set('Asia/Taipei');
    $SIGN_TIME = date("Y-m-d H:i:s");
    
    $queryG_NUM = "SELECT G_NUM FROM setup";
    $queryresult_G_NUM = mysql_query($queryG_NUM);
    $fetchresult_G_NUM = mysql_fetch_row($queryresult_G_NUM);
    $NUM = $fetchresult_G_NUM[0];
    $insert_G = "INSERT INTO G (NUM, Gmajor, Gname, ID_1, ID_2, ID_3, ID_4, ID_5, ID_6, ID_7, ID_8, ID_9, ID_10, ID_11, ID_12, NAME_1, NAME_2, NAME_3, NAME_4, NAME_5, NAME_6, NAME_7, NAME_8, NAME_9, NAME_10, NAME_11, NAME_12, MAJOR_1, MAJOR_2, MAJOR_3, MAJOR_4, MAJOR_5, MAJOR_6, MAJOR_7, MAJOR_8, MAJOR_9, MAJOR_10, MAJOR_11, MAJOR_12, GRADE_1, GRADE_2, GRADE_3, GRADE_4, GRADE_5, GRADE_6, GRADE_7, GRADE_8, GRADE_9, GRADE_10, GRADE_11, GRADE_12, PHONE_1, PHONE_2, PHONE_3, PHONE_4, PHONE_5, PHONE_6, PHONE_7, PHONE_8, PHONE_9, PHONE_10, PHONE_11, PHONE_12, BIRTH_1, BIRTH_2, BIRTH_3, BIRTH_4, BIRTH_5, BIRTH_6, BIRTH_7, BIRTH_8, BIRTH_9, BIRTH_10, BIRTH_11, BIRTH_12, IDENTITY_1, IDENTITY_2, IDENTITY_3, IDENTITY_4, IDENTITY_5, IDENTITY_6, IDENTITY_7, IDENTITY_8, IDENTITY_9, IDENTITY_10, IDENTITY_11, IDENTITY_12, SIGN_TIME, PAYSTAT) VALUES ('$NUM', '$Gmajor', '$Gname', '$ID1', '$ID2', '$ID3', '$ID4', '$ID5', '$ID6', '$ID7', '$ID8', '$ID9', '$ID10', '$ID11', '$ID12', '$NAME1', '$NAME2', '$NAME3', '$NAME4', '$NAME5', '$NAME6', '$NAME7', '$NAME8', '$NAME9', '$NAME10', '$NAME11', '$NAME12', '$MAJOR1', '$MAJOR2', '$MAJOR3', '$MAJOR4', '$MAJOR5', '$MAJOR6', '$MAJOR7', '$MAJOR8', '$MAJOR9', '$MAJOR10', '$MAJOR11', '$MAJOR12', '$GRADE1', '$GRADE2', '$GRADE3', '$GRADE4', '$GRADE5', '$GRADE6', '$GRADE7', '$GRADE8', '$GRADE9', '$GRADE10', '$GRADE11', '$GRADE12', '$PHONE1', '$PHONE2', '$PHONE3', '$PHONE4', '$PHONE5', '$PHONE6', '$PHONE7', '$PHONE8', '$PHONE9', '$PHONE10', '$PHONE11', '$PHONE12', '$BIRTH1', '$BIRTH2', '$BIRTH3', '$BIRTH4', '$BIRTH5', '$BIRTH6', '$BIRTH7', '$BIRTH8', '$BIRTH9', '$BIRTH10', '$BIRTH11', '$BIRTH12', '$IDENTITY1', '$IDENTITY2', '$IDENTITY3', '$IDENTITY4', '$IDENTITY5', '$IDENTITY6', '$IDENTITY7', '$IDENTITY8', '$IDENTITY9', '$IDENTITY10', '$IDENTITY11', '$IDENTITY12', '$SIGN_TIME', 0)";
    $update_G_NUM = "UPDATE setup SET G_NUM = $NUM+1";
    if (mysql_query($insert_G) && mysql_query($update_G_NUM)){
        echo json_encode(array('msg' => 'ok', 'num' => $NUM));
        return;
    }
    else{
        send_back('資料庫異常，請重試！');
    }
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