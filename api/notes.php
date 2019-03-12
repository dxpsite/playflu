<?php
require_once("include/bittorrent.php");
dbconn(false);
loggedinorreturn();


function bark($msg) {
	global $tracker_lang;
	stdhead($tracker_lang['error']);
	stdmsg($tracker_lang['error'], $msg, 'error');
	stdfoot();
	exit;
}
function success($msg) {
	global $tracker_lang;
	stdhead($tracker_lang['success']);
	stdmsg($tracker_lang['success'], $msg);
	stdfoot();
	exit;
}

function menu(){
print("<p align=center><a href=/dobavit-zametku><b>Добавить запись в заметки</b></a> | <a href=/moi-zametki><b>Мои заметки</b></a> | <a href=/vse-zametki><b>Все заметки</b></a></p>");

}

$action = (string)$_GET['action'];

if (!$action) {
        $action = (string)$_POST['action'];
if (!$action) {
	$action = 'all';
	}
}

if ($action == "all") {

stdhead('Все заметки');
//begin_frame("Все заметки");
menu();
if(get_user_class() <= UC_MODERATOR) {
$where = "WHERE n.privacy = 'all'";
$wheres = "WHERE privacy = 'all'";
}
$res4 = mysql_query("SELECT COUNT(*) FROM notes $wheres");
$row4 = mysql_fetch_array($res4);
$count = $row4[0];
$limit = 5; // Лимит
list($pagertop, $pagerbottom, $limit) = pager($limit, $count, "/notes.php?action=all&", array('nopage' => true));

$arr = mysql_query("SELECT n.*, users.class, users.username FROM notes AS n LEFT JOIN users ON n.owner = users.id $where ORDER BY n.id DESC $limit") or sqlerr(__FILE__, __LINE__);
if (mysql_num_rows($arr)) {
while ($notes = mysql_fetch_array($arr)) {
$text = $notes['text'];
$name = $notes['name'];
$time = $notes['addedtime'];
$comment = $notes['comments'];
if(get_user_class() >= UC_MODERATOR) {
$privacy = $notes['privacy'];
if ($privacy == "all")
  $privacy = "<font color=green><b>Всем</b></font>";
 else
  $privacy = "<font color=red><b>Только мне</b></font>";
  }
$text = format_comment($text);
if (strlen($text) > 700)
	$text = substr($text, 0, 700) . ".... [<a href=\"/zametka-".$notes['id']."\"><b>Читать дальше</a></b>]";
print("<hr style=\"width:100%; background-color: #F7F7F8; height:1px; border-style: none none dashed;\" /><div class=\"textblog\"><a href=\"/zametka-".$notes['id']."\">$name</a></div>");
//print("<div align=\"right\">");
//if(get_user_class() >= UC_MODERATOR) {
//print("Видно : $privacy | ");
//}
//print("<em>Просмотров: <b>".$notes["views"]."</b></em> | Комментарии: <b>".$comment."</b></div>");
print("<div class=\"triangle-borderb\">$text</div>");
print("<div class=\"authorb\"><strong><a href=\"userdetails.php?id=".$notes["owner"]."\">".get_user_class_color($notes["class"], $notes["username"])."</a></strong> ");
print("<font color=green><strong>[$time]</strong></font> <img src=http://www.dxp.ru/images/eye.png>: <b>".$notes["views"]."</b> | <img src=http://www.dxp.ru/images/comment.png>: <b>".$comment."</b> ");
if(get_user_class() >= UC_MODERATOR or $CURUSER['id'] == $notes['owner'])
print("<a href=\"notes.php?action=edit&id=".$notes['id']."\" style=\"color:#999\">Редакт.</a> | <a href=\"notes.php?action=delete&id=".$notes['id']."\" style=\"color:#999\">Удалить</a>");
print("</div>");
}
print($pagerbottom);
} else {
print("<div align=\"center\"><b>Заметок не найдено!</b></div>");
}
//end_frame();
stdfoot();
}

elseif ($action == "detalis") {
$id = (int)$_GET['id'];
$res = sql_query("SELECT n.*,users.class,users.id,users.username FROM notes AS n LEFT JOIN users ON users.id = n.owner WHERE n.id = $id") or sqlerr(__FILE__, __LINE__);
$row = mysql_fetch_assoc($res) or bark("Нет заметки с таким ID '$id'.");
$privacy = $row['privacy'];
$comment = $row['comment'];
if (get_user_class() < UC_MODERATOR && $CURUSER["id"] != $row["owner"]) {
	if ($privacy == "me")
		stderr ( "Отклонено", "Этот пользователь закрыл заметку." );
}
sql_query("UPDATE notes SET views = views + 1 WHERE id=$id") or sqlerr(__FILE__, __LINE__);
if ($privacy == "all")
  $privacy = "<font color=green><b>Всем</b></font>";
 else
  $privacy = "<font color=red><b>Только мне</b></font>";
?>

<?php
stdhead($row['name']);
//begin_frame($row['name']);
menu();
print("<div class=\"textblog\">".$row['name']."</div>");
if(get_user_class() >= UC_MODERATOR or $CURUSER['id'] == $row['owner'])
//print("<a href=\"?action=edit&id=$id\" style=\"color:#999\">Редактировать | <a href=\"?action=delete&id=$id\" style=\"color:#999\">Удалить</a>");
//print("</div>");
//print("<div class=\"live\"><div class=\"bg-bott-r\"><div class=\"bg-bott-l\"><div class=\"bg-top-r\"><div style='padding: 10px 8px 8px 8px;'>");
//print("<div class=\"author\" align=\"right\">Видно : $privacy</div><br>");
$text = htmlspecialchars($row['text']);
$text = format_comment($text);
print("<div class=\"triangle-borderb\">$text</div>");
print("<div class=\"authorb\"><a href=\"userdetails.php?id=".$row["owner"]."\"><span style=\"color:#567B9A\">".get_user_class_color($row["class"], $row["username"])."</span></a>, ".$row['addedtime']." <a href=\"notes.php?action=edit&id=".$notes['id']."\" style=\"color:#999\">Редакт.</a> | <a href=\"notes.php?action=delete&id=".$notes['id']."\" style=\"color:#999\">Удалить</a></div>");
//print("<em>Просмотров: <b>".$row["views"]."</b></em>");
print("</div>");
if ($comment == "yes") {
	$query = sql_query("SELECT COUNT(*) FROM note_com WHERE note = $id");
	 $count = mysql_fetch_array($query);
		$counts = $count[0];
		if($counts){
			print("</br><div class='title_header'><img border=\"0\" src=\"pic/notes/user_comment.png\"> Комментарии (".$counts.")</div><br>");
$query = sql_query("SELECT n.*, users.class, users.id AS userid, users.username, users.avatar FROM note_com AS n LEFT JOIN users ON users.id = n.user WHERE n.note = '".$id."'");
                while ($res = mysql_fetch_array($query)) {
				$idcom = $res["id"];
				$date = $res["added"];
				$text = $res["text"];
				$userid = $res["userid"];
				$avatar = $res["avatar"];
		if (!$avatar){
			$avatar = "pic/default_avatar.gif";
		} else {
			$avatar = "".htmlspecialchars_uni($avatar)."";
		}

print("<hr style=\"width:100%; background-color: #F7F7F8; height:1px; border-style: none none dashed;\" /><table><tr valign=\"top\"><td>Добавил: </a>, ".nicetime($date, true) ."  | <a href=\"com_note.php?action=edit&id=".$idcom."\">редактитровать</a> | <a href=\"com_note.php?action=delete&id=".$idcom."\">удалить</a></span></td></tr></table><table width=\"100%\" align=\"center\">");
print("<tbody><tr>");
print("<td valign=top width=\"65\"><img src=\"$avatar\" style=\"border:1px solid #999; padding:5px; width:60px;\"/><br><a href=\"userdetails.php?id=$userid\"><span>".get_user_class_color($res["class"], $res["username"])."</span></td>");
print("<td><div class=\"triangle-border2 left\"> ".format_comment($text)."</div>");
//print("<div style=\"padding-bottom:5px;\"><span style=\"float:right; color:#C0C0C0; margin-bottom:7px;\">");
//print("Добавил: </a>, ".nicetime($date, true) ."  | <a href=\"com_note.php?action=edit&id=".$idcom."\">ред.</a> | <a href=\"com_note.php?action=delete&id=".$idcom."\">удал.</a></span>");
//print("<div style=\"margin-bottom:5px; margin-left:5px; margin-top:5px;\">".$text."<br/></div>");
//print("</div>");
print("</td>");
print("</tr></tbody>");
print("</table><br />");

				}
		} else {
			print("</br><div class='title_header'><img border=\"0\" src=\"pic/notes/user_comment.png\"> Комментариев нет. Пока что.</div>");
		}
	print("<form name=\"addcomm\" action=\"com_note.php?action=add\" method=\"post\">"); textbbcode("addcomm","text"); print("<br><input type=\"hidden\" name=\"nid\" value=\"".$id."\" /><input type=\"submit\" value=\"Разместить комментарий\"></form>");
} else {
print("</br><div class='title_header'><img border=\"0\" src=\"pic/notes/user_comment.png\"> Комменты отключены</div><br>");
}
//end_frame();
stdfoot();
}


elseif ($action == "view") {

$proverka = get_row_count("notes WHERE owner = $CURUSER[id]");

if (!$proverka) {
bark("У вас нету заметки , не хотите <a href=\"/addnote\" style=\"color:#999\">создать</a> ?");

} else {
stdhead('Мои заметки');
//begin_frame("Мои заметки");
menu();
$arr = mysql_query("SELECT * FROM notes WHERE owner = $CURUSER[id] ORDER BY id DESC") or sqlerr(__FILE__, __LINE__);
while ($notes = mysql_fetch_array($arr)) {
   $privacy = $notes['privacy'];
   $comment = $notes['comments'];
   $text = htmlspecialchars($notes['text']);
 if ($privacy == "all")
  $privacy = "<font color=green><b>Всем</b></font>";
 else
  $privacy = "<font color=red><b>Только мне</b></font>";
print("<div class=\"textblog\"><a href=\"/zametka-".$notes['id']."\">".$notes['name']."</a></div>");
//print("<div>Видно : $privacy | <em>Просмотров: <b>".$notes["views"]."</b> | Комментарии: <b>".$comment."</b></em></div>");
$text = format_comment($text);
if (strlen($text) > 700)
	$text = substr($text, 0, 700) . ".... [<a href=\"/zametka-".$notes['id']."\">Читать дальше</a>]";
print("<div class=\"triangle-borderb\">$text</div>");
print("<br>Дата: <font color=green><strong>".$notes['addedtime']."</strong></font> ");
print("<a href=\"?action=edit&id=".$notes['id']."\" style=\"color:#999\">Редакт.</a> | <a href=\"?action=delete&id=".$notes['id']."\" style=\"color:#999\">Удалить</a>");
}
//end_frame();
stdfoot();

}
}

elseif ($action == "add") {

	stdhead("Добавить заметку");
	begin_frame("Добавить заметку");
	menu();
	print("<form name=\"add\" action=\"savenote\" method=\"post\">
	<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr>
	<td class=\"colhead\" colspan=\"2\">» Добавить заметку</td>
	</tr><tr>
	<td class=\"rowhead\">Заголовок</td>
	<td><input type=\"text\" size=\"60\" name=\"name\"></td>
	</tr><tr>
	<td class=\"rowhead\">Текст</td>
	<td>"); textbbcode("add","text"); print("</td>
	</tr><tr>
	<td class=\"rowhead\">Приватность</td>
	<td><input type=\"radio\" name=\"privacy\" value=\"all\" checked>Всем<br><input type=\"radio\" name=\"privacy\" value=\"me\">Только мне</td></td>
	</tr><tr>
	<td class=\"rowhead\">Комментарии</td>
	<td><input type=\"radio\" name=\"comment\" value=\"yes\" checked>Вкл.<br><input type=\"radio\" name=\"comment\" value=\"no\">Выкл.</td></td>
	</tr><tr>
	<td colspan=\"2\" align=\"center\">
	<input type=\"submit\" value=\"Сохранить\">
	<input type=\"reset\" value=\"Сбросить\"></td>
	</tr></table></form>");
	end_frame();
	stdfoot();
	die();
}

elseif ($action == "saveAdd") {

	$name = htmlspecialchars((string)$_POST["name"]);
	if (!$name)
	bark("Вы не ввели заголовок, вернитесь <a href=\"?action=add\">назад</a>.");

	$privacy = (string)$_POST['privacy'];
	if ($privacy != "all" && $privacy != "me")
    bark("Приватность ви не указали");

	$comment = (string)$_POST['comment'];
	if ($comment != "yes" && $comment != "no")
	bark("Комментарии ви не указали");

	$text = htmlspecialchars((string)$_POST["text"]);
	if (!$text)
	bark("Вы не ввели текст, вернитесь <a href=\"?action=add\">назад</a>.");

	$dt = htmlspecialchars(date("Y-m-d H:i:s"));

	sql_query("INSERT INTO notes (owner, name, text, addedtime, privacy, comment) VALUES (".$CURUSER["id"].",".sqlesc($name).",".sqlesc($text).",".sqlesc($dt).",".sqlesc($privacy).",".sqlesc($comment).")") or sqlerr(__FILE__,__LINE__);
	header ("Refresh: 1; url=vse-zametki");
	success("Заметка добавлена!");

	}

elseif ($action == "edit") {
	$id = (int)$_GET["id"];

	$res = sql_query("SELECT id, name, text, privacy, owner, comment FROM notes WHERE id = $id") or sqlerr(__FILE__, __LINE__);
	$row = mysql_fetch_assoc($res) or bark("Нет заметки с таким ID '$id'.");
	if (!isset($CURUSER) || ($CURUSER["id"] != $row["owner"] && get_user_class() < UC_MODERATOR)) {
	bark("Доступ запрещен.");
	} else {
	stdhead('Редактирование заметки');
	begin_frame("Редактирование заметки");
	menu();
	print("<form name=\"edit\" action=\"?action=saveEdit\" method=\"post\">
	<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr>
	<td class=\"colhead\" colspan=\"2\">» Редактирование заметки</td>
	</tr><tr>
	<td class=\"rowhead\">Заголовок</td>
	<td><input type=\"text\" size=\"60\" name=\"name\" value=\"".$row["name"]."\"></td>
	</tr><tr>
	<td class=\"rowhead\">Текст</td>
	<td>"); textbbcode("edit","text",htmlspecialchars($row["text"])); print("</td>
	</tr><tr>
	<td class=\"rowhead\">Приватность</td>
	<td><input type=\"radio\" name=\"privacy\" value=\"all\" " .  ($row["privacy"] == "all" ? " checked" : "") . ">Всем<br><input type=\"radio\" name=\"privacy\" value=\"me\" " .  ($row["privacy"] == "me" ? " checked" : "") . ">Только мне</td></td>
	</tr><tr>
	<td class=\"rowhead\">Комментарии</td>
	<td><input type=\"radio\" name=\"comment\" value=\"yes\" " .  ($row["comment"] == "yes" ? " checked" : "") . ">Вкл.<br><input type=\"radio\" name=\"comment\" value=\"no\" " .  ($row["comment"] == "no" ? " checked" : "") . ">Выкл.</td></td>
	</tr><tr>
	<td colspan=\"2\" align=\"center\">
	<input type=\"hidden\" name=\"id\" value=\"$id\">
	<input type=\"submit\" value=\"Сохранить\">
	<input type=\"reset\" value=\"Сбросить\"></td>
	</tr></table></form>");
	end_frame();
	stdfoot();
	die();
	}
	}

elseif ($action == "saveEdit") {

	$id = (int)$_POST["id"];
	$res = sql_query("SELECT owner FROM notes WHERE id = $id") or sqlerr(__FILE__, __LINE__);
	$row = mysql_fetch_assoc($res) or bark("Нет заметки с таким ID '$id'.");
	if (!isset($CURUSER) || ($CURUSER["id"] != $row["owner"] && get_user_class() < UC_MODERATOR)) {
	bark("Доступ запрещен.");
	} else {
	$name = htmlspecialchars((string)$_POST["name"]);
	$updateset[] = "name = " . sqlesc($name);

	$privacy = (string)$_POST['privacy'];
	if ($privacy != "all" && $privacy != "me")
    bark("Приватность ви не указали");
	$updateset[] = "privacy = '$privacy'";

	$comment = (string)$_POST['comment'];
	if ($comment != "yes" && $comment != "no")
    bark("Комментарии ви не указали");
	$updateset[] = "comment = '$comment'";

	$text = htmlspecialchars((string)$_POST["text"]);
	$updateset[] = "text = " . sqlesc($text);

	$dt = htmlspecialchars(date("Y-m-d H:i:s"));

	$updateset[] = "addedtime = " . sqlesc($dt);

	sql_query("UPDATE notes SET " . implode(",", $updateset) . " WHERE id = " . $id) or sqlerr(__FILE__,__LINE__);

	header ("Refresh: 1; url=notes.php");
	success("Редактирование прошло успешно!");
	}
	}

elseif ($action == "delete") {

	$id = (int)$_GET['id'];
    $sure = (int)$_GET["uveren"];
	$res = sql_query("SELECT owner FROM notes WHERE id = $id") or sqlerr(__FILE__, __LINE__);
	$row = mysql_fetch_assoc($res) or bark("Нет заметки с таким ID '$id'.");
	if (!isset($CURUSER) || ($CURUSER["id"] != $row["owner"] && get_user_class() < UC_MODERATOR)) {
	bark("Доступ запрещен.");
	} else {
    if (!$sure)
    {
    stderr("Удалить заметку", "Вы собираетесь удалить заметку пользователю. Нажмите\n" . "<a href=?action=delete&id=$id&uveren=1>сюда</a> если вы уверены.");
    }
    sql_query("DELETE FROM notes WHERE id = $id;");
    header("Refresh: 0; url=vse-zametki");
	}
	}

?>