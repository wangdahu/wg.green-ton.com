<?php
set_time_limit(0);
echo "页面开始时间:".time()."<br/>";
/*配置项*/
$mysql_server_name = '121.8.98.133';
$mysql_server_port = '3306';
$mysql_username = 'root'; //用户名
$mysql_password = 'wiseuc501200'; //密码
$mysql_database = 'ids5'; //数据库名
$mysql_database_wiseucdb = 'wiseucdb'; //数据库名
$mysqli = new mysqli($mysql_server_name.":".$mysql_server_port,$mysql_username,$mysql_password,$mysql_database); //连接服务器
$mysqli_wiseucdb = new mysqli($mysql_server_name.":".$mysql_server_port,$mysql_username,$mysql_password,$mysql_database_wiseucdb); //连接服务器
if($mysqli->connect_error){
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->query("SET NAMES utf8");
$mysqli_wiseucdb->query("SET NAMES utf8");

// echo "GroupType Start:".time()."<br/>";

// // 分类名字与学校名字一致
// $attrSql = "select `Name`, ID from t_enterprise_dept where `Level` = 3";

// $countSql = "select count(*) from t_enterprise_dept where `Level` = 3";
// $countResult = $mysqli->query($countSql);
// $count = $countResult->fetch_array()[0];

// $result = $mysqli->query($attrSql);

// $insertGroupSql = "INSERT INTO `t_group_type` (`GroupTypeName`, `OptId`, `OptTimes`, `AccountId`, `deptId`) VALUES ";
$date = date('Y-m-d H:i:s');
// $groupList = array();
// $i = 0;
// $j = 0;
// $insertGroupValueSql = $allInsertSsql= '';
// while($schoolRow = $result->fetch_array(MYSQLI_ASSOC)) {
//     if($i > 100) {
//         $insertGroupValueSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allInsertSsql);
//     }
//     $i++;
//     $j++;
//     $insertGroupValueSql .= "('".$schoolRow['Name']."', 1, '".$date."', 131785, '".$schoolRow['ID']."'),";
//     $allInsertSsql = substr($insertGroupSql.$insertGroupValueSql,0, -1);
//     if($j == $count ) {
//         $allresult = $mysqli->query($allInsertSsql);
//     }
// }

// echo "GroupType End:".time()."<br/>";
// // 分类数据插入结束

// // 分类标签数据关系表插入
// // 标签名字与班级名字一致


// echo "GroupAttr Start:".time()."<br/>";
// $groupSql = "select * from t_group_type where OptId = 1";
// $groupResult = $mysqli->query($groupSql);

// while($groupRow = $groupResult->fetch_array(MYSQLI_ASSOC)) {
//     $groupList[$groupRow['deptId']] = $groupRow;
// }

// $tagCountDepSql = "select count(*) from t_enterprise_dept where `Level` = 5";
// $tagCountResult = $mysqli->query($tagCountDepSql);
// $tagCount = $tagCountResult->fetch_array()[0];


// $depSql5 = "select `Name`,Mapping, ID from t_enterprise_dept where `Level` = 5";
// $insertTagSql = "INSERT INTO `t_group_attrs` (`AttrName`, `ParentId`, `OptId`, `OptTime`, `GroupTypeId`, `Color`, `AccountId`, `deptId`) VALUES ";
// // 分类名字与学校名字一致

// $result = $mysqli->query($depSql5);

// $i = 0;
// $j = 0;
// $tagList = array();
// $insertTagValSql = $allInsertSsql = '';
// while($row = $result->fetch_array(MYSQLI_ASSOC)) {
//     $attrID = explode(',', $row['Mapping'])[2];
//     if($i > 100) {
//         $insertTagValSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allInsertSsql);
//     }
//     $i++;
//     $j++;
//     $insertTagValSql .= "('".$row['Name']."', '".$groupList[$attrID]['GroupTypeId']."', 1, '".$date."','".$groupList[$attrID]['GroupTypeId']."', '#fff467',131785,'".$row['ID']."'),";
//     $allInsertSsql = substr($insertTagSql.$insertTagValSql,0, -1);
//     if($j == $tagCount ) {
//         $allresult = $mysqli->query($allInsertSsql);
//     }

// }

// echo "GroupAttr End:".time()."<br/>";

// // 人员标签对应表,插入班级下面的人员到对应的标签下

// echo "GroupUserRelation Start:".time()."<br/>";

// $newUserCountSql = "select count(*) from (select PID, length(`DepartmentMapping`) - length( replace(`DepartmentMapping`, ',' , '')) as length from t_user) as b where b.length = 5";
// $newUserResult = $mysqli->query($newUserCountSql);
// $newUserCount = $newUserResult->fetch_array()[0];


// // 需要和标签建立对应关系的用户查询--班级下面人员
// $userSql = "select * from (select PID, DepartmentID,length(`DepartmentMapping`) - length( replace(`DepartmentMapping`, ',' , '')) as length from t_user) as b
// join t_group_attrs as a on a.deptId = b.DepartmentID where b.length = 5";

// $userResult = $mysqli->query($userSql);

// $insertUserSql = "INSERT INTO `t_group_user_relations` (`AttrId`, `Pid`, `Show`, `Source`, `OptId`, `OptTime`, `AccountId`) VALUES ";
// $insertUserValSql = $allInsertSql = '';
// $i = $j = 0;
// while($userRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
//     if($i > 1000) {
//         $insertUserValSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allInsertSql);
//     }
//     $i++;
//     $j++;
//     $insertUserValSql .= "('".$userRow['AttrId']."', '".$userRow['PID']."', '1', '1', '1', '".$date."', '131785'),";
//     $allInsertSql = substr($insertUserSql.$insertUserValSql,0, -1);
//     if($j == $newUserCount ) {
//         $allresult = $mysqli->query($allInsertSql);
//     }
// }

// echo "GroupUserRelation End:".time()."<br/>";


// echo "Group Start:".time()."<br/>";
// $tGroupAttrSql = "select * from t_group_attrs";
// $insertTGroupSql = "INSERT INTO `t_group_relation_depts` (`RelationAttrId`, `DeptId`, `AccountId`) VALUES ";
// $userResult = $mysqli->query($tGroupAttrSql);

// $tagCountDepSql = "select count(*) from t_group_attrs";
// $CountResult = $mysqli->query($tagCountDepSql);
// $Count = $CountResult->fetch_array()[0];
// $insertTGroupValSql = $allinsertTGroupSql = '';
// $i = $j = 0;
// while($attrRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
//     if($i > 1000) {
//         $insertTGroupValSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
//     $i++;
//     $j++;
//     $insertTGroupValSql .= "('".$attrRow['AttrId']."', '".$attrRow['deptId']."', '131785'),";
//     $allinsertTGroupSql = substr($insertTGroupSql.$insertTGroupValSql,0, -1);

//     if($j == $Count ) {
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
// }

// $tGroupAttrSql = "select * from t_group_attrs";
// $insertTGroupSql = "INSERT INTO `t_group_relation_attrs` (`RelationAttrId`, `AttrId`, `AccountId`) VALUES ";
// $userResult = $mysqli->query($tGroupAttrSql);

// $tagCountDepSql = "select count(*) from t_group_attrs";
// $CountResult = $mysqli->query($tagCountDepSql);
// $Count = $CountResult->fetch_array()[0];
// $insertTGroupValSql = $allinsertTGroupSql = '';
// $i = $j = 0;
// while($attrRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
//     if($i > 1000) {
//         $insertTGroupValSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
//     $i++;
//     $j++;
//     $insertTGroupValSql .= "('".$attrRow['AttrId']."', '".$attrRow['AttrId']."', '131785'),";
//     $allinsertTGroupSql = substr($insertTGroupSql.$insertTGroupValSql,0, -1);

//     if($j == $Count ) {
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
// }


// $tGroupAttrSql = "select * from t_group_attrs";
// $insertTGroupSql = "INSERT INTO `t_group` (`RelationAttrId`, `GroupName`, `Subject`, `Show`, `Source`, `OptId`, `OptTime`, `AccountId`) VALUES ";
// $userResult = $mysqli->query($tGroupAttrSql);

// $tagCountDepSql = "select count(*) from t_group_attrs";
// $CountResult = $mysqli->query($tagCountDepSql);
// $Count = $CountResult->fetch_array()[0];
// $insertTGroupValSql = $allinsertTGroupSql = '';
// $i = $j = 0;
// while($attrRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
//     if($i > 1000) {
//         $insertTGroupValSql = "";
//         $i = 0;
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
//     $i++;
//     $j++;
//     $insertTGroupValSql .= "('".$attrRow['AttrId']."', '".$attrRow['AttrName']."', '".$attrRow['AttrName']."', '1', '1', '1', '".$date."', '131785'),";
//     $allinsertTGroupSql = substr($insertTGroupSql.$insertTGroupValSql,0, -1);

//     if($j == $Count ) {
//         $allresult = $mysqli->query($allinsertTGroupSql);
//     }
// }


// $tGroupAttrSql = "select * from t_group_attrs";
// $insertTGroupSql = "insert into t_conference_info(`roomid`,`roomname`,`owner`,`description`,`subject`,`private`,`leave`,`join`,`rename`,`public`,`subjectlock`,`maxusers`,`persistant`,`moderated`,`defaulttype`,`privmsg`,`invitation`,`invites`,`legacy`,`visible`,`logformat`,`locknicks`,`version`,`logging`,`add_time`,`last_time`,`room_type`,`source`,`GroupAttrId`) values ";
// $userResult = $mysqli->query($tGroupAttrSql);

// $tagCountDepSql = "select count(*) from t_group_attrs";
// $CountResult = $mysqli->query($tagCountDepSql);
// $Count = $CountResult->fetch_array()[0];
// $insertTGroupValSql = $allinsertTGroupSql = '';
// $i = $j = $k = 0;
// while($attrRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
//     $k++;
//     if($k > 34847) {
//         $roomid = create_guid().'@conference.115871';
//         $admin_id = ''; // 群主
//         $adminsql = "select `JID` from `t_user` where `DepartmentID` = '".$attrRow['deptId']."' limit 1";
//         $adminResult = $mysqli->query($adminsql);
//         $admin_id = $adminResult->fetch_array()[0];

//         $group_id = $attrRow['AttrId'];
//         $roomid = $roomid;
//         $title = $attrRow['AttrName'];
//         $notic = $attrRow['AttrName'];
//         $subject = $attrRow['AttrName'];
//         $private = 1;
//         $leave = '离开了这个群';
//         $join = '加入了这个群';
//         $rename = 1;
//         $public = 1;
//         $subjectlock = 0;
//         $maxusers = 500;
//         $persistant = 2;
//         $moderated = 1;
//         $defaulttype = 0;
//         $privmsg = 0;
//         $invitation = 0;
//         $invites = 0;
//         $legacy = 0;
//         $visible = 0;
//         $logformat = 0;
//         $locknicks = 0;
//         $version = 1;
//         $logging = 0;
//         $add_time = time();
//         $last_time = time();
//         $roomtype = 6;
//         $source = 0;

//         // if($i > 100) {
//         //     $insertTGroupValSql = "";
//         //     $i = 0;
//         //     // var_dump($allinsertTGroupSql);exit;
//         //     $allresult = $mysqli_wiseucdb->query($allinsertTGroupSql);
//         // }
//         // $i++;
//         // $j++;
//         $insertTGroupValSql .= "('{$roomid}','{$title}','{$admin_id}','{$notic}','{$subject}','{$private}','{$leave}','{$join}','{$rename}','{$public}','{$subjectlock}','{$maxusers}','{$persistant}','{$moderated}','{$defaulttype}','{$privmsg}','{$invitation}','{$invites}','{$legacy}','{$visible}','{$logformat}','{$locknicks}','{$version}','{$logging}','{$add_time}','{$last_time}','{$roomtype}','{$source}','{$group_id}'),";
//         $allinsertTGroupSql = substr($insertTGroupSql.$insertTGroupValSql,0, -1);
//         if($k == $Count ) {
//             echo $allinsertTGroupSql;exit;
//             $allresult = $mysqli_wiseucdb->query($allinsertTGroupSql);
//         }
//     }
// }



$tGroupAttrSql = "select * from t_conference_info where `owner` != ''";
$insertTGroupSql = "insert into t_conference_roles(`roomid`,`userid`,`role`) values ";
$userResult = $mysqli_wiseucdb->query($tGroupAttrSql);

$tagCountDepSql = "select count(*) from t_conference_info where `owner` != ''";
$CountResult = $mysqli_wiseucdb->query($tagCountDepSql);
$Count = $CountResult->fetch_array()[0];
$insertTGroupValSql = $allinsertTGroupSql = '';
$i = $j = $k = 0;
while($attrRow = $userResult->fetch_array(MYSQLI_ASSOC)) {
    $k++;
    if($k > 4) {
        $attrId = $attrRow['GroupAttrId'];
        $roomid = $attrRow['roomid'];
        $owner = $attrRow['owner'];
        $Userssql = "select * from t_group_user_relations where AttrId = ".$attrId;
        $UsersResult = $mysqli->query($Userssql);
        $insertTGroupValSql = '';
        while ($userRow = $UsersResult->fetch_array(MYSQLI_ASSOC)) {
            $JIDsql = "select `JID` from `t_user` where `PID` = '".$userRow['Pid']."' and JID !='".$owner."' limit 1";
            $JIDResult = $mysqli->query($JIDsql);
            $JID = $JIDResult->fetch_array()[0];
            if($JID) {
                $insertTGroupValSql .= "('{$roomid}','{$JID}',1),";
            }
        }
        if($insertTGroupValSql) {
            $allinsertTGroupSql = substr($insertTGroupSql.$insertTGroupValSql,0, -1);
            $allresult = $mysqli_wiseucdb->query($allinsertTGroupSql);
        }
    }
}



// /**Guid生成**/
// function create_guid() { 

//     $charid = strtoupper(md5(uniqid(mt_rand(), true))); 

//     $uuid = substr($charid, 0, 8)

//     .substr($charid, 8, 4)

//     .substr($charid,12, 4)

//     .substr($charid,16, 4)

//     .substr($charid,20,12);

//     return $uuid; 

// }
echo "Group End:".time()."<br/>";




echo "页面结束时间:".time();