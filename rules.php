<?php
/**
 * Created by PhpStorm.
 * User: rek
 * Date: 2014/7/12
 * Time: 上午3:47
 */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://autoproxy-gfwlist.googlecode.com/svn/trunk/gfwlist.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
$gfwlist = curl_exec($ch);
curl_close($ch);
$gfwlist = base64_decode($gfwlist);
$rules = <<<RULE
!----------------Mine----------------
|http://ip.cn
|http://upload.wikimedia.org
|https://upload.wikimedia.org
||2mdn.net
||52ph.com
||abbyy.com
||aboutsimon.com
||adtech.de
||akamai.net
||akamaihd.net
||amazonaws.com
||aol.com
||appledaily.com.tw
||bitbucket.org
||blogger.com
||blogsmithmedia.com
||blogspot.com
||blogspot.jp
||book.com.tw
||books.com.tw
||businessinsider.com
||c9.io
||canyu.org
||chrome.com
||cloudflare.com
||cloudfront.net
||dailymotion.com
||disqus.com
||doubleclick.net
||dropbox.com
||drx.tw
||dyndns.org
||edgesuite.net
||engadget.com
||facebook.net
||fastly.net
||fb.com
||filippo.io
||fsd.it
||ggpht.com
||github.com
||golang.org
||google-analytics.com
||googleadservices.com
||googleapis.com
||googlecode.com
||googlesyndication.com
||googletagservices.com
||googleusercontent.com
||googlevideo.com
||gstatic.com
||hidemyass.com
||html5rocks.com
||idv.tw
||im88.tw
||imrworldwide.com
||iphone4.tw
||jetbrains.com
||josephjiang.com
||joypark.com.tw
||ktnp.gov.tw
||lawrencenas.com
||libertytimes.com.tw
||lists.debian.org
||macosforge.org
||makhonkit.com
||mobile01.com
||mongodb.org
||mybloglog.com
||nextmedia.com
||nginx.org
||ntdtv.com
||ow.ly
||photowant.com
||phpdoc.org
||pixfs.net
||pixnet.net
||pixplug.in
||president.gov.tw
||ptt.cc
||readmoo.com
||roodo.com
||scorecardresearch.com
||skype.com
||slideshare.net
||sourceforge.net
||staticflickr.com
||stock.hexun.com
||tumblr.com
||twbbs.org
||twimg.com
||tynt.com
||udn.com
||udn.com.tw
||uploaded.net
||uukt.com.tw
||verisign.com.tw
||vimeo.com
||wireshark.org
||wordpress.com
||woyaolian.info
||woyaolian.net
||wretch.cc
||www.bbc.co.uk
||www.chinese.rfi.fr
||www.chiungyao.com.tw
||www.pcdvd.com.tw
||xuite.net
||yahoo.com
||yiiframework.com
||youtu.be
||youtube.com
||ytimg.com
||zeromq.org
||zh.wikipedia.org
!----------------EOF----------------
RULE;

$gfwlist = str_replace('!----------------EOF----------------', $rules, $gfwlist);
echo $gfwlist;
