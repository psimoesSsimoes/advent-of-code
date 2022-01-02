<?php

function extractInputForDay(int $day) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, sprintf('https://adventofcode.com/2021/day/%u/input',$day));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array(
        'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:95.0) Gecko/20100101 Firefox/95.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
        'Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3',
        'Accept-Encoding: directive',
        'Connection: keep-alive',
        'Cookie: session=53616c7465645f5f40395f7d922cf9bd8a6e64a9c789a444feb2a9e2012f86d8e8f0935981fd0a5098e1bfaf6c089a0b',
        'Upgrade-Insecure-Requests: 1',
        'Sec-Fetch-Dest: document',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: cross-site',
        'Cache-Control: max-age=0',
        'Te: trailers',
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
    	throw new \Exception("curl error");
    }
    curl_close($ch);

    return explode(PHP_EOL,$result);
}

?>
