<?php
function myPluginGetAdminPageUrl($page_slug='', $add_edit = 'admin', $type='page', $params=''){
    $url = $page_slug === '' ? admin_url(  ) : admin_url( $add_edit.'.php?'.$type.'=' . $page_slug );
    return add_query_arg(isset($params[0]) ? $params[0]: '' , isset($params[1]) ? $params[1]: '' , $url);
}