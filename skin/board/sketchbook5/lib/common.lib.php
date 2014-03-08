<?
if (!defined("_GNUBOARD_")) exit;

// 태그 테이블 작성
if(!isset($board['wr_related'])) {
	sql_query(" ALTER TABLE $g5[write_prefix]$bo_table ADD wr_related VARCHAR(255) NOT NULL", false); 
}

$DEFAULT = $board_skin_path."/list.".$board['bo_1'].".skin.php";
if(is_file($DEFAULT) == false) $DEFAULT = $board_skin_path . '/list.list.skin.php';

// 현재페이지, 총페이지수, 한페이지에 보여줄 행, URL
function get_new_paging($write_pages, $cur_page, $total_page, $url, $add="")
{
    $url = preg_replace('#&amp;page=[0-9]*(&amp;page=)$#', '$1', $url);

    $str = '';
    if ($cur_page > 1) {
        // $str .= '<a href="'.$url.'1'.$add.'" class="frst_last bubble" title="처음">‹ Prev</a>'.PHP_EOL;
        $str .= '<a href="'.$url.'1'.$add.'" class="frst_last bubble" title="처음">‹ Prev</a>'.PHP_EOL;
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).$add.'" class="bubble this"  title="이전 페이지">이전</a>'.PHP_EOL;

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= '<a href="'.$url.$k.$add.'" title="'.$k.' 페이지"  class="bubble">'.$k.'<span class="sound_only">페이지</span></a>'.PHP_EOL;
            else
                $str .= '<span class="sound_only">열린</span><strong class="this">'.$k.'</strong><span class="sound_only">페이지</span>'.PHP_EOL;
        }
    }

    if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).$add.'" class="bubble this" title="다음 페이지">다음</a>'.PHP_EOL;

    if ($cur_page < $total_page) {
        $str .= '<a href="'.$url.$total_page.$add.'" class="frst_last bubble" title="맨끝">Next ›</a>'.PHP_EOL;
    }

    if ($str)
        return "<div id=\"page-nav\" class=\"bd_pg clear\">{$str}</span></div>";
    else
        return "";
}

// 현재페이지, 총페이지수, 한페이지에 보여줄 행, URL
function get_naver_paging($write_pages, $cur_page, $total_page, $url, $add="")
{
    $url = preg_replace('#&amp;page=[0-9]*(&amp;page=)$#', '$1', $url);

    $str = '';
    if ($cur_page > 1) {
        // $str .= '<a href="'.$url.'1'.$add.'" class="frst_last bubble" title="처음">‹ Prev</a>'.PHP_EOL;
        $str .= '<a href="'.$url.'1'.$add.'" class="pre">‹ Prev</a>'.PHP_EOL;
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).$add.'" class="pre">이전</a>'.PHP_EOL;

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= '<a href="'.$url.$k.$add.'" title="'.$k.' 페이지" >'.$k.'<span class="sound_only">페이지</span></a>'.PHP_EOL;
            else
                $str .= '<span class="sound_only">열린</span><strong>'.$k.'</strong><span class="sound_only">페이지</span>'.PHP_EOL;
        }
    }

    if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).$add.'" class="next" title="다음 페이지">다음</a>'.PHP_EOL;

    if ($cur_page < $total_page) {
        $str .= '<a href="'.$url.$total_page.$add.'" class="next" title="맨끝">Next ›</a>'.PHP_EOL;
    }

    if ($str)
        return "<div id=\"paginate\" class=\"paginate2\">{$str}</div>";
    else
        return "";
}
?>