$wcg_url = 'http://example.com';
$wcg_message = $page['content'];

if (strstr($wcg_message,'[gallery:')) {
        $wcg_m = @explode('[gallery:',$wcg_message);
    $tm=array();
    $wcg_message = array_shift($wcg_m);

        foreach ($wcg_m as $ll) {
                $wcg_b = @explode(']',$ll);
        $wcg_gallery = array_shift($wcg_b);
        $wcg_content = @join('',@file($wcg_url.'/og.php/'.$wcg_gallery));
        $tm[] = $wcg_content.join(']',$wcg_b);
        }
    $wcg_message .= join('',$tm);
    $page['content'] = $wcg_message;
}

