<?php
/**
 * Created by PhpStorm.
 * User: rek
 * Date: 2014/7/12
 * Time: 上午3:47
 */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://raw.githubusercontent.com/gfwlist/gfwlist/master/gfwlist.txt");
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
||1dpw.com
||2mdn.net
||4004.com
||52ph.com
||abbyy.com
||about.me
||aboutsimon.com
||adsmarket.com
||adtech.de
||adzerk.net
||akamai.net
||akamaihd.net
||amazonaws.com
||angularjs.org
||aol.com
||appledaily.com.tw
||atelierevolve.com
||azurecomcdn.net
||becomekodiak.com
||bitbucket.org
||blogger.com
||blogsmithmedia.com
||blogspot.com
||blogspot.jp
||blogspot.tw
||brainbashers.com
||book.com.tw
||books.com.tw
||businessinsider.com
||c9.io
||caiyalin.com
||canyu.org
||catfan.me
||cerevo.com
||cdninstagram.com
||chaiyalin.com
||chrome.com
||chromium.org
||cloudflare.com
||cloudfront.net
||cnzz.com
||commentshk.com
||creaelicita.cl
||dailymotion.com
||disqus.com
||disquscdn.com
||digitalocean.com
||doubleclick.net
||dropbox.com
||dropboxstatic.com
||drx.tw
||dyndns.org
||easylife.tw
||edgesuite.net
||engadget.com
||evernote.com
||evertype.com
||evozi.com
||facebook.net
||fastly.net
||fb.com
||fengzhenghu.net
||filippo.io
||fsd.it
||fsdn.com
||gamis-orange-world.com
||geetest.com
||ggpht.com
||gigacircle.com
||golang.org
||google.com
||google.com.tw
||google-analytics.com
||googleadservices.com
||googleapis.com
||googlecode.com
||googlesyndication.com
||googletagservices.com
||googleusercontent.com
||googlevideo.com
||goo.gl
||gov.sg
||greatwordpresshosting.com.au
||growingio.com
||grumpylemming.com
||gstatic.com
||hhmembers.net
||hidemyass.com
||howtogeek.com
||html5rocks.com
||idv.tw
||im88.tw
||imrworldwide.com
||inboxsdk.com
||infinario.com
||inoreader.com
||intercom.io
||invisionapp-cdn.com
||iphone4.tw
||izudreampass.com
||jetbrains.com
||jekyllrb.com
||josephjiang.com
||joypark.com.tw
||justfont.com
||jwpcdn.com
||keakon.net
||ktnp.gov.tw
||lastpass.com
||lawrencenas.com
||libertytimes.com.tw
||linode.com
||linuxacademy.com
||lists.debian.org
||ltn.com.tw
||macosforge.org
||mailchimp.com
||makhonkit.com
||marxi.co
||metroradio.com.hk
||mgix.com
||mobile01.com
||mongodb.org
||msecnd.net
||mybloglog.com
||mybuys.com
||mzstatic.com
||nathankot.com
||nextmag.com.tw
||nextmedia.com
||nixzhu.me
||ntdtv.com
||nuu.edu.tw
||oceanpark.com.hk
||ohdave.com
||olark.com
||oreilly.com
||oreillystatic.com
||ow.ly
||photowant.com
||phpdoc.org
||pilot-pen.com.tw
||pixfs.net
||pixnet.net
||pixplug.in
||poll.fm
||president.gov.tw
||ptt.cc
||qbox.me
||quantserve.com
||readmoo.com
||robert-lerner.com
||roga.tw
||roodo.com
||sangebaimao.com
||scorecardresearch.com
||shimo.im
||skype.com
||slideshare.net
||sourceforge.net
||sstatic.net
||staticflickr.com
||stock.hexun.com
||taedp.org.tw
||telegram.org
||thegeekstuff.com
||ticket.com.tw
||transifex.com
||tumblr.com
||tvbs.com.tw
||twbbs.org
||twimg.com
||tynt.com
||udn.com
||udn.com.tw
||universesandbox.com
||uploaded.net
||uukt.com.tw
||verisign.com.tw
||videohelp.com
||vimeo.com
||vimeocdn.com
||vivaldi.club
||vivaldi.com
||vivaldi.net
||vpntunnel.com
||w.org
||whatsapp.com
||wireshark.org
||wordpress.com
||woyaolian.info
||woyaolian.net
||woyaolian.org
||wretch.cc
||wuliaooo.com
||wzyboy.im
||bbc.co.uk
||chinese.rfi.fr
||chiungyao.com.tw
||pcdvd.com.tw
||xuite.net
||yahoo.com
||yiiframework.com
||yogo.tw
||youtu.be
||youtube.com
||ytimg.com
||zdassets.com
||zeromq.org
||zh.wikipedia.org
||zhugeio.com
||zipangguide.net
!------------For Speed--------------
||adobe.com
||browserstack.com
||github.com
||instagram.com
||jquery.com
||monkeymajik.com
||mozilla.net
||nginx.org
||postgresql.org
||softlayer.com
||unfo.xyz
||vivaldi.club
!----------------EOF----------------
RULE;

$gfwlist = str_replace(
    array(
        '!---------------------EOF-----------------------',
        '@@||ipv6.google.com',
    ),
    array(
        $rules,
        '',
    ),
    $gfwlist
);
echo $gfwlist;
