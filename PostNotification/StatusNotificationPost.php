<?php
const NOTIF_POST_NAME = "xmlStatusNotification";
function GetNotificationXml($xmlStatusNotification) {
	return simplexml_load_string($xmlStatusNotification); // Retorna o objeto do Xml
}
?>