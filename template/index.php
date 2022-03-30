<?php
class Template {

static $blocks = array();
static $cache_path = 'cache/';
static $cache_enabled = FALSE;

/* Khai báo thư mục lưu cache */

static function Init($cache_path = 'cache/', $cache_enabled = false) {
}

/* Render Template để hiển thị */

static function view($file, $data = array()) {
    $cached_file = self::cache($file);
    extract($data, EXTR_SKIP);
       require $cached_file;
}

/* Tạo Cache lưu lại kết quả  code đã biên dịch thành PHP */

static function cache($file) {
    if (!file_exists(self::$cache_path)) {
          mkdir(self::$cache_path, 0744);
    }
    $cached_file = self::$cache_path . str_replace(array('/', '.html'), array('_', ''), $file . '.php');
    if (!self::$cache_enabled || !file_exists($cached_file) || filemtime($cached_file) < filemtime($file)) {
        $code = self::includeFiles($file);
        $code = self::compileCode($code);
        file_put_contents($cached_file, '' . PHP_EOL . $code);
    }
    return $cached_file;
}

/* Xóa cache */

static function clearCache() {
    foreach(glob(self::$cache_path . '*') as $file) {
        unlink($file);
    }
}

 /*  Biên dịch các thành phần trong Template thành PHP */

static function compileCode($code) {
    $code = self::compileBlock($code);
    $code = self::compileYield($code);
    $code = self::compileEscapedEchos($code);
    $code = self::compileEchos($code);
    $code = self::compilePHP($code);
    return $code;
}

/* biên dịch Include  Tag */

static function includeFiles($file) {
    $code = file_get_contents($file);
    preg_match_all('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', $code, $matches, PREG_SET_ORDER);
    foreach ($matches as $value) {
        $code = str_replace($value[0], self::includeFiles($value[2]), $code);
    }
    $code = preg_replace('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', '', $code);
    return $code;
}

/* biên dịch PHP Syntax */

static function compilePHP($code) {
    return preg_replace('~\{%\s*(.+?)\s*\%}~is', '', $code);
}

  /* biên dịch PHP Echo */

static function compileEchos($code) {
    return preg_replace('~\{{\s*(.+?)\s*\}}~is', '', $code);
}

static function compileEscapedEchos($code) {
    return preg_replace('~\{{{\s*(.+?)\s*\}}}~is', '', $code);
}

static function compileBlock($code) {
    preg_match_all('/{% ?block ?(.*?) ?%}(.*?){% ?endblock ?%}/is', $code, $matches, PREG_SET_ORDER);
    foreach ($matches as $value) {
        if (!array_key_exists($value[1], self::$blocks)) self::$blocks[$value[1]] = '';
        if (strpos($value[2], '@parent') === false) {
            self::$blocks[$value[1]] = $value[2];
        } else {
            self::$blocks[$value[1]] = str_replace('@parent', self::$blocks[$value[1]], $value[2]);
        }
        $code = str_replace($value[0], '', $code);
    }
    return $code;
}

/* biên dịch kế thừa như trong Blade của Laravel */

static function compileYield($code) {
    foreach(self::$blocks as $block => $value) {
        $code = preg_replace('/{% ?yield ?' . $block . ' ?%}/', $value, $code);
    }
    $code = preg_replace('/{% ?yield ?(.*?) ?%}/i', '', $code);
    return $code;
}

}
?>