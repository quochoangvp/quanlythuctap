<?php

/**
 * Mã hóa mật khẩu
 * @param  string $str Mật khẩu
 * @return string      Mật khẩu đã được mã hóa
 */
function hash_pass($str)
{
    return md5($str);
}
function get_uri($url = null)
{
    if (strpos($url, base_url()) == 0) {
        return substr($url, strlen(base_url()) - 1, strlen($url));
    } else {
        return $url;
    }
}
function logged_url($url = 'dashboard')
{
    return site_url('logged/' . $url);
}
function api_url($url = null)
{
    return site_url('api/' . $url);
}
function js_url($url = null)
{
    return base_url() . 'content/js/' . $url;
}
/**
 * Clean string
 * @param  string $str Origin string
 * @return string      Cleanner string
 */
function text_only($str)
{
    return trim(strip_tags($str));
}

function show_form_error($rules)
{
    $errors = [];
    foreach ($rules as $key => $value) {
        (strlen(form_error($key)) == 0) || $errors[$key] = form_error($key);
    }
    return $errors;
}

function is_logged()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function is_admin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 5) {
        return true;
    }
    return false;
}
function json_encode_in_array($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value) && count($value) > 0) {
            $array[$key] = json_encode($value);
        } else {
            $array[$key] = $value;
        }
    }
    return $array;
}
function make_adminmenu($menu)
{
    $CI = &get_instance();
    $list_item = '';
    foreach ($menu as $item) {
        if (in_array($CI->session->userdata('user')['type'], $item['type'])) {
            $list_item .= '<li><a href="';
            if (isset($item['url'])) {
                $list_item .= logged_url(trim($item['url'], '/'));
            } else {
                $list_item .= 'javascript:;';
            }
            $list_item .= '">';
            if (isset($item['icon'])) {
                $list_item .= $item['icon'] . ' ';
            }
            $list_item .= $item['title'];
            if (isset($item['children'])) {
                $list_item .= '<span class="fa arrow"></span>';
            }
            $list_item .= '</a>';
            if (isset($item['children'])) {
                $list_item .= '<ul class="nav nav-second-level">';
                foreach ($item['children'] as $child) {
                    if (in_array($CI->session->userdata('user')['type'], $child['type'])) {
                        $list_item .= '<li><a href="' . logged_url(trim($child['url']), '/') . '">' . $child['title'] . '</a></li>';
                    }
                }
                $list_item .= '</ul>';
            }
            $list_item .= '</li>';
        }
    }

    return $list_item;
}

function limit_to_numwords($str, $numwords)
{
    $str = strip_tags($str);
    $excerpt = explode(' ', $str, $numwords + 1);

    if (count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }

    $excerpt = implode(' ', $excerpt);

    return $excerpt;
}
