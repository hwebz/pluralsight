<?php
/**
 * Created by PhpStorm.
 * User: ha.do
 * Date: 11/05/2017
 * Time: 18:11
 */

$clients = simplexml_load_file('clients.xml');
foreach($clients->client as $client) {
    print "$client->name has account number $client->account_number<br />";
}