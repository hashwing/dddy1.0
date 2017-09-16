<?php
 /**
 * 获取PDF文件页数的函数获取
 * 文件应当对当前用户可读（linux下）
 * @param  [string] $path [文件路径]
 * @return [array]        [数组第一位表示成功与否，第二位表示提示信息]
 */
 function getPdfPages($path){

    if(!file_exists($path)) return array(false,"文件\"{$path}\"不存在！");
    if(!is_readable($path)) return array(false,"文件\"{$path}\"不可读！");
    // 打开文件
    $fp=@fopen($path,"r");
    if (!$fp) {
        return array(false,"打开文件\"{$path}\"失败");
    }else {
        $max=0;
        while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                preg_match('/[0-9]+/',$matches[0], $matches2);
                if ($max<$matches2[0]) $max=$matches2[0];
            }
        }
        fclose($fp);
 
        // 返回页数
        return array(true,$max);
    }
 }
    /**
     * 测试代码
     */
    $results=getPdfPages("demo.pdf");
    if($results[0]){
     echo $results[1];
        // 在这里放置成功读取后的处理代码
    }else{
        // 在这里放置失败的处理代码
    }
 ?>
