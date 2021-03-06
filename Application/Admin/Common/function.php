<?php


/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 获取对应状态的文字信息
 * @param int $status
 * @return string 状态文字 ，false 未获取到
 * @author huajie <banhuajie@163.com>
 */
function get_status_title($status = null){
    if(!isset($status)){
        return false;
    }
    switch ($status){
        case -1 : return    '已删除';   break;
        case 0  : return    '禁用';     break;
        case 1  : return    '正常';     break;
        case 2  : return    '待审核';   break;
        default : return    false;      break;
    }
}

// 获取数据的状态操作
function show_status_op($status) {
    switch ($status){
        case 0  : return    '启用';     break;
        case 1  : return    '禁用';     break;
        case 2  : return    '审核';       break;
        default : return    false;      break;
    }
}

/**
 * 获取文档的类型文字
 * @param string $type
 * @return string 状态文字 ，false 未获取到
 * @author huajie <banhuajie@163.com>
 */
function get_document_type($type = null){
    if(!isset($type)){
        return false;
    }
    switch ($type){
        case 1  : return    '目录'; break;
        case 2  : return    '主题'; break;
        case 3  : return    '段落'; break;
        default : return    false;  break;
    }
}

function build_attr_html($attr){
    $htmlcontent  = '<tr><td ><span class="del_attr">删除</span></td>';
    $htmlTop = '<tr><th>操作</th>';
    foreach($attr as $k => $v){
        $htmlTop .= '<th>'. $v['name'] .'</th>';
}
    $htmlTop .= '<th>库存</th><th>价格</th><th>属性图片</th></tr>';

    foreach($attr as $k => $v){
        $htmlcontent .='<td><select name="attr['. $k .'][]">';
       foreach($v['child'] as $key => $val){
            $htmlcontent .= '<option value="'. $val['id'] .'">'. $val['name'] .'</option>';
        }   
    }
    $htmlcontent .='</select></td><td><input type="text" name="attr_goods_num" /></td><td><input type="text" name="attr_goods_price" /></td><td><input type="file" name="attrpic[]"></td></tr>';
    $html['top'] = $htmlTop;
    $html['content'] = $htmlcontent;
    return $html;
}

function delemptyArray($array){
    if(count($array)){
        return true;
    }else{
        return false;
    }
}