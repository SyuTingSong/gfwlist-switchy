<?php
/**
 * Created by PhpStorm.
 * User: rek
 * Date: 2014/7/12
 * Time: 上午2:53
 */
date_default_timezone_set('Asia/Taipei');

$wildcard = require 'merge_wildcard.php';
$regexp = require 'merge_regexp.php';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://autoproxy-gfwlist.googlecode.com/svn/trunk/gfwlist.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
$gfwlist = curl_exec($ch);
curl_close($ch);
$gfwlist = base64_decode($gfwlist);

$gfwlistRules = explode("\n", $gfwlist);

foreach($gfwlistRules as $line) {
    $line = rtrim($line);
    if(empty($line)
        || $line[0] == '!'
        || substr($line, 0, 2) == '@@'
        || strpos($line, '[AutoProxy') === 0
    ) continue;

    if(substr($line, 0, 2) == '||') {
        $domain = substr($line, 2);
        $wildcard[] = "*://$domain/*";
        $wildcard[] = "*://*.$domain/*";
    } elseif($line[0] == '|') {
        $url = substr($line, 1);
        $url = str_replace('.', '\.', $url);
        $regexp[] = "^$url";
    } elseif(substr($line, 0, 2) == '/^') {
        $reg = substr($line, 1, strlen($line) - 2);
        $regexp[] = $reg;
    } elseif($line[0] == '.' && strpos($line, '/') === false) {
        $wildcard[] = "*://*$line/*";
    } else {
        $wildcard[] = "*$line*";
    }
}
$wildcard = array_unique($wildcard);
$regexp = array_unique($regexp);

sort($wildcard);
header('Content-Type: text/plain');
?>
; Summary: Merged GFWed Rule List
; Author: rek
; Date: <?=date('Y-m-d')?>
; URL: https://rek.me/rules.txt

#BEGIN

[Wildcard]
<?foreach($wildcard as $rule):?>
<?=$rule,"\n";?>
<?endforeach;?>

[RegExp]
<?foreach($regexp as $rule):?>
<?=$rule,"\n";?>
<?endforeach;?>

#END