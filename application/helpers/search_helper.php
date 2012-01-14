<?php
/**
 * Helper untuk bikin search-box
 *
 * @param $action_url Action seperti <form action="blabla" />
 * @param string $input_name Name seperti <input name="blabla"
 * @return string
 */
function search($action_url, $input_name = 'keyword', $method = 'post')
{
    $string = '
                <form action="%s" method="%s" accept-charset="utf-8">
                    <div class="search-box">
                        <div>
                            <input type="text" name="%s" placeholder="Ketik kata pencarian">
                            <input type="submit" name="submit" value="Cari" class="button">
                        </div>
                    </div>
                </form>
                ';

    return sprintf($string, site_url($action_url), $method, $input_name);
}